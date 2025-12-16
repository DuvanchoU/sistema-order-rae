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
        DB::statement("CREATE VIEW `vista_ventas_anuales` AS select year(`bd_order_rae`.`ventas`.`fecha_venta`) AS `anio`,count(0) AS `total_ventas`,sum(`bd_order_rae`.`ventas`.`total_venta`) AS `ingresos_anuales` from `bd_order_rae`.`ventas` where `bd_order_rae`.`ventas`.`estado_venta` = 'COMPLETADA' group by year(`bd_order_rae`.`ventas`.`fecha_venta`)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vista_ventas_anuales`");
    }
};
