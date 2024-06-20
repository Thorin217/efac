<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Details\CreItem;
use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 6
 */
class IVARetention extends Model
{
    protected $table = 'iva_retentions';

    protected $fillable = [
        'goes_id',
        'name',
        'percent',
    ];

    public $timestamps = false;

    public function creItems()
    {
        return $this->hasMany(CreItem::class);
    }
}
