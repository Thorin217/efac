<?php

namespace Exactum\Efac\Models\Enterprise;

use Exactum\Efac\Models\External\DocClientType;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class DocClientTypeEntity extends Pivot
{
    use LogsActivity;

    protected $table = 'doc_client_type_entity';

    protected $fillable = [
        'entity_id',
        'doc_client_type_id',
        'value',
    ];

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    public $timestamps = true;

    protected static $logFillable = true;

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    /**
     * Method for logsActivity
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }

    public function docClientType()
    {
        return $this->belongsTo(DocClientType::class);
    }

    public function entitiy()
    {
        return $this->belongsTo(Entity::class);
    }
}
