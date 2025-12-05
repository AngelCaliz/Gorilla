@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark fw-bold">🧾 Adquirir Producto</div>
        <div class="card-body">
            <h4 class="text-center mb-3">{{ $producto }}</h4>

            {{-- ENVIAR PEDIDO AL CONTROLADOR --}}
            <form action="{{ route('pedido.store') }}" method="POST">
                @csrf

                <input type="hidden" name="producto" value="{{ $producto }}">

                <div class="mb-3">
                    <label class="form-label">Nombre completo</label>
                    <input type="text" name="nombre_cliente" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Dirección</label>
                    <input type="text" name="direccion" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cantidad</label>
                    <input type="number" name="cantidad" value="1" min="1" class="form-control" required>
                </div>

                <button class="btn btn-dark w-100">Confirmar pedido</button>
            </form>
        </div>
    </div>
</div>
@endsection
