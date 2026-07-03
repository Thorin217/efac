<?php

namespace Exactum\Efac\Http\Resources\External\Token\FSEE\Dependencies;

use Exactum\Efac\Http\Resources\Document\PaymentResource;
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
            'reteRenta' => (float) $this->resource->summary->income_withheld,
            'totalPagar' => (float) $this->resource->summary->total_payable,
            'totalLetras' => $this->resource->summary->total_letter,
            'condicionOperacion' => $this->resource->operationCondition->goes_id,
            'pagos' => $this->buildPagos(),
            'observaciones' => $this->resource->summary->observations ?? null,
        ];
    }

    private function buildPagos(): ?array
    {
        $payments = $this->resource->payments()->with(['paymentType', 'term'])->get();

        if ($payments->isEmpty()) {
            return null;
        }

        return PaymentResource::collection($payments)->resolve();
    }
}
