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
        Schema::create('compras', function (Blueprint $table) {
            $table->integer('id_compra', true);
            $table->integer('proveedor_id')->index('proveedor_id');
            $table->date('fecha_compra');
            $table->decimal('total_compra', 15);
            $table->string('metodo_pago', 50)->nullable();
            $table->enum('estado', ['PENDIENTE', 'RECIBIDA', 'CANCELADA'])->nullable()->default('PENDIENTE');
            $table->integer('usuario_id')->nullable()->index('usuario_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
