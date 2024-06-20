<?php

namespace Exactum\Efac\Http\Resources\Entity\Emitter;

use Exactum\Efac\Http\Resources\Entity\EntityResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EmitterEntityResource extends JsonResource
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
            #'encrypted_api_password' => $this->api_password,
            #'encrypted_signer_password' => $this->signer_password,
            'entity' => new EntityResource($this->whenLoaded('entity')),
        ];
    }
}
