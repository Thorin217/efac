<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Enterprise\ReceiverEntity;
use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 32
 */
class TaxDomicile extends Model
{
    protected $fillable = [
        'goes_id',
        'name',
        'default',
    ];

    public $timestamps = false;

    public function receiverEntities()
    {
        return $this->hasMany(ReceiverEntity::class);
    }
}
