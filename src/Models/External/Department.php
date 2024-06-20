<?php

namespace Exactum\Efac\Models\External;

use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 12
 */
class Department extends Model
{
    protected $fillable = [
        'goes_id',
        'name',
    ];

    public $timestamps = false;

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
