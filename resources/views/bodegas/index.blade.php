@extends('layouts.app')

@section('title', 'Listado de Bodegas')

@section('content')
<div class="bg-[#F8F5F0] min-h-screen px-6 py-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Bodegas</h1>
        <a href="{{ route('bodegas.create') }}"
           class="px-4 py-2 bg-[#CBB8A0] hover:bg-[#B9A489] text-white rounded-lg font-medium transition shadow-sm">
            + Nueva Bodega
        </a>
    </div>

    {{-- Mensaje --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">

            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dirección</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($bodegas as $b)

                    @php
                        $estadoClases = match($b->estado) {
                            'ACTIVA' => 'bg-green-100 text-green-800',
                            default  => 'bg-red-100 text-red-800'
                        };
                    @endphp

                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $b->nombre_bodega }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $b->direccion ?? '—' }}
                        </td>

                        <td class="px-6 py-4 text-sm">
                            <span class="px-2.5 py-0.5 inline-flex text-xs font-semibold rounded-full {{ $estadoClases }}">
                                {{ $b->estado }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-sm">
                            <div class="flex gap-2">
                                <a href="{{ route('bodegas.show', $b->id_bodega) }}"
                                   class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium hover:bg-blue-200 transition">
                                    Ver
                                </a>
                                <a href="{{ route('bodegas.edit', $b->id_bodega) }}"
                                   class="px-2.5 py-1 bg-yellow-100 text-yellow-700 rounded-md text-xs font-medium hover:bg-yellow-200 transition">
                                    Editar
                                </a>
                                <form action="{{ route('bodegas.destroy', $b->id_bodega) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('¿Eliminar esta bodega?')"
                                            class="px-2.5 py-1 bg-red-100 text-red-700 rounded-md text-xs font-medium hover:bg-red-200 transition">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                            No hay bodegas registradas.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <div class="mt-6">
        {{ $bodegas->links() }}
    </div>

</div>
@endsection
