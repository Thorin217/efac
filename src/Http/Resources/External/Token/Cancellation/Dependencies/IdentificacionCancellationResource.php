<?php

namespace Exactum\Efac\Http\Resources\External\Token\Cancellation\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class IdentificacionCancellationResource extends JsonResource
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
            'version' => config('efac.cancellation_version'),
            'ambiente' => config('efac.external_env'),
            'codigoGeneracion' => $this->resource->generate_code,
            'fecAnula' => $this->resource->getGenerateDate(),
            'horAnula' => $this->resource->getGenerateHour(),
        ];
    }
}
