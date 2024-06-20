<?php

namespace Exactum\Efac\Models\Token;

use Exactum\Efac\Models\Event\Contingency;
use Illuminate\Database\Eloquent\Model;

class ContingencyToken extends Model
{
    protected $fillable = [
        'contingency_id',
        'token',
        'seal_reception',
        'status',
        'error_message',
    ];

    public function contingency()
    {
        return $this->belongsTo(Contingency::class);
    }
}
