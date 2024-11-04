<?php

namespace App\Http\Resources\External\Token\FEX;

use App\Http\Resources\External\Token\Common\ApendiceResource;
use App\Http\Resources\External\Token\FEX\Dependencies\CuerpoFEXEResource;
use App\Http\Resources\External\Token\FEX\Dependencies\EmisorFEXEResource;
use App\Http\Resources\External\Token\FEX\Dependencies\IdentificacionFEXEResource;
use App\Http\Resources\External\Token\FEX\Dependencies\ReceptorFEXEResource;
use App\Http\Resources\External\Token\FEX\Dependencies\ResumenFEXEResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MainFEXEResource extends JsonResource
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
            'identificacion' => IdentificacionFEXEResource::make($this->resource),
            'emisor' => EmisorFEXEResource::make($this->resource),
            'receptor' => ReceptorFEXEResource::make($this->resource),
            'otrosDocumentos' => null, #IN PROGRESS
            'ventaTercero' => null, #IN PROGRESS
            'cuerpoDocumento' => $this->resource->dteItems->map(function ($item, $index) {
                return CuerpoFEXEResource::make($item, $index + 1);
            }),
            'resumen' => ResumenFEXEResource::make($this->resource),
            'apendice' => count($this->resource->appendices) !== 0 ? ApendiceResource::collection($this->resource->appendices) : null,
        ];
    }
}
