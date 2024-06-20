<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Event\Contingency;
use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 5
 */
class ContingencyType extends Model
{
    protected $fillable = [
        'goes_id',
        'name',
        'default',
    ];

    public $timestamps = false;

    public function contingencies()
    {
        return $this->hasMany(Contingency::class);
    }
}
