<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class TrabajadorController extends Controller
{
    // Mostrar todos los trabajadores
    public function index()
    {
        $trabajadores = User::where('rol', 'trabajador')->paginate(10);
        
        return view('admin.trabajadores.index', compact('trabajadores'));
    }

    // Formulario para crear trabajador
    public function create()
    {
        return view('admin.trabajadores.create');
    }

    // Guardar nuevo trabajador
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

        // 2. Crear el trabajador (modelo User)
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            
            // Campos de contacto asignados
            'phone' => $validatedData['phone'] ?? null, 
            'address' => $validatedData['address'] ?? null, 
            
            'rol' => 'trabajador', // Corregido a 'rol'
        ]);

        // 3. Redirección final
        return redirect()->route('admin.trabajadores.index')
            ->with('success', 'Trabajador registrado correctamente.');
    }

    // Editar trabajador
    public function edit(User $trabajador)
    {
        return view('admin.trabajadores.edit', compact('trabajador'));
    }

    // Actualizar trabajador
    public function update(Request $request, User $trabajador)
    {
        // 1. VALIDACIÓN MEJORADA: Incluimos phone y address
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($trabajador->id)],
            'password' => 'nullable|string|min:8|confirmed',
            
            // Campos de contacto incluidos
            'phone' => 'nullable|string|max:50', 
            'address' => 'nullable|string|max:255',
        ]);
        
        // 2. Asignación de datos
        $trabajador->name = $data['name'];
        $trabajador->email = $data['email'];
        
        // 3. Asignación de campos de contacto (phone y address)
        $trabajador->phone = $data['phone'];
        $trabajador->address = $data['address'];

        // 4. LÓGICA DE CONTRASEÑA: Solo actualizamos si se proporciona una nueva
        if ($request->filled('password')) {
            $trabajador->password = Hash::make($data['password']);
        }

        $trabajador->save();
        return redirect()->route('admin.trabajadores.index')->with('success', 'Trabajador actualizado con éxito.');
    }

    // Eliminar trabajador
    public function destroy(User $trabajador)
    {
        $trabajador->delete();
        return redirect()->route('admin.trabajadores.index')->with('success', 'Trabajador eliminado con éxito.');
    }
}