<?php

namespace Exactum\Efac\Models\External;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Catalogo 12
 */
class Department extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'goes_id',
        'name',
        'old_goes_id',
    ];

    public $timestamps = false;

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }
}

