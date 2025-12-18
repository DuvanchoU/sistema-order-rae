<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    protected $primaryKey = 'id_venta';
    public $timestamps = false;

    protected $fillable = [
        'usuario_id',
        'cliente_id',
        'fecha_venta',
        'total_venta',
        'estado_venta',
        'metodo_pago_id',
    ];

    // Una venta la realiza un usuario (vendedor)
    public function usuario()
    {
        return $this->belongsTo(
            Usuario::class,
            'usuario_id',
            'id_usuario'
        );
    }

    // Una venta pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(
            Cliente::class,
            'cliente_id',
            'id_cliente'
        );
    }

    // Método de pago usado en la venta
    public function metodoPago()
    {
        return $this->belongsTo(
            MetodoPago::class,
            'metodo_pago_id',
            'id_metodo'
        );
    }

    // Una venta tiene muchos detalles
    public function detalles()
    {
        return $this->hasMany(
            DetalleVenta::class,
            'venta_id',
            'id_venta'
        );
    }
}
