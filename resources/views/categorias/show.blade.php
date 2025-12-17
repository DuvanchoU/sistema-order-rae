@extends('layouts.app')

@section('title', 'Detalles de la Categoría')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
    <div class="flex justify-between items-start mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Categoría: {{ $categoria->nombre_categoria }}</h1>
        <div class="space-x-2">
            <a href="{{ route('categorias.edit', $categoria->id_categorias) }}" class="px-3 py-1 bg-yellow-500 text-white text-sm rounded hover:bg-yellow-600">Editar</a>
            <a href="{{ route('categorias.index') }}" class="px-3 py-1 bg-gray-500 text-white text-sm rounded hover:bg-gray-600">Volver</a>
        </div>
    </div>

    <div class="space-y-4">
        <div class="flex justify-between border-b pb-2">
            <strong class="text-gray-700">ID:</strong>
            <span>{{ $categoria->id_categorias }}</span>
        </div>
        <div class="flex justify-between border-b pb-2">
            <strong class="text-gray-700">Nombre:</strong>
            <span>{{ $categoria->nombre_categoria }}</span>
        </div>
        <div class="flex justify-between border-b pb-2">
            <strong class="text-gray-700">Estado:</strong>
            <span>
                <span class="px-2 inline-flex text-xs font-semibold rounded-full 
                    {{ $categoria->estado_categoria === 'activo' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ ucfirst($categoria->estado_categoria) }}
                </span>
            </span>
        </div>
        <div class="flex justify-between border-b pb-2">
            <strong class="text-gray-700">Productos asociados:</strong>
            <span>{{ $categoria->productos->count() }}</span>
        </div>
    </div>

    @if ($categoria->productos->isNotEmpty())
        <div class="mt-6">
            <h2 class="text-lg font-semibold mb-3">Productos en esta categoría</h2>
            <ul class="list-disc pl-5 space-y-1 text-sm">
                @foreach ($categoria->productos as $producto)
                    <li>{{ $producto->codigo_producto }} - {{ $producto->referencia_producto ?? 'Sin referencia' }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection