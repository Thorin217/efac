<?php

namespace App\Http\Resources\External\Token\FEX\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class ReceptorFEXEResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $docClient = $this->resource->receiverEntity->entity->docClientTypes()->first();
        $phone = null;

        if ($this->resource->receiverEntity->entity->phones->first() !== null) {
            $phone = ($this->resource->receiverEntity->country->country_code ?? '') . $this->resource->receiverEntity->entity->phones->first()->value;
        }

        return [
            'nombre' => $this->resource->receiverEntity->entity->name,
            'tipoDocumento' => $docClient->goes_id ?? null,
            'numDocumento' => $docClient->pivot->value ?? null,
            'nombreComercial' => $this->resource->receiverEntity->entity->comercial_name ?? null,
            'codPais' => $this->resource->receiverEntity->country->goes_id,
            'nombrePais' => $this->resource->receiverEntity->country->name,
            'complemento' => $this->resource->receiverEntity->entity->address_complement,
            'tipoPersona' => $this->resource->receiverEntity->personType->goes_id ?? null,
            'descActividad' => $this->resource->receiverEntity->foreign_economic_activity_description
                ?? $this->resource->receiverEntity->entity->economicActivity->name, #TODO: Valid this feature
            #'telefono' => isset($phone) ? $phone->extension . $phone->value : null, 'telefono' => $this->resource->receiverEntity->entity->phones->pluck('value')->implode(',') ?: null,
            #'telefono' => $this->resource->receiverEntity->entity->phones->pluck('value')->implode(',') ?: null,
            'telefono' => $phone,

            'correo' => $this->resource->receiverEntity->entity->email,
        ];
    }
}
