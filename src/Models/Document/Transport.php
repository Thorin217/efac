<?php

namespace Exactum\Efac\Models\Document;

use Exactum\Efac\Models\External\TransportMode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    protected $fillable = [
        'transport_mode_id',
        'identification',
    ];

    public function transportMode()
    {
        return $this->belongsTo(TransportMode::class, 'transport_mode_id');
    }

    public function otherDocuments()
    {
        return $this->hasMany(OtherDocument::class);
    }
}
