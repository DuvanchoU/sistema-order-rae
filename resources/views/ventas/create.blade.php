@extends('layouts.app')

@section('title', 'Nueva Venta')

@section('content')
<div class="bg-[#F8F5F0] min-h-screen px-6 py-6">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Registrar Nueva Venta</h1>
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

            <form action="{{ route('ventas.store') }}" method="POST" id="ventaForm">
                @csrf

                <!-- Cliente -->
                <div class="mb-5">
                    <label for="cliente_id" class="block text-sm font-medium text-gray-700 mb-1">Cliente (opcional)</label>
                    <select name="cliente_id" id="cliente_id" class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro">
                        <option value="">-- Sin cliente --</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id_cliente }}" {{ old('cliente_id') == $cliente->id_cliente ? 'selected' : '' }}>
                                {{ $cliente->nombre }} {{ $cliente->apellido }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Método de pago -->
                <div class="mb-6">
                    <label for="metodo_pago_id" class="block text-sm font-medium text-gray-700 mb-1">Método de Pago (opcional)</label>
                    <select name="metodo_pago_id" id="metodo_pago_id" class="w-full px-3 py-2.5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-marron-oscuro focus:border-marron-oscuro">
                        <option value="">-- Sin método --</option>
                        @foreach($metodosPago as $mp)
                            <option value="{{ $mp->id_metodo }}" {{ old('metodo_pago_id') == $mp->id_metodo ? 'selected' : '' }}>
                                {{ $mp->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Productos -->
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="text-lg font-medium text-gray-800">Productos</h3>
                        <button type="button" id="addProductBtn" class="text-sm bg-marron-oscuro text-white px-3 py-1 rounded-md hover:bg-[#5f3d2a] transition">
                            + Agregar producto
                        </button>
                    </div>

                    <div id="productos-container">
                        @if(old('detalles'))
                            @foreach(old('detalles') as $index => $detalle)
                                <div class="flex gap-3 mb-3 producto-item">
                                    <select name="detalles[{{ $index }}][producto_id]" class="flex-1 px-3 py-2 border border-gray-300 rounded-md" required>
                                        <option value="">-- Seleccione --</option>
                                        @foreach($productos as $p)
                                            <option value="{{ $p->id_producto }}" {{ $detalle['producto_id'] == $p->id_producto ? 'selected' : '' }}>
                                                {{ $p->codigo_producto }} - {{ $p->referencia_producto ?? 'Sin ref.' }} (${{ number_format($p->precio_actual, 0, ',', '.') }})
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="number" name="detalles[{{ $index }}][cantidad]" value="{{ $detalle['cantidad'] }}" min="1" class="w-24 px-3 py-2 border border-gray-300 rounded-md" required>
                                    <button type="button" class="remove-producto px-2 bg-red-100 text-red-700 rounded-md hover:bg-red-200">–</button>
                                </div>
                            @endforeach
                        @else
                            <div class="flex gap-3 mb-3 producto-item">
                                <select name="detalles[0][producto_id]" class="flex-1 px-3 py-2 border border-gray-300 rounded-md" required>
                                    <option value="">-- Seleccione --</option>
                                    @foreach($productos as $p)
                                        <option value="{{ $p->id_producto }}">
                                            {{ $p->codigo_producto }} - {{ $p->referencia_producto ?? 'Sin ref.' }} (${{ number_format($p->precio_actual, 0, ',', '.') }})
                                        </option>
                                    @endforeach
                                </select>
                                <input type="number" name="detalles[0][cantidad]" min="1" value="1" class="w-24 px-3 py-2 border border-gray-300 rounded-md" required>
                                <button type="button" class="remove-producto px-2 bg-red-100 text-red-700 rounded-md hover:bg-red-200">–</button>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Botones -->
                <div class="flex justify-end gap-3">
                    <a href="{{ route('ventas.index') }}"
                       class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md font-medium hover:bg-gray-300 transition">
                        Cancelar
                    </a>
                    <button type="submit"
                            class="px-4 py-2 bg-[#CBB8A0] hover:bg-[#B9A489] text-white rounded-lg font-medium transition shadow-sm">
                        Registrar Venta
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('addProductBtn').addEventListener('click', function() {
    const container = document.getElementById('productos-container');
    const index = container.children.length;
    const productos = @json($productos);
    
    let options = '<option value="">-- Seleccione --</option>';
    productos.forEach(p => {
        options += `<option value="${p.id_producto}">${p.codigo_producto} - ${p.referencia_producto || 'Sin ref.'} ($${new Intl.NumberFormat('es-CO').format(p.precio_actual)})</option>`;
    });
    
    const newItem = `
        <div class="flex gap-3 mb-3 producto-item">
            <select name="detalles[${index}][producto_id]" class="flex-1 px-3 py-2 border border-gray-300 rounded-md" required>
                ${options}
            </select>
            <input type="number" name="detalles[${index}][cantidad]" min="1" value="1" class="w-24 px-3 py-2 border border-gray-300 rounded-md" required>
            <button type="button" class="remove-producto px-2 bg-red-100 text-red-700 rounded-md hover:bg-red-200">–</button>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', newItem);
    
    // Añadir evento a los nuevos botones de eliminar
    document.querySelectorAll('.remove-producto').forEach(btn => {
        btn.onclick = function() {
            if (document.querySelectorAll('.producto-item').length > 1) {
                this.closest('.producto-item').remove();
            }
        };
    });
});

// Evento para botones de eliminar existentes
document.querySelectorAll('.remove-producto').forEach(btn => {
    btn.onclick = function() {
        if (document.querySelectorAll('.producto-item').length > 1) {
            this.closest('.producto-item').remove();
        }
    };
});
</script>
@endpush
@endsection