<?php

namespace App\Http\Resources\External\Token\FSEE\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class EmisorFSEEResource extends JsonResource
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
            'direccion' => [
                'departamento' => $this->resource->salePoint->subsidiary->city->department->goes_id,
                'municipio' => $this->resource->salePoint->subsidiary->city->state->goes_id,
                'complemento' => $this->resource->salePoint->subsidiary->address_complement . ', ' . $this->resource->salePoint->subsidiary->city->name,
            ],
            'telefono' => $this->resource->salePoint->subsidiary->emitterEntity->entity->phones->pluck('value')->implode(',')  ?: null,
            'correo' => $this->resource->salePoint->subsidiary->emitterEntity->entity->email,
            'codEstableMH' => $this->resource->salePoint->subsidiary->goes_id,
            'codEstable' => $this->resource->salePoint->subsidiary->code,
            'codPuntoVentaMH' => $this->resource->salePoint->goes_id,
            'codPuntoVenta' => $this->resource->salePoint->code,
        ];
    }
}
