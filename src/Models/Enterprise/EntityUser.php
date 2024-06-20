<?php

namespace Exactum\Efac\Models\Enterprise;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EntityUser extends Pivot
{
    protected $table = 'entity_user';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    public $timestamps = false;
}
