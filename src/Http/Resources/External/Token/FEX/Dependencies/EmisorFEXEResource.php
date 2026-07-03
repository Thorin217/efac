<?php

namespace Exactum\Efac\Http\Resources\External\Token\FEX\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class EmisorFEXEResource extends JsonResource
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
            'nit' => $this->resource->salePoint->subsidiary->emitterEntity->entity->docClientTypes()->where('default', true)->first()->pivot->value,
            'nrc' => $this->resource->salePoint->subsidiary->emitterEntity->entity->NRC,
            'nombre' => $this->resource->salePoint->subsidiary->emitterEntity->entity->name,
            'codActividad' => $this->resource->salePoint->subsidiary->emitterEntity->entity->economicActivity->goes_id,
            'descActividad' => $this->resource->salePoint->subsidiary->emitterEntity->entity->economicActivity->name,
            'nombreComercial' => $this->resource->salePoint->subsidiary->emitterEntity->entity->comercial_name,
            'direccion' => [
                'departamento' => $this->resource->salePoint->subsidiary->city->department->goes_id,
                'municipio' => $this->resource->salePoint->subsidiary->city->state->goes_id,
                'distrito' => $this->resource->salePoint->subsidiary->city->goes_id,
                'complemento' => $this->resource->salePoint->subsidiary->address_complement . ', ' . $this->resource->salePoint->subsidiary->city->name,
            ],
            'telefono' => $this->resource->salePoint->subsidiary->emitterEntity->entity->phones->pluck('value')->implode(',')  ?: null,
            'correo' => $this->resource->salePoint->subsidiary->emitterEntity->entity->email,
            'codEstable' => $this->resource->salePoint->subsidiary->code,
            'codPuntoVenta' => $this->resource->salePoint->code,
            'tipoItemExpor' => $this->resource->itemTypeExportation(),
            'recintoFiscal' => $this->resource->itemTypeExportation() === 1 ? ($this->resource->exportation->taxRevenue->goes_id ?? null) : null,
            'tipoRegimen' => $this->resource->itemTypeExportation() === 1 ? $this->extractTipoRegimen() : null,
            'regimen' => $this->resource->exportation->regimen->goes_id ?? null,
        ];
    }

    // El código de "regimen" (CAT-028) es compuesto: {EX-1|EX-2|EX-3}.{regimen}.{correlativo};
    // el prefijo de 4 caracteres antes del primer punto es el código CAT-033 "Tipo de Régimen"
    // que Hacienda espera por separado (no existe tabla catálogo CAT-033 independiente en el
    // sistema, se deriva de este prefijo: EX-1=Exportación Definitiva, EX-2=Temporal, EX-3=Reexportación).
    private function extractTipoRegimen(): ?string
    {
        $goesId = $this->resource->exportation->regimen->goes_id ?? null;

        if (!$goesId || !preg_match('/^([A-Z]{2}-\d)\./', $goesId, $matches)) {
            return null;
        }

        return $matches[1];
    }
}
