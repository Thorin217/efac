<?php

namespace App\Http\Resources\External\Token\CRE\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class CuerpoCREResource extends JsonResource
{
    protected $index;

    public function __construct($resource, $index)
    {
        parent::__construct($resource);
        $this->index = $index;
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'numItem' => $this->index,
            'tipoDte' => $this->resource->relatedDocument->dteType->goes_id ?? null,
            'tipoDoc' => (int) $this->resource->relatedDocument ? (int) $this->resource->relatedDocument->generationType->goes_id ?? null : null,
            'numDocumento' => $this->resource->relatedDocument->identificator_document ?? null,
            'fechaEmision' => $this->resource->relatedDocument->date ?? null,
            'montoSujetoGrav' => (float) $this->resource->amount_taxable,
            'codigoRetencionMH' => $this->resource->ivaRetention->goes_id,
            'ivaRetenido' => (float) $this->resource->iva_withheld,
            'descripcion' => $this->resource->description,
        ];
    }
}
