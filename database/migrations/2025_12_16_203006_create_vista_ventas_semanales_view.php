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
        DB::statement("CREATE VIEW `vista_ventas_semanales` AS select yearweek(`bd_order_rae`.`ventas`.`fecha_venta`,1) AS `semana_iso`,min(cast(`bd_order_rae`.`ventas`.`fecha_venta` as date)) AS `inicio_semana`,max(cast(`bd_order_rae`.`ventas`.`fecha_venta` as date)) AS `fin_semana`,count(0) AS `total_ventas`,sum(`bd_order_rae`.`ventas`.`total_venta`) AS `ingresos` from `bd_order_rae`.`ventas` where `bd_order_rae`.`ventas`.`estado_venta` = 'COMPLETADA' group by yearweek(`bd_order_rae`.`ventas`.`fecha_venta`,1)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vista_ventas_semanales`");
    }
};
