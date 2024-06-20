<?php

namespace Exactum\Efac\Http\Resources\Document\Stats;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentsStatsResource extends JsonResource
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
            'status' => $this['status'],
            'types' => DteTypeStatResource::collection($this['type']),
        ];
    }
}
