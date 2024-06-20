<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Document\Dte;
use Exactum\Efac\Models\Document\DteTypeStep;
use Exactum\Efac\Models\Document\RelatedDocument;
use Exactum\Efac\Models\Document\Step;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 2
 */
class DteType extends Model
{

    protected $fillable = [
        'goes_id',
        'name',
        'last_version',
        'can_go_into_contingency',
        'has_contingency'
    ];

    public $timestamps = false;

    protected $guard_name = 'web';

    public function dtes()
    {
        return $this->hasMany(Dte::class);
    }

    public function relatedDocuments()
    {
        return $this->hasMany(RelatedDocument::class);
    }

    public function steps()
    {
        return $this->belongsToMany(Step::class)
            ->using(DteTypeStep::class)
            ->orderBy('order', 'ASC');
    }

    public function scopeWhereHasPermission(Builder $query, $permission)
    {
        return $query->whereHas('permissions', function ($query) use ($permission) {
            $query->where('name', $permission);
        })->get();
    }

    public function scopeCanGoIntoContingency(Builder $query)
    {
        return $query->where('can_go_into_contigency', 1);
    }

    public function scopeHasContingency(Builder $query)
    {
        return $query->where('has_contingency', 1);
    }
}
