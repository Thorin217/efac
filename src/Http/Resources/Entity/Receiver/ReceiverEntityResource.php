<?php

namespace Exactum\Efac\Http\Resources\Entity\Receiver;

use Exactum\Efac\Http\Resources\Entity\EntityResource;
use Exactum\Efac\Http\Resources\External\GenericExternalResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ReceiverEntityResource extends JsonResource
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
            'person_type' => GenericExternalResource::make($this->whenLoaded('personType')),
            'country' => GenericExternalResource::make($this->whenLoaded('country')),
            'tax_domicile' => GenericExternalResource::make($this->whenLoaded('taxDomicile')),
            'sale_type' => GenericExternalResource::make($this->whenLoaded('saleType')),
            'foreign_economic_activity' => $this->foreign_economic_activity_description,
            'entity' => EntityResource::make($this->whenLoaded('entity')),
        ];
    }
}
