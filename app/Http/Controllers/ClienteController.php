<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ClienteController extends Controller
{
    /**
     * Muestra la lista de clientes.
     */
    public function index()
    {
        // Filtramos para mostrar SOLO los que tienen rol 'cliente'
        $clientes = User::where('rol', 'cliente')->paginate(10);

        return view('admin.clientes.index', compact('clientes'));
    }

    /**
     * Muestra el formulario para crear un nuevo cliente.
     */
    public function create()
    {
        return view('admin.clientes.create');
    }

    /**
     * Guarda el nuevo cliente en la base de datos.
     */
    public function store(Request $request)
    {
        // 1. Incluimos phone y address en la validación
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

            // Campos de contacto incluidos
            'phone' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
        ]);

        // 2. Crear el cliente (modelo User)
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),

            // Campos de contacto asignados
            'phone' => $validatedData['phone'] ?? null,
            'address' => $validatedData['address'] ?? null,

            'rol' => 'cliente', // Corregido a 'rol'
        ]);

        // 3. Redirección final
        return redirect()->route('admin.clientes.index')
            ->with('success', 'Cliente registrado correctamente.');
    }

    /**
     * Muestra el formulario para editar un cliente específico.
     */
    public function edit(string $id)
    {
        $cliente = User::findOrFail($id);

        return view('admin.clientes.edit', compact('cliente'));
    }

    /**
     * Actualiza los datos del cliente.
     */
    public function update(Request $request, string $id)
    {
        $cliente = User::findOrFail($id);

        // 1. Validar (incluyendo phone y address)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($cliente->id)],
            'password' => 'nullable|min:8|confirmed', // La contraseña es opcional al editar
            
            // Campos de contacto incluidos
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
        ]);

        // 2. Actualizar datos básicos
        $cliente->name = $request->name;
        $cliente->email = $request->email;
        
        // 3. Actualizar campos de contacto
        $cliente->phone = $request->phone;
        $cliente->address = $request->address;

        // 4. Si escribieron una contraseña nueva, la actualizamos
        if ($request->filled('password')) {
            $cliente->password = Hash::make($request->password);
        }

        $cliente->save();

        return redirect()->route('admin.clientes.index')
            ->with('success', 'Cliente actualizado correctamente.');
    }

    /**
     * Elimina el cliente.
     */
    public function destroy(string $id)
    {
        $cliente = User::findOrFail($id);
        $cliente->delete();

        return redirect()->route('admin.clientes.index')
            ->with('success', 'Cliente eliminado correctamente.');
    }
}