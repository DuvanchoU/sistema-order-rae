<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;

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