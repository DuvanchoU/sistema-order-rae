@extends('layouts.app')

@section('title', 'Listado de Pedidos')

@section('content')
<div class="bg-[#F8F5F0] min-h-screen px-6 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Pedidos</h1>
        <a href="{{ route('pedidos.create') }}" 
           class="px-4 py-2 bg-[#CBB8A0] hover:bg-[#B9A489] text-white rounded-lg font-medium transition shadow-sm">
            + Nuevo Pedido
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg text-center">{{ session('success') }}</div>
    @endif

    @if ($pedidos->isEmpty())
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 text-center text-gray-500">
            No hay pedidos registrados.
        </div>
    @else
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Pedido</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total ($)</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($pedidos as $pedido)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $pedido->id_pedido }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $pedido->usuario?->nombres ?? '—' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $pedido->cliente?->nombre ?? '—' }} {{ $pedido->cliente?->apellido ?? '' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($pedido->fecha_pedido)->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ number_format($pedido->total_pedido, 2, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @switch($pedido->estado_pedido)
                                    @case('PENDIENTE')
                                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">Pendiente</span>
                                        @break
                                    @case('EN PROCESO')
                                        <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs rounded-full">En proceso</span>
                                        @break
                                    @case('ENTREGADO')
                                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Entregado</span>
                                        @break
                                    @case('CANCELADO')
                                        <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full">Cancelado</span>
                                        @break
                                @endswitch
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex gap-2">
                                    <a href="{{ route('pedidos.show', $pedido->id_pedido) }}" 
                                       class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium hover:bg-blue-200 transition">Ver</a>
                                    <a href="{{ route('pedidos.edit', $pedido->id_pedido) }}" 
                                       class="px-2.5 py-1 bg-yellow-100 text-yellow-700 rounded-md text-xs font-medium hover:bg-yellow-200 transition">Editar</a>
                                    <form action="{{ route('pedidos.destroy', $pedido->id_pedido) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar este pedido? Se eliminará lógicamente.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2.5 py-1 bg-red-100 text-red-700 rounded-md text-xs font-medium hover:bg-red-200 transition">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-6">{{ $pedidos->links() }}</div>
    @endif
</div>
@endsection