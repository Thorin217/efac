<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Document\RelatedDocument;
use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 7
 */
class GenerationType extends Model
{
    protected $fillable = [
        'goes_id',
        'name',
        'default',
    ];

    public $timestamps = false;

    public function relatedDocuments()
    {
        return $this->hasMany(RelatedDocument::class);
    }
}
