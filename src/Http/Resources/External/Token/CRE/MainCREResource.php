<?php

namespace Exactum\Efac\Http\Resources\External\Token\CRE;

use Exactum\Efac\Http\Resources\External\Token\Common\ApendiceResource;
use Exactum\Efac\Http\Resources\External\Token\Common\IdentificacionResource;
use Exactum\Efac\Http\Resources\External\Token\CRE\Dependencies\CuerpoCREResource;
use Exactum\Efac\Http\Resources\External\Token\CRE\Dependencies\EmisorCREResource;
use Exactum\Efac\Http\Resources\External\Token\CRE\Dependencies\ReceptorCREResource;
use Exactum\Efac\Http\Resources\External\Token\CRE\Dependencies\ResumenCREResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MainCREResource extends JsonResource
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
            'identificacion' => IdentificacionResource::make($this->resource),
            'emisor' => EmisorCREResource::make($this->resource),
            'receptor' => ReceptorCREResource::make($this->resource),
            'cuerpoDocumento' => $this->resource->creItems->map(function ($item, $index) {
                return CuerpoCREResource::make($item, $index + 1);
            }),
            'resumen' => ResumenCREResource::make($this->resource),
            'extension' => null, #IN PROGRESS
            'apendice' => count($this->resource->appendices) !== 0 ? ApendiceResource::collection($this->resource->appendices) : null,
        ];
    }
}
