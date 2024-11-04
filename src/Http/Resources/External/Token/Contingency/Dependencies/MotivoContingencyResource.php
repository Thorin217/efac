<?php

namespace App\Http\Resources\External\Token\Contingency\Dependencies;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MotivoContingencyResource extends JsonResource
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
            'fInicio' => Carbon::parse($this->resource->start_date)->format('Y-m-d'),
            'fFin' => Carbon::parse($this->resource->end_date)->format('Y-m-d'),
            'hInicio' => Carbon::parse($this->resource->start_date)->format('H:i:s'),
            'hFin' => Carbon::parse($this->resource->end_date)->format('H:i:s'),
            'tipoContingencia' => $this->resource->contingencyType->goes_id,
            'motivoContingencia' => $this->resource->description,
        ];
    }
}
