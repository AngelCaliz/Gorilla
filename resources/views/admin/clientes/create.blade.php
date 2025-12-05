@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-8">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h2 class="fw-bold"><i class="bi bi-person-plus-fill me-2 text-success"></i> Registrar Nuevo Cliente</h2>
                    <p class="text-muted">Completa la información del nuevo cliente, incluyendo sus datos de contacto.</p>
                </div>
                <!-- Botón Volver a la lista -->
                <a href="{{ route('admin.clientes.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver a la lista
                </a>
            </div>
        
            <div class="card shadow-lg border-0 rounded-3 p-4">
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        Por favor, corrige los siguientes errores en el formulario.
                    </div>
                @endif
                
                <!-- Formulario de Creación -->
                <form action="{{ route('admin.clientes.store') }}" method="POST">
                    @csrf

                    <!-- SECCIÓN 1: DATOS DE ACCESO -->
                    <h4 class="mb-3 border-bottom pb-2 text-success fw-bold">Datos de la Cuenta</h4>
                    
                    <div class="row">
                        <!-- Campo Nombre -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campo Email -->
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            <div class="form-text text-muted">Será usado para iniciar sesión.</div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <!-- SECCIÓN 2: CONTACTO Y UBICACIÓN -->
                    <h4 class="mb-3 border-bottom pb-2 text-warning fw-bold">Información de Contacto</h4>
                    
                    <div class="row">
                        <!-- Campo Teléfono -->
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Teléfono</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campo Dirección -->
                        <div class="col-md-6 mb-4">
                            <label for="address" class="form-label">Dirección</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- SECCIÓN 3: CONTRASEÑA -->
                    <h4 class="mb-3 border-bottom pb-2 text-danger fw-bold">Contraseña Inicial</h4>
                    
                    <div class="row">
                        <!-- Campo Contraseña -->
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campo Confirmar Contraseña -->
                        <div class="col-md-6 mb-4">
                            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                    </div>

                    <!-- Botón de Registro -->
                    <div class="mt-4 pt-2 border-top">
                        <button type="submit" class="btn btn-success btn-lg fw-bold">
                            <i class="bi bi-person-check-fill me-2"></i> Registrar Cliente
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection