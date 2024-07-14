<?php

namespace Exactum\Efac\Jobs\Document;

use Exactum\Efac\Models\Document\Dte;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MakeExportSummaryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $dte;

    private $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Dte $dte, $data)
    {
        $this->dte = $dte;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $itemsDiscount = 0;
        $summedTributes = 0;

        $total = collect($this->dte->dteItems()->get())->reduce(function ($carry, $dteItem) use (&$itemsDiscount) {
            $carry['total'] += round($dteItem->total_item, 2);
            $itemsDiscount += round($dteItem->discount, 2);

            return $carry;
        }, ['total' => 0, 'total_untaxed' => 0]);

        $subTotalSales = array_sum($total);
        $totalDiscount = ($this->data['discount'] ?? 0) + $itemsDiscount;
        $subTotal = $subTotalSales - ($this->data['discount'] ?? 0);
        $mountTotal = $subTotal + $summedTributes + ($this->data['flete'] ?? 0) + ($this->data['insurance'] ?? 0);
        $totalPayable = $mountTotal;

        ///*
        $this->dte->exportation()->updateOrCreate(
            ['dte_id' => $this->dte->id],
            [
                'regimen_id' => $this->data['regimen_id'] ?? null,
                'incoterm_id' => $this->data['incoterm_id'] ?? null,
                'tax_revenue_id' => $this->data['tax_revenue_id'] ?? null,
                'insurance' => $this->data['insurance'] ?? 0,
                'flete' => $this->data['flete'] ?? 0,
                'observations' => $this->data['observations'] ?? null,
            ]
        );

        $summaryDte = $this->dte->summary()->updateOrCreate(
            [
                'dte_id' => $this->dte->id,
                'discount' => $this->data['discount'] ?? 0,
                'number_virtual_paid' => $this->data['number_virtual_paid'] ?? null,
            ],
            array_merge(
                $total,
                [
                    'sub_total' => $subTotal,
                    'total_discount' => $totalDiscount,
                    'sub_total_sales' => $subTotalSales,
                    'percent_discount' => round(($totalDiscount / $subTotalSales) * 100, 2),
                    'mount_total_operation' => $mountTotal,
                    'total_payable'  => $totalPayable,
                    'total_letter' => createLetters($totalPayable),
                ]
            )
        );

        $summaryDte->tributesTypes()->sync(['tributes_type_id' => 2]);
        //*/
        if ($this->data['send_document'])
            $this->dte->dispatchJobToMakeToken();
    }
}
