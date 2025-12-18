@extends('layouts.app')

@section('title', 'Detalles de la Bodega')

@section('content')
<div class="bg-[#F8F5F0] min-h-screen px-6 py-6">
    <div class="max-w-3xl mx-auto">

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">

            {{-- Header --}}
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Detalles de la Bodega</h1>
                    <p class="text-sm text-gray-500 mt-1">
                        ID: {{ $bodega->id_bodega }}
                    </p>
                </div>

                <div class="flex gap-2">
                    <a href="{{ route('bodegas.edit', $bodega->id_bodega) }}"
                       class="px-3 py-1.5 bg-yellow-100 text-yellow-700 text-sm rounded-md font-medium hover:bg-yellow-200 transition">
                        Editar
                    </a>

                    <a href="{{ route('bodegas.index') }}"
                       class="px-3 py-1.5 bg-gray-200 text-gray-800 text-sm rounded-md font-medium hover:bg-gray-300 transition">
                        Volver
                    </a>
                </div>
            </div>

            {{-- Contenido --}}
            <div class="space-y-5 text-sm">

                {{-- Nombre --}}
                <div class="flex justify-between items-center border-b border-gray-100 pb-3">
                    <span class="text-gray-600">Nombre</span>
                    <span class="font-medium text-gray-900">
                        {{ $bodega->nombre_bodega }}
                    </span>
                </div>

                {{-- Dirección --}}
                <div class="flex justify-between items-center border-b border-gray-100 pb-3">
                    <span class="text-gray-600">Dirección</span>
                    <span class="text-gray-900">
                        {{ $bodega->direccion ?? 'No especificada' }}
                    </span>
                </div>

                {{-- Estado --}}
                @php
                    $estadoClases = match($bodega->estado) {
                        'ACTIVA' => 'bg-green-100 text-green-800',
                        default  => 'bg-red-100 text-red-800'
                    };
                @endphp

                <div class="flex justify-between items-center border-b border-gray-100 pb-3">
                    <span class="text-gray-600">Estado</span>
                    <span class="px-2.5 py-0.5 inline-flex text-xs font-semibold rounded-full {{ $estadoClases }}">
                        {{ $bodega->estado }}
                    </span>
                </div>

                {{-- Inventario --}}
                <div class="flex justify-between items-center">
                    <span class="text-gray-600">Registros en inventario</span>
                    <span class="font-medium text-gray-900">
                        {{ $bodega->inventarios()->count() }} registros
                    </span>
                </div>

            </div>

            {{-- Acción peligrosa --}}
            <div class="mt-8 pt-6 border-t border-gray-200">
                <form action="{{ route('bodegas.destroy', $bodega->id_bodega) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            onclick="return confirm('¿Está seguro de dar de baja esta bodega? Esta acción es reversible, pero puede afectar registros de inventario asociados.')"
                            class="px-4 py-2 bg-red-100 text-red-700 rounded-md text-sm font-medium hover:bg-red-200 transition">
                        Dar de baja bodega
                    </button>
                </form>
            </div>

        </div>

    </div>
</div>
@endsection
