<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {

        // 1. Verificar si el usuario está logueado
        if (!Auth::check()) {
            return redirect('/login');
        }

        // 2. Verificar si el atributo 'rol' del usuario coincide con el requerido
        // Asumiendo que en tu BD el campo se llama 'role' o 'rol'
        if ($request->user()->rol !== $role) {
            abort(403, 'No tienes permiso para acceder a esta sección.');
        }

        return $next($request);
    }
}