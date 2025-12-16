<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE VIEW `vista_ventas_diarias` AS select cast(`bd_order_rae`.`ventas`.`fecha_venta` as date) AS `fecha`,count(0) AS `total_ventas`,sum(`bd_order_rae`.`ventas`.`total_venta`) AS `ingresos` from `bd_order_rae`.`ventas` where `bd_order_rae`.`ventas`.`estado_venta` = 'COMPLETADA' group by cast(`bd_order_rae`.`ventas`.`fecha_venta` as date)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vista_ventas_diarias`");
    }
};
