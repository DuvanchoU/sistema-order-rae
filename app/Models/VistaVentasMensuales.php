<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VistaVentasMensuales extends Model
{
    protected $table = 'vista_ventas_mensuales';

    protected $primaryKey = 'periodo';

    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];
}
