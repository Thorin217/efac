<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Event\Cancellation;
use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 24
 */
class CancellationType extends Model
{
    protected $fillable = [
        'goes_id',
        'name',
    ];

    public $timestamps = false;

    public function cancellations()
    {
        return $this->hasMany(Cancellation::class);
    }
}
