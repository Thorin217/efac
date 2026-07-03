<?php

namespace Exactum\Efac\Http\Resources\Document;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'codigo'     => $this->paymentType->goes_id,
            'montoPago'  => (float) $this->mount,
            'referencia' => $this->reference,
            'plazo'      => $this->term?->goes_id,
            'periodo'    => $this->period,
        ];
    }
}
