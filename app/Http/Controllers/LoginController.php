<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // Mostrar formulario login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Mostrar formulario registro
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Procesar login
    public function procesar(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas.']);
    }

    // Registrar usuario
    public function register(Request $request)
    {
        // 1. VALIDACIÓN
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string|max:255',
        ]);

        // 2. CREACIÓN (Añadidos phone y address)
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'rol'      => 'cliente',
            'phone'    => $request->phone,
            'address'  => $request->address,
        ]);

        Auth::login($user);

        return redirect('/');
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}