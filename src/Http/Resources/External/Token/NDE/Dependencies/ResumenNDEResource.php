<?php

namespace Exactum\Efac\Http\Resources\External\Token\NDE\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class ResumenNDEResource extends JsonResource
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
        $newMountTotalOperation = round((float) $this->resource->summary->mount_total_operation - (float) $this->resource->summary->IVA_withheld, 2);

        if (abs($this->resource->summary->total)) {
            $summaryTribute = $this->resource->summary->createSummaryTributesArray();
        }

        return  [
            'totalNoSuj' => (float) $this->resource->summary->total_no_subject,
            'totalExenta' => (float) $this->resource->summary->total_exempt,
            'totalGravada' => (float) $this->resource->summary->total,
            'subTotalVentas' => (float) $this->resource->summary->sub_total_sales,
            'totalDescu' => (float) $this->resource->summary->total_discount,
            'tributos' => $summaryTribute,
            'montoTotalOperacion' => $newMountTotalOperation,
            'ivaPerci' => 0.0,
            'totalIva' => (float) $this->resource->summary->total_IVA,
            'ivaRete' => (float) $this->resource->summary->IVA_withheld,
            'totalNoGravado' => (float) $this->resource->summary->total_untaxed,
            'totalPagar' => (float) $this->resource->summary->total_payable,
            'totalLetras' => createLetters($newMountTotalOperation),
            'condicionOperacion' => $this->resource->operationCondition->goes_id,
            'numPagoElectronico' => $this->resource->summary->number_virtual_paid,
            'observaciones' => $this->resource->summary->observations ?? null,
            'codigoRetencionMH' => null,
        ];
    }
}
