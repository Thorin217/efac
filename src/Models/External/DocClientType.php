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
        switch ($this->id) {
            case 2:
                $value = str_pad($this->pivot->value, 9, "0", STR_PAD_LEFT);
                return substr($value, 0, 8) . "-" . substr($value, 8);
                break;

            default:
                return $this->pivot->value;
                break;
        }
    }
}
