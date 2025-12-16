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
        Schema::create('inventario', function (Blueprint $table) {
            $table->integer('id_inventario', true);
            $table->integer('producto_id')->index('fk_inventario_producto_idx');
            $table->integer('bodega_id')->index('fk_inventario_bodega');
            $table->integer('proveedor_id')->nullable()->index('fk_inventario_proveedor');
            $table->integer('cantidad_disponible')->default(0);
            $table->date('fecha_llegada')->nullable();
            $table->timestamp('fecha_registro')->useCurrent();
            $table->enum('estado', ['DISPONIBLE', 'COMPROMETIDO', 'AGOTADO'])->default('DISPONIBLE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};
