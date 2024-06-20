<?php

namespace Exactum\Efac\Http\Resources\Entity\Emitter;

use Exactum\Efac\Http\Resources\External\GenericExternalResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $this->load(['measurementUnit', 'itemType']);

        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'unit_price' => formatTwoDecimals($this->unit_price),
            'measurement_unit' =>  GenericExternalResource::make($this->measurementUnit),
            'item_type' =>  GenericExternalResource::make($this->itemType),
            'emitter_entity' =>  EmitterEntityResource::make($this->whenLoaded('emitterEntity')),
            'special_tributes' => GenericExternalResource::collection($this->whenLoaded('tributesTypes')),
        ];
    }
}
