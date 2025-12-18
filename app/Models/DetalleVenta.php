<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    protected $table = 'detalle_venta';
    protected $primaryKey = 'id_detalle';
    public $timestamps = false;

    protected $fillable = [
        'venta_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'subtotal',
    ];

    // El detalle pertenece a una venta
    public function venta()
    {
        return $this->belongsTo(
            Venta::class,
            'venta_id',
            'id_venta'
        );
    }

    // El detalle pertenece a un producto
    public function producto()
    {
        return $this->belongsTo(
            Producto::class,
            'producto_id',
            'id_producto'
        );
    }
}
