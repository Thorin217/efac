<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Summary\Payment;
use Illuminate\Database\Eloquent\Model;

/**
 * Catalogo 17
 */
class PaymentType extends Model
{
    protected $fillable = [
        'goes_id',
        'name',
    ];

    public $timestamps = false;

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
