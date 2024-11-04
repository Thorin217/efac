<?php

namespace Exactum\Efac\Http\Resources\External\Token\FSEE;

use Exactum\Efac\Http\Resources\External\Token\Common\ApendiceResource;
use Exactum\Efac\Http\Resources\External\Token\Common\IdentificacionResource;
use Exactum\Efac\Http\Resources\External\Token\FSEE\Dependencies\CuerpoFSEEResource;
use Exactum\Efac\Http\Resources\External\Token\FSEE\Dependencies\EmisorFSEEResource;
use Exactum\Efac\Http\Resources\External\Token\FSEE\Dependencies\ReceptorFSEEResource;
use Exactum\Efac\Http\Resources\External\Token\FSEE\Dependencies\ResumenFSEEResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MainFSEEResource extends JsonResource
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
            'emisor' => EmisorFSEEResource::make($this->resource),
            'sujetoExcluido' => ReceptorFSEEResource::make($this->resource),
            'cuerpoDocumento' => $this->resource->dteItems->map(function ($item, $index) {
                return CuerpoFSEEResource::make($item, $index + 1);
            }),
            'resumen' => ResumenFSEEResource::make($this->resource),
            'apendice' => count($this->resource->appendices) !== 0 ? ApendiceResource::collection($this->resource->appendices) : null,
        ];
    }
}
