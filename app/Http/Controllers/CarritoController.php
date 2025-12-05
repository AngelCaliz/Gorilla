<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\CarritoDetalle;
use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    // 🛍️ Mostrar carrito
    public function index()
    {
        $carrito = Carrito::firstOrCreate(['user_id' => 1]); // Simulado

        return view('carrito', [
            'carrito' => $carrito,
            'detalles' => $carrito->detalles
        ]);
    }

    // ➕ Agregar producto al carrito
    public function agregar(Request $request, $id)
    {
        // Verificar que el producto exista
        $producto = Producto::findOrFail($id);

        // Obtener o crear carrito del usuario (por ahora user_id = 1)
        $carrito = Carrito::firstOrCreate(['user_id' => 1]);

        // Verificar si ya está en el carrito
        $detalle = CarritoDetalle::where('carrito_id', $carrito->id)
                                 ->where('producto_id', $producto->id)
                                 ->first();

        if ($detalle) {
            // Si ya está → incrementar cantidad
            $detalle->cantidad += 1;
            $detalle->save();
        } else {
            // Si no está → agregarlo
            CarritoDetalle::create([
                'carrito_id' => $carrito->id,
                'producto_id' => $producto->id,
                'cantidad' => 1,
                'precio' => $producto->precio ?? 10.00 // valor por defecto
            ]);
        }

        return redirect()->route('carrito.index')
                         ->with('success', 'Producto agregado al carrito');
    }

    // ❌ Eliminar un ítem
    public function eliminar($id)
    {
        CarritoDetalle::findOrFail($id)->delete();
        return back()->with('success', 'Producto eliminado');
    }

    // 🗑️ Vaciar todo
    public function vaciar()
    {
        $carrito = Carrito::firstOrCreate(['user_id' => 1]);
        $carrito->detalles()->delete();

        return back()->with('success', 'Carrito vaciado');
    }
}
