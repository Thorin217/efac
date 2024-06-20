<?php

namespace Exactum\Efac\Http\Resources\Common;

use Illuminate\Http\Resources\Json\JsonResource;

class PaginateResource extends JsonResource
{
    protected $data;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource)
    {
        parent::__construct($resource);
        $this->data = $resource->toArray();
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'total' => $this->data['total'],
            'current_page' => $this->data['current_page'],
            'last_page' => $this->data['last_page'],
            'per_page' => $this->data['per_page'],
            'from' => $this->data['from'],
            'to' => $this->data['to'],
            'links' => $this->data['links'],
        ];
    }
}
