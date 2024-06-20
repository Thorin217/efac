<?php

namespace Exactum\Efac\Models\Document;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Estos tienen un limite de 10, menos para FEXE que es de 20
 */
class OtherDocument extends Model
{
    protected $fillable = [
        'dte_id',
        'transport_id',
        'user_id',
        'description',
        'details',
    ];

    public function dte()
    {
        return $this->belongsTo(Dte::class);
    }

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
