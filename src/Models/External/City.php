<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Enterprise\Entity;
use Exactum\Efac\Models\Enterprise\Subsidiary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Catalogo ELIMINADO -13-
 */
class City extends Model
{
    use SoftDeletes;

    protected $table = 'cities';

    protected $fillable = [
        'goes_id',
        'old_goes_id',
        'name',
        'department_id',
        'state_id',
        'default',
    ];

    public $timestamps = false;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function entities()
    {
        return $this->hasMany(Entity::class);
    }

    public function subsidiaries()
    {
        return $this->hasMany(Subsidiary::class);
    }
}
