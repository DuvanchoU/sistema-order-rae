<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Proveedor;
use App\Models\Usuario;
use App\Http\Requests\StoreCompraRequest;
use App\Http\Requests\UpdateCompraRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CompraController extends Controller
{
    public function index(): View
    {
        $compras = Compra::with(['proveedor', 'usuario'])->paginate(15);
        return view('compras.index', compact('compras'));
    }

    public function create(): View
    {
        $proveedores = Proveedor::all(['id_proveedor', 'nombre']);
        $usuarios = Usuario::all(['id_usuario', 'nombres']);
        return view('compras.create', compact('proveedores', 'usuarios'));
    }

    public function store(StoreCompraRequest $request): RedirectResponse
    {
        Compra::create($request->validated());
        return redirect()->route('compras.index')->with('success', 'Compra creada exitosamente.');
    }

    public function show(Compra $compra): View
    {
        $compra->load(['proveedor', 'usuario', 'detalles.producto']);
        return view('compras.show', compact('compra'));
    }

    public function edit(Compra $compra): View
    {
        $proveedores = Proveedor::all(['id_proveedor', 'nombre']);
        $usuarios = Usuario::all(['id_usuario', 'nombres']);
        return view('compras.edit', compact('compra', 'proveedores', 'usuarios'));
    }

    public function update(UpdateCompraRequest $request, Compra $compra): RedirectResponse
    {
        $compra->update($request->validated());
        return redirect()->route('compras.index')->with('success', 'Compra actualizada exitosamente.');
    }

    public function destroy(Compra $compra): RedirectResponse
    {
        $compra->delete(); // Soft delete
        return redirect()->route('compras.index')->with('success', 'Compra eliminada lógicamente.');
    }
}