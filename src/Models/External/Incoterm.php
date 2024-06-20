<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Summary\Summary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 31
 */
class Incoterm extends Model
{
    protected $fillable = [
        'goes_id',
        'name',
    ];

    public $timestamps = false;

    public function summaries()
    {
        return $this->hasMany(Summary::class);
    }
}
