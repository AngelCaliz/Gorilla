@extends('layouts.app')

@section('content')
    <div class="text-center mb-4">
        <h1 class="fw-bold text-dark">Nuestros Productos</h1>
        <p class="text-muted">Descubre la línea exclusiva de cosméticos Gorilla 🦍</p>
    </div>

    <div class="text-end mb-3">
<a href="{{ route('admin.productos.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-circle"></i> Agregar Producto
        </a>
    </div>

    <div class="row">
        @forelse ($productos as $producto)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">{{ $producto->nombre }}</h5>
                        <p class="card-text text-muted">{{ $producto->descripcion ?? 'Sin descripción' }}</p>
                        <p><strong>Precio:</strong> S/. {{ $producto->precio }}</p>
                        <p><strong>Stock:</strong> {{ $producto->stock }}</p>
                        <span class="badge bg-primary">
                            {{ $producto->categoria ? $producto->categoria->nombre : 'Sin categoría' }}
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">No hay productos registrados aún.</p>
        @endforelse
    </div>
@endsection
