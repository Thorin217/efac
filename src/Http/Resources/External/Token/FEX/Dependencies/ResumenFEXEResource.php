<?php

namespace Exactum\Efac\Http\Resources\External\Token\FEX\Dependencies;

use Exactum\Efac\Http\Resources\Document\PaymentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ResumenFEXEResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return  [
            'totalGravada' => (float) $this->resource->summary->total,
            'descuGravada' => (float) $this->resource->summary->discount,
            'porcentajeDescuento' => (float) $this->resource->summary->percent_discount,
            'totalDescu' => (float) $this->resource->summary->total_discount,

            'seguro' => (float) $this->resource->exportation->insurance,
            'flete' => (float) $this->resource->exportation->flete,
            // Exportación siempre reporta el tributo de IVA exportaciones (0%) a nivel de
            // resumen; nunca los tributos domésticos del catálogo de productos.
            'tributos' => [
                [
                    'codigo' => 'C3',
                    'descripcion' => 'Impuesto al Valor Agregado (exportaciones)',
                    'valor' => 0.0,
                ],
            ],

            'montoTotalOperacion' => (float) $this->resource->summary->mount_total_operation,
            'totalNoGravado' => (float) $this->resource->summary->total_untaxed,
            'totalNoOnerosas' => 0.0,
            'totalPagar' => (float) $this->resource->summary->total_payable,
            'totalLetras' => $this->resource->summary->total_letter,
            'saldoFavor' => (float) $this->resource->summary->balance_favor,
            'condicionOperacion' => $this->resource->operationCondition->goes_id,
            'pagos' => $this->buildPagos(),

            'codIncoterms' => $this->resource->exportation->incoterm->goes_id ?? null,
            'descIncoterms' => $this->resource->exportation->incoterm->name ?? null,

            'numPagoElectronico' => $this->resource->summary->number_virtual_paid,
            'observaciones' => $this->resource->exportation->observations ?? null,
        ];
    }

    private function buildPagos(): ?array
    {
        $payments = $this->resource->payments()->with(['paymentType', 'term'])->get();

        if ($payments->isEmpty()) {
            return null;
        }

        return PaymentResource::collection($payments)->resolve();
    }
}
