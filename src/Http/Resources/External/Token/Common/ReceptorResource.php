<?php

namespace Exactum\Efac\Http\Resources\External\Token\Common;

use Illuminate\Http\Resources\Json\JsonResource;

class ReceptorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $docClient = $this->resource->receiverEntity->entity->docClientTypes()->first(); #TODO: select document

        return [
            'tipoDocumento' => $docClient->goes_id ?? null,
            'numDocumento' => $docClient->pivot->value ?? null,
            'nrc' => $this->resource->receiverEntity->entity->NRC ?? null,
            'nombre' => $this->resource->receiverEntity->entity->name,
            'codActividad' => $this->resource->receiverEntity->entity->economicActivity->goes_id ?? null,
            'descActividad' => $this->resource->receiverEntity->entity->economicActivity->name ?? null,
            'nombreComercial' => $this->resource->receiverEntity->entity->comercial_name ?? null,
            'direccion' => ($this->resource->receiverEntity->entity->address_complement && $this->resource->receiverEntity->entity->city_id)
                ? [
                    'departamento' => $this->resource->receiverEntity->entity->city->department->goes_id,
                    'municipio' => $this->resource->receiverEntity->entity->city->goes_id,
                    'complemento' => $this->resource->receiverEntity->entity->address_complement,
                ]
                : null,
            'telefono' => $this->resource->receiverEntity->entity->phones->pluck('value')->implode(',') ?: null,
            'correo' => $this->resource->receiverEntity->entity->email,
        ];
    }
}
