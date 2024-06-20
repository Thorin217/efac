<?php

namespace Exactum\Efac\Http\Resources\Document\Stats;

use Illuminate\Http\Resources\Json\JsonResource;

class DteTypeStatResource extends JsonResource
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
            'total' => $this->total,
            'dte_type_name' => $this->dteType->name,
        ];
    }
}
