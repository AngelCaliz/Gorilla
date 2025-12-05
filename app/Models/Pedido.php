<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model

{
    protected $table = 'pedidos';  // nombre de la tabla

    protected $fillable = [
        'producto',
        'nombre_cliente',
        'correo',
        'telefono',
        'direccion',
        'cantidad',
        'metodo_pago'
    ];
}

