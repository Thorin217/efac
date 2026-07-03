<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Enterprise\DocClientTypeEntity;
use Exactum\Efac\Models\Enterprise\Entity;
use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 22
 */
class DocClientType extends Model
{
    protected $fillable = [
        'goes_id',
        'name',
        'weight',
    ];

    public $timestamps = false;

    public function entities()
    {
        return $this->belongsToMany(Entity::class)
            ->using(DocClientTypeEntity::class)
            ->withPivot('value')
            ->withTimestamps();
    }

    /**
     * formatDocValue function summary
     *
     * formatDocValue function long description
     *
     * @param Type $var Description
     * @return type
     **/
    public function formatDocValue()
    {
        // Hacienda espera los documentos numéricos (DUI, NIT) sin guiones en el
        // JSON transmitido; el guion es solo una convención de visualización
        // (confirmado por rechazo real de Hacienda en ambos casos).
        return match ($this->goes_id) {
            '13', '36' => $this->digitsOnly(),
            default => $this->pivot->value,
        };
    }

    private function digitsOnly(): string
    {
        $digits = preg_replace('/\D/', '', (string) $this->pivot->value);

        return $digits !== '' ? $digits : $this->pivot->value;
    }
}
