<?php

namespace Exactum\Efac\Http\Resources\External\Token\CCF;

use Exactum\Efac\Http\Resources\External\Token\CCF\Dependencies\CuerpoCCFResource;
use Exactum\Efac\Http\Resources\External\Token\CCF\Dependencies\ReceptorCCFResource;
use Exactum\Efac\Http\Resources\External\Token\CCF\Dependencies\ResumenCCFResource;
use Exactum\Efac\Http\Resources\External\Token\Common\ApendiceResource;
use Exactum\Efac\Http\Resources\External\Token\Common\EmisorResource;
use Exactum\Efac\Http\Resources\External\Token\Common\IdentificacionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MainCCFResource extends JsonResource
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
            'receptor' => ReceptorCCFResource::make($this->resource),
            'otrosDocumentos' => null, #IN PROGRESS
            'ventaTercero' => null, #IN PROGRESS
            'cuerpoDocumento' => $this->resource->dteItems->map(function ($item, $index) {
                return CuerpoCCFResource::make($item, $index + 1);
            }),
            'resumen' => ResumenCCFResource::make($this->resource),
            'apendice' => count($this->resource->appendices) !== 0 ? ApendiceResource::collection($this->resource->appendices) : null,
        ];
    }
}
