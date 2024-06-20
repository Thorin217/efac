<?php

namespace Exactum\Efac\Jobs\Document;

use Exactum\Efac\Models\Document\Dte;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MakeCreSummaryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $dte;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Dte $dte)
    {
        $this->dte = $dte;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $total = collect($this->dte->creItems()->get())->reduce(function ($carry, $dteItem) {
            $carry['total_subject_withheld'] += round($dteItem->amount_taxable, 2);
            $carry['total_IVA_withheld'] += round($dteItem->iva_withheld, 2);

            return $carry;
        }, ['total_subject_withheld' => 0, 'total_IVA_withheld' => 0,]);

        ///*
        $this->dte->creSummary()->updateOrCreate(
            array_merge(
                $total,
                [
                    'total_IVA_withheld_letter' => createLetters($total['total_IVA_withheld']),
                ],
            )
        );
        //*/

        $this->dte->dispatchJobToMakeToken();
    }
}
