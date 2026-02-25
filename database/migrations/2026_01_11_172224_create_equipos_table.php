<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained()->cascadeOnDelete();
            
            $table->string('nombre');
            $table->enum('categoria', ['profesional', 'amateur', 'formativo']);
            
            // Nuevos campos
            $table->string('logo_equipo')->nullable();      // Ruta o URL del logo
            $table->string('ubi_equipo')->nullable();       // Ubicación del equipo
            $table->string('contacto_equipo')->nullable();  // Contacto del equipo (email o teléfono)
            $table->string('categoria_equipo')->nullable(); // Subcategoría o descripción adicional
            
            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
