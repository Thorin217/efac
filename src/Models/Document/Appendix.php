<?php

namespace Exactum\Efac\Models\Document;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Appendix extends Model
{
    protected $table = 'appendices';
    protected $fillable = [
        'dte_id',
        'field',
        'tag',
        'value',
    ];

    public function dte()
    {
        return $this->belongsTo(Dte::class);
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($appendix) {
            $appendix->field = Str::of($appendix->tag)->slug('-');
        });
    }
}
