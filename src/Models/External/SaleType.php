<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Enterprise\ReceiverEntity;
use Illuminate\Database\Eloquent\Model;

class SaleType extends Model
{
    protected $fillable = [
        'name',
        'default',
    ];

    public $timestamps = false;

    public function receiverEntities()
    {
        return $this->hasMany(ReceiverEntity::class);
    }
}
