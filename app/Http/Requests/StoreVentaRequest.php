<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVentaRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'cliente_id'       => 'nullable|exists:clientes,id_cliente',
            'metodo_pago_id'   => 'nullable|exists:metodos_pago,id_metodo',
            'detalles'         => 'required|array|min:1',
            'detalles.*.producto_id' => 'required|exists:producto,id_producto',
            'detalles.*.cantidad'    => 'required|integer|min:1|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'detalles.required' => 'Debe agregar al menos un producto a la venta.',
            'detalles.min' => 'Debe agregar al menos un producto a la venta.',
            'detalles.*.producto_id.required' => 'El producto es obligatorio.',
            'detalles.*.producto_id.exists' => 'El producto seleccionado no es válido.',
            'detalles.*.cantidad.required' => 'La cantidad es obligatoria.',
            'detalles.*.cantidad.min' => 'La cantidad debe ser al menos 1.',
            'cliente_id.exists' => 'El cliente seleccionado no es válido.',
            'metodo_pago_id.exists' => 'El método de pago seleccionado no es válido.',
        ];
    }
}