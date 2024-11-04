<?php

namespace Exactum\Efac\Models\External;

use Exactum\Efac\Models\Summary\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Catalogo 17
 */
class PaymentType extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'old_goes_id',
        'goes_id',
        'name',
    ];

    public $timestamps = false;

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
