<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Http\Requests\StoreBodegaRequest;
use App\Http\Requests\UpdateBodegaRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BodegaController extends Controller
{
    public function index(): View
    {
        $bodegas = Bodega::orderBy('nombre_bodega')->paginate(15);
        return view('bodegas.index', compact('bodegas'));
    }

    public function create(): View
    {
        return view('bodegas.create');
    }

    public function store(StoreBodegaRequest $request): RedirectResponse
    {
        Bodega::create($request->validated());
        return redirect()->route('bodegas.index')
            ->with('success', 'Bodega creada exitosamente.');
    }

    public function show(Bodega $bodega): View
    {
        $bodega->load('inventarios');
        return view('bodegas.show', compact('bodega'));
    }

    public function edit(Bodega $bodega): View
    {
        return view('bodegas.edit', compact('bodega'));
    }

    public function update(UpdateBodegaRequest $request, Bodega $bodega): RedirectResponse
    {
        $bodega->update($request->validated());
        return redirect()->route('bodegas.index')
            ->with('success', 'Bodega actualizada exitosamente.');
    }

    public function destroy(Bodega $bodega): RedirectResponse
    {
        $bodega->delete();
        return redirect()->route('bodegas.index')
            ->with('success', 'Bodega dada de baja exitosamente.');
    }
}
