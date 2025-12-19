@extends('layouts.app')

@section('title', 'Detalles de la Compra')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-sm border border-gray-200">
    <div class="flex justify-between items-start mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Detalles de la Compra</h1>
        <div class="space-x-2">
            <a href="{{ route('compras.edit', $compra->id_compra) }}" 
               class="px-3 py-1.5 bg-yellow-100 text-yellow-700 text-sm rounded-md font-medium hover:bg-yellow-200 transition">Editar</a>
            <a href="{{ route('compras.index') }}" 
               class="px-3 py-1.5 bg-gray-200 text-gray-800 text-sm rounded-md font-medium hover:bg-gray-300 transition">Volver</a>
        </div>
    </div>

    <div class="space-y-4">
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">ID de la Compra:</strong>
            <span class="text-gray-900">{{ $compra->id_compra }}</span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Proveedor:</strong>
            <span class="text-gray-900">{{ $compra->proveedor?->nombre ?? 'No asignado' }}</span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Usuario:</strong>
            <span class="text-gray-900">{{ $compra->usuario?->nombres ?? 'No asignado' }}</span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Fecha de Compra:</strong>
            <span class="text-gray-900">
                {{ \Carbon\Carbon::parse($compra->fecha_compra)->format('d/m/Y') }}
            </span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Total:</strong>
            <span class="text-gray-900">${{ number_format($compra->total_compra, 2, ',', '.') }}</span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Método de Pago:</strong>
            <span class="text-gray-900">{{ $compra->metodo_pago ?? 'No especificado' }}</span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Estado:</strong>
            <span class="text-gray-900">
                @switch($compra->estado)
                    @case('PENDIENTE') Pendiente @break
                    @case('RECIBIDA') Recibida @break
                    @case('CANCELADA') Cancelada @break
                    @default —
                @endswitch
            </span>
        </div>
    </div>

    @if($compra->detalles->count() > 0)
        <div class="mt-8">
            <h2 class="text-lg font-semibold text-gray-800 mb-3">Detalles de la Compra</h2>
            <div class="bg-gray-50 rounded-lg border border-gray-200 overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Producto</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Cantidad</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Precio Unit.</th>
                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($compra->detalles as $detalle)
                            <tr>
                                <td class="px-4 py-2 text-sm">{{ $detalle->producto?->codigo_producto ?? '—' }}</td>
                                <td class="px-4 py-2 text-sm">{{ $detalle->cantidad }}</td>
                                <td class="px-4 py-2 text-sm">${{ number_format($detalle->precio_unitario, 2, ',', '.') }}</td>
                                <td class="px-4 py-2 text-sm">${{ number_format($detalle->subtotal, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection