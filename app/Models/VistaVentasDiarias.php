<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VistaVentasDiarias extends Model
{
    protected $table = 'vista_ventas_diarias';

    protected $primaryKey = 'fecha';

    public $incrementing = false;
    public $timestamps = false;

    protected $guarded = [];
}
