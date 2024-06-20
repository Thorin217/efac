<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Document\Dte;
use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 25
 */
class PropertyObject extends Model
{
    protected $fillable = [
        'goes_id',
        'name',
    ];

    public $timestamps = false;

    public function dtes()
    {
        return $this->hasMany(Dte::class);
    }
}
