<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRolesRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nombre_rol' => 'required|string|max:50|unique:roles,nombre_rol,' . $this->route('role')->id_rol,
            'descripcion' => 'nullable|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_rol.required' => 'El nombre del rol es obligatorio.',
            'nombre_rol.unique' => 'Ya existe un rol con ese nombre.',
            'nombre_rol.max' => 'El nombre no puede exceder los 50 caracteres.',
            'descripcion.max' => 'La descripción no puede exceder los 500 caracteres.',
        ];
    }
}
