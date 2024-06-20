<?php

namespace Exactum\Efac\Http\Resources\Document;

use Illuminate\Http\Resources\Json\JsonResource;

class StepResource extends JsonResource
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
            'slug' => $this->slug,
            'requerid' => $this->requerid,
            'order' => $this->order,
            'complete' => $this->pivot->complete,
        ];
    }
}
