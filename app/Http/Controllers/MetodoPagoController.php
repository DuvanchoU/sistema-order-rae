<?php

namespace App\Http\Controllers;

use App\Models\MetodoPago;
use App\Http\Requests\StoreMetodoPagoRequest;
use App\Http\Requests\UpdateMetodoPagoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MetodoPagoController extends Controller
{
    public function index(): View
    {
        $metodosPago = MetodoPago::orderBy('nombre')->paginate(15);
        return view('metodos_pago.index', compact('metodosPago'));
    }

    public function create(): View
    {
        return view('metodos_pago.create');
    }

    public function store(StoreMetodoPagoRequest $request): RedirectResponse
    {
        MetodoPago::create($request->validated());
        return redirect()->route('metodos_pago.index')
            ->with('success', 'Método de pago creado exitosamente.');
    }

    public function show(MetodoPago $metodopago): View // ← Nombre del parámetro = nombre de la ruta
    {
        $metodopago->load('ventas');
        return view('metodos_pago.show', compact('metodopago'));
    }

    public function edit(MetodoPago $metodopago): View // ← Nombre del parámetro = nombre de la ruta
    {
        return view('metodos_pago.edit', compact('metodopago'));
    }

    public function update(UpdateMetodoPagoRequest $request, MetodoPago $metodopago): RedirectResponse // ← Igual aquí
    {
        $metodopago->update($request->validated());
        return redirect()->route('metodos_pago.index')
            ->with('success', 'Método de pago actualizado exitosamente.');
    }

    public function destroy(MetodoPago $metodopago): RedirectResponse // ← Y aquí
    {
        $metodopago->delete();
        return redirect()->route('metodos_pago.index')
            ->with('success', 'Método de pago dado de baja exitosamente.');
    }
}
