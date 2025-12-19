<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compra extends Model
{   
    use SoftDeletes;

    protected $table = 'compras';
    protected $primaryKey = 'id_compra';
    public $timestamps = true;

    protected $fillable = [
        'proveedor_id',
        'fecha_compra',
        'total_compra',
        'metodo_pago',
        'estado',
        'usuario_id',
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
        'fecha_compra' => 'date', // esto convierte automáticamente a Carbon
    ];

    // Una compra PERTENECE A un proveedor
    public function proveedor()
    {
        return $this->belongsTo(
            Proveedor::class,
            'proveedor_id',
            'id_proveedor'
        );
    }

    // Una compra PERTENECE A un usuario
    public function usuario()
    {
        return $this->belongsTo(
            Usuario::class,
            'usuario_id',
            'id_usuario'
        );
    }

    // Una compra TIENE MUCHOS detalles
    public function detalles()
    {
        return $this->hasMany(
            DetalleCompra::class,
            'compra_id',
            'id_compra'
        );
    }

    // Para route model binding
    public function getRouteKeyName()
    {
        return 'id_compra';
    }
}
