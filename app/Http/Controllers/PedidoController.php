<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{
    /**
     * Guardar un nuevo pedido en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación (nombres de campos alineados con el formulario)
        $request->validate([
            'producto'       => 'required|string',
            'cantidad'       => 'required|integer|min:1',
            'nombre_cliente' => 'required|string|max:255',
            'telefono'       => 'required|string|max:50',
            'direccion'      => 'required|string|max:500',
        ]);

        // Guardar en la base de datos usando fillable en el modelo Pedido
        Pedido::create([
            'producto'       => $request->input('producto'),
            'cantidad'       => $request->input('cantidad'),
            'nombre_cliente' => $request->input('nombre_cliente'),
            'telefono'       => $request->input('telefono'),
            'direccion'      => $request->input('direccion'),
        ]);

        // Redirigir a una página de confirmación (asegúrate que la ruta exista)
        return redirect()->route('pedido.ok')
                         ->with('success', '✅ Pedido registrado correctamente.');
    }
}
