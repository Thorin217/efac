<?php

namespace Exactum\Efac\Models\Enterprise;

use Exactum\Efac\Models\Document\Dte;
use Exactum\Efac\Models\External\Country;
use Exactum\Efac\Models\External\PersonType;
use Exactum\Efac\Models\External\SaleType;
use Exactum\Efac\Models\External\TaxDomicile;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class ReceiverEntity extends Model
{
    use LogsActivity;

    protected $table = 'receiver_entities';

    protected $fillable = [
        'entity_id',
        'person_type_id',
        'country_id',
        'tax_domicile_id',
        'sale_type_id',
        'foreign_economic_activity_description', // apply only intenational clients
    ];

    protected static $logFillable = true;

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    public function personType()
    {
        return $this->belongsTo(PersonType::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function taxDomicile()
    {
        return $this->belongsTo(TaxDomicile::class);
    }

    public function entity()
    {
        return $this->belongsTo(Entity::class);
    }

    public function saleType()
    {
        return $this->belongsTo(SaleType::class);
    }

    public function dtes()
    {
        return $this->hasMany(Dte::class);
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
