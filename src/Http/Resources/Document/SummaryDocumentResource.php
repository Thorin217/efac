<?php

namespace Exactum\Efac\Http\Resources\Document;

use Illuminate\Http\Resources\Json\JsonResource;

class SummaryDocumentResource extends JsonResource
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
            'id' => $this->id,
            'discount_not_subject' => $this->discount_not_subject,
            'discount_exempt' => $this->discount_exempt,
            'discount' => $this->discount,
            'IVA_withheld' => $this->IVA_withheld,
            'income_withheld' => $this->income_withheld,
            'number_virtual_paid' => $this->number_virtual_paid,
            'total_payable' => $this->total_payable,

            'document' => GeneralDteResource::make($this->whenLoaded('dte')),
        ];
    }
}
