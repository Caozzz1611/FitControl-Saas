<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //seeder de tenants
       $this->call([
        TenantSeeder::class,
    ]);
        // Crear usuario administrador por defecto
        User::create([
            'name' => 'Administrador',
            'email' => 'administrador@fitcontrol.com',
            'password' => Hash::make('password123'),
            'tenant_id' => 1,
        ]);
          // Crear usuario administrador por defecto
        User::create([
            'name' => 'Berick',
            'email' => 'administradordos@fitcontrol.com',
            'password' => Hash::make('16112007'),
            'tenant_id' => 2,
        ]);

        
    }
}
