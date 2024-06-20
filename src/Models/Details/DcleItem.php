<?php

namespace Exactum\Efac\Models\Details;

use Exactum\Efac\Models\Document\Dte;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DcleItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'dte_id',
        'start_date',
        'end_date',
        'identification',
        'number_document',
        'value_operation',
        'amount_without_perception',
        'description',
        'remarks',
        'sub_total',
        'iva',
        'subject_perception',
        'iva_collected',
        'commission',
        'percent_commission',
        'iva_commission',
        'liquid_payable',
        'total_letters',
    ];

    public function dte()
    {
        return $this->belongsTo(Dte::class);
    }
}
