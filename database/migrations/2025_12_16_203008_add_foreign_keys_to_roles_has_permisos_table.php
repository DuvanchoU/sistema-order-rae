<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('roles_has_permisos', function (Blueprint $table) {
            $table->foreign(['permiso_id'], 'fk_roles_has_permisos_permiso')->references(['id_permiso'])->on('permisos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign(['rol_id'], 'fk_roles_has_permisos_rol')->references(['id_rol'])->on('roles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('roles_has_permisos', function (Blueprint $table) {
            $table->dropForeign('fk_roles_has_permisos_permiso');
            $table->dropForeign('fk_roles_has_permisos_rol');
        });
    }
};
