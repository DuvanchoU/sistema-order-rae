<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Ejecutar la migración
    public function up(): void
    {
        Schema::table('proveedores', function (Blueprint $table) {
            $table->timestamps();
            $table->softDeletes();
        });
    }

    // Revertir la migración
    public function down(): void
    {
        Schema::table('proveedores', function (Blueprint $table) {
            $table->dropTimestamps();
            $table->dropSoftDeletes();
        });
    }
};
