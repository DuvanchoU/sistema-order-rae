@extends('layouts.app')

@section('title', 'Detalles del Método de Pago')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-6">

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">

        {{-- Header --}}
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Detalles del Método de Pago</h1>
                <p class="text-sm text-gray-500 mt-1">
                    ID: {{ $metodopago->id_metodo }}
                </p>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('metodos_pago.edit', $metodopago->id_metodo) }}"
                   class="px-4 py-2 bg-yellow-100 text-yellow-700 rounded-md text-sm font-medium hover:bg-yellow-200 transition">
                    Editar
                </a>

                <a href="{{ route('metodos_pago.index') }}"
                   class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md text-sm font-medium hover:bg-gray-300 transition">
                    Volver
                </a>
            </div>
        </div>

        {{-- Información --}}
        <div class="space-y-5">

            <div class="flex justify-between border-b pb-3">
                <span class="font-medium text-gray-700">Nombre</span>
                <span class="text-gray-900">
                    {{ $metodopago->nombre }}
                </span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-medium text-gray-700">Descripción</span>
                <span class="text-gray-900 text-sm text-right max-w-sm">
                    {{ $metodopago->descripcion ?? 'Sin descripción' }}
                </span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-medium text-gray-700">Ventas asociadas</span>
                <span class="text-gray-900">
                    {{ $metodopago->ventas()->count() }} ventas
                </span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-medium text-gray-700">Creado</span>
                <span class="text-sm text-gray-500">
                    {{ $metodopago->created_at?->format('d/m/Y H:i') ?? '—' }}
                </span>
            </div>
        </div>

        {{-- Eliminar --}}
        <div class="mt-8 pt-6 border-t">
            <form action="{{ route('metodos_pago.destroy', $metodopago->id_metodo) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit"
                        onclick="return confirm('¿Dar de baja este método de pago? Esta acción es reversible, pero puede afectar registros de ventas asociados.')"
                        class="px-4 py-2 bg-red-100 text-red-700 rounded-md font-medium hover:bg-red-200 transition">
                    Dar de baja método
                </button>
            </form>
        </div>

    </div>
</div>
@endsection