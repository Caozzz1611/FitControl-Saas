<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrenamiento extends Model
{
    protected $fillable = [ 
        'nombre',
        'fecha',
        'hora',
        'ubicacion',
        'equipo_id',
        'tenant_id',
    ];

    // Asignar tenant_id automáticamente al crear
    protected static function booted()
    {
        static::creating(function ($model) {
            if (auth()->check()) {
                $model->tenant_id = auth()->user()->tenant_id;
            }
        });

        // Scope global para filtrar por tenant
        static::addGlobalScope('tenant', function ($query) {
            if (auth()->check()) {
                $query->where('tenant_id', auth()->user()->tenant_id);
            }
        });
    }

    // RELACIONES
    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }

    public function asistencias()
    {
        return $this->hasMany(AsistenciaEntrenamiento::class, 'entrenamiento_id');
    }
}
