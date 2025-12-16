<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'permisos';
    protected $primaryKey = 'id_permiso';
    public $timestamps = false;

    protected $fillable = [
        'nombre_permiso',
        'descripcion',
    ];

    /**
     * Roles que tienen este permiso
     */
    public function roles()
    {
        return $this->belongsToMany(
            Roles::class,
            'roles_has_permisos',
            'permiso_id',
            'rol_id'
        );
    }
}
