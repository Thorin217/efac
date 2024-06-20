<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Efac;
use Exactum\Efac\Models\Enterprise\ProductService;
use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 11
 */
class ItemType extends Model
{
    protected $fillable = [
        'goes_id',
        'name',
    ];

    public $timestamps = false;

    public function productServices()
    {
        return $this->hasMany(Efac::$productServiceModel);
    }

    public function donationType()
    {
        return $this->hasOne(DonationType::class);
    }
}
