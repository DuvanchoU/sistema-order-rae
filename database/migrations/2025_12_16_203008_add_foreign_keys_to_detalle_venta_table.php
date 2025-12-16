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
        Schema::table('detalle_venta', function (Blueprint $table) {
            $table->foreign(['producto_id'], 'fk_detalle_venta_producto')->references(['id_producto'])->on('producto')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign(['venta_id'], 'fk_detalle_venta_venta')->references(['id_venta'])->on('ventas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detalle_venta', function (Blueprint $table) {
            $table->dropForeign('fk_detalle_venta_producto');
            $table->dropForeign('fk_detalle_venta_venta');
        });
    }
};
