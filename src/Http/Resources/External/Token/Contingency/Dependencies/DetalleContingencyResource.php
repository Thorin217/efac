<?php

namespace App\Http\Resources\External\Token\Contingency\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class DetalleContingencyResource extends JsonResource
{
    protected $index;

    public function __construct($resource, $index)
    {
        parent::__construct($resource);
        $this->index = $index;
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
            'noItem' => $this->index,
            'codigoGeneracion' => $this->resource->generate_code,
            'tipoDoc' => $this->resource->dteType->goes_id,
        ];
    }
}
