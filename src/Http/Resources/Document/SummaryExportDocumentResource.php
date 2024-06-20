<?php

namespace Exactum\Efac\Http\Resources\Document;

use Illuminate\Http\Resources\Json\JsonResource;

class SummaryExportDocumentResource extends JsonResource
{
    protected $dte;

    public function __construct($resource, $dte)
    {
        parent::__construct($resource);
        $this->dte = $dte;
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
            'regimen_id' => $this->resource['regimen_id'],
            'tax_revenue_id' => $this->resource['tax_revenue_id'],
            'incoterm_id' => $this->resource['incoterm_id'],
            'insurance' => $this->resource['insurance'],
            'flete' => $this->resource['flete'],
            'discount' => $this->resource['discount'],
            'number_virtual_paid' => $this->resource['number_virtual_paid'],
            'observations' => $this->resource['observations'],

            'document' => GeneralDteResource::make($this->dte),
        ];
    }
}
