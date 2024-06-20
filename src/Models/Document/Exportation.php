<?php

namespace Exactum\Efac\Models\Document;

use Exactum\Efac\Models\External\Incoterm;
use Exactum\Efac\Models\External\Regimen;
use Exactum\Efac\Models\External\TaxRevenue;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Exportation extends Model
{
    use LogsActivity;

    protected $fillable = [
        'dte_id',
        'regimen_id',
        'tax_revenue_id',
        'incoterm_id',
        'insurance',
        'flete',
        'observations',
    ];

    protected static $logFillable = true;

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    public function regimen()
    {
        return $this->belongsTo(Regimen::class);
    }

    public function taxRevenue()
    {
        return $this->belongsTo(TaxRevenue::class);
    }

    public function incoterm()
    {
        return $this->belongsTo(Incoterm::class);
    }

    public function dte()
    {
        return $this->belongsTo(Dte::class);
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
     * itemTypeExport function summary
     * Function to get item type depends items of DTE
     *
     * itemTypeExport function long description
     * El funcionamiento en teoria es sencillisimo, basicamente hay que traer todos los DteItem sociados
     * al DTE del HasOne, si hay solo productos, pues es 1, si hay solo servicios es 2, y si estan de los dos pues 3
     * Recuerda que esto va relacionado con ItemType, pero unicamente de manera logica :)
     *
     * @return number
     **/
    public function itemTypeExport()
    {
        # code...
    }
}
