@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-8">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold"><i class="bi bi-person-gear me-2"></i> Editar Mi Perfil</h2>
                <a href="{{ route('perfil.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver al Perfil
                </a>
            </div>

            <!-- Manejo de Sesión y Errores -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-lg border-0 rounded-3 p-4">

                <form action="{{ route('perfil.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- SECCIÓN 1: INFORMACIÓN PERSONAL Y DE CONTACTO -->
                    <h4 class="mb-3 border-bottom pb-2 text-warning fw-bold"><i class="bi bi-info-circle me-2"></i> Datos de Contacto</h4>
                    <p class="text-muted small mb-4">Actualiza tu nombre y tu información de contacto.</p>

                    <div class="row">
                        <!-- Nombre -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Correo -->
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Correo</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Teléfono -->
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Teléfono</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" class="form-control @error('phone') is-invalid @enderror">
                            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Dirección -->
                        <div class="col-md-6 mb-3">
                            <label for="address" class="form-label">Dirección</label>
                            <input type="text" name="address" id="address" value="{{ old('address', $user->address) }}" class="form-control @error('address') is-invalid @enderror">
                            @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    
                    <hr class="my-4">

                    <!-- SECCIÓN 2: SEGURIDAD -->
                    <h4 class="mb-3 border-bottom pb-2 text-danger fw-bold"><i class="bi bi-lock-fill me-2"></i> Cambiar Contraseña</h4>
                    <p class="text-muted small mb-4">Solo completa los campos siguientes si deseas cambiar tu contraseña.</p>

                    <div class="row">
                        <!-- Nueva Contraseña -->
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Nueva Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar Nueva Contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                    </div>
                    
                    <!-- Botón de Guardar -->
                    <div class="mt-4 pt-2 border-top">
                        <button class="btn btn-success btn-lg fw-bold" type="submit">
                            <i class="bi bi-save me-2"></i> Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection