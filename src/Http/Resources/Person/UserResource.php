<?php

namespace Exactum\Efac\Http\Resources\Person;

use Exactum\Efac\Http\Resources\Common\PermissionResource;
use Exactum\Efac\Http\Resources\Entity\Emitter\SalePointResource;
use Exactum\Efac\Http\Resources\Entity\EntityResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public static $wrap = null;
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
            'email' => $this->email,
            'identification' => $this->identification,
            'fullname' => $this->name,
            'sale_point' => SalePointResource::make($this->whenLoaded('salePoint')),

            'entities' => EntityResource::collection($this->whenLoaded('entities')),
            'current_entity' => EntityResource::make($this->whenLoaded('currentEntity')),
        ];
    }
}
