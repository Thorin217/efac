<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Document\Exportation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Catalogo 27
 */
class TaxRevenue extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'old_goes_id',
        'goes_id',
        'name',
    ];

    public $timestamps = false;

    public function exportations()
    {
        return $this->hasMany(Exportation::class);
    }
}