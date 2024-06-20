<?php

namespace Exactum\Efac\Models\Enterprise;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DteThirdParty extends Pivot
{
    protected $table = 'dte_third_party';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    public $timestamps = false;
}
