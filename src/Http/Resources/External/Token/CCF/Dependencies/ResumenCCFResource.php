<?php

namespace App\Http\Resources\External\Token\CCF\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class ResumenCCFResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $summaryTribute = null;

        if (abs($this->resource->summary->total)) {
            $summaryTribute = $this->resource->summary->createSummaryTributesArray();
        }

        return  [
            'totalNoSuj' => (float) $this->resource->summary->total_no_subject,
            'totalExenta' => (float) $this->resource->summary->total_exempt,
            'totalGravada' => (float) $this->resource->summary->total,
            'subTotalVentas' => (float) $this->resource->summary->sub_total_sales,
            'descuNoSuj' => (float) $this->resource->summary->discount_not_subject,
            'descuExenta' => (float) $this->resource->summary->discount_exempt,
            'descuGravada' => (float) $this->resource->summary->discount,
            'porcentajeDescuento' => (float) $this->resource->summary->percent_discount,
            'totalDescu' => (float) $this->resource->summary->total_discount,
            'tributos' => $summaryTribute,
            'subTotal' => (float) $this->resource->summary->sub_total,
            'ivaPerci1' => (float) 0,
            'ivaRete1' => (float) $this->resource->summary->IVA_withheld, #TODO: Add iva Rete calculation
            'reteRenta' => (float) $this->resource->summary->income_withheld, #TODO: Add Tax Rete calculation
            'montoTotalOperacion' => (float) $this->resource->summary->mount_total_operation,
            'totalNoGravado' => (float) $this->resource->summary->total_untaxed,
            'totalPagar' => (float) $this->resource->summary->total_payable,
            'totalLetras' => $this->resource->summary->total_letter,
            'saldoFavor' => (float) $this->resource->summary->balance_favor,
            'condicionOperacion' => $this->resource->operationCondition->goes_id,
            'pagos' => null, #TODO: make jsonResource
            'numPagoElectronico' => $this->resource->summary->number_virtual_paid,
        ];
    }
}
