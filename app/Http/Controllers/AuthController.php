<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // PROCESAR LOGIN
    public function login(Request $request)
    {
        $credenciales = $request->only('email', 'password');

        if (Auth::attempt($credenciales)) {
            return redirect('/'); // Inicio o dashboard
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas']);
    }

    // PROCESAR REGISTRO
    public function register(Request $request)
    {
        User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'phone'         => $request->phone,
            'address'       => $request->address,
            'profile_photo' => $request->profile_photo,
            'is_admin'      => false // Siempre cliente por defecto
        ]);


        return redirect('/login')->with('success', 'Cuenta creada correctamente');
    }

    // LOGOUT
    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
}

}
