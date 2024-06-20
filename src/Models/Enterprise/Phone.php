<?php

namespace Exactum\Efac\Models\Enterprise;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'entity_id',
        'value',
    ];

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }
}
