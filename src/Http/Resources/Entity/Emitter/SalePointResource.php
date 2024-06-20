<?php

namespace Exactum\Efac\Http\Resources\Entity\Emitter;

use Illuminate\Http\Resources\Json\JsonResource;

class SalePointResource extends JsonResource
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
            'name' => $this->name,
            'goes_id' => $this->goes_id,
            'subsidiary' => SubsidiaryResource::make($this->whenLoaded('subsidiary')),
        ];
    }
}
