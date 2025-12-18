<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetalleVenta extends Model
{   
    use SoftDeletes;

    protected $table = 'detalle_venta';
    protected $primaryKey = 'id_detalle';
    public $timestamps = true;

    protected $fillable = [
        'venta_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'subtotal',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
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
