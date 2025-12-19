@extends('layouts.app')

@section('title', 'Crear Nueva Compra')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-sm border border-gray-200">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Registrar Nueva Compra</h1>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-lg">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('compras.store') }}" method="POST">
        @csrf

        <div class="mb-5">
            <label for="proveedor_id" class="block text-sm font-medium text-gray-700 mb-1">Proveedor *</label>
            <select
                name="proveedor_id"
                id="proveedor_id"
                class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                required
            >
                <option value="">-- Seleccione un proveedor --</option>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->id_proveedor }}" {{ old('proveedor_id') == $proveedor->id_proveedor ? 'selected' : '' }}>
                        {{ $proveedor->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="usuario_id" class="block text-sm font-medium text-gray-700 mb-1">Usuario (opcional)</label>
            <select
                name="usuario_id"
                id="usuario_id"
                class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
            >
                <option value="">-- No asignar --</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id_usuario }}" {{ old('usuario_id') == $usuario->id_usuario ? 'selected' : '' }}>
                        {{ $usuario->nombres }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
            <label for="fecha_compra" class="block text-sm font-medium text-gray-700 mb-1">Fecha de Compra *</label>
            <input
                type="date"
                name="fecha_compra"
                id="fecha_compra"
                value="{{ old('fecha_compra') ?? date('Y-m-d') }}"
                class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                required
            >
        </div>

        <div class="mb-5">
            <label for="total_compra" class="block text-sm font-medium text-gray-700 mb-1">Total de la Compra ($)*</label>
            <input
                type="number"
                step="0.01"
                name="total_compra"
                id="total_compra"
                value="{{ old('total_compra') }}"
                class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                min="0"
                required
            >
        </div>

        <div class="mb-5">
            <label for="metodo_pago" class="block text-sm font-medium text-gray-700 mb-1">Método de Pago (opcional)</label>
            <input
                type="text"
                name="metodo_pago"
                id="metodo_pago"
                value="{{ old('metodo_pago') }}"
                class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                placeholder="Efectivo, Transferencia, etc."
            >
        </div>

        <div class="mb-6">
            <label for="estado" class="block text-sm font-medium text-gray-700 mb-1">Estado *</label>
            <select
                name="estado"
                id="estado"
                class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                required
            >
                <option value="">-- Seleccione estado --</option>
                <option value="PENDIENTE" {{ old('estado') == 'PENDIENTE' ? 'selected' : '' }}>Pendiente</option>
                <option value="RECIBIDA" {{ old('estado') == 'RECIBIDA' ? 'selected' : '' }}>Recibida</option>
                <option value="CANCELADA" {{ old('estado') == 'CANCELADA' ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('compras.index') }}" 
               class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md font-medium hover:bg-gray-300 transition">Cancelar</a>
            <button type="submit" 
                    class="px-4 py-2 bg-[#CBB8A0] hover:bg-[#B9A489] text-white rounded-lg font-medium transition shadow-sm">
                Guardar Compra
            </button>
        </div>
    </form>
</div>
@endsection