<?php

namespace Exactum\Efac\Models\Summary;

use Exactum\Efac\Models\Document\Dte;
use Exactum\Efac\Models\External\TributesType;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $table = 'summaries';

    protected $fillable = [
        'dte_id',
        'total_no_subject',
        'total_exempt',
        'export',
        'total',
        'sub_total_sales',
        'discount_not_subject',
        'discount_exempt',
        'discount',
        'percent_discount',
        'total_discount',
        'sub_total',
        'IVA_collected',
        'IVA_withheld',
        'income_withheld',
        'mount_total_operation',
        'total_untaxed',
        'total_payable',
        'total_CLE',
        'total_letter',
        'total_IVA',
        'balance_favor',
        'number_virtual_paid',
    ];

    public function dte()
    {
        return $this->belongsTo(Dte::class);
    }

    public function tributesTypes()
    {
        return $this->belongsToMany(TributesType::class)
            ->using(SummaryTributesType::class)
            ->withPivot('total');
    }

    /**
     * createSummaryTributesArray function summary
     *
     * createSummaryTributesArray function long description
     *
     * @return array
     **/
    public function createSummaryTributesArray($withDefault = true)
    {
        return $this->tributesTypes->flatMap(function ($tribute) use ($withDefault) {
            if ($tribute->default == $withDefault) {
                return [[
                    'codigo' => $tribute->goes_id,
                    'descripcion' => $tribute->name,
                    'valor' => (float) $tribute->pivot->total
                ]];
            }
            return [];
        });
    }
}
