<?php

namespace App\Http\Resources\External\Token\NCE;

use App\Http\Resources\External\Token\Common\ApendiceResource;
use App\Http\Resources\External\Token\Common\IdentificacionResource;
use App\Http\Resources\External\Token\NCE\Dependencies\CuerpoNCEResource;
use App\Http\Resources\External\Token\NCE\Dependencies\EmisorNCEResource;
use App\Http\Resources\External\Token\NCE\Dependencies\ReceptorNCEResource;
use App\Http\Resources\External\Token\NCE\Dependencies\RelacionadoNCEResource;
use App\Http\Resources\External\Token\NCE\Dependencies\ResumenNCEResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MainNCEResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $documentNumber = $this->resource->relatedDocuments->first()->identificator_document ?? false;

        return [
            'identificacion' => IdentificacionResource::make($this->resource),
            'documentoRelacionado' => $documentNumber ? RelacionadoNCEResource::collection($this->resource->relatedDocuments) : null,
            'emisor' => EmisorNCEResource::make($this->resource),
            'receptor' => ReceptorNCEResource::make($this->resource),
            'ventaTercero' => null, #IN PROGRESS
            'cuerpoDocumento' => $this->resource->dteItems->map(function ($item, $index) use ($documentNumber) {
                return CuerpoNCEResource::make($item, $index + 1, $documentNumber);
            }),
            'resumen' => ResumenNCEResource::make($this->resource),
            'extension' => null, #IN PROGRESS
            'apendice' => count($this->resource->appendices) !== 0 ? ApendiceResource::collection($this->resource->appendices) : null,
        ];
    }
}
