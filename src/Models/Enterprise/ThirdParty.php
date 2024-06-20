<?php

namespace Exactum\Efac\Models\Enterprise;

use Exactum\Efac\Models\Document\Dte;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdParty extends Model
{
    use HasFactory;

    protected $table = 'third_parties';

    protected $fillable = [
        'nit',
        'name',
    ];

    public function dtes()
    {
        return $this->belongsToMany(Dte::class)
            ->using(DteThirdParty::class);
    }
}
