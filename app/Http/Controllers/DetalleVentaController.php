<?php

namespace App\Http\Controllers;

use App\Models\DetalleVenta;
use Illuminate\Http\Request;

class DetalleVentaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'venta_id' => 'required|exists:ventas,id',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric'
        ]);

        $subtotal = $request->cantidad * $request->precio_unitario;

        DetalleVenta::create([
            'venta_id' => $request->venta_id,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
            'subtotal' => $subtotal
        ]);

        return back()->with('success', 'Producto agregado correctamente a la venta.');
    }
}
