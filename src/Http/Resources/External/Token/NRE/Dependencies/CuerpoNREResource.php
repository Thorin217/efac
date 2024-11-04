<?php

namespace Exactum\Efac\Http\Resources\External\Token\NRE\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class CuerpoNREResource extends JsonResource
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
        $tributes = null;

        if (abs($this->resource->total_item)) {
            $tributes = $this->resource->productService->tributesTypes->pluck('goes_id');
        }

        return [
            'numItem' => $this->index,
            'tipoItem' => $this->resource->productService->itemType->goes_id,
            'numeroDocumento' => null, #TODO:
            'codigo' => $this->resource->productService->code,
            'codTributo' => null, #TODO:
            'descripcion' => $this->resource->description,
            'cantidad' => (float) $this->resource->quantity,
            'uniMedida' => (int) $this->resource->productService->measurementUnit->goes_id,
            'precioUni' => (float) $this->resource->unit_price,
            'montoDescu' => (float) $this->resource->discount,
            'ventaNoSuj' => (float) $this->resource->total_item_no_subject,
            'ventaExenta' => (float) $this->resource->total_item_exempt,
            'ventaGravada' => (float) $this->resource->total_item,
            'tributos' => $tributes,
        ];
    }
}
