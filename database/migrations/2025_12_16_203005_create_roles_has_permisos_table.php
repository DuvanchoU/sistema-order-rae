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
        Schema::create('roles_has_permisos', function (Blueprint $table) {
            $table->integer('rol_id')->index('fk_roles_has_permisos_rol_idx');
            $table->integer('permiso_id')->index('fk_roles_has_permisos_permiso_idx');

            $table->primary(['rol_id', 'permiso_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles_has_permisos');
    }
};
