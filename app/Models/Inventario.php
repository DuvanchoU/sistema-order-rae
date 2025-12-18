<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Producto;
use App\Models\Bodega;
use App\Models\Proveedor;   

class Inventario extends Model
{   
    use SoftDeletes;

    protected $table = 'inventario';
    protected $primaryKey = 'id_inventario';
    public $timestamps = true;

    protected $fillable = [
        'producto_id',
        'bodega_id',
        'proveedor_id',
        'cantidad_disponible',
        'fecha_llegada',
        'fecha_registro',
        'estado',
    ];

    protected $casts = [
        'fecha_llegada'  => 'date',
        'fecha_registro' => 'datetime',
        'deleted_at'     => 'datetime',
    ];
    
    // Inventario pertenece a un producto
    public function producto()
    {
        return $this->belongsTo(
            Producto::class,
            'producto_id',
            'id_producto'
        );
    }

    // Inventario pertenece a una bodega
    public function bodega()
    {
        return $this->belongsTo(
            Bodega::class,
            'bodega_id',
            'id_bodega'
        );
    }

    // Inventario pertenece a un proveedor 
    public function proveedor()
    {
        return $this->belongsTo(
            Proveedor::class,
            'proveedor_id',
            'id_proveedor'
        );
    }
}
