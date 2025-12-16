<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $primaryKey = 'id_proveedor';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'direccion',
        'estado',
    ];

    /**
     * Compras realizadas a este proveedor
     */
    public function compras()
    {
        return $this->hasMany(
            Compra::class,
            'proveedor_id',
            'id_proveedor'
        );
    }

    /**
     * Registros de inventario asociados al proveedor
     */
    public function inventarios()
    {
        return $this->hasMany(
            Inventario::class,
            'proveedor_id',
            'id_proveedor'
        );
    }
}
