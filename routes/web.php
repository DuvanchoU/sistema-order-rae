<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\BodegaController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MetodoPagoController;

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

// Ruta de Inventario
Route::resource('inventario', InventarioController::class)
    ->parameters(['inventario' => 'inventario']);

// Ruta de Proveedores
Route::resource('proveedores', ProveedorController::class)
    ->parameters(['proveedores' => 'proveedor']);

// Ruta de Bodegas
Route::resource('bodegas', BodegaController::class)
    ->parameters(['bodegas' => 'bodega']);

// Ruta de Ventas
Route::resource('ventas', VentaController::class)
    ->except(['edit', 'update']);

// Ruta de Clientes
Route::resource('clientes', ClienteController::class);

// Ruta de Metodo De Pago
Route::resource('metodos_pago', MetodoPagoController::class)
    ->parameters(['metodos_pago'=> 'metodopago']);