<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Inventario;


class Bodega extends Model
{   
    use SoftDeletes; 

    protected $table = 'bodegas';
    protected $primaryKey = 'id_bodega';
    public $timestamps = true;

    protected $fillable = [
        'nombre_bodega',
        'direccion',
        'estado',
    ];

    protected $dates = ['deleted_at'];
    
    // Una bodega tiene muchos registros de inventario
    public function inventarios()
    {
        return $this->hasMany(
            Inventario::class,
            'bodega_id',
            'id_bodega'
        );
    }
}
