<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = [
        'nombres',
        'apellidos',
        'documento',
        'correo_usuario',
        'contrasena_usuario',
        'genero',
        'telefono',
        'estado',
        'id_rol'
    ];

    protected $hidden = [
        'contrasena_usuario'
    ];

    /**
     * Usuario pertenece a un rol
     */
    public function rol()
    {
        return $this->belongsTo(
            Roles::class,
            'id_rol',
            'id_rol'
        );
    }

    /**
     * Ventas realizadas por el usuario
     */
    public function ventas()
    {
        return $this->hasMany(
            Venta::class,
            'usuario_id',
            'id_usuario'
        );
    }

    /**
     * Compras registradas por el usuario
     */
    public function compras()
    {
        return $this->hasMany(
            Compra::class,
            'usuario_id',
            'id_usuario'
        );
    }

    /**
     * Pedidos gestionados por el usuario
     */
    public function pedidos()
    {
        return $this->hasMany(
            Pedido::class,
            'usuario_id',
            'id_usuario'
        );
    }
}
