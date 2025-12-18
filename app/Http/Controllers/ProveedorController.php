<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Http\Requests\StoreProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProveedorController extends Controller
{
    public function index(): View
    {
        $proveedores = Proveedor::orderBy('nombre')->paginate(15);
        return view('proveedores.index', compact('proveedores'));
    }

    public function create(): View
    {
        return view('proveedores.create');
    }

    public function store(StoreProveedorRequest $request): RedirectResponse
    {
        Proveedor::create($request->validated());
        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor creado exitosamente.');
    }

    public function show(Proveedor $proveedor): View
    {
        $proveedor->load('compras', 'inventarios');
        return view('proveedores.show', compact('proveedor'));
    }

    public function edit(Proveedor $proveedor): View
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(UpdateProveedorRequest $request, Proveedor $proveedor): RedirectResponse
    {
        $proveedor->update($request->validated());
        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor actualizado exitosamente.');
    }

    public function destroy(Proveedor $proveedor): RedirectResponse
    {
        $proveedor->delete();
        return redirect()->route('proveedores.index')
            ->with('success', 'Proveedor dado de baja exitosamente.');
    }
}
