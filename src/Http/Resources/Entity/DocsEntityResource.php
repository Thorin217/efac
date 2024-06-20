<?php

namespace Exactum\Efac\Http\Resources\Entity;

use Illuminate\Http\Resources\Json\JsonResource;

class DocsEntityResource extends JsonResource
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
            'id' => $this->pivot->id,
            'name_document' => $this->name,
            'value' => $this->pivot->value,
        ];
    }
}
