<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Summary\Summary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Catalogo 31
 */
class Incoterm extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'old_goes_id',
        'goes_id',
        'name',
    ];

    public $timestamps = false;

    public function summaries()
    {
        return $this->hasMany(Summary::class);
    }
}
