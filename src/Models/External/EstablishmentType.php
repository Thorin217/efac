<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Enterprise\Subsidiary;
use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 9
 */
class EstablishmentType extends Model
{
    protected $fillable = [
        'goes_id',
        'name',
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
