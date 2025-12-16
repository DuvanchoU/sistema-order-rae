<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produccion extends Model
{
    protected $table = 'produccion';
    protected $primaryKey = 'id_produccion';
    public $timestamps = false;

    protected $fillable = [
        'producto_id',
        'cantidad_producida',
        'fecha_inicio',
        'fecha_fin',
        'estado_produccion',
        'observaciones',
    ];

    /**
     * Producción pertenece a un producto
     */
    public function producto()
    {
        return $this->belongsTo(
            Producto::class,
            'producto_id',
            'id_producto'
        );
    }
}
