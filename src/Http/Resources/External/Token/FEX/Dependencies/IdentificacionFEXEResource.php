<?php

namespace Exactum\Efac\Http\Resources\External\Token\FEX\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class IdentificacionFEXEResource extends JsonResource
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
            'version' => $this->resource->dteType->last_version,
            'ambiente' => config('app.external_env'),
            'tipoDte' => $this->resource->dteType->goes_id,
            'numeroControl' => $this->resource->number_control,
            'codigoGeneracion' => $this->resource->generate_code,
            'tipoModelo' => $this->resource->modelType->goes_id,
            'tipoOperacion' => $this->resource->operationType->goes_id,
            'tipoContingencia' => $this->resource->contingency->contingencyType->goes_id ?? null,
            'motivoContigencia' => $this->resource->contingency->description ?? null,
            'fecEmi' => $this->resource->getGenerateDate(),
            'horEmi' => $this->resource->getGenerateHour(),
            'tipoMoneda' => config('app.currency'),
        ];;
    }
}
