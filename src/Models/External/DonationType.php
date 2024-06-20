<?php

namespace Exactum\Efac\Models\External;

use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 26
 */
class DonationType extends Model
{
    protected $fillable = [
        'goes_id',
        'name',
        'item_type_id'
    ];

    public $timestamps = false;

    public function itemType()
    {
        return $this->belongsTo(ItemType::class);
    }
}
