<?php

namespace Exactum\Efac\Services\External;

use Exactum\Efac\Efac;
use Exactum\Efac\Jobs\Document\MakeExportSummaryJob;
use Exactum\Efac\Jobs\Document\MakeSummaryJob;
use Exactum\Efac\Models\Document\Dte;
use Exactum\Efac\Models\Document\RelatedDocument;
use Exactum\Efac\Models\Enterprise\ReceiverEntity;
use Exactum\Efac\Models\Event\Contingency;
use Exactum\Efac\Models\External\DteType;
use Exactum\Efac\Models\External\Incoterm;
use Exactum\Efac\Models\External\Regimen;
use Exactum\Efac\Services\Document\DocumentService;
use Exactum\Efac\Services\Document\Items\DocumentItemService;
use Illuminate\Support\Str;

/**
 * BoosterService class
 **/
final class BoosterService
{
    private $documentService;

    private $documentItemService;

    public function __construct(
        DocumentService $documentService,
        DocumentItemService $documentItemService
    ) {
        $this->documentService = $documentService;
        $this->documentItemService = $documentItemService;
    }

    /**
     * createDte function summary
     *
     * createDte function long description
     *
     * @param Type $var Description
     * @return Dte
     **/
    public function createDte(array $data): Dte
    {
        $contingencyId = null;
        $modelType = ExternalService::getDefaultIdByExternalModel('model_types');
        $operationType = ExternalService::getDefaultIdByExternalModel('operation_types');
        $dteType = DteType::find($data['dte_type_id']);

        $receiverEntity = ReceiverEntity::where('entity_id', $data['entity_id'])->first();

        if (
            $dteType->can_go_into_contingency &&
            Contingency::externalApiAccepted()->exists()
        ) {
            $contingencyId = Contingency::externalApiAccepted()->first()->id ?? null;
            [$modelType, $operationType] = ExternalService::getDependenciesContingency();
        }

        return $this->documentService->createDocument([
            'entity_id' => $data['emitter_entity_id'],
            'dte_type_id' => $dteType->id,
            'receiver_entity_id' => $receiverEntity->id,
            'property_object_id' => null,
            'operation_condition_id' => $data['operation_condition'],
            'user_id' => $data['user_id'], # $salePoint->subsidiary->emitterEntity->entity->users()->role(RoleUserEnum::Employee->value)->first()->id
            'remote_id' => $data['remote_id'],
            'sale_point_id' => $data['sale_point_id'],
            'contingency_id' => $contingencyId,
            'model_type_id' => $modelType,
            'operation_type_id' => $operationType,
            'documentable_id' => $data['documentable_id'] ?? null,
            'documentable_type' => $data['documentable_type'] ?? null
        ]);
    }

    /**
     * manageDteItems function summary
     *
     * manageDteItems function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function manageDteItems(Dte $dte, array $data, RelatedDocument $relatedDocument = null)
    {
        $preparedItem = array();
        foreach ($data as $productService) {
            array_push($preparedItem, [
                'product_service_id' => Efac::$productServiceModel::whereSku($productService['product_service_code'])->first()->id,
                'unit_price' => $productService['unit_price'],
                'description' => $productService['description'] ?? null,
                'quantity' => $productService['quantity'],
                'discount' => $productService['discount'],
                'untaxed' => $productService['untaxed'] ?? false,
            ]);
        }

        $this->documentItemService->manageDocumentItem($dte, $preparedItem);
    }

    /**
     * createRelatedDocument function summary
     *
     * createRelatedDocument function long description
     *
     * @param Type $var Description
     * @return RelatedDocument
     **/
    public function createRelatedDocument(Dte $dte, int $remoteRelatedDocument)
    {
        return $dte->createRelatedDteBySelfDte($remoteRelatedDocument, false);
    }

    /**
     * createSummaryByDte function summary
     *
     * createSummaryByDte function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function createSummaryByDte(Dte $dte, array $data)
    {
        $dte->load('receiverEntity');
        $discountHelper = $data['discount'];
        $data['discount_exempt'] = 0;
        $data['discount'] = 0;
        $data['discount_not_subject'] = 0;
        $data[$dte->receiverEntity->sale_type_id == 3 ? 'discount' : 'discount_exempt'] = $discountHelper;

        $data['apply_iva_retention'] = $data['iva_retention'] != 0;
        $data['send_document'] = true;

        MakeSummaryJob::dispatchSync($dte, $data);
    }

    /**
     * createExportSummaryByDte function summary
     *
     * createExportSummaryByDte function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function createExportSummaryByDte(Dte $dte, array $dataSummary, array $dataExportSummary)
    {
        $data = array_merge($dataSummary, [
            'regimen_id' => $dataExportSummary['regime'] ?? null,
            'incoterm_id' => $dataExportSummary['incoterm'] ?? null,
            'tax_revenue_id' => $$dataExportSummary['revenue'] ?? null,
            'insurance' => $dataExportSummary['insurance'] ?? 0,
            'flete' => $dataExportSummary['freight'] ?? 0,
            'observations' => $dataExportSummary['observations'] ?? null,
            'send_document' => true,
        ]);

        MakeExportSummaryJob::dispatchSync($dte, $data);
    }

    /**
     * createAppendicess function summary
     *
     * createAppendicess function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function createAppendices(Dte $dte, array $appendices)
    {
        $formatedAppendices = [];

        foreach ($appendices as $appendix) {
            array_push($formatedAppendices, [
                'tag' => Str::limit($appendix['tag'], 25),
                'value' => Str::limit($appendix['value'], 150),
            ]);
        }

        $this->documentService->manageAppendices($dte, $formatedAppendices);
    }
}
