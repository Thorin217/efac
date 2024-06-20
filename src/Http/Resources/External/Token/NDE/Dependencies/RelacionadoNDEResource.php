<?php

namespace Exactum\Efac\Http\Resources\External\Token\NDE\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class RelacionadoNDEResource extends JsonResource
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
            'tipoDocumento' => $this->resource->dteType->goes_id,
            'tipoGeneracion' => $this->resource->generationType->goes_id,
            'numeroDocumento' => $this->resource->identificator_document,
            'fechaEmision' => $this->resource->date,
        ];
    }
}
