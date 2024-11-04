<?php

namespace App\Http\Resources\External\Token\CRE\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class ResumenCREResource extends JsonResource
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
            'totalSujetoRetencion' => (float) $this->resource->creSummary->total_subject_withheld,
            'totalIVAretenido' => (float) $this->resource->creSummary->total_IVA_withheld,
            'totalIVAretenidoLetras' => $this->resource->creSummary->total_IVA_withheld_letter,
        ];
    }
}
