@extends('layouts.app')

@section('title', 'Editar Pedido')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-sm border border-gray-200">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Editar Pedido</h1>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-lg">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pedidos.update', $pedido->id_pedido) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-5">
            <label for="usuario_id" class="block text-sm font-medium text-gray-700 mb-1">Usuario *</label>
            <select
                name="usuario_id"
                id="usuario_id"
                class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                required
            >
                <option value="">-- Seleccione un usuario --</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id_usuario }}" 
                        {{ (old('usuario_id', $pedido->usuario_id) == $usuario->id_usuario) ? 'selected' : '' }}>
                        {{ $usuario->nombres }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="cliente_id" class="block text-sm font-medium text-gray-700 mb-1">Cliente *</label>
            <select
                name="cliente_id"
                id="cliente_id"
                class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                required
            >
                <option value="">-- Seleccione un cliente --</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}" 
                        {{ (old('cliente_id', $pedido->cliente_id) == $cliente->id_cliente) ? 'selected' : '' }}>
                        {{ $cliente->nombre }} {{ $cliente->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="total_pedido" class="block text-sm font-medium text-gray-700 mb-1">Total del Pedido ($)*</label>
            <input
                type="number"
                step="0.01"
                name="total_pedido"
                id="total_pedido"
                value="{{ old('total_pedido', $pedido->total_pedido) }}"
                class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                min="0"
                required
            >
        </div>

        <div class="mb-5">
            <label for="estado_pedido" class="block text-sm font-medium text-gray-700 mb-1">Estado del Pedido *</label>
            <select
                name="estado_pedido"
                id="estado_pedido"
                class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                required
            >
                <option value="">-- Seleccione estado --</option>
                <option value="PENDIENTE" {{ (old('estado_pedido', $pedido->estado_pedido) == 'PENDIENTE') ? 'selected' : '' }}>Pendiente</option>
                <option value="EN PROCESO" {{ (old('estado_pedido', $pedido->estado_pedido) == 'EN PROCESO') ? 'selected' : '' }}>En proceso</option>
                <option value="ENTREGADO" {{ (old('estado_pedido', $pedido->estado_pedido) == 'ENTREGADO') ? 'selected' : '' }}>Entregado</option>
                <option value="CANCELADO" {{ (old('estado_pedido', $pedido->estado_pedido) == 'CANCELADO') ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>

        <div class="mb-5">
            <label for="fecha_entrega_estimada" class="block text-sm font-medium text-gray-700 mb-1">Fecha de Entrega Estimada</label>
            <input
                type="date"
                name="fecha_entrega_estimada"
                id="fecha_entrega_estimada"
                value="{{ old('fecha_entrega_estimada', $pedido->fecha_entrega_estimada ? \Carbon\Carbon::parse($pedido->fecha_entrega_estimada)->format('Y-m-d') : '') }}"
                class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
            >
        </div>

        <div class="mb-6">
            <label for="direccion_entrega" class="block text-sm font-medium text-gray-700 mb-1">Dirección de Entrega</label>
            <textarea
                name="direccion_entrega"
                id="direccion_entrega"
                rows="3"
                class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
            >{{ old('direccion_entrega', $pedido->direccion_entrega) }}</textarea>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('pedidos.index') }}" 
               class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md font-medium hover:bg-gray-300 transition">Cancelar</a>
            <button type="submit" 
                    class="px-4 py-2 bg-[#CBB8A0] hover:bg-[#B9A489] text-white rounded-lg font-medium transition shadow-sm">
                Actualizar Pedido
            </button>
        </div>
    </form>
</div>
@endsection