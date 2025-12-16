<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    protected $table = 'metodos_pago';
    protected $primaryKey = 'id_metodo';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    /**
     * Ventas realizadas con este método de pago
     */
    public function ventas()
    {
        return $this->hasMany(
            Venta::class,
            'metodo_pago_id',
            'id_metodo'
        );
    }
}
