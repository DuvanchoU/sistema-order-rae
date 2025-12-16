<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id_producto';
    public $timestamps = false;

    protected $fillable = [
        'codigo_producto',
        'referencia_producto',
        'categoria_id',
        'tipo_madera',
        'color_producto',
        'precio_actual',
    ];

    /**
     * Un producto PERTENECE A una categoría
     */
    public function categoria()
    {
        return $this->belongsTo(
            Categoria::class,
            'categoria_id',
            'id_categorias'
        );
    }

    /**
     * Un producto TIENE MUCHOS detalles de compra
     */
    public function detallesCompra()
    {
        return $this->hasMany(
            DetalleCompra::class,
            'producto_id',
            'id_producto'
        );
    }

    /**
     * Un producto TIENE MUCHOS detalles de venta
     */
    public function detallesVenta()
    {
        return $this->hasMany(
            DetalleVenta::class,
            'producto_id',
            'id_producto'
        );
    }

    /**
     * Un producto TIENE MUCHOS inventarios
     */
    public function inventarios()
    {
        return $this->hasMany(
            Inventario::class,
            'producto_id',
            'id_producto'
        );
    }

    public function producciones()
    {
        return $this->hasMany(
            Produccion::class,
            'producto_id',
            'id_producto'
        );
    }

}
