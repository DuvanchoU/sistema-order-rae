<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Ejecutar las migraciones.
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->integer('id_categorias', true);
            $table->string('nombre_categoria', 300);
            $table->string('estado_categoria', 45)->nullable();
            $table->timestamps();
            $table->softDeletes(); 
        });
    }

    // Revertir las migraciones.
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
