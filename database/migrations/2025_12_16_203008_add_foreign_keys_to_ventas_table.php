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
        Schema::table('ventas', function (Blueprint $table) {
            $table->foreign(['cliente_id'], 'fk_ventas_cliente')->references(['id_cliente'])->on('clientes')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['metodo_pago_id'], 'fk_ventas_metodo_pago')->references(['id_metodo'])->on('metodos_pago')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['usuario_id'], 'fk_ventas_usuario')->references(['id_usuario'])->on('usuarios')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ventas', function (Blueprint $table) {
            $table->dropForeign('fk_ventas_cliente');
            $table->dropForeign('fk_ventas_metodo_pago');
            $table->dropForeign('fk_ventas_usuario');
        });
    }
};
