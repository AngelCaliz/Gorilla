@extends('layouts.app')

@section('content')
<h2 class="fw-bold text-center text-warning mb-4">💈 Servicios Profesionales de Barbería</h2>

<div class="row">

    <!-- Servicio 1 -->
    <div class="col-md-6 mb-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Ventas de Máquinas Profesionales</h5>
                <p class="card-text">
                    Ofrecemos máquinas de cortar cabello, máquinas de rasurar y trimmers de alta precisión 
                    utilizadas por barberos profesionales.
                </p>
            </div>
        </div>
    </div>

    <!-- Servicio 2 -->
    <div class="col-md-6 mb-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Productos de Tintura y Colorimetría</h5>
                <p class="card-text">
                    Contamos con tintes, reveladores, decolorantes y kits completos para trabajos de 
                    coloración masculina, barbas y retoques.
                </p>
            </div>
        </div>
    </div>

    <!-- Servicio 3 -->
    <div class="col-md-6 mb-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Accesorios de Barber Shop</h5>
                <p class="card-text">
                    Peines, cepillos, tijeras, navajas, capas de corte, bálsamos, ceras y productos de 
                    acabado para un servicio de calidad premium.
                </p>
            </div>
        </div>
    </div>

    <!-- Servicio 4 -->
    <div class="col-md-6 mb-3">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="card-title">Mantenimiento y Afiliado Técnico</h5>
                <p class="card-text">
                    Realizamos limpieza, afilado, reparación y calibración de máquinas profesionales para 
                    mantener tu equipo al máximo rendimiento.
                </p>
            </div>
        </div>
    </div>

</div>
@endsection
