<?php

namespace Exactum\Efac\Http\Resources\External\Token\Cancellation\Dependencies;

use Exactum\Efac\Services\External\ExternalService;
use Illuminate\Http\Resources\Json\JsonResource;

class MotivoCancellationResource extends JsonResource
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

        return [
            'tipoAnulacion' => $this->resource->cancellationType->goes_id,
            'motivoAnulacion' => $this->resource->description,

            'nombreResponsable' => $this->resource->dte->salePoint->subsidiary->emitterEntity->entity->name,
            'tipDocResponsable' => ExternalService::getDefaultGoesIdByExternalModel('doc_client_types'),
            'numDocResponsable' => $this->resource->dte->salePoint->subsidiary->emitterEntity->entity->docClientTypes()->where('default', true)->first()->pivot->value,

            'nombreSolicita' => $this->resource->dte->receiverEntity->entity->name,
            'tipDocSolicita' => $docClient->goes_id ?? ExternalService::getDefaultGoesIdByExternalModel('doc_client_types'),
            'numDocSolicita' => $docClient->pivot->value ?? $this->resource->dte->salePoint->subsidiary->emitterEntity->entity->docClientTypes()->where('default', true)->first()->pivot->value,
        ];
    }
}
