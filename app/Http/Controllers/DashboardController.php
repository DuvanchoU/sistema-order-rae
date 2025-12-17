<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Pedido;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalProductos' => Producto::count(),
            'totalCategorias' => Categoria::count(),
        ]);
    }
}
