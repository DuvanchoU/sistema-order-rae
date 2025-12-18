@extends('layouts.app')

@section('title', 'Detalles del Cliente')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-6">

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">

        {{-- Header --}}
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Detalles del Cliente</h1>
                <p class="text-sm text-gray-500 mt-1">
                    ID: {{ $cliente->id_cliente }}
                </p>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('clientes.edit', $cliente->id_cliente) }}"
                   class="px-4 py-2 bg-yellow-100 text-yellow-700 rounded-md text-sm font-medium hover:bg-yellow-200 transition">
                    Editar
                </a>

                <a href="{{ route('clientes.index') }}"
                   class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md text-sm font-medium hover:bg-gray-300 transition">
                    Volver
                </a>
            </div>
        </div>

        @php
            $estadoClases = match ($cliente->estado) {
                'ACTIVO'    => 'bg-green-100 text-green-800',
                'INACTIVO'  => 'bg-red-100 text-red-800',
                default     => 'bg-gray-100 text-gray-800',
            };
        @endphp

        {{-- Información --}}
        <div class="space-y-5">

            <div class="flex justify-between border-b pb-3">
                <span class="font-medium text-gray-700">Nombre completo</span>
                <span class="text-gray-900">
                    {{ $cliente->nombre }} {{ $cliente->apellido ?? '' }}
                </span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-medium text-gray-700">Teléfono</span>
                <span class="text-gray-900">
                    {{ $cliente->telefono ?? '—' }}
                </span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-medium text-gray-700">Correo electrónico</span>
                <span class="text-gray-900">
                    {{ $cliente->email ?? '—' }}
                </span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-medium text-gray-700">Dirección</span>
                <span class="text-gray-900">
                    {{ $cliente->direccion ?? 'No especificada' }}
                </span>
            </div>

            <div class="flex justify-between border-b pb-3 items-center">
                <span class="font-medium text-gray-700">Estado</span>
                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $estadoClases }}">
                    {{ $cliente->estado }}
                </span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-medium text-gray-700">Registrado</span>
                <span class="text-sm text-gray-500">
                    {{ $cliente->fecha_registro?->format('d/m/Y H:i') ?? '—' }}
                </span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-medium text-gray-700">Ventas realizadas</span>
                <span class="text-gray-900">
                    {{ $cliente->ventas()->count() }} ventas
                </span>
            </div>

            <div class="flex justify-between pb-3">
                <span class="font-medium text-gray-700">Pedidos realizados</span>
                <span class="text-gray-900">
                    {{ $cliente->pedidos()->count() }} pedidos
                </span>
            </div>
        </div>

        {{-- Eliminar --}}
        <div class="mt-8 pt-6 border-t">
            <form action="{{ route('clientes.destroy', $cliente->id_cliente) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit"
                        onclick="return confirm('¿Dar de baja este cliente? Esta acción es reversible, pero no se perderán los registros asociados.')"
                        class="px-4 py-2 bg-red-100 text-red-700 rounded-md font-medium hover:bg-red-200 transition">
                    Dar de baja cliente
                </button>
            </form>
        </div>

    </div>
</div>
@endsection