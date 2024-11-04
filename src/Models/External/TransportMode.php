<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Document\Transport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Catalogo 30
 */
class TransportMode extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'old_goes_id',
        'goes_id',
        'name',
    ];

    public $timestamps = false;

    public function transports()
    {
        return $this->hasMany(Transport::class);
    }
}
