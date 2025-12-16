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
        Schema::table('compras', function (Blueprint $table) {
            $table->foreign(['proveedor_id'], 'compras_ibfk_1')->references(['id_proveedor'])->on('proveedores')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['usuario_id'], 'compras_ibfk_2')->references(['id_usuario'])->on('usuarios')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compras', function (Blueprint $table) {
            $table->dropForeign('compras_ibfk_1');
            $table->dropForeign('compras_ibfk_2');
        });
    }
};
