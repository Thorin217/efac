<?php

namespace Exactum\Efac\Models\Document;

use Exactum\Efac\Models\Details\CreItem;
use Exactum\Efac\Models\Details\DteItem;
use Exactum\Efac\Models\External\DteType;
use Exactum\Efac\Models\External\GenerationType;
use Illuminate\Database\Eloquent\Model;

/**
 * Desarrollador del futuro esta tabla se usara 2 veces cuando se pida documentos relacionados
 * Y cuando se deban relacionar y se pidan en el cuerpo del documento, a continuación la lista
 *
 * Documentos relacionados: NC y ND (obligatorios); FC, CCFE y NRE (optionales) -> tiene un limite de 50 documentos por DTE
 * Cuerpo del documento: CRE y CLE -> estos tienen un limite de 500 documentos por DTE
 *
 * Ahora bien para descanso mental y para una forma mas "sencilla" de controlar estos documentos
 * en el caso de los fisicos se deben de pedir si o si al frontend, pero en los casos de los virtuales
 * que ya tengas guardados se debera hacer un respaldo de lo que se pide, el tipo de dte, el tipo de generacion que sera virtual
 * el identificador del documento osea el uuid que se genera y la fecha.
 */
class RelatedDocument extends Model
{
    protected $fillable = [
        'dte_id',
        'dte_type_id',
        'main_dte_id',
        'generation_type_id',
        'identificator_document',
        'date',
    ];

    public function dte()
    {
        return $this->belongsTo(Dte::class);
    }

    public function mainDte()
    {
        return $this->belongsTo(Dte::class, 'main_dte_id');
    }

    public function dteType()
    {
        return $this->belongsTo(DteType::class);
    }

    public function generationType()
    {
        return $this->belongsTo(GenerationType::class);
    }

    public function creItems()
    {
        return $this->hasMany(CreItem::class);
    }

    public function dteItems()
    {
        return $this->hasMany(DteItem::class);
    }
}
