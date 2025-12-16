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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->integer('id_usuario', true);
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('documento', 20)->unique('documento');
            $table->string('correo_usuario')->unique('correo_usuario');
            $table->string('contrasena_usuario');
            $table->enum('genero', ['M', 'F', 'O'])->nullable();
            $table->string('telefono', 20)->nullable();
            $table->enum('estado', ['ACTIVO', 'INACTIVO'])->default('ACTIVO');
            $table->timestamp('fecha_registro')->useCurrent();
            $table->integer('id_rol')->index('fk_usuarios_roles_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
