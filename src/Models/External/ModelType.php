<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Document\Dte;
use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 3
 * Por defecto es el 01
 * Solo en casos especiales se autoriza el 02(Diferido)
 * Esta enlazado con OperationType
 */
class ModelType extends Model
{
    protected $fillable = [
        'goes_id',
        'name',
        'default',
    ];

    public $timestamps = false;

    public function dtes()
    {
        return $this->hasMany(Dte::class);
    }
}
