@extends('layouts.app')

@section('title', 'Crear Nuevo Producto')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Registrar Nuevo Producto</h1>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="codigo_producto" class="block text-sm font-medium text-gray-700">Código del Producto *</label>
            <input
                type="text"
                name="codigo_producto"
                id="codigo_producto"
                value="{{ old('codigo_producto') }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                required
            >
        </div>

        <div class="mb-4">
            <label for="referencia_producto" class="block text-sm font-medium text-gray-700">Referencia (opcional)</label>
            <input
                type="text"
                name="referencia_producto"
                id="referencia_producto"
                value="{{ old('referencia_producto') }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            >
        </div>

        <div class="mb-4">
            <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría *</label>
            <select
                name="categoria_id"
                id="categoria_id"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                required
            >
                <option value="">-- Seleccione una categoría --</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id_categorias }}" {{ old('categoria_id') == $categoria->id_categorias ? 'selected' : '' }}>
                        {{ $categoria->nombre_categoria }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="tipo_madera" class="block text-sm font-medium text-gray-700">Tipo de Madera (opcional)</label>
            <input
                type="text"
                name="tipo_madera"
                id="tipo_madera"
                value="{{ old('tipo_madera') }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            >
        </div>

        <div class="mb-4">
            <label for="color_producto" class="block text-sm font-medium text-gray-700">Color (opcional)</label>
            <input
                type="text"
                name="color_producto"
                id="color_producto"
                value="{{ old('color_producto') }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
            >
        </div>

        <div class="mb-6">
            <label for="precio_actual" class="block text-sm font-medium text-gray-700">Precio Actual ($)*</label>
            <input
                type="number"
                step="0.01"
                name="precio_actual"
                id="precio_actual"
                value="{{ old('precio_actual') }}"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                min="0"
                required
            >
        </div>

        <div class="flex justify-end space-x-3">
            <a href="{{ route('productos.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancelar</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Guardar Producto</button>
        </div>
    </form>
</div>
@endsection