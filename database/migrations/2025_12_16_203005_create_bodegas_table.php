<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bodegas', function (Blueprint $table) {
            $table->integer('id_bodega', true);
            $table->string('nombre_bodega', 100);
            $table->string('direccion')->nullable();
            $table->enum('estado', ['ACTIVA', 'INACTIVA'])->nullable()->default('ACTIVA');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bodegas');
    }
};
