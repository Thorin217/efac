<?php

namespace Exactum\Efac\Http\Resources\External\Token\FSEE\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class ResumenFSEEResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'totalCompra' => (float) $this->resource->summary->total_no_subject,
            'descu' => (float) $this->resource->summary->discount_not_subject,
            'totalDescu' => (float) $this->resource->summary->total_discount,
            'subTotal' => (float) $this->resource->summary->sub_total,
            'ivaRete1' => (float) $this->resource->summary->IVA_withheld, #TODO: Add iva Rete calculation
            'reteRenta' => (float) $this->resource->summary->income_withheld, #TODO: Add Tax Rete calculation
            'totalPagar' => (float) $this->resource->summary->total_payable,
            'totalLetras' => $this->resource->summary->total_letter,
            'condicionOperacion' => $this->resource->operationCondition->goes_id,
            'pagos' => null, #TODO: make jsonResource
            'observaciones' => null, #TODO: make comunication
        ];
    }
}
