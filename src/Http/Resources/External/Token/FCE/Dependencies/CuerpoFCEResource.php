<?php

namespace Exactum\Efac\Http\Resources\External\Token\FCE\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class CuerpoFCEResource extends JsonResource
{
    protected $index;

    public function __construct($resource, $index)
    {
        parent::__construct($resource);
        $this->index = $index;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // Default attributes for taxed
        $especialAttributes = [
            'precioUni' => (float) $this->resource->unit_price,
            'ventaGravada' => (float) $this->resource->total_item,
            'tributos' => null,
            'ivaItem'  => 0,
        ];

        if (isset($this->resource->total_item) && $this->resource->total_item > 0) {
            // $arrayTributes = [];
            $especialAttributes['precioUni'] = (float) round($this->resource->productService->PriceWithTributesForFCE($this->resource->unit_price), 8);
            $especialAttributes['ventaGravada']  = (float) $this->resource->iva_item; // round(($especialAttributes['precioUni'] * (float) $this->resource->quantity) - (float) $this->resource->discount, 8);
            // $especialAttributes['ventaGravada'] = round($this->resource->productService->PriceWithTributesForFCE($this->resource->total_item), 8);
            // $especialAttributes['tributos'] = count($arrayTributes) ? $arrayTributes : null;
            $especialAttributes['ivaItem'] = (float) calculateIvaByPriceWithIva($especialAttributes['ventaGravada'], 8);
        }

        return array_merge($especialAttributes, [
            'numItem' => $this->index,
            'tipoItem' => $this->resource->productService->itemType->goes_id,
            'cantidad' => (float) $this->resource->quantity,
            'numeroDocumento' => null, #TODO:
            'codigo' => $this->resource->productService->sku,
            'codTributo' => null, #TODO:
            'uniMedida' => (int) $this->resource->productService->measurementUnit->goes_id,
            'descripcion' => $this->resource->description,
            'montoDescu' => (float) $this->resource->discount,
            'ventaNoSuj' => (float) $this->resource->total_item_no_subject,
            'ventaExenta' => (float) $this->resource->total_item_exempt,
            'psv' => 0,
            'noGravado' => 0, #TODO:
        ]);
    }
}
