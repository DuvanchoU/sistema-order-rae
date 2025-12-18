@extends('layouts.app')

@section('title', 'Editar Registro de Inventario')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Editar Inventario</h1>       
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-lg border border-red-100">
                <strong class="font-medium">Corrige los siguientes errores:</strong>
                <ul class="mt-2 list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('inventario.update', $inventario->id_inventario) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Producto -->
            <div class="mb-5">
                <label for="producto_id" class="block text-sm font-medium text-gray-700 mb-1">Producto *</label>
                <select
                    name="producto_id"
                    id="producto_id"
                    class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                    required
                >
                    <option value="">-- Seleccione un producto --</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id_producto }}" {{ (old('producto_id', $inventario->producto_id) == $producto->id_producto) ? 'selected' : '' }}>
                            {{ $producto->codigo_producto }} – {{ $producto->referencia_producto ?? 'Sin referencia' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Bodega -->
            <div class="mb-5">
                <label for="bodega_id" class="block text-sm font-medium text-gray-700 mb-1">Bodega *</label>
                <select
                    name="bodega_id"
                    id="bodega_id"
                    class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                    required
                >
                    <option value="">-- Seleccione una bodega --</option>
                    @foreach($bodegas as $bodega)
                        <option value="{{ $bodega->id_bodega }}" {{ (old('bodega_id', $inventario->bodega_id) == $bodega->id_bodega) ? 'selected' : '' }}>
                            {{ $bodega->nombre_bodega }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Proveedor -->
            <div class="mb-5">
                <label for="proveedor_id" class="block text-sm font-medium text-gray-700 mb-1">Proveedor</label>
                <select
                    name="proveedor_id"
                    id="proveedor_id"
                    class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                >
                    <option value="">-- Sin proveedor --</option>
                    @foreach($proveedores as $proveedor)
                        <option value="{{ $proveedor->id_proveedor }}" {{ (old('proveedor_id', $inventario->proveedor_id) == $proveedor->id_proveedor) ? 'selected' : '' }}>
                            {{ $proveedor->nombre }} ({{ $proveedor->telefono ?? 'Sin contacto' }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Cantidad disponible -->
            <div class="mb-5">
                <label for="cantidad_disponible" class="block text-sm font-medium text-gray-700 mb-1">Cantidad Disponible *</label>
                <input
                    type="number"
                    name="cantidad_disponible"
                    id="cantidad_disponible"
                    value="{{ old('cantidad_disponible', $inventario->cantidad_disponible) }}"
                    min="0"
                    max="100000"
                    class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                    required
                >
            </div>

            <!-- Fecha de llegada -->
            <div class="mb-5">
                <label for="fecha_llegada" class="block text-sm font-medium text-gray-700 mb-1">Fecha de Llegada</label>
                <input
                    type="date"
                    name="fecha_llegada"
                    id="fecha_llegada"
                    value="{{ old('fecha_llegada', $inventario->fecha_llegada?->format('Y-m-d')) }}"
                    class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                >
            </div>

            <!-- Estado -->
            <div class="mb-5">
                <label for="estado" class="block text-sm font-medium text-gray-700 mb-1">Estado *</label>
                <select
                    name="estado"
                    id="estado"
                    class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                    required
                >
                    <option value="">-- Seleccione estado --</option>
                    <option value="DISPONIBLE" {{ (old('estado', $inventario->estado) == 'DISPONIBLE') ? 'selected' : '' }}>DISPONIBLE</option>
                    <option value="COMPROMETIDO" {{ (old('estado', $inventario->estado) == 'COMPROMETIDO') ? 'selected' : '' }}>COMPROMETIDO</option>
                    <option value="AGOTADO" {{ (old('estado', $inventario->estado) == 'AGOTADO') ? 'selected' : '' }}>AGOTADO</option>
                </select>
            </div>

            <!-- Botones -->
            <div class="flex justify-end gap-3">
                <a href="{{ route('inventario.index') }}"
                   class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md font-medium hover:bg-gray-300 transition">
                    Cancelar
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-[#CBB8A0] hover:bg-[#B9A489] text-white rounded-lg font-medium transition shadow-sm">
                    Actualizar Inventario
                </button>
            </div>
        </form>
    </div>
</div>
@endsection