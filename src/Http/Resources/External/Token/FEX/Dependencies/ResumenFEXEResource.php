<?php

namespace App\Http\Resources\External\Token\FEX\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class ResumenFEXEResource extends JsonResource
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
            'totalGravada' => (float) $this->resource->summary->total,
            'descuento' => (float) $this->resource->summary->discount,
            'porcentajeDescuento' => (float) $this->resource->summary->percent_discount,
            'totalDescu' => (float) $this->resource->summary->total_discount,

            'seguro' => (float) $this->resource->exportation->insurance,
            'flete' => (float) $this->resource->exportation->flete,

            'montoTotalOperacion' => (float) $this->resource->summary->mount_total_operation,
            'totalNoGravado' => (float) $this->resource->summary->total_untaxed,
            'totalPagar' => (float) $this->resource->summary->total_payable,
            'totalLetras' => $this->resource->summary->total_letter,
            'condicionOperacion' => $this->resource->operationCondition->goes_id,
            'pagos' => null, #TODO: make jsonResource

            'codIncoterms' => $this->resource->exportation->incoterm->goes_id ?? null,
            'descIncoterms' => $this->resource->exportation->incoterm->name ?? null,

            'numPagoElectronico' => $this->resource->summary->number_virtual_paid,
            'observaciones' => $this->resource->exportation->observations ?? null,
        ];
    }
}
