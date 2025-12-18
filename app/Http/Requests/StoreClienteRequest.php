<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nombre'     => 'required|string|max:100',
            'apellido'   => 'nullable|string|max:100',
            'telefono'   => 'nullable|string|max:20',
            'email'      => 'nullable|email|max:100|unique:clientes,email',
            'direccion'  => 'nullable|string|max:255',
            'estado'     => 'required|in:ACTIVO,INACTIVO',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'email.unique'    => 'Ya existe un cliente con ese correo electrónico.',
            'estado.required' => 'El estado es obligatorio.',
        ];
    }
}
