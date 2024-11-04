<?php

namespace Exactum\Efac\Http\Resources\External\Token\Cancellation\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class EmisorCancellationResource extends JsonResource
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
            'nit' => $this->resource->salePoint->subsidiary->emitterEntity->entity->docClientTypes()->where('default', true)->first()->pivot->value,
            'nombre' => $this->resource->salePoint->subsidiary->emitterEntity->entity->name,
            'tipoEstablecimiento' => $this->resource->salePoint->subsidiary->establishmentType->goes_id,
            'nomEstablecimiento' => $this->resource->salePoint->subsidiary->name,
            'codEstableMH' => $this->resource->salePoint->subsidiary->goes_id,
            'codEstable' => $this->resource->salePoint->subsidiary->code,
            'codPuntoVentaMH' => $this->resource->salePoint->goes_id,
            'codPuntoVenta' => $this->resource->salePoint->code,
            'telefono' => $this->resource->salePoint->subsidiary->emitterEntity->entity->phones->first()->value ?: null,
            'correo' => $this->resource->salePoint->subsidiary->emitterEntity->entity->email,
        ];
    }
}
