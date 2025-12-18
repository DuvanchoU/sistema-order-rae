@extends('layouts.app')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="bg-[#F8F5F0] min-h-screen px-6 py-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Usuarios del Sistema</h1>
        <a href="{{ route('usuarios.create') }}"
           class="px-4 py-2 bg-marron-oscuro text-white rounded-lg font-medium hover:bg-[#5f3d2a] transition shadow-sm">
            + Nuevo Usuario
        </a>
    </div>

    {{-- Mensaje --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">

            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Documento</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Correo</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Rol</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($usuarios as $u)

                    @php
                        $genero = match($u->genero) {
                            'M' => 'Masculino',
                            'F' => 'Femenino',
                            default => 'No especificado'
                        };
                    @endphp

                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-sm">
                            <div class="font-medium text-gray-900">
                                {{ $u->nombres }} {{ $u->apellidos }}
                            </div>
                            <div class="text-xs text-gray-500">{{ $genero }}</div>
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $u->documento }}
                        </td>

                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $u->correo_usuario }}
                        </td>

                        <td class="px-6 py-4 text-sm">
                            <span class="px-2.5 py-0.5 inline-flex text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                {{ $u->rol?->nombre_rol ?? 'Sin rol' }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-sm">
                            <span class="px-2.5 py-0.5 inline-flex text-xs font-semibold rounded-full
                                {{ $u->estado === 'ACTIVO' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $u->estado }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-sm">
                            <div class="flex gap-2">
                                <a href="{{ route('usuarios.show', $u->id_usuario) }}"
                                   class="px-2.5 py-1 bg-blue-100 text-blue-700 rounded-md text-xs font-medium hover:bg-blue-200 transition">
                                    Ver
                                </a>
                                <a href="{{ route('usuarios.edit', $u->id_usuario) }}"
                                   class="px-2.5 py-1 bg-yellow-100 text-yellow-700 rounded-md text-xs font-medium hover:bg-yellow-200 transition">
                                    Editar
                                </a>
                                <form action="{{ route('usuarios.destroy', $u->id_usuario) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('¿Dar de baja este usuario?')"
                                            class="px-2.5 py-1 bg-red-100 text-red-700 rounded-md text-xs font-medium hover:bg-red-200 transition">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-6 text-center text-gray-500">
                            No hay usuarios registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

    <div class="mt-6">
        {{ $usuarios->links() }}
    </div>

</div>
@endsection
