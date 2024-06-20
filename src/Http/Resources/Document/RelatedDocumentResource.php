<?php

namespace Exactum\Efac\Http\Resources\Document;

use Exactum\Efac\Http\Resources\External\GenericExternalResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RelatedDocumentResource extends JsonResource
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
            'dte_type' => GenericExternalResource::make($this->whenLoaded('dteType')),
            'generation_type' => GenericExternalResource::make($this->whenLoaded('generationType')),
            'main_dte' => GeneralDteResource::make($this->whenLoaded('mainDte')),

            'identificator_document' => $this->identificator_document,
            'date' => $this->date,
        ];
    }
}
