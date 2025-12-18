@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Editar Usuario</h1>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-lg border border-red-100">
                <strong class="font-medium">Corrige los siguientes errores:</strong>
                <ul class="mt-2 list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nombres -->
            <div class="mb-5">
                <label for="nombres" class="block text-sm font-medium text-gray-700 mb-1">Nombres *</label>
                <input
                    type="text"
                    name="nombres"
                    id="nombres"
                    value="{{ old('nombres', $usuario->nombres) }}"
                    maxlength="100"
                    class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                    required
                >
            </div>

            <!-- Apellidos -->
            <div class="mb-5">
                <label for="apellidos" class="block text-sm font-medium text-gray-700 mb-1">Apellidos *</label>
                <input
                    type="text"
                    name="apellidos"
                    id="apellidos"
                    value="{{ old('apellidos', $usuario->apellidos) }}"
                    maxlength="100"
                    class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                    required
                >
            </div>

            <!-- Documento -->
            <div class="mb-5">
                <label for="documento" class="block text-sm font-medium text-gray-700 mb-1">Documento *</label>
                <input
                    type="text"
                    name="documento"
                    id="documento"
                    value="{{ old('documento', $usuario->documento) }}"
                    maxlength="20"
                    class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                    required
                >
            </div>

            <!-- Correo -->
            <div class="mb-5">
                <label for="correo_usuario" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico *</label>
                <input
                    type="email"
                    name="correo_usuario"
                    id="correo_usuario"
                    value="{{ old('correo_usuario', $usuario->correo_usuario) }}"
                    maxlength="255"
                    class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                    required
                >
            </div>

            <!-- Contraseña -->
            <div class="mb-5">
                <label for="contrasena_usuario" class="block text-sm font-medium text-gray-700 mb-1">Contraseña (dejar en blanco para no cambiar)</label>
                <input
                    type="password"
                    name="contrasena_usuario"
                    id="contrasena_usuario"
                    value=""
                    minlength="6"
                    class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                >
            </div>

            <!-- Género -->
            <div class="mb-5">
                <label for="genero" class="block text-sm font-medium text-gray-700 mb-1">Género</label>
                <select
                    name="genero"
                    id="genero"
                    class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                >
                    <option value="">-- Seleccione --</option>
                    <option value="M" {{ (old('genero', $usuario->genero) == 'M') ? 'selected' : '' }}>Masculino</option>
                    <option value="F" {{ (old('genero', $usuario->genero) == 'F') ? 'selected' : '' }}>Femenino</option>
                    <option value="O" {{ (old('genero', $usuario->genero) == 'O') ? 'selected' : '' }}>Otro</option>
                </select>
            </div>

            <!-- Teléfono -->
            <div class="mb-5">
                <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                <input
                    type="text"
                    name="telefono"
                    id="telefono"
                    value="{{ old('telefono', $usuario->telefono) }}"
                    maxlength="20"
                    class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                >
            </div>

            <!-- Estado -->
            <div class="mb-5">
                <label for="estado" class="block text-sm font-medium text-gray-700 mb-1">Estado *</label>
                <select
                    name="estado"
                    id="estado"
                    class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                    required
                >
                    <option value="">-- Seleccione --</option>
                    <option value="ACTIVO" {{ (old('estado', $usuario->estado) == 'ACTIVO') ? 'selected' : '' }}>ACTIVO</option>
                    <option value="INACTIVO" {{ (old('estado', $usuario->estado) == 'INACTIVO') ? 'selected' : '' }}>INACTIVO</option>
                </select>
            </div>

            <!-- Rol -->
            <div class="mb-5">
                <label for="id_rol" class="block text-sm font-medium text-gray-700 mb-1">Rol *</label>
                <select
                    name="id_rol"
                    id="id_rol"
                    class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                    required
                >
                    <option value="">-- Seleccione un rol --</option>
                    @foreach($roles as $rol)
                        <option value="{{ $rol->id_rol }}" {{ (old('id_rol', $usuario->id_rol) == $rol->id_rol) ? 'selected' : '' }}>
                            {{ $rol->nombre_rol }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Botones -->
            <div class="flex justify-end gap-3">
                <a href="{{ route('usuarios.index') }}"
                   class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md font-medium hover:bg-gray-300 transition">
                    Cancelar
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-[#CBB8A0] hover:bg-[#B9A489] text-white rounded-lg font-medium transition shadow-sm">
                    Actualizar Usuario
                </button>
            </div>
        </form>
    </div>
</div>
@endsection