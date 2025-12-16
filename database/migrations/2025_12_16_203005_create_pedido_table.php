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
        Schema::create('pedido', function (Blueprint $table) {
            $table->integer('id_pedido', true);
            $table->integer('usuario_id')->index('fk_pedido_usuario_idx');
            $table->integer('cliente_id')->index('fk_pedido_cliente');
            $table->timestamp('fecha_pedido')->useCurrent();
            $table->date('fecha_entrega_estimada')->nullable();
            $table->decimal('total_pedido', 15);
            $table->enum('estado_pedido', ['PENDIENTE', 'EN PROCESO', 'ENTREGADO', 'CANCELADO'])->default('PENDIENTE');
            $table->string('direccion_entrega')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido');
    }
};
