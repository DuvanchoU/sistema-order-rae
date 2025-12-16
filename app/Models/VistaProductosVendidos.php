<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VistaProductosVendidos extends Model
{
    protected $table = 'vista_productos_vendidos';

    protected $primaryKey = 'id_producto';

    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];
}
