<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Document\Exportation;
use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 28
 */
class Regimen extends Model
{
    protected $fillable = [
        'goes_id',
        'name',
    ];

    public $timestamps = false;

    public function exportations()
    {
        return $this->hasMany(Exportation::class);
    }
}
