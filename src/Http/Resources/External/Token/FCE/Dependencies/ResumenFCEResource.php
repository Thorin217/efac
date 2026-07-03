<?php

namespace Exactum\Efac\Http\Resources\External\Token\FCE\Dependencies;

use Exactum\Efac\Http\Resources\Document\PaymentResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ResumenFCEResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $especialAttributes = [
            'totalGravada' => (float) $this->resource->summary->total,
            'tributos' => null,
            'subTotal' => (float) $this->resource->summary->sub_total,
            'subTotalVentas' => (float) $this->resource->summary->sub_total_sales,
            'totalIva' => (float) $this->resource->summary->total_IVA,
        ];

        if (abs($this->resource->summary->total)) {
            $especialAttributes['totalGravada'] = (float) $this->resource->summary->total_IVA;
            // $summaryTribute = $this->resource->summary->createSummaryTributesArray(false);
            // $especialAttributes['tributos'] = count($summaryTribute) ? $summaryTribute : null;
            $especialAttributes['totalIva'] = (float) calculateIvaByPriceWithIva($this->resource->summary->mount_total_operation, 2);
        }

        return array_merge(
            $especialAttributes,
            [
                'totalNoSuj' => (float) $this->resource->summary->total_no_subject,
                'totalExenta' => (float) $this->resource->summary->total_exempt,
                'descuNoSuj' => (float) $this->resource->summary->discount_not_subject,
                'descuExenta' => (float) $this->resource->summary->discount_exempt,
                'descuGravada' => (float) $this->resource->summary->discount,
                'porcentajeDescuento' => (float) $this->resource->summary->percent_discount,
                'totalDescu' => (float) $this->resource->summary->total_discount,
                'ivaRete' => (float) $this->resource->summary->IVA_withheld, #TODO: Add iva Rete calculation
                'montoTotalOperacion' => (float) $this->resource->summary->mount_total_operation,
                'totalNoGravado' => (float) $this->resource->summary->total_untaxed,
                'totalPagar' => (float) $this->resource->summary->total_payable,
                'totalLetras' => $this->resource->summary->total_letter,
                'saldoFavor' => (float) $this->resource->summary->balance_favor,
                'condicionOperacion' => $this->resource->operationCondition->goes_id,
                'pagos' => $this->buildPagos(),
                'numPagoElectronico' => $this->resource->summary->number_virtual_paid,
                'observaciones' => $this->resource->summary->observations ?? null,
            ]
        );
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
