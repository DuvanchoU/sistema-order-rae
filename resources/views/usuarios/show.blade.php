@extends('layouts.app')

@section('title', 'Detalles del Usuario')

@section('content')
<div class="bg-[#F8F5F0] min-h-screen px-6 py-6">

    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-sm border border-gray-200 p-6">

        {{-- Header --}}
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Detalles del Usuario</h1>
                <p class="text-sm text-gray-500 mt-1">ID: {{ $usuario->id_usuario }}</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}"
                   class="px-3 py-1.5 bg-yellow-100 text-yellow-700 text-sm rounded-md font-medium hover:bg-yellow-200 transition">
                    Editar
                </a>
                <a href="{{ route('usuarios.index') }}"
                   class="px-3 py-1.5 bg-gray-200 text-gray-800 text-sm rounded-md font-medium hover:bg-gray-300 transition">
                    Volver
                </a>
            </div>
        </div>

        {{-- Información --}}
        <div class="space-y-4 text-sm">

            <div class="flex justify-between border-b pb-2">
                <strong>Nombre completo:</strong>
                <span>{{ $usuario->nombres }} {{ $usuario->apellidos }}</span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <strong>Documento:</strong>
                <span>{{ $usuario->documento }}</span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <strong>Correo:</strong>
                <span>{{ $usuario->correo_usuario }}</span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <strong>Teléfono:</strong>
                <span>{{ $usuario->telefono ?? 'No especificado' }}</span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <strong>Rol:</strong>
                <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                    {{ $usuario->rol?->nombre_rol ?? 'Sin rol' }}
                </span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <strong>Estado:</strong>
                <span class="px-2 py-0.5 text-xs font-semibold rounded-full
                    {{ $usuario->estado === 'ACTIVO' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $usuario->estado }}
                </span>
            </div>

            <div class="flex justify-between border-b pb-2">
                <strong>Registrado:</strong>
                <span class="text-gray-500">{{ $usuario->fecha_registro?->format('d/m/Y H:i') ?? '—' }}</span>
            </div>

            <div class="flex justify-between">
                <strong>Actualizado:</strong>
                <span class="text-gray-500">{{ $usuario->updated_at?->format('d/m/Y H:i') ?? '—' }}</span>
            </div>

        </div>

        {{-- Acción --}}
        <div class="mt-8 pt-6 border-t">
            <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        onclick="return confirm('¿Dar de baja este usuario?')"
                        class="px-4 py-2 bg-red-100 text-red-700 rounded-md font-medium hover:bg-red-200 transition">
                    Dar de baja usuario
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
