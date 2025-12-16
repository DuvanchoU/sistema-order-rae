<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'email',
        'direccion',
        'fecha_registro',
        'estado',
    ];

    /**
     * Ventas realizadas al cliente
     */
    public function ventas()
    {
        return $this->hasMany(
            Venta::class,
            'cliente_id',
            'id_cliente'
        );
    }

    /**
     * Pedidos realizados por el cliente
     */
    public function pedidos()
    {
        return $this->hasMany(
            Pedido::class,
            'cliente_id',
            'id_cliente'
        );
    }
}
