<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Ejecutar las migraciones.
    public function up(): void
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->integer('id_producto', true);
            $table->string('codigo_producto', 45);
            $table->string('referencia_producto', 100)->nullable();
            $table->integer('categoria_id')->index('fk_producto_categoria');
            $table->string('tipo_madera', 45)->nullable();
            $table->string('color_producto', 45)->nullable();
            $table->decimal('precio_actual', 15);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    // Revertir las migraciones.
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
