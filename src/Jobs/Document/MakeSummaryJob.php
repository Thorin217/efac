<?php

namespace Exactum\Efac\Jobs\Document;

use Exactum\Efac\Models\Document\Dte;
use Exactum\Efac\Models\External\Term;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MakeSummaryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $dte;

    private $discounts;

    private $globalDiscounts;

    /* private $makeJsonTokensJobs = [
        1 => MakeBasicJsonTokenJob::class,
        2 => MakeCCFJsonTokenJob::class,
        4 => MakeNCEJsonTokenJob::class,
        5 => MakeNDEJsonTokenJob::class,
        10 => MakeFSEJsonTokenJob::class,
        11 => MakeCDEJsonTokenJob::class,
    ]; */

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Dte $dte, $discounts)
    {
        $this->dte = $dte;
        $this->discounts = $discounts;
        $this->globalDiscounts = array_sum([
            $discounts['discount_not_subject'],
            $discounts['discount_exempt'],
            $discounts['discount'],
        ]);
    }

    /**
     * Execute the job.
     *
     * @return void
     * #TODO: apply "renta"
     */
    public function handle()
    {
        $ivaWithheld = 0;
        $itemsDiscount = 0;
        $tributes = collect();
        $summedTributes = 0;
        $dteItems = $this->dte
            ->dteItems()
            ->with(['productService.tributesTypes'  => function ($query) {
                $query->where('tributes_types.id', '!=', 2);
            }])->get();

        $total = collect($dteItems)->reduce(function ($carry, $dteItem) use (&$itemsDiscount, &$tributes) {
            $carry['total_no_subject'] += $dteItem->total_item_no_subject;
            $carry['total_exempt'] += $dteItem->total_item_exempt;
            $carry['total'] += $dteItem->total_item;
            $carry['total_untaxed'] += $dteItem->total_item_untaxed;
            $carry['total_IVA'] += $dteItem->iva_item;
            $itemsDiscount += round($dteItem->discount, 2);

            if (abs($dteItem->total_item) && $dteItem->total_item_untaxed !== 0) {
                $tributes = $tributes->concat($dteItem->productService->tributesTypes);
            }

            return $carry;
        }, ['total_no_subject' => 0, 'total_exempt' => 0, 'total' => 0, 'total_untaxed' => 0, 'total_IVA' => 0]);
        $total['total_no_subject'] = round($total['total_no_subject'], 2);
        $total['total_untaxed'] = round($total['total_untaxed'], 2);
        $total['total_exempt'] = round($total['total_exempt'], 2);
        $total['total_IVA'] = round($total['total_IVA'], 2);
        $total['total'] = round($total['total'], 2);

        //Make sums for summary
        $subTotalSales = /* $total['total'] + */ $total['total_exempt'] + $total['total_no_subject'];
        $subTotal = $subTotalSales - $this->globalDiscounts;

        // Calc Tributes
        if ($total['total']) {
            if ($this->dte->dte_type_id !== 1) {
                $subTotalSales += $total['total'];
                $subTotal = $subTotalSales - $this->globalDiscounts;

                $summaryTributes = $tributes->flatten()->unique(function ($item) {
                    return $item['id'];
                })->map(function ($tribute) use ($subTotal, &$summedTributes) {
                    $totalTribute = $tribute->retail_price ?? 0;

                    if ($tribute->percent) {
                        $totalTribute = $tribute->retail_price * $subTotal;
                    }

                    $summedTributes += $totalTribute;
                    return [
                        'tributes_type_id' => $tribute->id,
                        'total' => $totalTribute
                    ];
                });
            } else {
                $subTotalSales += $total['total_IVA'];
                $subTotal = $subTotalSales - $this->globalDiscounts;
            }
        }

        $mountTotal = $subTotal + $summedTributes;

        $incomeWithheld = 0;

        if ($this->discounts['apply_income_retention']) {
            $incomeWithheld = $subTotal * 0.1;
        }

        if ($this->discounts['apply_iva_retention']) {
            if ($this->dte->dte_type_id === 1) {
                $ivaWithheld = calculateIvaWithheld(($subTotal  / config('efac.iva_factor')), 2);
            } else {
                $ivaWithheld = calculateIvaWithheld($subTotal, 2);
            }
        }

        $totalPayable = $mountTotal - $ivaWithheld - $incomeWithheld; #+ ivaRete + Renta
        $totalDiscount = $this->globalDiscounts + $itemsDiscount;

        ///*
        //Save summaries
        $summaryDte = $this->dte->summary()->updateOrCreate(
            [],
            array_merge($this->discounts, $total,  [
                'sub_total' => $subTotal,
                'total_discount' => $totalDiscount,
                'sub_total_sales' => $subTotalSales,
                'percent_discount' => round(($totalDiscount / $subTotalSales) * 100, 2),
                'mount_total_operation' => $mountTotal,
                'total_payable'  => $totalPayable,
                'total_letter' => createLetters($totalPayable),
                'IVA_withheld' => $ivaWithheld,
                'income_withheld' => $incomeWithheld,
            ])
        );

        if (isset($summaryTributes) && $this->dte->dte_type_id !== 1) {
            $summaryDte->tributesTypes()->sync($summaryTributes);
        }

        $this->createPaymentIfRequested($summaryDte->total_payable);

        if ($this->discounts['send_document'])
            $this->dte->dispatchJobToMakeToken();
        //*/
    }

    private function createPaymentIfRequested(float $totalPayable): void
    {
        if (empty($this->discounts['payment_type_id'])) {
            return;
        }

        $isCredit = (string) $this->dte->operationCondition->goes_id === '2';

        $termId = null;
        $period = null;

        if ($isCredit) {
            $days = $this->discounts['payment_condition_days']
                ?? $this->dte->documentable?->paymentCondition?->days
                ?? 0;

            if ($days > 0) {
                $termId = Term::where('goes_id', $this->discounts['term_goes_id'] ?? '01')->value('id');
                $period = $days;
            }
        }

        $this->dte->payments()->updateOrCreate(
            [],
            [
                'payment_type_id' => $this->discounts['payment_type_id'],
                'term_id'         => $termId,
                // Hacienda rechaza/observa el DTE si montoPago difiere de totalPagar,
                // aun con condicionOperacion=2 (credito); el plazo/periodo ya reflejan
                // que es a credito, no hace falta reportar $0.00 en montoPago.
                'mount'           => $totalPayable,
                'reference'       => $this->discounts['payment_reference'] ?? null,
                'period'          => $period,
            ]
        );
    }
}
