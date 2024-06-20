<?php

namespace Exactum\Efac\Models\Summary;

use Exactum\Efac\Models\Document\Dte;
use Illuminate\Database\Eloquent\Model;

class CreSummary extends Model
{
    protected $table = 'cre_summaries';

    protected $fillable = [
        'dte_id',
        'total_subject_withheld',
        'total_IVA_withheld',
        'total_IVA_withheld_letter',
    ];

    public function dte()
    {
        return $this->belongsTo(Dte::class);
    }
}
