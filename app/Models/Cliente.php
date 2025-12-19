<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'email',
        'direccion',
        'fecha_registro',
        'estado',
    ];

    protected $casts = [
        'fecha_registro' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'id_cliente';
    }
    
    // Ventas realizadas al cliente
    public function ventas()
    {
        return $this->hasMany(
            Venta::class,
            'cliente_id',
            'id_cliente'
        );
    }

    // Pedidos realizados por el cliente
    public function pedidos()
    {
        return $this->hasMany(
            Pedido::class,
            'cliente_id',
            'id_cliente'
        );
    }
    
}
