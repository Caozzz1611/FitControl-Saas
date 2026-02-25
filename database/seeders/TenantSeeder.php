<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant;

class TenantSeeder extends Seeder
{
    public function run(): void
    {
        Tenant::create([
            'nombre'     => 'Academia Central',
            'subdominio' => 'central',
            'estado'     => 'activo',
        ]);

        Tenant::create([
            'nombre'     => 'Escuela Juvenil',
            'subdominio' => 'juvenil',
            'estado'     => 'activo',
        ]);

        Tenant::create([
            'nombre'     => 'Club Profesional',
            'subdominio' => 'pro',
            'estado'     => 'activo',
        ]);
    }
}
