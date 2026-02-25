<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = [
        'nombre',
        'subdominio',
        'estado',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }
}
