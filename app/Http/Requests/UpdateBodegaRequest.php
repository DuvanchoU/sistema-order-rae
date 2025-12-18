<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBodegaRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nombre_bodega' => 'required|string|max:100|unique:bodegas,nombre_bodega,' . $this->route('bodega')->id_bodega . ',id_bodega',
            'direccion' => 'nullable|string|max:255',
            'estado' => 'required|in:ACTIVA,INACTIVA',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_bodega.required' => 'El nombre de la bodega es obligatorio.',
            'nombre_bodega.unique' => 'Ya existe una bodega con ese nombre.',
            'estado.required' => 'El estado es obligatorio.',
        ];
    }
}
