<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'inventario';
    protected $primaryKey = 'id_inventario';
    public $timestamps = false;

    protected $fillable = [
        'producto_id',
        'bodega_id',
        'proveedor_id',
        'cantidad_disponible',
        'fecha_llegada',
        'fecha_registro',
        'estado',
    ];

    /**
     * Inventario pertenece a un producto
     */
    public function producto()
    {
        return $this->belongsTo(
            Producto::class,
            'producto_id',
            'id_producto'
        );
    }

    /**
     * Inventario pertenece a una bodega
     */
    public function bodega()
    {
        return $this->belongsTo(
            Bodega::class,
            'bodega_id',
            'id_bodega'
        );
    }

    /**
     * Inventario pertenece a un proveedor (opcional)
     */
    public function proveedor()
    {
        return $this->belongsTo(
            Proveedor::class,
            'proveedor_id',
            'id_proveedor'
        );
    }
}
