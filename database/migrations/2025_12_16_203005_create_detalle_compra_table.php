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
        Schema::create('detalle_compra', function (Blueprint $table) {
            $table->integer('id_detalle_compra', true);
            $table->integer('compra_id')->index('compra_id');
            $table->integer('producto_id')->index('producto_id');
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
        Schema::dropIfExists('detalle_compra');
    }
};
