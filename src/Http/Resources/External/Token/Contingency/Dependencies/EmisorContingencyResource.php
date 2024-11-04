<?php

namespace Exactum\Efac\Http\Resources\External\Token\Contingency\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class EmisorContingencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $defaultEntityDoc = $this->resource->salePoint->subsidiary->emitterEntity->entity->docClientTypes()->where('default', true)->first();
        return [
            'nit' => $defaultEntityDoc->pivot->value,
            'nombre' => $this->resource->salePoint->subsidiary->emitterEntity->entity->name,
            'nombreResponsable' => $this->resource->user->name,
            'tipoDocResponsable' => $defaultEntityDoc->goes_id,
            'numeroDocResponsable' => $defaultEntityDoc->pivot->value,
            'tipoEstablecimiento' => $this->resource->salePoint->subsidiary->establishmentType->goes_id,
            'codEstableMH' => $this->resource->salePoint->subsidiary->goes_id,
            'codPuntoVenta' => $this->resource->salePoint->goes_id,
            'telefono' => $this->resource->salePoint->subsidiary->emitterEntity->entity->phones->pluck('value')->implode(',')  ?: null,
            'correo' => $this->resource->salePoint->subsidiary->emitterEntity->entity->email,
        ];
    }
}
