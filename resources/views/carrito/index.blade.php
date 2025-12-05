@extends('layouts.app')

@section('content')
<h2 class="fw-bold text-center text-warning mb-4">🛒 Mi Carrito</h2>

@if(empty($carrito))
    <p class="text-center">Tu carrito está vacío.</p>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
                <th>Opción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carrito as $item)
            <tr>
                <td>{{ $item['nombre'] }}</td>
                <td>S/ {{ $item['precio'] }}</td>
                <td>{{ $item['cantidad'] }}</td>
                <td>S/ {{ $item['precio'] * $item['cantidad'] }}</td>
                <td>
                    <form action="{{ route('carrito.eliminar', $item['id']) }}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('carrito.vaciar') }}" method="POST" class="text-center mt-4">
        @csrf
        <button class="btn btn-dark">Vaciar Carrito</button>
    </form>
@endif

@endsection
