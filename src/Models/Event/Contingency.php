<?php

namespace Exactum\Efac\Models\Event;

use Exactum\Efac\Enums\StatusEnum;
use Exactum\Efac\Models\Auth\User;
use Exactum\Efac\Models\Document\Dte;
use Exactum\Efac\Models\Enterprise\SalePoint;
use Exactum\Efac\Models\External\ContingencyType;
use Exactum\Efac\Models\Token\ContingencyToken;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Contingency extends Model
{
    protected $table = 'contingencies';

    protected $fillable = [
        'contingency_type_id',
        'sale_point_id',
        'user_id',
        'generate_code',
        'description',
        'start_date',
        'end_date'
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->generate_code = strtoupper((string) Str::uuid());
            $model->start_date = $model->start_date ?? Carbon::now();
        });
    }

    public function contingencyType()
    {
        return $this->belongsTo(ContingencyType::class);
    }

    public function salePoint()
    {
        return $this->belongsTo(SalePoint::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tokens()
    {
        return $this->hasMany(ContingencyToken::class);
    }

    public function dtes()
    {
        return $this->hasMany(Dte::class);
    }

    public function scopeExternalApiAccepted(Builder $query)
    {
        return $query->whereDoesntHave('tokens', function ($query) {
            $query->whereNotNull('seal_reception');
        });
    }
}
