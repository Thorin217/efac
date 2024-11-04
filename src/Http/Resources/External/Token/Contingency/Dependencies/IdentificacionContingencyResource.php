<?php

namespace Exactum\Efac\Http\Resources\External\Token\Contingency\Dependencies;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class IdentificacionContingencyResource extends JsonResource
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
            'version' => config('app.contingency_version'),
            'ambiente' => config('app.external_env'),
            'codigoGeneracion' => $this->resource->generate_code,
            'fTransmision' => Carbon::parse($this->resource->updated_at)->format('Y-m-d'),
            'hTransmision' => Carbon::parse($this->resource->updated_at)->format('H:i:s'),
        ];
    }
}
