<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'proveedor_id' => 'required|exists:proveedores,id_proveedor',
            'fecha_compra' => 'required|date',
            'total_compra' => 'required|numeric|min:0',
            'estado' => 'required|in:PENDIENTE,RECIBIDA,CANCELADA',
            'usuario_id' => 'nullable|exists:usuarios,id_usuario',
            'metodo_pago' => 'nullable|string|max:50',
        ];
    }
}