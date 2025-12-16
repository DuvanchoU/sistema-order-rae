<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    protected $table = 'bodegas';
    protected $primaryKey = 'id_bodega';
    public $timestamps = false;

    protected $fillable = [
        'nombre_bodega',
        'direccion',
        'estado',
    ];

    /**
     * Una bodega tiene muchos registros de inventario
     */
    public function inventarios()
    {
        return $this->hasMany(
            Inventario::class,
            'bodega_id',
            'id_bodega'
        );
    }
}
