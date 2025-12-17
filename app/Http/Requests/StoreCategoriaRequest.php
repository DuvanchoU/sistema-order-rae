<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCategoriaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre_categoria' => 'required|string|max:100|unique:categorias,nombre_categoria',
            'estado_categoria' => 'required|in:activo,inactivo',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_categoria.unique' => 'Ya existe una categoría con ese nombre.',
            'estado_categoria.required' => 'El estado es obligatorio.',
            'estado_categoria.in' => 'El estado debe ser "activo" o "inactivo".',
        ];
    }
}