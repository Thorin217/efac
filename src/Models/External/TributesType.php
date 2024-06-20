<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Efac;
use Exactum\Efac\Models\Details\DteItem;
use Exactum\Efac\Models\Enterprise\ProductService;
use Exactum\Efac\Models\Enterprise\ProductServiceTributesType;
use Exactum\Efac\Models\Summary\Summary;
use Exactum\Efac\Models\Summary\SummaryTributesType;
use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 15
 */
class TributesType extends Model
{
    protected $fillable = [
        'goes_id',
        'name',
        'retail_price',
        'classification',
        'percent',
        'default',
    ];

    public $timestamps = false;

    public function dteItems()
    {
        return $this->hasMany(DteItem::class);
    }

    public function products()
    {
        return $this->belongsToMany(app(Efac::$productServiceModel), 'product_service_tributes_type', 'tributes_type_id', 'product_service_id');
    }

    public function summaries()
    {
        return $this->belongsToMany(Summary::class)
            ->using(SummaryTributesType::class)
            ->withPivot('total');
    }
}
