<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePedidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'usuario_id' => 'required|exists:usuarios,id_usuario',
            'cliente_id' => 'required|exists:clientes,id_cliente',
            'total_pedido' => 'required|numeric|min:0',
            'estado_pedido' => 'required|in:PENDIENTE,EN PROCESO,ENTREGADO,CANCELADO',
            'fecha_entrega_estimada' => 'nullable|date|after_or_equal:fecha_pedido',
            'direccion_entrega' => 'nullable|string|max:255',
        ];
    }
}