@extends('layouts.app')

@section('title', 'Detalles de la Venta')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-6">

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">

        {{-- Header --}}
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Detalles de la Venta</h1>
                <p class="text-sm text-gray-500 mt-1">
                    ID: {{ $venta->id_venta }}
                </p>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('ventas.index') }}"
                   class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md text-sm font-medium hover:bg-gray-300 transition">
                    Volver
                </a>
            </div>
        </div>

        @php
            $estadoClases = match ($venta->estado_venta) {
                'COMPLETADA'   => 'bg-green-100 text-green-800',
                'PENDIENTE'    => 'bg-yellow-100 text-yellow-800',
                'CANCELADA'    => 'bg-red-100 text-red-800',
                default        => 'bg-gray-100 text-gray-800',
            };
        @endphp

        {{-- Información --}}
        <div class="space-y-5">

            <div class="flex justify-between border-b pb-3">
                <span class="font-medium text-gray-700">Fecha de venta</span>
                <span class="text-gray-900">
                    {{ $venta->fecha_venta?->format('d/m/Y H:i') ?? '—' }}
                </span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-medium text-gray-700">Cliente</span>
                <span class="text-gray-900">
                    {{ $venta->cliente?->nombre ?? 'No asignado' }}
                    @if($venta->cliente)
                        <br><span class="text-sm text-gray-500">{{ $venta->cliente->apellido }}</span>
                    @endif
                </span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-medium text-gray-700">Vendedor</span>
                <span class="text-gray-900">
                    {{ $venta->usuario->nombres ?? '—' }}
                    @if($venta->usuario)
                        <br><span class="text-sm text-gray-500">{{ $venta->usuario->apellidos }}</span>
                    @endif
                </span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-medium text-gray-700">Método de pago</span>
                <span class="text-gray-900">
                    {{ $venta->metodoPago?->nombre ?? 'No especificado' }}
                </span>
            </div>

            <div class="flex justify-between border-b pb-3 items-center">
                <span class="font-medium text-gray-700">Estado</span>
                <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $estadoClases }}">
                    {{ $venta->estado_venta }}
                </span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-medium text-gray-700">Total</span>
                <span class="text-xl font-bold text-gray-900">
                    ${{ number_format($venta->total_venta, 2, ',', '.') }}
                </span>
            </div>

            <div class="flex justify-between border-b pb-3">
                <span class="font-medium text-gray-700">Creado</span>
                <span class="text-sm text-gray-500">
                    {{ $venta->created_at?->format('d/m/Y H:i') ?? '—' }}
                </span>
            </div>
        </div>

        {{-- Productos --}}
        <div class="mt-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Productos</h2>

            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Cantidad</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Precio</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($venta->detalles as $detalle)
                            <tr>
                                <td class="px-4 py-3 text-sm">
                                    <div class="font-medium">{{ $detalle->producto->codigo_producto }}</div>
                                    <div class="text-gray-500 text-xs">{{ $detalle->producto->referencia_producto ?? 'Sin ref.' }}</div>
                                </td>
                                <td class="px-4 py-3 text-sm">{{ $detalle->cantidad }}</td>
                                <td class="px-4 py-3 text-sm">${{ number_format($detalle->precio_unitario, 2, ',', '.') }}</td>
                                <td class="px-4 py-3 text-sm font-medium">${{ number_format($detalle->subtotal, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Eliminar --}}
        <div class="mt-8 pt-6 border-t">
            <form action="{{ route('ventas.destroy', $venta->id_venta) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit"
                        onclick="return confirm('¿Dar de baja esta venta? Esta acción es irreversible y no se podrá recuperar.')"
                        class="px-4 py-2 bg-red-100 text-red-700 rounded-md font-medium hover:bg-red-200 transition">
                    Dar de baja venta
                </button>
            </form>
        </div>

    </div>
</div>
@endsection