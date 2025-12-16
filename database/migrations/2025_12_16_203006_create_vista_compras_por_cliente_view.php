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
        DB::statement("CREATE VIEW `vista_compras_por_cliente` AS select `u`.`id_usuario` AS `id_usuario`,`u`.`nombres` AS `nombres`,`u`.`apellidos` AS `apellidos`,`u`.`correo_usuario` AS `correo_usuario`,`u`.`documento` AS `documento`,count(`v`.`id_venta`) AS `total_compras`,sum(`dv`.`cantidad`) AS `total_productos_comprados`,sum(`v`.`total_venta`) AS `total_gastado`,max(`v`.`fecha_venta`) AS `ultima_compra` from ((`bd_order_rae`.`usuarios` `u` join `bd_order_rae`.`ventas` `v` on(`u`.`id_usuario` = `v`.`usuario_id`)) join `bd_order_rae`.`detalle_venta` `dv` on(`v`.`id_venta` = `dv`.`venta_id`)) where `v`.`estado_venta` = 'COMPLETADA' and `u`.`id_rol` = 4 group by `u`.`id_usuario`");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vista_compras_por_cliente`");
    }
};
