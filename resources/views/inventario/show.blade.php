@extends('layouts.app')

@section('title', 'Detalles del Inventario')

@section('content')
<div class="bg-[#F8F5F0] min-h-screen px-6 py-6">

    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-sm border border-gray-200 p-6">

        {{-- Header --}}
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Detalles del Inventario</h1>
                <p class="text-sm text-gray-500 mt-1">ID: {{ $inventario->id_inventario }}</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('inventario.edit', $inventario->id_inventario) }}"
                   class="px-3 py-1.5 bg-yellow-100 text-yellow-700 text-sm rounded-md font-medium hover:bg-yellow-200 transition">
                    Editar
                </a>
                <a href="{{ route('inventario.index') }}"
                   class="px-3 py-1.5 bg-gray-200 text-gray-800 text-sm rounded-md font-medium hover:bg-gray-300 transition">
                    Volver
                </a>
            </div>
        </div>

        @php
            $estadoClases = match($inventario->estado) {
                'DISPONIBLE' => 'bg-green-100 text-green-800',
                'COMPROMETIDO' => 'bg-yellow-100 text-yellow-800',
                default => 'bg-red-100 text-red-800'
            };
        @endphp

        {{-- Información --}}
        <div class="space-y-4 text-sm">

            <div class="flex justify-between border-b pb-2">
                <strong>Producto:</strong>
                <span class="text-right">
                    {{ $inventario->producto->codigo_producto }}<br>
                    <span class="text-xs text-gray-500">
                        {{ $inventario->producto->referencia_producto ?? 'Sin referencia' }}
                    </span>
                </span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <strong>Bodega:</strong>
                <span>{{ $inventario->bodega->nombre_bodega ?? 'Sin bodega' }}</span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <strong>Proveedor:</strong>
                <span>{{ $inventario->proveedor->nombre_proveedor ?? 'Sin proveedor' }}</span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <strong>Cantidad disponible:</strong>
                <span class="font-medium">{{ $inventario->cantidad_disponible }}</span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <strong>Fecha de llegada:</strong>
                <span>{{ $inventario->fecha_llegada?->format('d/m/Y') ?? 'No especificada' }}</span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <strong>Registrado:</strong>
                <span class="text-gray-500">{{ $inventario->fecha_registro?->format('d/m/Y H:i') ?? '—' }}</span>
            </div>

            <div class="flex justify-between">
                <strong>Estado:</strong>
                <span class="px-2 py-0.5 inline-flex text-xs font-semibold rounded-full {{ $estadoClases }}">
                    {{ $inventario->estado }}
                </span>
            </div>

        </div>

        {{-- Acción --}}
        <div class="mt-8 pt-6 border-t">
            <form action="{{ route('inventario.destroy', $inventario->id_inventario) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        onclick="return confirm('¿Dar de baja este registro de inventario?')"
                        class="px-4 py-2 bg-red-100 text-red-700 rounded-md font-medium hover:bg-red-200 transition">
                    Dar de baja registro
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
