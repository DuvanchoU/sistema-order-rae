<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProveedorRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:100|unique:proveedores,nombre,' . $this->route('proveedor')->id_proveedor . ',id_proveedor',
            'telefono' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100|unique:proveedores,email,' . $this->route('proveedor')->id_proveedor . ',id_proveedor',
            'direccion' => 'nullable|string|max:255',
            'estado' => 'required|in:ACTIVO,INACTIVO',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del proveedor es obligatorio.',
            'nombre.unique' => 'Ya existe un proveedor con ese nombre.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'email.unique' => 'Ya existe un proveedor con ese correo.',
            'estado.required' => 'El estado es obligatorio.',
        ];
    }
}
