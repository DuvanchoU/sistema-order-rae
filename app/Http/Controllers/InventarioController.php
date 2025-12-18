<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use App\Models\Bodega;
use App\Models\Proveedor;
use App\Http\Requests\StoreInventarioRequest;
use App\Http\Requests\UpdateInventarioRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class InventarioController extends Controller
{
    public function index(): View
    {
        $inventarios = Inventario::with('producto', 'bodega', 'proveedor')
            ->orderBy('fecha_llegada', 'desc')
            ->paginate(15);
        return view('inventario.index', compact('inventarios'));
    }

    public function create(): View
    {
        $productos = Producto::all(['id_producto', 'codigo_producto', 'referencia_producto']);
        $bodegas = Bodega::all(['id_bodega', 'nombre_bodega']);
        $proveedores = Proveedor::all(['id_proveedor', 'nombre', 'telefono']);
        return view('inventario.create', compact('productos', 'bodegas', 'proveedores'));
    }

    public function store(StoreInventarioRequest $request): RedirectResponse
    {
        Inventario::create($request->validated());
        return redirect()->route('inventario.index')
            ->with('success', 'Registro de inventario creado exitosamente.');
    }

    public function show(Inventario $inventario): View
    {
        $inventario->load('producto', 'bodega', 'proveedor');
        return view('inventario.show', compact('inventario'));
    }

    public function edit(Inventario $inventario): View
    {
        $productos = Producto::all(['id_producto', 'codigo_producto', 'referencia_producto']);
        $bodegas = Bodega::all(['id_bodega', 'nombre_bodega']);
        $proveedores = Proveedor::all(['id_proveedor', 'nombre', 'telefono']);
        return view('inventario.edit', compact('inventario', 'productos', 'bodegas', 'proveedores'));
    }

    public function update(UpdateInventarioRequest $request, Inventario $inventario): RedirectResponse
    {
        $inventario->update($request->validated());
        return redirect()->route('inventario.index')
            ->with('success', 'Registro de inventario actualizado exitosamente.');
    }

    public function destroy(Inventario $inventario): RedirectResponse
    {
        $inventario->delete();
        return redirect()->route('inventario.index')
            ->with('success', 'Registro de inventario dado de baja exitosamente.');
    }
}