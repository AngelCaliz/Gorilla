@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-7">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-lg border-0 rounded-3">
                
                <!-- Card Header - Información principal -->
                <div class="card-header bg-warning-subtle text-dark p-4 rounded-top-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-circle fs-1 me-3 text-warning"></i>
                        <div>
                            <h3 class="mb-0 fw-bold">{{ $user->name }}</h3>
                            <p class="text-muted mb-0">
                                Rol: 
                                <span class="badge {{ $user->rol === 'admin' ? 'bg-danger' : ($user->rol === 'trabajador' ? 'bg-primary' : 'bg-success') }}">
                                    {{ ucfirst($user->rol) }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Card Body - Detalles -->
                <div class="card-body p-4">
                    <h4 class="mb-3 border-bottom pb-2">Detalles de la Cuenta</h4>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div><i class="bi bi-envelope-fill me-2 text-primary"></i> Email</div>
                            <span class="fw-bold">{{ $user->email }}</span>
                        </li>
                        
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div><i class="bi bi-calendar-check me-2 text-info"></i> Miembro desde</div>
                            <span class="text-muted">{{ $user->created_at->format('d/m/Y') }}</span>
                        </li>
                        
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div><i class="bi bi-telephone-fill me-2 text-secondary"></i> Teléfono</div>
                            <span class="text-muted">{{ $user->phone ?? 'No registrado' }}</span>
                        </li>
                        
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div><i class="bi bi-house-door-fill me-2 text-secondary"></i> Dirección</div>
                            <span class="text-muted">{{ $user->address ?? 'No registrada' }}</span>
                        </li>
                    </ul>
                </div>
                
                <!-- Card Footer - Botón de Edición -->
                <div class="card-footer text-center p-3 border-0 bg-light rounded-bottom-3">
                    <a href="{{ route('perfil.edit') }}" class="btn btn-warning btn-lg fw-bold shadow-sm">
                        <i class="bi bi-pencil-square me-2"></i> Editar Perfil y Contraseña
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection