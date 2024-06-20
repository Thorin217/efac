<?php

namespace Exactum\Efac\Models\Summary;

use Exactum\Efac\Models\Document\Dte;
use Exactum\Efac\Models\External\PaymentType;
use Exactum\Efac\Models\External\Term;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'payment_type_id',
        'term_id',
        'summary_id',
        'mount',
        'reference',
        'period',
    ];

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }

    public function dte()
    {
        return $this->belongsTo(Dte::class);
    }
}
