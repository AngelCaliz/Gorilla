@extends('layouts.app')

@section('content')
<h2 class="fw-bold text-center text-warning mb-4">🛍️ Nuestros Productos</h2>

@php
$productos = [
    // Máquinas y herramientas
    'Máquina de Cortar Cabello Profesional',
    'Trimmer de Precisión',
    'Rasuradora Eléctrica',
    'Máquina Inalámbrica de Barbería',
    'Tijeras Profesionales de Corte',
    'Tijeras de Entresacar',
    'Navaja Clásica de Barbería',
    'Peines de Corte Premium',
    'Cepillo para Fade',
    'Afilador de Cuchillas',

    // Tintes, color y químicos
    'Tinte Permanente para Cabello',
    'Revelador en Crema',
    'Decolorante Profesional',
    'Matizador para Barba y Cabello',
    'Tinte Semipermanente Fashion',

    // Productos de cuidado personal
    'Shampoo Nutritivo',
    'Shampoo Anticaspa',
    'Acondicionador Reparador',
    'Tratamiento Capilar de Keratina',
    'Aceite Capilar de Argán',
    'Mascarilla Capilar Hidratante',

    // Productos para barba
    'Aceite para Barba',
    'Bálsamo para Barba',
    'Cera para Bigote',
    'Gel para Afeitado',
    'After Shave Refrescante',

    // Estilizado y acabado
    'Cera para Peinar',
    'Pomada de Alto Fijación',
    'Gel Fijador Profesional',
    'Spray Texturizador',
    'Laca para Peinado',

    // Accesorios / Barbería
    'Capa para Corte',
    'Delantal de Barbero',
    'Pulverizador Metálico',
    'Toallas de Barbería',
    'Organizador de Herramientas',

    // Aparatos eléctricos adicionales
    'Secadora de Cabello Profesional',
    'Plancha para Cabello',
    'Rizador de Cabello',
];
@endphp

<div class="row g-4">
    @foreach($productos as $producto)
        <div class="col-md-4">
            <div class="card shadow producto">

                <img src="https://via.placeholder.com/400x250?text={{ urlencode($producto) }}" 
                     class="card-img-top" alt="{{ $producto }}">

                <div class="card-body text-center">
                    <h5 class="card-title">{{ $producto }}</h5>
                    <p class="card-text">
                        Producto profesional de alta calidad, ideal para salones de belleza y barberías.
                    </p>

                    {{-- BOTÓN QUE REDIRIGE A LA COMPRA --}}
                        <a href="#" class="btn btn-warning">Añadir al Carrito</a>
                    </a>

                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="text-center mt-5">
    <a href="{{ route('admin.productos.index') }}" class="btn btn-dark">
        ⚙️ Ir al CRUD de Productos
    </a>
</div>

@endsection
