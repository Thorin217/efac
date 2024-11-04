<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Enterprise\Entity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Catalogo 19
 */
class EconomicActivity extends Model
{
    use SoftDeletes;

    protected $table = 'economic_activities';

    protected $fillable = [
        'old_goes_id',
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
