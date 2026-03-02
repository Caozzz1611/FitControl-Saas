<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        // Datos básicos SaaS
        'nombre',          // puedes usarlo como nombre oficial
        'subdominio',
        'estado',

        // Identidad legal
        'nombre_corto',
        'nit',
        'anio_fundacion',

        // Información institucional
        'tipo_club',           // formativo | amateur | profesional
        'colores_oficiales',   // usar para cambiar  colores en la app
        'escudo_url',

        // Ubicación
        'direccion',
        'ciudad',
        'pais',

        // Contacto
        'email_corporativo',
        'telefono',
        'sitio_web',

        // Responsable
        'encargado_nombre',
    ];

    protected $casts = [
        'anio_fundacion'   => 'integer',
        'colores_oficiales'=> 'array',
    ];

  // Relaciones
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }

    public function encargado()
    {
        return $this->belongsTo(User::class, 'encargado_user_id');
    }
}