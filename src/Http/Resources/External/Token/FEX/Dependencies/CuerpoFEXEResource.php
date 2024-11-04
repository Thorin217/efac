<?php

namespace App\Http\Resources\External\Token\FEX\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class CuerpoFEXEResource extends JsonResource
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
            'cantidad' => (float) $this->resource->quantity,
            'codigo' => $this->resource->productService->code,
            'uniMedida' => (int) $this->resource->productService->measurementUnit->goes_id,
            'descripcion' => $this->resource->description,
            'precioUni' => (float) $this->resource->unit_price,
            'montoDescu' => (float) $this->resource->discount,
            'ventaGravada' => (float) $this->resource->total_item,
            'tributos' => $this->resource->productService->tributesTypes->pluck('goes_id'),
            'noGravado' => 0, // TODO:
        ];
    }
}
