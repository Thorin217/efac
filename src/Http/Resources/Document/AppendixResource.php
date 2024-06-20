<?php

namespace Exactum\Efac\Http\Resources\Document;

use Illuminate\Http\Resources\Json\JsonResource;

class AppendixResource extends JsonResource
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
            'field' => $this->field,
            'tag' => $this->tag,
            'value' => $this->value,
        ];
    }
}
