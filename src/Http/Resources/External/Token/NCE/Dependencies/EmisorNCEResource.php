<?php

namespace Exactum\Efac\Http\Resources\External\Token\NCE\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class EmisorNCEResource extends JsonResource
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
            'nrc' => $this->resource->salePoint->subsidiary->emitterEntity->entity->NRC,
            'nombre' => $this->resource->salePoint->subsidiary->emitterEntity->entity->name,
            'codActividad' => $this->resource->salePoint->subsidiary->emitterEntity->entity->economicActivity->goes_id,
            'descActividad' => $this->resource->salePoint->subsidiary->emitterEntity->entity->economicActivity->name,
            'nombreComercial' => $this->resource->salePoint->subsidiary->emitterEntity->entity->comercial_name,
            'tipoEstablecimiento' => $this->resource->salePoint->subsidiary->establishmentType->goes_id,
            'direccion' => [
                'departamento' => $this->resource->salePoint->subsidiary->city->department->goes_id,
                'municipio' => $this->resource->salePoint->subsidiary->city->state->goes_id,
                'complemento' => $this->resource->salePoint->subsidiary->address_complement . ', ' . $this->resource->salePoint->subsidiary->city->name,
            ],
            'telefono' => $this->resource->salePoint->subsidiary->emitterEntity->entity->phones->pluck('value')->implode(',')  ?: null,
            'correo' => $this->resource->salePoint->subsidiary->emitterEntity->entity->email,
        ];
    }
}
