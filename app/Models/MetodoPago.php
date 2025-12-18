<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MetodoPago extends Model
{   
    use SoftDeletes;

    protected $table = 'metodos_pago';
    protected $primaryKey = 'id_metodo';
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    // Ventas realizadas con este método de pago
    public function ventas()
    {
        return $this->hasMany(
            Venta::class,
            'metodo_pago_id',
            'id_metodo'
        );
    }

    public function getRouteKeyName()
    {
        return 'id_metodo';
    }
}
