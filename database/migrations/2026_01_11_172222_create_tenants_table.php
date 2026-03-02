 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();

            // Datos básicos SaaS
            $table->string('nombre'); // Nombre oficial
            $table->string('subdominio')->nullable()->unique();
            $table->enum('estado', ['activo','suspendido'])->default('activo');

            // Identidad legal
            $table->string('nombre_corto')->nullable();
            $table->string('nit')->unique();
            $table->year('anio_fundacion')->nullable();

            // Información institucional
            $table->enum('tipo_club', ['formativo', 'amateur', 'profesional']);
            $table->json('colores_oficiales')->nullable();
            $table->string('escudo_url')->nullable();

            // Ubicación
            $table->string('direccion')->nullable();
            $table->string('ciudad');
            $table->string('pais');

            // Contacto
            $table->string('email_corporativo')->unique();
            $table->string('telefono')->nullable();
            $table->string('sitio_web')->nullable();

            // Encargado (informativo)
            $table->string('encargado_nombre');
            $table->string('encargado_email')->nullable();
            $table->string('encargado_telefono')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};