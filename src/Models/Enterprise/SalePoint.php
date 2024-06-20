<?php

namespace Exactum\Efac\Models\Enterprise;

use App\Models\User;
use Exactum\Efac\Models\Document\Dte;
use Illuminate\Database\Eloquent\Model;

class SalePoint extends Model
{
    protected $fillable = [
        'subsidiary_id',
        'code',
        'goes_id',
        'name'
    ];

    public function subsidiary()
    {
        return $this->belongsTo(Subsidiary::class);
    }

    public function dtes()
    {
        return $this->hasMany(Dte::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
