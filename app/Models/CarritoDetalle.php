<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarritoDetalle extends Model
{
    use HasFactory;

    protected $table = 'carrito_detalles';

    protected $fillable = [
        'carrito_id',
        'producto_id',
        'cantidad',
        'precio'
    ];

    // 🔗 Cada detalle pertenece a un carrito
    public function carrito()
    {
        return $this->belongsTo(Carrito::class, 'carrito_id');
    }

    // 🔗 Cada detalle pertenece a un producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
