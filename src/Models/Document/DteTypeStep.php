<?php

namespace Exactum\Efac\Models\Document;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DteTypeStep extends Pivot
{
    protected $table = 'dte_type_step';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public $timestamps = false;
}
