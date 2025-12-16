<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VistaVentasSemanales extends Model
{
    protected $table = 'vista_ventas_semanales';

    protected $primaryKey = 'semana_iso';

    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];
}
