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
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->integer('id_detalle', true);
            $table->integer('venta_id')->index('fk_detalle_venta_venta_idx');
            $table->integer('producto_id')->index('fk_detalle_venta_producto_idx');
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 15);
            $table->decimal('subtotal', 15);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_venta');
    }
};
