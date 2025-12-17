@extends('layouts.app')

@section('title', 'Categorías')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Categorías</h1>
        <a href="{{ route('categorias.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">+ Nueva Categoría</a>
    </div>

    @if (session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded">{{ $errors->first() }}</div>
    @endif

    @if ($categorias->isEmpty())
        <div class="bg-white p-6 rounded shadow text-center text-gray-500">No hay categorías registradas.</div>
    @else
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Productos</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($categorias as $categoria)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $categoria->nombre_categoria }}</td>
                            <td class="px-6 py-4 text-sm">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $categoria->estado_categoria === 'activo' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ ucfirst($categoria->estado_categoria) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $categoria->productos_count }}</td>
                            <td class="px-6 py-4 text-sm space-x-2">
                                <a href="{{ route('categorias.show', $categoria->id_categorias) }}" class="text-blue-600 hover:text-blue-900">Ver</a>
                                <a href="{{ route('categorias.edit', $categoria->id_categorias) }}" class="text-yellow-600 hover:text-yellow-900">Editar</a>
                                <form action="{{ route('categorias.destroy', $categoria->id_categorias) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar esta categoría?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $categorias->links() }}</div>
    @endif
</div>
@endsection