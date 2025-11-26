<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profesional extends Model
{
    protected $fillable = [
        'user_id',
        'oficio',
        'foto_perfil'
    ];
    public function getFamiliaProfesional(): ?string
    {
        $map = [
            'Electricista'   => 'Electricidad',
            'Fontanero'      => 'Fontanería',
            'Albañil'        => 'Albañilería',
            'Pintor'         => 'Pintura',
            'Carpintero'     => 'Carpintería',
            'Climatización'  => 'Climatización',
            'Jardinero'      => 'Jardinería',
            'Limpieza'       => 'Limpieza',
            'Informático'    => 'Informática',
            'Cerrajero'      => null,
        ];
        return $map[$this->oficio] ?? 'Otros Servicios';
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function valoraciones(): HasMany
    {
        return $this->hasMany(Valoracion::class);
    }
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'profesional_service')
            ->withPivot('precio_personalizado')
            ->withTimestamps();
    }
    public function getValoracionMediaAttribute(): float
    {
        return $this->valoraciones()->avg('puntuacion');
    }
}
