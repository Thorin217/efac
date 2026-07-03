<?php

namespace Exactum\Efac\Http\Resources\External\Token\FEX\Dependencies;

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
            'tipoItem' => $this->resource->productService->itemType->goes_id,
            'numeroDocumento' => null,
            'cantidad' => (float) $this->resource->quantity,
            'codigo' => $this->resource->productService->code,
            'codTributo' => null,
            'uniMedida' => (int) $this->resource->productService->measurementUnit->goes_id,
            'descripcion' => $this->resource->description,
            'precioUni' => (float) $this->resource->unit_price,
            'montoDescu' => (float) $this->resource->discount,
            'ventaGravada' => (float) $this->resource->total_item,
            // Exportación siempre usa el tributo de IVA exportaciones (0%), sin importar
            // qué tributos tenga configurados el producto en el catálogo doméstico.
            'tributos' => ['C3'],
            'noGravado' => 0.0,
        ];
    }
}
