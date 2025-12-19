<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    protected $table = 'detalle_compra';
    protected $primaryKey = 'id_detalle_compra';
    public $timestamps = false;

    protected $fillable = [
        'compra_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'subtotal',
    ];

    // Un detalle PERTENECE A una compra
    public function compra()
    {
        return $this->belongsTo(
            Compra::class,
            'compra_id',
            'id_compra'
        );
    }

    // detalle PERTENECE A un producto
    public function producto()
    {
        return $this->belongsTo(
            Producto::class,
            'producto_id',
            'id_producto'
        );
    }
}
