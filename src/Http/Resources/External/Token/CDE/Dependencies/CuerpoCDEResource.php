<?php

namespace App\Http\Resources\External\Token\CDE\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class CuerpoCDEResource extends JsonResource
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
            'tipoDonacion' => $this->resource->productService->itemType->donationType->goes_id,
            'cantidad' => (float) $this->resource->quantity,
            'codigo' => $this->resource->productService->code,
            'uniMedida' => (int) $this->resource->productService->measurementUnit->goes_id,
            'descripcion' => $this->resource->description,
            'depreciacion' => (float) $this->resource->discount,
            'valorUni' => (float) $this->resource->unit_price,
            'valor' => (float) $this->resource->total_item_no_subject,
        ];
    }
}
