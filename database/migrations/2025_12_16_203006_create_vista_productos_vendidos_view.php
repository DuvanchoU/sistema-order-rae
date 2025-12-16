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
        DB::statement("CREATE VIEW `vista_productos_vendidos` AS select `p`.`id_producto` AS `id_producto`,`p`.`codigo_producto` AS `codigo_producto`,`p`.`referencia_producto` AS `referencia_producto`,`c`.`nombre_categoria` AS `nombre_categoria`,sum(`dv`.`cantidad`) AS `unidades_vendidas`,sum(`dv`.`subtotal`) AS `ingresos` from ((`bd_order_rae`.`detalle_venta` `dv` join `bd_order_rae`.`producto` `p` on(`dv`.`producto_id` = `p`.`id_producto`)) join `bd_order_rae`.`categorias` `c` on(`p`.`categoria_id` = `c`.`id_categorias`)) group by `p`.`id_producto` order by sum(`dv`.`cantidad`) desc");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS `vista_productos_vendidos`");
    }
};
