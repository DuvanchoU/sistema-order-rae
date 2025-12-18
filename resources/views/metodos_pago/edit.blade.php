@extends('layouts.app')

@section('title', 'Editar Método de Pago')

@section('content')
<div class="bg-[#F8F5F0] min-h-screen px-6 py-6">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Editar Método de Pago</h1>
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

            <form action="{{ route('metodos_pago.update', $metodopago->id_metodo) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre *</label>
                    <input
                        type="text"
                        name="nombre"
                        id="nombre"
                        value="{{ old('nombre', $metodopago->nombre) }}"
                        maxlength="50"
                        class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                        required
                    >
                </div>

                <div class="mb-6">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                    <textarea
                        name="descripcion"
                        id="descripcion"
                        rows="3"
                        class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro"
                    >{{ old('descripcion', $metodopago->descripcion) }}</textarea>
                    <p class="mt-1 text-xs text-gray-500">Máximo 500 caracteres.</p>
                </div>

                <div class="flex justify-end gap-3">
                    <a href="{{ route('metodos_pago.index') }}"
                       class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md font-medium hover:bg-gray-300 transition">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="px-4 py-2 bg-[#CBB8A0] hover:bg-[#B9A489] text-white rounded-md font-medium transition shadow-sm">
                        Actualizar Método
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection