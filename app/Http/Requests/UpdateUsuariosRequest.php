<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuariosRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'documento' => 'required|string|max:20|unique:usuarios,documento,' . $this->route('usuario')->id_usuario . ',id_usuario',
            'correo_usuario' => 'required|email|unique:usuarios,correo_usuario,' . $this->route('usuario')->id_usuario . ',id_usuario',
            'contrasena_usuario' => 'nullable|string|min:6',
            'genero' => 'nullable|in:M,F,O',
            'telefono' => 'nullable|string|max:20',
            'estado' => 'required|in:ACTIVO,INACTIVO',
            'id_rol' => 'required|exists:roles,id_rol',
        ];
    }

    public function messages(): array
    {
        return [
            'nombres.required' => 'Los nombres son obligatorios.',
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'documento.required' => 'El documento es obligatorio.',
            'documento.unique' => 'Ya existe un usuario con ese documento.',
            'correo_usuario.required' => 'El correo es obligatorio.',
            'correo_usuario.email' => 'El correo debe ser válido.',
            'correo_usuario.unique' => 'Ya existe un usuario con ese correo.',
            'contrasena_usuario.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'genero.in' => 'El género seleccionado no es válido.',
            'telefono.max' => 'El teléfono no puede exceder los 20 caracteres.',
            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado seleccionado no es válido.',
            'id_rol.required' => 'Debe seleccionar un rol.',
            'id_rol.exists' => 'El rol seleccionado no es válido.',
        ];
    }
}