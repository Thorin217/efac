<?php

namespace Exactum\Efac\Models\Details;

use Exactum\Efac\Efac;
use Exactum\Efac\Models\Document\Dte;
use Exactum\Efac\Models\Document\RelatedDocument;
use Exactum\Efac\Models\Enterprise\ProductService;
use Exactum\Efac\Models\External\TributesType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class DteItem extends Model
{
    use HasFactory,
        LogsActivity;

    protected $fillable = [
        'dte_id',
        'tribute_type_id',
        'product_service_id',
        'related_document_id',
        'total_item_no_subject',
        'total_item_exempt',
        'total_item',
        'total_item_untaxed',
        'unit_price',
        'description',
        'quantity',
        'discount',
        'iva_item'
    ];

    protected static $logFillable = true;

    protected static $recordEvents = ['created', 'updated', 'deleted'];

    public function dte()
    {
        return $this->belongsTo(Dte::class);
    }

    public function tributeType()
    {
        return $this->belongsTo(TributesType::class);
    }

    public function productService()
    {
        return $this->belongsTo(app(Efac::$productServiceModel));
    }

    public function relatedDocument()
    {
        return $this->belongsTo(RelatedDocument::class);
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
     * itemType function summary
     * Function to get item type depends productService or Tribute type or Donation type
     *
     * itemType function long description
     * En teoria otra vez el funcionamiento es sencillo, se tiene que obtener si es un bien o un servicio dependiendo del ProductService
     * que ahora tiene una relacion ItemType o DonationType
     * En caso de ser nulo se tiene que obtener del tributeType y seria 4.
     * Pero en el caso de ser una donation se verificaria si es efectivo
     * Supongo que habran otras situaciones, pero por el momento solo se me ocurren esas dos (Ya encontre otra)
     * Recuerda que esta es la funcion que relacion con ItemType y con DonationType, pero unicamente de manera logica :)
     *
     * @return number
     **/
    public function itemType()
    {
        # code...
    }
}
