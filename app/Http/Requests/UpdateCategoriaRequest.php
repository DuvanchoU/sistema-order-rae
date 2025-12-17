<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoriaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $categoriaId = $this->route('categoria');

        return [
            'nombre_categoria' => [
                'required',
                'string',
                'max:100',
                Rule::unique('categorias', 'nombre_categoria')->ignore($categoriaId, 'id_categorias'),
            ],
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