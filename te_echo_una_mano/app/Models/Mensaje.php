<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mensaje extends Model
{
    protected $fillable=[
        'contenido',
        'emisor_id',
        'receptor_id'
    ];
    public function emisor():BelongsTo{
        return $this->belongsTo(User::class,'emisor_id');
    }
    public function receptor():BelongsTo{
        return $this->belongsTo(User::class,'receptor_id');
    }
}
