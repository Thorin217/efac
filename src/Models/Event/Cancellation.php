<?php

namespace Exactum\Efac\Models\Event;

use Exactum\Efac\Enums\StatusEnum;
use App\Models\User;
use Exactum\Efac\Models\Document\Dte;
use Exactum\Efac\Models\External\CancellationType;
use Exactum\Efac\Models\Token\CancellationToken;
use Carbon\Carbon;
use Exactum\Efac\Models\Enterprise\Entity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Cancellation extends Model
{
    use LogsActivity;

    protected $fillable = [
        'dte_id',
        'new_dte_id',
        'cancellation_type_id',
        'description',
        'generate_code',
        'user_id',
        'entity_id'
    ];

    protected $casts = [
        'status' => StatusEnum::class,
    ];

    protected static $logFillable = true;

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->generate_code = strtoupper((string) Str::uuid());
        });
    }

    public function dte()
    {
        return $this->belongsTo(Dte::class);
    }

    public function newDte()
    {
        return $this->belongsTo(Dte::class, 'new_dte_id');
    }

    public function cancellationType()
    {
        return $this->belongsTo(CancellationType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tokens()
    {
        return $this->hasMany(CancellationToken::class);
    }

    /**
     * Method for logsActivity
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }

    /**
     * getGenerateDate function summary
     *
     * getGenerateDate function long description
     *
     * @return String
     **/
    public function getGenerateDate()
    {
        return Carbon::parse($this->created_at)->format('Y-m-d');
    }

    /**
     * getGenerateHour function summary
     *
     * getGenerateHour function long description
     *
     * @return String
     **/
    public function getGenerateHour()
    {
        return Carbon::parse($this->created_at)->format('H:i:s');
    }

    /**
     * Get the entity that owns the Cancellation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entity(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'entity_id', 'id');
    }
}
