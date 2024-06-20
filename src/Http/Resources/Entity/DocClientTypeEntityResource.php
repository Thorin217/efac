<?php

namespace Exactum\Efac\Http\Resources\Entity;

use Exactum\Efac\Http\Resources\External\GenericExternalResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DocClientTypeEntityResource extends JsonResource
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
            'value' => $this->value,
            'doc_client_type' => GenericExternalResource::make($this->whenLoaded('docClientType')),
        ];
    }
}
