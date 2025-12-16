<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';
    protected $primaryKey = 'id_compra';
    public $timestamps = false;

    protected $fillable = [
        'proveedor_id',
        'fecha_compra',
        'total_compra',
        'metodo_pago',
        'estado',
        'usuario_id',
    ];

    /**
     * Una compra PERTENECE A un proveedor
     */
    public function proveedor()
    {
        return $this->belongsTo(
            Proveedor::class,
            'proveedor_id',
            'id_proveedor'
        );
    }

    /**
     * Una compra PERTENECE A un usuario
     */
    public function usuario()
    {
        return $this->belongsTo(
            Usuario::class,
            'usuario_id',
            'id_usuario'
        );
    }

    /**
     * Una compra TIENE MUCHOS detalles
     */
    public function detalles()
    {
        return $this->hasMany(
            DetalleCompra::class,
            'compra_id',
            'id_compra'
        );
    }
}
