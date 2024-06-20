<?php

namespace Exactum\Efac\Http\Resources\Entity;

use Exactum\Efac\Http\Resources\Entity\Emitter\EmitterEntityResource;
use Exactum\Efac\Http\Resources\Entity\Receiver\ReceiverEntityResource;
use Exactum\Efac\Http\Resources\External\CityResource;
use Exactum\Efac\Http\Resources\External\GenericExternalResource;
use Exactum\Efac\Http\Resources\Person\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EntityResource extends JsonResource
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
            'remote_id' => $this->remote_id,
            'remote_provider_id' => $this->remote_provider_id,
            'is_customer' => $this->is_customer,
            'is_provider' => $this->is_provider,
            'address_complement' => $this->address_complement,
            'NRC' => $this->NRC,
            'name' => $this->name,
            'comercial_name' => $this->comercial_name,
            'email' => $this->email,
            'url_photo' => $this->photo ? asset('img/pdf/' . $this->photo) : null,
            'phones' => PhoneResource::collection($this->whenLoaded('phones')),
            'docs' => DocsEntityResource::collection($this->whenLoaded('docClientTypes')),
            'economic_activity' => GenericExternalResource::make($this->whenLoaded('economicActivity')),
            'city' => CityResource::make($this->whenLoaded('city')),
            'emmitter_entity' => EmitterEntityResource::make($this->whenLoaded('emitterEntities')),
            'receiver_entity' => ReceiverEntityResource::make($this->whenLoaded('receiverEntities')),
            'main_entity' => EntityResource::make($this->whenLoaded('entity')),
            'seller' => UserResource::make($this->whenLoaded('seller')),
        ];
    }
}
