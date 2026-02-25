<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{

     protected $table = 'notificaciones';
    protected $fillable = [
        'user_id',
        'titulo',
        'mensaje',
        'leido',
    ];

    protected $casts = [
        'leido' => 'boolean',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
