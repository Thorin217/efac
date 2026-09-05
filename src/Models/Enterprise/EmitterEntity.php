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
        'api_password_test',
        'signer_password_test',
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
     * '00' (pruebas) usa las credenciales de pruebas; cualquier otro valor
     * (produccion) usa las de siempre. Ambas se guardan encriptadas igual
     * que las de produccion -- ver ExternalService::getBearerToken() para el
     * unico punto donde se desencriptan antes de usarse.
     */
    public function signerPasswordFor(string $ambiente): ?string
    {
        return $ambiente === '00' ? $this->signer_password_test : $this->signer_password;
    }

    public function apiPasswordFor(string $ambiente): ?string
    {
        return $ambiente === '00' ? $this->api_password_test : $this->api_password;
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
