<?php

namespace Exactum\Efac\Models\Document;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Extension extends Model
{
    protected $fillable = [
        'dte_id',
        'user_id',
        'remark',
    ];

    public function dte()
    {
        return $this->belongsTo(Dte::class, 'dte_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
