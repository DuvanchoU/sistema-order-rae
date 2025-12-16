<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VistaComprasPorCliente extends Model
{
    protected $table = 'vista_compras_por_cliente';

    protected $primaryKey = 'id_usuario';

    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];
}
