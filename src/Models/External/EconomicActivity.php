<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Enterprise\Entity;
use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 19
 */
class EconomicActivity extends Model
{
    protected $table = 'economic_activities';

    protected $fillable = [
        'goes_id',
        'name',
        'classification',
    ];

    public $timestamps = false;

    public function entities()
    {
        return $this->hasMany(Entity::class);
    }
}
