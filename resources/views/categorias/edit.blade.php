@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Editar Categoría</h1>

    <form action="{{ route('categorias.update', $categoria->id_categorias) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nombre *</label>
            <input type="text" name="nombre_categoria" value="{{ old('nombre_categoria', $categoria->nombre_categoria) }}" class="w-full px-3 py-2 border rounded" required>
            @error('nombre_categoria')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700">Estado *</label>
            <div class="mt-2 space-y-2">
                <label class="inline-flex items-center">
                    <input type="radio" name="estado_categoria" value="activo" {{ old('estado_categoria', $categoria->estado_categoria) === 'activo' ? 'checked' : '' }} class="mr-2"> Activo
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="estado_categoria" value="inactivo" {{ old('estado_categoria', $categoria->estado_categoria) === 'inactivo' ? 'checked' : '' }} class="mr-2"> Inactivo
                </label>
            </div>
            @error('estado_categoria')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('categorias.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Actualizar Categoría</button>
        </div>
    </form>
</div>
@endsection