<?php

namespace App\Http\Resources\External\Token\CDE\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class ResumenCDEResource extends JsonResource
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
            'valorTotal' => (float) $this->resource->summary->total_no_subject,
            'totalLetras' => $this->resource->summary->total_letter,
            'pagos' => null, #TODO: make jsonResource
        ];
    }
}
