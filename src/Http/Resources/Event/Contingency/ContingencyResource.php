<?php

namespace Exactum\Efac\Http\Resources\Event\Contingency;

use Exactum\Efac\Enums\DefaultsEnum;
use Exactum\Efac\Http\Resources\Entity\Emitter\SalePointResource;
use Exactum\Efac\Http\Resources\External\GenericExternalResource;
use Exactum\Efac\Http\Resources\Person\UserResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ContingencyResource extends JsonResource
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
            'generate_code' => $this->generate_code,
            'description' => $this->description,
            'start_date' => (new Carbon($this->start_date))->format(DefaultsEnum::StandarDateFormat->value),
            'end_date' => $this->end_date ?
                (new Carbon($this->end_date))->format(DefaultsEnum::StandarDateFormat->value)
                : null,
            'status' => $this->status,

            'contingency_type' => GenericExternalResource::make($this->whenLoaded('contingencyType')),
            'sale_point' => SalePointResource::make($this->whenLoaded('salePoint')),
            'user' => UserResource::make($this->whenLoaded('user')),
        ];
    }
}
