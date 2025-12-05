@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-8">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <!-- Título dinámico y con icono de información -->
                    <h2 class="fw-bold"><i class="bi bi-person-badge-fill me-2 text-info"></i> Editar Trabajador: {{ $trabajador->name }}</h2>
                    <p class="text-muted">Actualiza la información personal, de contacto o la contraseña del empleado.</p>
                </div>
                <!-- Botón Volver a la lista -->
                <a href="{{ route('admin.trabajadores.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver a la lista
                </a>
            </div>
        
            <div class="card shadow-lg border-0 rounded-3 p-4">
                @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        Por favor, corrige los siguientes errores en el formulario.
                    </div>
                @endif
                
                <!-- Formulario de Edición con método PUT -->
                <form action="{{ route('admin.trabajadores.update', $trabajador->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- SECCIÓN 1: INFORMACIÓN GENERAL -->
                    <h4 class="mb-3 border-bottom pb-2 text-primary fw-bold">Datos de la Cuenta</h4>
                    
                    <div class="row">
                        <!-- Campo Nombre -->
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Nombre Completo</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $trabajador->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campo Email -->
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $trabajador->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    
                    <!-- SECCIÓN 2: CONTACTO Y UBICACIÓN (Nuevos campos para completar la información) -->
                    <h4 class="mb-3 border-bottom pb-2 text-warning fw-bold">Detalles de Contacto</h4>
                    
                    <div class="row">
                        <!-- Campo Teléfono -->
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">Teléfono</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $trabajador->phone) }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campo Dirección -->
                        <div class="col-md-6 mb-4">
                            <label for="address" class="form-label">Dirección</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $trabajador->address) }}">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- SECCIÓN 3: CONTRASEÑA (OPCIONAL) -->
                    <h4 class="mb-3 border-bottom pb-2 text-danger fw-bold">Cambiar Contraseña (Opcional)</h4>
                    <p class="text-muted small">Solo llena estos campos si necesitas establecer una nueva contraseña. Si los dejas vacíos, la contraseña actual se mantendrá.</p>
                    
                    <div class="row">
                        <!-- Campo Nueva Contraseña -->
                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">Nueva Contraseña</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campo Confirmar Contraseña -->
                        <div class="col-md-6 mb-4">
                            <label for="password_confirmation" class="form-label">Confirmar Nueva Contraseña</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        </div>
                    </div>

                    <!-- Botón de Actualización -->
                    <div class="mt-4 pt-2 border-top">
                        <button type="submit" class="btn btn-info btn-lg fw-bold">
                            <i class="bi bi-save me-2"></i> Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection