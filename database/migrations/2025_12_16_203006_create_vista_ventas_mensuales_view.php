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
        DB::statement("CREATE VIEW `vista_ventas_mensuales` AS select year(`bd_order_rae`.`ventas`.`fecha_venta`) AS `anio`,month(`bd_order_rae`.`ventas`.`fecha_venta`) AS `mes`,date_format(`bd_order_rae`.`ventas`.`fecha_venta`,'%Y-%m') AS `periodo`,count(0) AS `total_ventas`,sum(`bd_order_rae`.`ventas`.`total_venta`) AS `ingresos_mensuales` from `bd_order_rae`.`ventas` where `bd_order_rae`.`ventas`.`estado_venta` = 'COMPLETADA' group by year(`bd_order_rae`.`ventas`.`fecha_venta`),month(`bd_order_rae`.`ventas`.`fecha_venta`)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vista_ventas_mensuales`");
    }
};
