<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Valoracion extends Model
{
    protected $fillable=[
        'comentario',
        'puntuacion',
        'profesional_id',
        'user_id'
    ];
    public function profesional():BelongsTo{
        return $this->belongsTo(Profesional::class);
    }
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
}
