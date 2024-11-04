<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Enterprise\ReceiverEntity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Catalogo 20
 */
class Country extends Model
{
    use SoftDeletes;

    protected $table = 'countries';

    protected $fillable = [
        'old_goes_id',
        'goes_id',
        'name',
        'default',
        'country_code',
    ];

    public $timestamps = false;

    public function receiverEntities()
    {
        return $this->hasMany(ReceiverEntity::class);
    }
}
