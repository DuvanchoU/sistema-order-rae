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
        Schema::table('inventario', function (Blueprint $table) {
            $table->foreign(['bodega_id'], 'fk_inventario_bodega')->references(['id_bodega'])->on('bodegas')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['producto_id'], 'fk_inventario_producto')->references(['id_producto'])->on('producto')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['proveedor_id'], 'fk_inventario_proveedor')->references(['id_proveedor'])->on('proveedores')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inventario', function (Blueprint $table) {
            $table->dropForeign('fk_inventario_bodega');
            $table->dropForeign('fk_inventario_producto');
            $table->dropForeign('fk_inventario_proveedor');
        });
    }
};
