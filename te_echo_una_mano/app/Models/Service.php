<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    protected $fillable=[
        'titulo',
        'descripcion'
    ];
    public function profesionales():BelongsToMany{
        return $this->belongsToMany(Profesional::class, 'profesional_service')
        ->withPivot('precio_personalizado')
        ->withTimestamps();
    }

}
