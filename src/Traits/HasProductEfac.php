<?php

namespace Exactum\Efac\Traits;

use Exactum\Efac\Models\Details\DteItem;
use Exactum\Efac\Models\External\ItemType;
use Exactum\Efac\Models\External\TributesType;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasProductEfac
{
    public function itemType(): BelongsTo
    {
        return $this->belongsTo(ItemType::class);
    }

    public function dteItems(): HasMany
    {
        return $this->hasMany(DteItem::class);
    }

    public function tributesTypes(): BelongsToMany
    {
        return $this->belongsToMany(TributesType::class, 'product_service_tributes_type', 'product_service_id', 'tributes_type_id');
    }

    /**
     * PriceWithTributesForFCE function summary
     *
     * PriceWithTributesForFCE function long description
     *
     * @param Float $price Description
     * @return Float
     **/
    public function PriceWithTributesForFCE(float $unitPrice)
    {
        $tributesArray = $this
            ->tributesTypes()
            ->where('tributes_types.id', '!=', 2)
            ->get();

        foreach ($tributesArray as $tribute) {
            $totalTribute = $tribute->retail_price ?? 0;

            if ($tribute->percent) {
                $totalTribute = $tribute->retail_price * $unitPrice;
            }

            $unitPrice += $totalTribute;
        }

        return $unitPrice;
    }

    /**
     * calculateExportationTributes function summary
     *
     * calculateExportationTributes function long description
     *
     * @param Float $priceWithoutTributes Description
     * @return type
     **/
    public function calculateExportationTributes(float $priceWithoutTributes)
    {
        $this->load(['tributesTypes' => function ($query) {
            $query->where('tributes_types.id', '!=', 1);
        }]);

        return $this->tributesTypes->map(function ($tribute) use ($priceWithoutTributes) {
            if ($tribute->percent) {
                return [$tribute->id => $tribute->retail_price * $priceWithoutTributes];
            }

            return [$tribute->id => $tribute->retail_price ?? 0];
        });
    }
}
