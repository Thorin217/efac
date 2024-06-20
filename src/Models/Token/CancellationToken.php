<?php

namespace Exactum\Efac\Models\Token;

use Exactum\Efac\Models\Event\Cancellation;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class CancellationToken extends Model
{
    use LogsActivity;

    protected $fillable = [
        'cancellation_id',
        'token',
        'seal_reception',
        'error_message',
    ];

    protected static $logFillable = true;

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    public function cancellation()
    {
        return $this->belongsTo(Cancellation::class);
    }

    /**
     * Method for logsActivity
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }
}
