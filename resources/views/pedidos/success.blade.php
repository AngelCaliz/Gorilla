@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h1 class="text-success fw-bold">🎉 ¡Compra realizada con éxito!</h1>
    <p class="mt-3">Tu pedido se registró correctamente. Nos comunicaremos contigo pronto.</p>

    <a href="{{ route('productos.tienda') }}" class="btn btn-primary mt-4">
        Volver a la tienda
    </a>
</div>
@endsection
