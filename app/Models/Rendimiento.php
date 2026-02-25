<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rendimiento extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'minutos_jugados',
        'goles',
        'asistencias',
        'tarjetas_amarillas',
        'tarjetas_rojas',
        'evaluacion',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function partido()
    {
        return $this->belongsTo(Partido::class);
    }
}
