<?php

namespace Exactum\Efac\Models\Enterprise;

use Exactum\Efac\Models\External\City;
use Exactum\Efac\Models\External\EstablishmentType;
use Illuminate\Database\Eloquent\Model;

/**
 * Hay que considerar ingresar un Subsidiary y un Point of Sale por defecto (Para eso el atributo "default"),
 * Debido a que algunos documentos no exigen un punto de venta y si no se desea elegir un punto de venta especifico
 * tambien se podria usar el subsidiary por defecto.
 */
class Subsidiary extends Model
{
    protected $table = 'subsidiaries';

    protected $fillable = [
        'establishment_type_id',
        'emitter_entity_id',
        'code',
        'goes_id',
        'name',
        'default',
        'city_id',
        'address_complement',
    ];

    public function emitterEntity()
    {
        return $this->belongsTo(EmitterEntity::class);
    }

    public function salePoints()
    {
        return $this->hasMany(SalePoint::class);
    }

    public function establishmentType()
    {
        return $this->belongsTo(EstablishmentType::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
