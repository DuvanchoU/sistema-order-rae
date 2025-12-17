@extends('layouts.app')

@section('title', 'Detalles del Producto')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-sm border border-gray-200">
    <div class="flex justify-between items-start mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Detalles del Producto</h1>
        <div class="space-x-2">
            <a href="{{ route('productos.edit', $producto->id_producto) }}" 
               class="px-3 py-1.5 bg-yellow-100 text-yellow-700 text-sm rounded-md font-medium hover:bg-yellow-200 transition">Editar</a>
            <a href="{{ route('productos.index') }}" 
               class="px-3 py-1.5 bg-gray-200 text-gray-800 text-sm rounded-md font-medium hover:bg-gray-300 transition">Volver</a>
        </div>
    </div>

    <div class="space-y-4">
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">ID:</strong>
            <span class="text-gray-900">{{ $producto->id_producto }}</span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Código:</strong>
            <span class="text-gray-900">{{ $producto->codigo_producto }}</span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Referencia:</strong>
            <span class="text-gray-900">{{ $producto->referencia_producto ?? 'No especificado' }}</span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Categoría:</strong>
            <span class="text-gray-900">{{ $producto->categoria?->nombre_categoria ?? 'Sin categoría' }}</span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Tipo de Madera:</strong>
            <span class="text-gray-900">{{ $producto->tipo_madera ?? 'No especificado' }}</span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Color:</strong>
            <span class="text-gray-900">{{ $producto->color_producto ?? 'No especificado' }}</span>
        </div>
        <div class="flex justify-between border-b border-gray-200 pb-2">
            <strong class="text-gray-700">Precio Actual:</strong>
            <span class="text-gray-900">${{ number_format($producto->precio_actual, 2, ',', '.') }}</span>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="text-lg font-semibold text-gray-800 mb-3">Relaciones</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
            <div class="bg-blue-50 p-3 rounded-lg border border-blue-100">
                <p class="font-medium text-blue-800">Detalles de Compra</p>
                <p class="text-gray-700">{{ $producto->detallesCompra()->count() }} registros</p>
            </div>
            <div class="bg-green-50 p-3 rounded-lg border border-green-100">
                <p class="font-medium text-green-800">Detalles de Venta</p>
                <p class="text-gray-700">{{ $producto->detallesVenta()->count() }} registros</p>
            </div>
            <div class="bg-purple-50 p-3 rounded-lg border border-purple-100">
                <p class="font-medium text-purple-800">Movimientos en Inventario</p>
                <p class="text-gray-700">{{ $producto->inventarios()->count() }} registros</p>
            </div>
        </div>
    </div>
</div>
@endsection