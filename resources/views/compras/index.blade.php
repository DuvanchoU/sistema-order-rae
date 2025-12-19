@extends('layouts.app')

@section('title', 'Listado de Compras')

@section('content')
<div class="bg-[#F8F5F0] min-h-screen px-6 py-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Compras</h1>
        <a href="{{ route('compras.create') }}"
           class="px-4 py-2 bg-[#CBB8A0] hover:bg-[#B9A489] text-white rounded-lg font-medium transition shadow-sm">
            + Nueva Compra
        </a>
    </div>

    {{-- Alert --}}
    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Sin registros --}}
    @if ($compras->isEmpty())
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 text-center text-gray-500">
            No hay registros de compras.
        </div>
    @else

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Proveedor
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Usuario
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Fecha
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total ($)
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Estado
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($compras as $compra)

                        @php
                            $estadoClases = match ($compra->estado) {
                                'RECIBIDA'   => 'bg-green-100 text-green-800',
                                'PENDIENTE'  => 'bg-yellow-100 text-yellow-800',
                                'CANCELADA'  => 'bg-red-100 text-red-800',
                                default      => 'bg-gray-100 text-gray-800',
                            };
                        @endphp

                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="font-medium text-gray-900">
                                    {{ $compra->proveedor?->nombre?? '—' }}
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{ $compra->usuario?->nombres ?? '—' }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $compra->fecha_compra?->format('d/m/Y') ?? '—' }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                                {{ number_format($compra->total_compra, 2, ',', '.') }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <span class="inline-flex px-2.5 py-0.5 text-xs font-semibold rounded-full {{ $estadoClases }}">
                                    {{ $compra->estado }}
                                </span>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-sm">
                                <div class="flex gap-2">
                                    <a href="{{ route('compras.show', $compra->id_compra) }}"
                                       class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium hover:bg-blue-200 transition">
                                        Ver
                                    </a>

                                    <a href="{{ route('compras.edit', $compra->id_compra) }}"
                                       class="px-2.5 py-1 bg-yellow-100 text-yellow-700 rounded-md text-xs font-medium hover:bg-yellow-200 transition">
                                        Editar
                                    </a>

                                    <form action="{{ route('compras.destroy', $compra->id_compra) }}"
                                          method="POST"
                                          onsubmit="return confirm('¿Eliminar esta compra? Se eliminará lógicamente.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-2.5 py-1 bg-red-100 text-red-700 rounded-md text-xs font-medium hover:bg-red-200 transition">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $compras->links() }}
        </div>

    @endif
</div>
@endsection