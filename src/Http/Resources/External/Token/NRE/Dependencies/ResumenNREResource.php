<?php

namespace App\Http\Resources\External\Token\NRE\Dependencies;

use Illuminate\Http\Resources\Json\JsonResource;

class ResumenNREResource extends JsonResource
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
            'montoTotalOperacion' => (float) $this->resource->summary->mount_total_operation,
            'totalLetras' => createLetters($this->resource->summary->mount_total_operation),
        ];
    }
}
