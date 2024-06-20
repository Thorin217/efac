<?php

namespace Exactum\Efac\Models\Summary;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SummaryTributesType extends Pivot
{
    protected $table = 'summary_tributes_type';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    public $timestamps = false;
}
