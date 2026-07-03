<?php

namespace Exactum\Efac\Http\Resources\External\Token\NDE;

use Exactum\Efac\Http\Resources\External\Token\Common\ApendiceResource;
use Exactum\Efac\Http\Resources\External\Token\Common\IdentificacionResource;
use Exactum\Efac\Http\Resources\External\Token\NDE\Dependencies\EmisorNDEResource;
use Exactum\Efac\Http\Resources\External\Token\NDE\Dependencies\ReceptorNDEResource;
use Exactum\Efac\Http\Resources\External\Token\NDE\Dependencies\RelacionadoNDEResource;
use Exactum\Efac\Http\Resources\External\Token\NDE\Dependencies\CuerpoNDEResource;
use Exactum\Efac\Http\Resources\External\Token\NDE\Dependencies\ResumenNDEResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MainNDEResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $documentNumber = $this->resource->relatedDocuments->first()->identificator_document;

        return [
            'identificacion' => IdentificacionResource::make($this->resource),
            'documentoRelacionado' => RelacionadoNDEResource::collection($this->resource->relatedDocuments),
            'emisor' => EmisorNDEResource::make($this->resource),
            'receptor' => ReceptorNDEResource::make($this->resource),
            'ventaTercero' => null, #IN PROGRESS
            'cuerpoDocumento' => $this->resource->dteItems->map(function ($item, $index) use ($documentNumber) {
                return CuerpoNDEResource::make($item, $index + 1, $documentNumber);
            }),
            'resumen' => ResumenNDEResource::make($this->resource),
            'apendice' => count($this->resource->appendices) !== 0 ? ApendiceResource::collection($this->resource->appendices) : null,
        ];
    }
}
