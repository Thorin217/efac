<?php

namespace Exactum\Efac\Http\Resources\Document;

use Exactum\Efac\Enums\DefaultsEnum;
use Exactum\Efac\Http\Resources\Entity\Emitter\SalePointResource;
use Exactum\Efac\Http\Resources\Entity\Receiver\ReceiverEntityResource;
use Exactum\Efac\Http\Resources\External\GenericExternalResource;
use Exactum\Efac\Http\Resources\Person\UserResource;
use Exactum\Efac\Http\Resources\Token\DteTokenResource;
use Exactum\Efac\Http\Resources\Token\LastDteTokenResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class GeneralDteResource extends JsonResource
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
            'id' => $this->id,
            'number_control' => $this->number_control,
            'generate_code' => $this->generate_code,
            'status' => $this->status,
            'remote_id' => $this->remote_id,
            'date_processing' => (new Carbon($this->date))->format(DefaultsEnum::StandarDateFormat->value),

            'receiver' => ReceiverEntityResource::make($this->whenLoaded('receiverEntity')),
            'sale_point' => SalePointResource::make($this->whenLoaded('salePoint')),
            'user' => UserResource::make($this->whenLoaded('user')),

            'type' => GenericExternalResource::make($this->whenLoaded('dteType')),
            'property_object' => GenericExternalResource::make($this->whenLoaded('propertyObject')),
            'operation_condition' => GenericExternalResource::make($this->whenLoaded('operationCondition')),
            'model_type' => GenericExternalResource::make($this->whenLoaded('modelType')),
            'operation_type' => GenericExternalResource::make($this->whenLoaded('operationType')),

            'related_documents' => RelatedDocumentResource::collection($this->whenLoaded('relatedDocuments')),

            'items' => DteItemResource::collection($this->whenLoaded('dteItems')),
            'cre_items' => CreItemResource::collection($this->whenLoaded('creItems')),

            'summary' => SummaryDocumentResource::make($this->whenLoaded('summary')),
            'exportation' => ExportationResource::make($this->whenLoaded('exportation')),

            'current_token' => LastDteTokenResource::make($this->whenLoaded('lastToken')),
            'tokens' => DteTokenResource::make($this->whenLoaded('tokens')),

            'steps' => StepResource::collection($this->whenLoaded('steps')),

            'appendices' => AppendixResource::collection($this->whenLoaded('appendices')),
        ];
    }
}
