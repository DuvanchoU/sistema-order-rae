<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventarioRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'producto_id' => 'required|exists:producto,id_producto',
            'bodega_id' => 'required|exists:bodegas,id_bodega',
            'proveedor_id' => 'nullable|exists:proveedores,id_proveedor',
            'cantidad_disponible' => 'required|integer|min:0|max:100000',
            'fecha_llegada' => 'nullable|date',
            'estado' => 'required|in:DISPONIBLE,COMPROMITIDO,AGOTADO',
        ];
    }

    public function messages(): array
    {
        return [
            'producto_id.required' => 'El producto es obligatorio.',
            'producto_id.exists' => 'El producto seleccionado no es válido.',
            'bodega_id.required' => 'La bodega es obligatoria.',
            'bodega_id.exists' => 'La bodega seleccionada no es válida.',
            'proveedor_id.exists' => 'El proveedor seleccionado no es válido.',
            'cantidad_disponible.required' => 'La cantidad disponible es obligatoria.',
            'cantidad_disponible.min' => 'La cantidad no puede ser negativa.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado seleccionado no es válido.',
        ];
    }
}
