<?php

namespace Exactum\Efac\Http\Resources\Document;

use Exactum\Efac\Http\Resources\External\GenericExternalResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ExportationResource extends JsonResource
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
            'insurance' => $this->insurance,
            'flete' => $this->flete,
            'observations' => $this->observations,
            'regimen' => GenericExternalResource::make($this->whenLoaded('regimen')),
            'taxRevenue' => GenericExternalResource::make($this->whenLoaded('taxRevenue')),
            'incoterm' => GenericExternalResource::make($this->whenLoaded('incoterm')),
        ];
    }
}
