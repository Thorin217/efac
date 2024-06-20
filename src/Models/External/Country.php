<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Enterprise\ReceiverEntity;
use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 20
 */
class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = [
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
