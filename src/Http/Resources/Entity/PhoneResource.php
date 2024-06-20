<?php

namespace Exactum\Efac\Http\Resources\Entity;

use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
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
            'number_phone' => $this->value,
            'extension' => $this->extension,
            'entity' => EntityResource::make($this->whenLoaded('entity')),
        ];
    }
}
