<?php

namespace App\Http\Resources\External\Token\Cancellation;

use App\Http\Resources\External\Token\Cancellation\Dependencies\DocumentoCancellationResource;
use App\Http\Resources\External\Token\Cancellation\Dependencies\EmisorCancellationResource;
use App\Http\Resources\External\Token\Cancellation\Dependencies\IdentificacionCancellationResource;
use App\Http\Resources\External\Token\Cancellation\Dependencies\MotivoCancellationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MainCancellationResource extends JsonResource
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
            'identificacion' => IdentificacionCancellationResource::make($this->resource),
            'emisor' => EmisorCancellationResource::make($this->resource->dte),
            'documento' => DocumentoCancellationResource::make($this->resource),
            'motivo' => MotivoCancellationResource::make($this->resource),
        ];
    }
}
