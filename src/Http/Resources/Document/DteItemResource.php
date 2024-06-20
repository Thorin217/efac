<?php

namespace Exactum\Efac\Http\Resources\Document;

use Exactum\Efac\Http\Resources\Entity\Emitter\ProductServiceResource;
use Exactum\Efac\Http\Resources\External\GenericExternalResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DteItemResource extends JsonResource
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
            'id' => $this->id,
            'description' => $this->description,
            'quantity' => formatTwoDecimals($this->quantity),
            'discount' => formatTwoDecimals($this->discount),
            'unit_price' => formatTwoDecimals($this->unit_price),

            'total_item' => [
                'taxed' => formatTwoDecimals($this->total_item),
                'taxed_with_iva' => formatTwoDecimals($this->iva_item),
                'no_taxed' => formatTwoDecimals($this->total_item_no_subject),
                'exempt' => formatTwoDecimals($this->total_item_exempt),
            ],

            'productService' => ProductServiceResource::make($this->whenLoaded('productService')),
            'related_document' => RelatedDocumentResource::make($this->whenLoaded('relatedDocument')),
        ];
    }
}
