<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Producto;

class Categoria extends Model
{   
    use SoftDeletes;

    protected $table = 'categorias';
    protected $primaryKey = 'id_categorias';
    public $timestamps = true;

    protected $fillable = [
        'nombre_categoria',
        'estado_categoria'
    ];

    protected $dates = ['deleted_at'];

    // Una categoría TIENE MUCHOS productos
    public function productos()
    {
        return $this->hasMany(
            Producto::class,
            'categoria_id',
            'id_categorias'
        );
    }

    
}
