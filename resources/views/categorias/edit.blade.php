@extends('layouts.app')

@section('title', 'Editar Categoría')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-sm border border-gray-200">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Editar Categoría</h1>

    <form action="{{ route('categorias.update', $categoria->id_categorias) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-5">
            <label class="block text-sm font-medium text-gray-700 mb-1">Nombre *</label>
            <input 
                type="text" 
                name="nombre_categoria" 
                value="{{ old('nombre_categoria', $categoria->nombre_categoria) }}" 
                class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                required
            >
            @error('nombre_categoria')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Estado *</label>
            <div class="flex space-x-6">
                <label class="inline-flex items-center">
                    <input type="radio" name="estado_categoria" value="activo" 
                        {{ old('estado_categoria', $categoria->estado_categoria) === 'activo' ? 'checked' : '' }}
                        class="text-marron-oscuro focus:ring-marron-oscuro mr-2"> Activo
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="estado_categoria" value="inactivo" 
                        {{ old('estado_categoria', $categoria->estado_categoria) === 'inactivo' ? 'checked' : '' }}
                        class="text-marron-oscuro focus:ring-marron-oscuro mr-2"> Inactivo
                </label>
            </div>
            @error('estado_categoria')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('categorias.index') }}" 
               class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md font-medium hover:bg-gray-300 transition">Cancelar</a>
            <button type="submit" 
                    class="px-4 py-2 bg-[#CBB8A0] hover:bg-[#B9A489] text-white rounded-lg font-medium transition shadow-sm">
                Actualizar Categoría
            </button>
        </div>
    </form>
</div>
@endsection