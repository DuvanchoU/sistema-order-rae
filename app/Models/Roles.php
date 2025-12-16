<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id_rol';
    public $timestamps = false;

    protected $fillable = [
        'nombre_rol',
        'descripcion',
    ];

    /**
     * Permisos asociados a este rol
     */
    public function permisos()
    {
        return $this->belongsToMany(
            Permiso::class,
            'roles_has_permisos',
            'rol_id',
            'permiso_id'
        );
    }

    /**
     * Usuarios que tienen este rol
     */
    public function usuarios()
    {
        return $this->hasMany(
            Usuario::class,
            'id_rol',
            'id_rol'
        );  
}
}
