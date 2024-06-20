<?php

namespace Exactum\Efac\Http\Resources\Event\Cancellation;

use Exactum\Efac\Enums\DefaultsEnum;
use Exactum\Efac\Http\Resources\Document\GeneralDteResource;
use Exactum\Efac\Http\Resources\External\GenericExternalResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CancellationResource extends JsonResource
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
            'date' => (new Carbon($this->created_at))->format(DefaultsEnum::StandarDateFormat->value),
            'status' => $this->status,
            'cancellation_type' => GenericExternalResource::make($this->whenLoaded('cancellationType')),
            'old_dte' => GeneralDteResource::make($this->whenLoaded('dte')),
            'new_dte' => GeneralDteResource::make($this->whenLoaded('newDte')),
        ];
    }
}
