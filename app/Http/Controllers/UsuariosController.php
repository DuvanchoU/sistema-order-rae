<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Roles;
use App\Http\Requests\StoreUsuariosRequest;
use App\Http\Requests\UpdateUsuariosRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UsuariosController extends Controller
{
    public function index(): View
    {
        $usuarios = Usuario::with('rol')
            ->orderBy('nombres')
            ->paginate(15);
        return view('usuarios.index', compact('usuarios'));
    }

    public function create(): View
    {
        $roles = Roles::all(['id_rol', 'nombre_rol']);
        return view('usuarios.create', compact('roles'));
    }

    public function store(StoreUsuariosRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['contrasena_usuario'] = bcrypt($data['contrasena_usuario']); // Encriptar contraseña
        Usuario::create($data);
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado exitosamente.');
    }

    public function show(Usuario $usuario): View
    {
        $usuario->load('rol', 'ventas', 'compras', 'pedidos');
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(Usuario $usuario): View
    {
        $roles = Roles::all(['id_rol', 'nombre_rol']);
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    public function update(UpdateUsuariosRequest $request, Usuario $usuario): RedirectResponse
    {
        $data = $request->validated();
        if ($request->filled('contrasena_usuario')) {
            $data['contrasena_usuario'] = bcrypt($data['contrasena_usuario']);
        } else {
            unset($data['contrasena_usuario']); // No actualizar contraseña si no se envía
        }
        $usuario->update($data);
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(Usuario $usuario): RedirectResponse
    {
        $usuario->delete();
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario dado de baja exitosamente.');
    }
}
