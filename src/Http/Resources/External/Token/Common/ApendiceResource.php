<?php

namespace App\Http\Resources\External\Token\Common;

use Illuminate\Http\Resources\Json\JsonResource;

class ApendiceResource extends JsonResource
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
            'campo' => $this->field,
            'etiqueta' => $this->tag,
            'valor' => $this->value,
        ];
    }
}
