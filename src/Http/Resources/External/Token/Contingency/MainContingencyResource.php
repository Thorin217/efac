<?php

namespace App\Http\Resources\External\Token\Contingency;

use App\Http\Resources\External\Token\Contingency\Dependencies\DetalleContingencyResource;
use App\Http\Resources\External\Token\Contingency\Dependencies\EmisorContingencyResource;
use App\Http\Resources\External\Token\Contingency\Dependencies\IdentificacionContingencyResource;
use App\Http\Resources\External\Token\Contingency\Dependencies\MotivoContingencyResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MainContingencyResource extends JsonResource
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
            'identificacion' => IdentificacionContingencyResource::make($this->resource),
            'emisor' => EmisorContingencyResource::make($this->resource),
            'detalleDTE' => $this->resource->dtes->map(function ($item, $index) {
                return DetalleContingencyResource::make($item, $index + 1);
            }),
            'motivo' => MotivoContingencyResource::make($this->resource),
        ];
    }
}
