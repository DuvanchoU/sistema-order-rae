<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RolesController;

Route::get('/', function () {
    return view('welcome');
});

// Ruta de Productos
Route::resource('productos', ProductoController::class)
    ->parameters(['productos' => 'producto']);

// Ruta de Categorías
Route::resource('categorias', CategoriaController::class)
    ->parameters(['categorias' => 'categoria']);

// Ruta del Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

// Ruta de Producción
Route::resource('produccion', ProduccionController::class)
    ->parameters(['produccion' => 'produccion']);

// Ruta de Usuarios
Route::resource('usuarios', UsuariosController::class)
    ->parameters(['usuarios' => 'usuario']);

// Ruta de Roles
Route::resource('roles', RolesController::class)
    ->parameters(['roles' => 'rol']);