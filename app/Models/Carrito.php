<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carrito extends Model
{
    use HasFactory;

    protected $table = 'carrito';

    protected $fillable = [
        'user_id'
    ];

    // 🔗 Un carrito tiene muchos productos dentro
    public function detalles()
    {
        return $this->hasMany(CarritoDetalle::class, 'carrito_id');
    }

    // 🔗 Relación opcional con usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
