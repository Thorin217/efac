<?php

namespace Exactum\Efac\Http\Resources\External\Token\CDE\Dependencies;

use Exactum\Efac\Http\Resources\Document\PaymentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ResumenCDEResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'valorTotal' => (float) $this->resource->summary->total_no_subject,
            'totalLetras' => $this->resource->summary->total_letter,
            'pagos' => $this->buildPagos(),
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
