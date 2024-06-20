<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Document\Transport;
use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 30
 */
class TransportMode extends Model
{
    protected $fillable = [
        'goes_id',
        'name',
    ];

    public $timestamps = false;

    public function transports()
    {
        return $this->hasMany(Transport::class);
    }
}
