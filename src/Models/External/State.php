<?php

namespace Exactum\Efac\Models\External;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Catalogo 13
 */
class State extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'old_goes_id',
        'goes_id',
        'name',
        'default',
        'department_id',
    ];

    public $timestamps = false;

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
