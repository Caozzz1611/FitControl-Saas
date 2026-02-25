<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\BelongsToTenant;

class AsistenciaEntrenamiento extends Model
{
    use BelongsToTenant;

    protected $table = 'asistencia_entrenamiento';

    protected $fillable = [
        'tenant_id',
        'entrenamiento_id',
        'user_id',
        'presente',
    ];

    // Boot method para asignar tenant automáticamente
    protected static function booted()
    {
        static::creating(function ($model) {
            // Si no se pasó tenant_id, se asigna automáticamente desde el usuario autenticado
            if (empty($model->tenant_id) && auth()->check()) {
                $model->tenant_id = auth()->user()->tenant_id;
            }
        });
    }

    /**
     * Relación con entrenamiento
     */
    public function entrenamiento()
    {
        return $this->belongsTo(Entrenamiento::class, 'entrenamiento_id');
    }

    /**
     * Relación con jugador (usuario)
     */
    public function jugador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
