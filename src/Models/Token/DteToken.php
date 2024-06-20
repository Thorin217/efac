<?php

namespace Exactum\Efac\Models\Token;

use Exactum\Efac\Models\Document\Dte;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class DteToken extends Model
{
    use LogsActivity;

    protected $fillable = [
        'dte_id',
        'token',
        'seal_reception',
        'error_message',
    ];

    protected static $logFillable = true;

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    public function dte()
    {
        return $this->belongsTo(Dte::class, 'dte_id');
    }

    public function getSealReceptionJdAttribute()
    {
        return json_decode($this->attributes['seal_reception']);
    }

    public function getErrorMessageJdAttribute()
    {
        return json_decode($this->attributes['error_message']);
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
