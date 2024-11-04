<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Enterprise\Subsidiary;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Catalogo 9
 */
class EstablishmentType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'goes_id',
        'name',
        'old_goes_id',
        'default'
    ];

    public $timestamps = false;

    /*
    public function entities()
    {
        return $this->hasMany(Entity::class);
    }
    */

    public function subsidiaries()
    {
        return $this->hasMany(Subsidiary::class);
    }
}
