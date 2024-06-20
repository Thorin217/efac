<?php

namespace Exactum\Efac\Models\Details;

use Exactum\Efac\Models\Document\Dte;
use Exactum\Efac\Models\Document\RelatedDocument;
use Exactum\Efac\Models\External\IVARetention;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'dte_id',
        'iva_retention_id',
        'related_document_id',
        'description',
        'amount_taxable',
        'iva_withheld',
    ];

    public function dte()
    {
        return $this->belongsTo(Dte::class);
    }

    public function ivaRetention()
    {
        return $this->belongsTo(IVARetention::class);
    }

    public function relatedDocument()
    {
        return $this->belongsTo(RelatedDocument::class);
    }
}
