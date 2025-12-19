@extends('layouts.app')

@section('title', 'Detalles del Pedido')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-sm border border-gray-200">
    <div class="flex justify-between items-start mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Detalles del Pedido</h1>
        <div class="space-x-2">
            <a href="{{ route('pedidos.edit', $pedido->id_pedido) }}" 
               class="px-3 py-1.5 bg-yellow-100 text-yellow-700 text-sm rounded-md font-medium hover:bg-yellow-200 transition">Editar</a>
            <a href="{{ route('pedidos.index') }}" 
               class="px-3 py-1.5 bg-gray-200 text-gray-800 text-sm rounded-md font-medium hover:bg-gray-300 transition">Volver</a>
        </div>
    </div>

    <div class="space-y-4">
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">ID del Pedido:</strong>
            <span class="text-gray-900">{{ $pedido->id_pedido }}</span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Usuario:</strong>
            <span class="text-gray-900">{{ $pedido->usuario?->nombres ?? 'No asignado' }}</span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Cliente:</strong>
            <span class="text-gray-900">
                {{ $pedido->cliente?->nombre ?? '—' }} {{ $pedido->cliente?->apellido ?? '' }}
            </span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Fecha del Pedido:</strong>
            <span class="text-gray-900">
                {{ \Carbon\Carbon::parse($pedido->fecha_pedido)->format('d/m/Y H:i') }}
            </span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Fecha Entrega Estimada:</strong>
            <span class="text-gray-900">
                {{ $pedido->fecha_entrega_estimada ? \Carbon\Carbon::parse($pedido->fecha_entrega_estimada)->format('d/m/Y') : 'No especificada' }}
            </span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Dirección de Entrega:</strong>
            <span class="text-gray-900">{{ $pedido->direccion_entrega ?? 'No especificada' }}</span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Total:</strong>
            <span class="text-gray-900">${{ number_format($pedido->total_pedido, 2, ',', '.') }}</span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Estado:</strong>
            <span class="text-gray-900">
                @switch($pedido->estado_pedido)
                    @case('PENDIENTE') Pendiente @break
                    @case('EN PROCESO') En proceso @break
                    @case('ENTREGADO') Entregado @break
                    @case('CANCELADO') Cancelado @break
                    @default —
                @endswitch
            </span>
        </div>
    </div>

    @if($pedido->ventas)
        <div class="mt-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-3">Relación con Venta</h2>
            <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                <p class="font-medium text-blue-800 mb-2">Este pedido ya fue convertido en una venta.</p>
                <a href="{{ route('ventas.show', $pedido->venta->id_venta) }}" 
                   class="inline-block px-3 py-1.5 bg-blue-100 text-blue-700 text-sm rounded-md font-medium hover:bg-blue-200 transition">
                    Ver Venta #{{ $pedido->venta->id_venta }}
                </a>
            </div>
        </div>
    @endif
</div>
@endsection