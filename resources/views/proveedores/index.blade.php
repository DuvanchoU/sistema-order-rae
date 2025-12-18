@extends('layouts.app')

@section('title', 'Listado de Proveedores')

@section('content')
<div class="bg-[#F8F5F0] min-h-screen px-6 py-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Proveedores</h1>
        <a href="{{ route('proveedores.create') }}"
           class="px-4 py-2 bg-[#CBB8A0] hover:bg-[#B9A489] text-white rounded-lg font-medium transition shadow-sm">
            + Nuevo Proveedor
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
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Teléfono</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Correo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($proveedores as $p)

                    @php
                        $estadoClases = match($p->estado) {
                            'ACTIVO' => 'bg-green-100 text-green-800',
                            default  => 'bg-red-100 text-red-800'
                        };
                    @endphp

                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                            {{ $p->nombre }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $p->telefono ?? '—' }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $p->email ?? '—' }}
                        </td>

                        <td class="px-6 py-4 text-sm">
                            <span class="px-2.5 py-0.5 inline-flex text-xs font-semibold rounded-full {{ $estadoClases }}">
                                {{ $p->estado }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-sm">
                            <div class="flex gap-2">
                                <a href="{{ route('proveedores.show', $p->id_proveedor) }}"
                                   class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium hover:bg-blue-200 transition">
                                    Ver
                                </a>
                                <a href="{{ route('proveedores.edit', $p->id_proveedor) }}"
                                   class="px-2.5 py-1 bg-yellow-100 text-yellow-700 rounded-md text-xs font-medium hover:bg-yellow-200 transition">
                                    Editar
                                </a>
                                <form action="{{ route('proveedores.destroy', $p->id_proveedor) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('¿Eliminar este proveedor?')"
                                            class="px-2.5 py-1 bg-red-100 text-red-700 rounded-md text-xs font-medium hover:bg-red-200 transition">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-6 text-center text-gray-500">
                            No hay proveedores registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <div class="mt-6">
        {{ $proveedores->links() }}
    </div>

</div>
@endsection
