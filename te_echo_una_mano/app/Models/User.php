<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'direccion',
        'lat',
        'lng',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function profesional(): HasOne
    {
        return $this->hasOne(Profesional::class);
    }
    public function mensajesRecibidos(): HasMany
    {
        return $this->hasMany(Mensaje::class, 'receptor_id');
    }
    public function mensajesEnviados(): HasMany
    {
        return $this->hasMany(Mensaje::class, 'emisor_id');
    }
    public function valoraciones(): HasMany
    {
        return $this->hasMany(Valoracion::class);
    }


    //helpers para roles
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isProfesional(): bool
    {
        return $this->role === 'profesional';
    }

    public function isUsuario(): bool
    {
        return $this->role === 'usuario';
    }

    public function isGuestRole(): bool
    {
        return $this->role === 'guest';
    }
    public function esProfesionalReal(): bool
    {
        return $this->role === 'profesional' && $this->profesional()->exists();
    }

    //promociones y degradaciones de roles

    
    public function promocionarAProfesional(): bool
    {
        if ($this->role !== 'usuario') {
            return false; // Solo un usuario normal puede ser promovido
        }

        $this->role = 'profesional';
        $this->save();

        // Si no tiene registro profesional, se podría crear automáticamente:
        if (!$this->profesional()->exists()) {
            $this->profesional()->create([
                'user_id' => $this->id,
                'oficio' => 'Sin definir', // valor por defecto
                'foto_perfil' => null,
            ]);
        }

        return true;
    }

    /**
     * Degrada a usuario si actualmente es profesional.
     */
    public function degradarAUsuario(): bool
    {
        if ($this->role !== 'profesional') {
            return false; // Solo los profesionales pueden ser degradados
        }

        $this->role = 'usuario';
        $this->save();

        // Mantiene el registro profesional, o podrías eliminarlo si prefieres:
        // $this->profesional()->delete();

        return true;
    }
    //fin helpers para roles
}
