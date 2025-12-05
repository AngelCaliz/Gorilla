<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Opcional, pero útil si necesitas datos del usuario

class AdminController extends Controller
{
    /**
     * Muestra el panel principal del administrador.
     * * La ruta 'admin.dashboard' apunta a este método.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // 1. Opcional: Puedes verificar el rol aquí, aunque el middleware ya lo hizo.
        if (Auth::user()->rol !== 'admin') {
            abort(403, 'Acceso no autorizado.'); // 403 Forbidden
        }

        // 2. Retorna la vista del panel de administración
        return view('admin.dashboard'); 
    }
}