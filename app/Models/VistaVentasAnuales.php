<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VistaVentasAnuales extends Model
{
    protected $table = 'vista_ventas_anuales';

    protected $primaryKey = 'anio';

    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];
}
