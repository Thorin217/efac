<?php

namespace Exactum\Efac\Http\Resources\External\Token\CDE\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class EmisorCDEResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $docEmitter = $this->resource->receiverEntity->entity->docClientTypes()->where('default', true)->first();

        return [
            'tipoDocumento' => $docEmitter->goes_id ?? null,
            'numDocumento' => $docEmitter->pivot->value ?? null,
            'nrc' => $this->resource->salePoint->subsidiary->emitterEntity->entity->NRC,
            'nombre' => $this->resource->salePoint->subsidiary->emitterEntity->entity->name,
            'codActividad' => $this->resource->salePoint->subsidiary->emitterEntity->entity->economicActivity->goes_id,
            'descActividad' => $this->resource->salePoint->subsidiary->emitterEntity->entity->economicActivity->name,
            'nombreComercial' => $this->resource->salePoint->subsidiary->emitterEntity->entity->comercial_name,
            'tipoEstablecimiento' => $this->resource->salePoint->subsidiary->establishmentType->goes_id,
            'direccion' => [
                'departamento' => $this->resource->salePoint->subsidiary->city->department->goes_id,
                'municipio' => $this->resource->salePoint->subsidiary->city->state->goes_id,
                'distrito' => $this->resource->salePoint->subsidiary->city->goes_id,
                'complemento' => $this->resource->salePoint->subsidiary->address_complement . ', ' . $this->resource->salePoint->subsidiary->city->name,
            ],
            'telefono' => $this->resource->salePoint->subsidiary->emitterEntity->entity->phones->pluck('value')->implode(',')  ?: null,
            'correo' => $this->resource->salePoint->subsidiary->emitterEntity->entity->email,
            'codEstableMH' => $this->resource->salePoint->subsidiary->goes_id,
            'codEstable' => $this->resource->salePoint->subsidiary->code,
            'codPuntoVentaMH' => $this->resource->salePoint->goes_id,
            'codPuntoVenta' => $this->resource->salePoint->code,
        ];;
    }
}
