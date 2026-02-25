<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistorialMedico extends Model
{
    protected $table = 'historial_medico';

    protected $fillable = [
        'user_id',
        'tipo',
        'descripcion',
        'gravedad',
        'fecha_inicio',
        'fecha_fin',
        'apto',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
