<?php

namespace Exactum\Efac\Models\Enterprise;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class EmitterEntity extends Model
{
    use LogsActivity;

    protected $table = 'emitter_entities';

    protected $fillable = [
        'entity_id',
        'api_password',
        'signer_password',
    ];

    protected static $logFillable = true;

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function subsidiaries()
    {
        return $this->hasMany(Subsidiary::class);
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
     * getEntityId function summary
     *
     * getEntityId function long description
     *
     * @param Type $var Description
     * @return type
     * @throws conditon
     **/
    public function getMainEntityId()
    {
        $this->load([
            'entity'
        ]);

        return $this->entity->id;
    }
}
