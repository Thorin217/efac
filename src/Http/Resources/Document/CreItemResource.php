<?php

namespace Exactum\Efac\Http\Resources\Document;

use Exactum\Efac\Http\Resources\External\GenericExternalResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CreItemResource extends JsonResource
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
            'iva_retention' => GenericExternalResource::make($this->whenLoaded('ivaRetention')),
            'related_document' => RelatedDocumentResource::make($this->whenLoaded('relatedDocument')),

            'description' => $this->description,
            'amount_taxable' => $this->amount_taxable,
            'iva_withheld' => $this->iva_withheld,
        ];
    }
}
