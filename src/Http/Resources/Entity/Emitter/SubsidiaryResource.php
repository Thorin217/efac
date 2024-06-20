<?php

namespace Exactum\Efac\Http\Resources\Entity\Emitter;

use Exactum\Efac\Http\Resources\External\CityResource;
use Exactum\Efac\Http\Resources\External\GenericExternalResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SubsidiaryResource extends JsonResource
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
            'code' => $this->code,
            'goes_id' => $this->goes_id,
            'name' => $this->name,
            'default' => $this->default,
            'address_complement' => $this->address_complement,
            'emitter_entity' =>  EmitterEntityResource::make($this->whenLoaded('emitterEntity')),
            'city' => CityResource::make($this->whenLoaded('city')),
            'establishment_type' => GenericExternalResource::make($this->whenLoaded('establishmentType')),
        ];
    }
}
