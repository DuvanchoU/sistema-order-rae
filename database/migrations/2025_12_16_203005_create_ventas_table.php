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
        Schema::create('ventas', function (Blueprint $table) {
            $table->integer('id_venta', true);
            $table->integer('usuario_id')->index('fk_ventas_usuario_idx');
            $table->integer('cliente_id')->nullable()->index('fk_ventas_cliente');
            $table->timestamp('fecha_venta')->useCurrent();
            $table->decimal('total_venta', 12);
            $table->enum('estado_venta', ['COMPLETADA', 'CANCELADA', 'PENDIENTE'])->default('COMPLETADA');
            $table->integer('metodo_pago_id')->nullable()->index('fk_ventas_metodo_pago');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
