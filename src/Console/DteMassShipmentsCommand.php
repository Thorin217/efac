<?php

namespace Exactum\Efac\Console;

use Exactum\Efac\Jobs\Document\MakeExportSummaryJob;
use Exactum\Efac\Jobs\Document\MakeSummaryJob;
use Exactum\Efac\Models\Document\Dte;
use Illuminate\Console\Command;

class DteMassShipmentsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mass-dte {baseDte} {limit?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $limit = $this->argument('limit') ?? 10;
        //$limit = 1;
        $baseDte = Dte::where('id', $this->argument('baseDte'))->whereHas('tokens', function ($builder) {
            $builder->whereNotNull('seal_reception');
        })->firstOrFail();
        $baseDte->loadBaseRelations(['relatedDocuments', 'exportation']);

        for ($i = 1; $i <= $limit; $i++) {
            $newDte = Dte::create($baseDte->only(
                'dte_type_id',
                'model_type_id',
                'operation_type_id',
                'sale_point_id',
                'receiver_entity_id',
                'user_id',
                'property_object_id',
                'contingency_id',
                'operation_condition_id',
            ));

            if (count($baseDte->relatedDocuments)) {
                foreach ($baseDte->relatedDocuments as $relatedDocument) {
                    $newDte->relatedDocuments()->create($relatedDocument->only(
                        'dte_type_id',
                        'main_dte_id',
                        'generation_type_id',
                        'identificator_document',
                        'date',
                    ));
                }
            }

            foreach ($baseDte->dteItems as $dteItem) {
                $newDte->dteItems()->create($dteItem->only(
                    'product_service_id',
                    'related_document_id',
                    'description',
                    'quantity',
                    'unit_price',
                    'discount',
                    'total_item_no_subject',
                    'total_item_exempt',
                    'total_item',
                    'iva_item',
                ));
            }

            if ($baseDte->appendices) {
                foreach ($baseDte->appendices as $appendix) {
                    $newDte->appendices()->create($appendix->only(
                        'field',
                        'tag',
                        'value',
                    ));
                }
            }

            if ($baseDte->exportation) {
                MakeExportSummaryJob::dispatchSync($newDte, [
                    'regimen_id' => $baseDte->exportation->regimen_id,
                    'incoterm_id' => $baseDte->exportation->incoterm_id,
                    'insurance' => $baseDte->exportation->insurance,
                    'flete' => $baseDte->exportation->flete,
                    'discount' => $baseDte->summary->discount,
                    'number_virtual_paid' => $baseDte->summary->number_virtual_paid,
                    'observations' => $baseDte->exportation->observations,
                    'send_document' => true,
                ]);
            } else {
                MakeSummaryJob::dispatchSync($newDte, [
                    'discount_not_subject' => $baseDte->summary->discount_not_subject,
                    'discount_exempt' => $baseDte->summary->discount_exempt,
                    'discount' => $baseDte->summary->discount,
                    'number_virtual_paid' => $baseDte->summary->number_virtual_paid,
                    'apply_iva_retention' => $baseDte->summary->IVA_withheld > 0,
                    'send_document' => true,
                ]);
            }
        }

        return Command::SUCCESS;
    }
}
