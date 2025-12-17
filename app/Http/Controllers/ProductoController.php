<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductoController extends Controller
{   
    // Muestra una lista paginada de productos con su categoría.
    public function index(): View
    {   
        $productos = Producto::with('categoria')->paginate(15);
        return view('productos.index', compact('productos'));
    }

    public function create(): View
    {
        $categorias = Categoria::all(['id_categorias', 'nombre_categoria']);
        return view('productos.create', compact('categorias'));
    }

    // Almacena un nuevo producto en la base de datos.
    public function store(StoreProductoRequest $request): RedirectResponse
    {
        Producto::create($request->validated());
        return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
    }

    // Muestra los detalles de un producto específico.
    public function show(Producto $producto): View
    {
        $producto->load('categoria');
        return view('productos.show', compact('producto'));
    }

    // Muestra el formulario para editar un producto existente.
    public function edit(Producto $producto): View
    {
        $categorias = Categoria::all(['id_categorias', 'nombre_categoria']);
        return view('productos.edit', compact('producto', 'categorias'));
    }

    // Actualiza un producto existente en la base de datos.
    public function update(UpdateProductoRequest $request, Producto $producto): RedirectResponse
    {
        $producto->update($request->validated());
        return redirect()->route('productos.index')->with('success', 'Producto actualizado exitosamente.');
    }

    // Desactiva un producto de la base de datos.
    public function destroy(Producto $producto): RedirectResponse
    {
        $producto->delete(); // Esto hace soft delete gracias a SoftDeletes
        return redirect()->route('productos.index')
                        ->with('success', 'Producto dado de baja exitosamente.');
    }
    
}