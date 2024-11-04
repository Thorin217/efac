<?php

namespace App\Http\Resources\External\Token\FCE;

use App\Http\Resources\External\Token\Common\ApendiceResource;
use App\Http\Resources\External\Token\Common\EmisorResource;
use App\Http\Resources\External\Token\Common\IdentificacionResource;
use App\Http\Resources\External\Token\FCE\Dependencies\CuerpoFCEResource;
use App\Http\Resources\External\Token\FCE\Dependencies\ReceptorFCEResource;
use App\Http\Resources\External\Token\FCE\Dependencies\ResumenFCEResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MainFCEResource extends JsonResource
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
            'receptor' => ReceptorFCEResource::make($this->resource),
            'otrosDocumentos' => null, #IN PROGRESS
            'ventaTercero' => null, #IN PROGRESS
            'cuerpoDocumento' => $this->resource->dteItems->map(function ($item, $index) {
                return CuerpoFCEResource::make($item, $index + 1);
            }),
            'resumen' => ResumenFCEResource::make($this->resource),
            'extension' => null, #IN PROGRESS
            'apendice' => count($this->resource->appendices) !== 0 ? ApendiceResource::collection($this->resource->appendices) : null,
        ];
    }
}
