<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Usuario;
use App\Models\Cliente;
use App\Http\Requests\StorePedidoRequest;
use App\Http\Requests\UpdatePedidoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PedidoController extends Controller
{
    public function index(): View
    {
        $pedidos = Pedido::with(['usuario', 'cliente'])->paginate(15);
        return view('pedidos.index', compact('pedidos'));
    }

    public function create(): View
    {
        $usuarios = Usuario::all(['id_usuario', 'nombres']);
        $clientes = Cliente::all(['id_cliente', 'nombre', 'apellido']);
        return view('pedidos.create', compact('usuarios', 'clientes'));
    }

    public function store(StorePedidoRequest $request): RedirectResponse
    {
        Pedido::create($request->validated() + ['fecha_pedido' => $request->fecha_pedido ?? now()]);
        return redirect()->route('pedidos.index')->with('success', 'Pedido creado exitosamente.');
    }

    public function show(Pedido $pedido): View
    {
        $pedido->load(['usuario', 'cliente']);
        return view('pedidos.show', compact('pedido'));
    }

    public function edit(Pedido $pedido): View
    {
        $usuarios = Usuario::all(['id_usuario', 'nombres']);
        $clientes = Cliente::all(['id_cliente', 'nombre', 'apellido']);
        return view('pedidos.edit', compact('pedido', 'usuarios', 'clientes'));
    }

    public function update(UpdatePedidoRequest $request, Pedido $pedido): RedirectResponse
    {
        $pedido->update($request->validated());
        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado exitosamente.');
    }

    public function destroy(Pedido $pedido): RedirectResponse
    {
        $pedido->delete(); // Soft delete
        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado lógicamente.');
    }
}