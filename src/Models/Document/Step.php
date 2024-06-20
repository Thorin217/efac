<?php

namespace Exactum\Efac\Models\Document;

use Exactum\Efac\Models\External\DteType;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $fillable = [
        'slug',
        'order',
        'requerid',
        'slug_es',
    ];

    public function dteTypes()
    {
        return $this->belongsToMany(DteType::class)
            ->using(DteTypeStep::class);
    }
}
