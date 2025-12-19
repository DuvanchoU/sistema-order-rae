<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{   
    use SoftDeletes;

    protected $table = 'pedido';
    protected $primaryKey = 'id_pedido';
    public $timestamps = true;

    protected $fillable = [
        'usuario_id',
        'cliente_id',
        'fecha_pedido',
        'fecha_entrega_estimada',
        'total_pedido',
        'estado_pedido',
        'direccion_entrega',
    ];

    protected $dates = ['deleted_at'];


    // Pedido registrado por un usuario
    public function usuario()
    {
        return $this->belongsTo(
            Usuario::class,
            'usuario_id',
            'id_usuario'
        );
    }

    // Pedido pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(
            Cliente::class,
            'cliente_id',
            'id_cliente'
        );
    }

    // Un pedido puede generar una venta
    public function venta()
    {
        return $this->hasOne(
            Venta::class,
            'pedido_id',
            'id_pedido'
        );
    }

    public function getRouteKeyName()
    {
        return 'id_pedido';
    }
}
