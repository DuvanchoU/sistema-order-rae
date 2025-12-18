<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Produccion;
use App\Models\Roles;
use App\Models\Usuario;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalProductos' => Producto::count(),
            'totalCategorias' => Categoria::count(),
            'totalProducciones' => \App\Models\Produccion::count(),
            'totalRoles' => \App\Models\Roles::count(),
            'totalUsuarios' => \App\Models\Usuario::count(),
        ]);
    }
}
