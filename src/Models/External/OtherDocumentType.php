<?php

namespace Exactum\Efac\Models\External;

use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 21
 */
class OtherDocumentType extends Model
{
    protected $fillable = [
        'goes_id',
        'name',
    ];

    public $timestamps = false;
}
