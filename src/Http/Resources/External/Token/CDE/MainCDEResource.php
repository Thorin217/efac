<?php

namespace App\Http\Resources\External\Token\CDE;

use App\Http\Resources\External\Token\CDE\Dependencies\CuerpoCDEResource;
use App\Http\Resources\External\Token\CDE\Dependencies\EmisorCDEResource;
use App\Http\Resources\External\Token\CDE\Dependencies\OtrosDocumentosCDEResource;
use App\Http\Resources\External\Token\CDE\Dependencies\ReceptorCDEResource;
use App\Http\Resources\External\Token\CDE\Dependencies\ResumenCDEResource;
use App\Http\Resources\External\Token\Common\ApendiceResource;
use App\Http\Resources\External\Token\Common\IdentificacionResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MainCDEResource extends JsonResource
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
            'donatario' => EmisorCDEResource::make($this->resource),
            'donante' => ReceptorCDEResource::make($this->resource),
            'otrosDocumentos' => OtrosDocumentosCDEResource::make($this->resource),
            'cuerpoDocumento' => $this->resource->dteItems->map(function ($item, $index) {
                return CuerpoCDEResource::make($item, $index + 1);
            }),
            'resumen' => ResumenCDEResource::make($this->resource),
            'apendice' => count($this->resource->appendices) !== 0 ? ApendiceResource::collection($this->resource->appendices) : null,
        ];;
    }
}
