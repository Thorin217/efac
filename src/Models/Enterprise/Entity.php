<?php

namespace Exactum\Efac\Models\Enterprise;

use App\Models\User;
use Exactum\Efac\Models\External\City;
use Exactum\Efac\Models\External\DocClientType;
use Exactum\Efac\Models\External\EconomicActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Entity extends Model
{
    use HasFactory,
        SoftDeletes,
        LogsActivity;

    protected $table = 'entities';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'economic_activity_id',
        'entity_id',
        'city_id',
        'seller_id',
        'address_complement',
        'NRC',
        'name',
        'comercial_name',
        'email',
        'remote_id',
        'approved',
        'photo',
        'softland_schema',
        'is_customer',
        'is_provider',
        'remote_provider_id',
        'remotable_id',
        'remotable_type',
        'is_foreign'
    ];

    protected $hidden = [
        'deleted_at'
    ];

    protected static $logFillable = true;

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    // Start Relationships functions
    /**
     * Model dependencies
     */
    public function economicActivity()
    {
        return $this->belongsTo(EconomicActivity::class);
    }

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    /**
     * The following models depend on this model
     */
    public function phones()
    {
        return $this->hasMany(Phone::class);
    }

    public function entities()
    {
        return $this->hasMany(Entity::class);
    }

    public function receiverEntities()
    {
        return $this->hasOne(ReceiverEntity::class);
    }

    public function emitterEntities()
    {
        return $this->hasOne(EmitterEntity::class);
    }

    /**
     * M-M relationships
     */
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->using(EntityUser::class);
    }

    public function docClientTypes()
    {
        return $this->belongsToMany(DocClientType::class)
            ->using(DocClientTypeEntity::class)
            ->withPivot('value')
            ->orderBy('weight')
            ->withTimestamps();
    }

    public function docClientTypesEntity()
    {
        return $this->hasMany(DocClientTypeEntity::class);
    }

    // End Relationship functions

    /**
     * Method for logsActivity
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll();
    }

    /**
     * getEntityTypes function summary
     *
     * getEntityTypes function long description
     *
     * @return number
     **/
    public function getEntityTypes()
    {
        $entityType['emitter'] = EmitterEntity::where('entity_id', $this->id)->first()->id ?? null;
        $entityType['receiver'] = ReceiverEntity::where('entity_id', $this->id)->first()->id ?? null;

        return $entityType;
    }

    public function remotable(): MorphTo
    {
        return $this->morphTo();
    }
}
