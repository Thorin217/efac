<?php

namespace App\Http\Resources\External\Token\NRE;

use App\Http\Resources\External\Token\Common\ApendiceResource;
use App\Http\Resources\External\Token\Common\EmisorResource;
use App\Http\Resources\External\Token\Common\IdentificacionResource;
use App\Http\Resources\External\Token\NRE\Dependencies\CuerpoNREResource;
use App\Http\Resources\External\Token\NRE\Dependencies\ReceptorNREResource;
use App\Http\Resources\External\Token\NRE\Dependencies\ResumenNREResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MainNREResource extends JsonResource
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
            'documentoRelacionado' => null, #IN PROGRESS
            'emisor' => EmisorResource::make($this->resource),
            'receptor' => ReceptorNREResource::make($this->resource),
            'ventaTercero' => null, #IN PROGRESS
            'cuerpoDocumento' => $this->resource->dteItems->map(function ($item, $index) {
                return CuerpoNREResource::make($item, $index + 1);
            }),
            'resumen' => ResumenNREResource::make($this->resource),
            'extension' => null, #IN PROGRESS
            'apendice' => count($this->resource->appendices) !== 0 ? ApendiceResource::collection($this->resource->appendices) : null,
        ];
    }
}
