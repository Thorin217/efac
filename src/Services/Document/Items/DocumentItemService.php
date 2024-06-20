<?php

namespace Exactum\Efac\Services\Document\Items;

use Exactum\Efac\Efac;
use Exactum\Efac\Enums\StatusEnum;
use Exactum\Efac\Jobs\Document\MakeCreSummaryJob;
use Exactum\Efac\Models\Details\DteItem;
use Exactum\Efac\Models\Document\Dte;
use Exactum\Efac\Models\Enterprise\ProductService;
use Exactum\Efac\Models\External\IVARetention;

/**
 * DocumentItemService class
 **/
final class DocumentItemService
{
    /**
     * prepareDTEItems function summary
     *
     * prepareDTEItems function long description
     *
     * @param Type $var Description
     * @return type
     **/
    private function prepareDTEItems(Dte $dte, array $productServiceList)
    {
        return collect($productServiceList)->map(function ($item) use ($dte) {
            $productService = Efac::$productServiceModel::find($item['product_service_id'])->load('itemType');
            $item['description'] = $item['description'] ?? $productService->name;

            /*
            if (!$productService) {
                $item['quantity'] = 1;
                $item['total_item_no_subject'] = $item['unit_price'];
                $item['product_service_id'] = ProductService::find(1)->id;

                return DteItem::make($item);
            }
            //*/

            if (isset($item['untaxed']) && $item['untaxed']) {
                return DteItem::make([
                    'product_service_id' => $item['product_service_id'],
                    'description' => $item['description'],
                    'quantity' => 1,
                    'unit_price' => 0,
                    'discount' => 0,
                    'total_item_untaxed' => 0, //$productService->unit_price,
                ]);
            }

            return DteItem::make(array_merge(
                $item,
                $dte->generateDteItem($productService, $item)
            ));
        });
    }

    /**
     * manageDocumentItem function summary
     *
     * manageDocumentItem function long description
     *
     * @param Dte $dte Description
     * @param array $data Description
     * @return Dte
     * Si hay ventas gravadas al menos deben ir 20-IVA
     * FACTURA debe ir con el iva incluido
     * Si en la factura solo se aplica 20-IVA se envia en null
     **/
    public function manageDocumentItem(Dte $dte, array $data)
    {
        $dteItems = $this->prepareDTEItems($dte, $data);

        $dte->dteItems()->delete();
        $dte->dteItems()->saveMany($dteItems);
        return $dte;
    }

    /**
     * addCreItem function summary
     *
     * addCreItem function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function addCreItem(Dte $dte, array $data)
    {
        $dte->updateCompleteStep('cre-body');

        $dteItemData = array_merge(
            array_intersect_key($data, array_flip(['iva_retention_id', 'related_document_id', 'description', 'amount_taxable'])),
            ['iva_withheld' =>  round($data['amount_taxable'] * IVARetention::find($data['iva_retention_id'])->percent, 2)],
        );
        $dte->creItems()->create($dteItemData);

        $dte->status = StatusEnum::Processing->value;
        $dte->save();

        MakeCreSummaryJob::dispatch($dte);

        return $dte;
    }

    /**
     * getAllDocumentItem function summary
     *
     * getAllDocumentItem function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function getAllDocumentItem(Dte $dte)
    {
        return $dte->dteItems()->get();
    }

    /**
     * getCreItem function summary
     *
     * getCreItem function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function getCreItem(Dte $dte)
    {
        return $dte->creItems()->first();
    }

    /**
     * updateCreItem function summary
     *
     * updateCreItem function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function updateCreItem(Dte $dte, array $data)
    {
        $creItem = $dte->creItems()->first();

        $dteItemData = array_merge(
            array_intersect_key($data, array_flip(['iva_retention_id', 'related_document_id', 'description', 'amount_taxable'])),
            ['iva_withheld' =>  round($data['amount_taxable'] * IVARetention::find($data['iva_retention_id'])->percent, 2)],
        );
        $creItem->update($dteItemData);

        $dte->status = StatusEnum::Processing->value;
        $dte->save();

        MakeCreSummaryJob::dispatch($dte);

        return $creItem;
    }
}
