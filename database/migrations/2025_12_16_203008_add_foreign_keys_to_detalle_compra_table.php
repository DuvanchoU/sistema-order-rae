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
        Schema::table('detalle_compra', function (Blueprint $table) {
            $table->foreign(['compra_id'], 'detalle_compra_ibfk_1')->references(['id_compra'])->on('compras')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['producto_id'], 'detalle_compra_ibfk_2')->references(['id_producto'])->on('producto')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detalle_compra', function (Blueprint $table) {
            $table->dropForeign('detalle_compra_ibfk_1');
            $table->dropForeign('detalle_compra_ibfk_2');
        });
    }
};
