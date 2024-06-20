<?php

namespace Exactum\Efac\Http\Resources\External\Token\FSEE\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class CuerpoFSEEResource extends JsonResource
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
        return [
            'numItem' => $this->index,
            'tipoItem' => $this->resource->productService->itemType->goes_id,
            'codigo' => $this->resource->productService->sku,
            'descripcion' => $this->resource->description,
            'cantidad' => (float) $this->resource->quantity,
            'uniMedida' => (int) $this->resource->productService->measurementUnit->goes_id,
            'precioUni' => (float) $this->resource->unit_price,
            'montoDescu' => (float) $this->resource->discount,
            'compra' => (float) $this->resource->total_item_no_subject,
        ];
    }
}
