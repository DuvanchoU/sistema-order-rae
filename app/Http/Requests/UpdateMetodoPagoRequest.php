<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMetodoPagoRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:50|unique:metodos_pago,nombre,' . $this->route('metodopago')->id_metodo . ',id_metodo',
            'descripcion' => 'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del método de pago es obligatorio.',
            'nombre.unique' => 'Ya existe un método de pago con ese nombre.',
            'nombre.max' => 'El nombre no puede exceder los 50 caracteres.',
            'descripcion.max' => 'La descripción no puede exceder los 500 caracteres.',
        ];
    }
}
