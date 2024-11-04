<?php

namespace App\Http\Resources\External\Token\Cancellation\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentoCancellationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $docClient = $this->resource->dte->receiverEntity->entity->docClientTypes()->first(); #TODO: select document
        $reception = json_decode($this->resource->dte->tokens()->whereNotNull('seal_reception')->first()->seal_reception);

        return [
            'tipoDte' => $this->resource->dte->dteType->goes_id,
            'codigoGeneracion' => $this->resource->dte->generate_code,
            'selloRecibido' => $reception->selloRecibido,
            'numeroControl' => $this->resource->dte->number_control,
            'fecEmi' => $this->resource->dte->getGenerateDate(),
            'montoIva' => null,

            'codigoGeneracionR' => $this->resource->newDte->generate_code ?? null,
            #Receptor
            'nombre' => $this->resource->dte->receiverEntity->entity->name,
            'tipoDocumento' => $docClient->goes_id ?? null,
            'numDocumento' => $docClient?->formatDocValue() ?? null,
            'telefono' => $this->resource->dte->receiverEntity->entity->phones->pluck('value')->implode(',') ?: null,
            'correo' => $this->resource->dte->receiverEntity->entity->email,
        ];
    }
}
