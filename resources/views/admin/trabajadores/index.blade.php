@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2 class="fw-bold">🛠️ Gestión de Trabajadores</h2>
            <p class="text-muted">Administra los usuarios con rol de trabajador.</p>
        </div>

        <a href="{{ route('admin.trabajadores.create') }}" class="btn btn-primary">
            + Nuevo Trabajador
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            @if(isset($trabajadores) && $trabajadores->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Fecha Registro</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trabajadores as $trabajador)
                        <tr>
                            <td>{{ $trabajador->id }}</td>
                            <td class="fw-bold">{{ $trabajador->name }}</td>
                            <td>{{ $trabajador->email }}</td>
                            <td>{{ $trabajador->created_at->format('d/m/Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.trabajadores.edit', $trabajador->id) }}" class="btn btn-sm btn-warning me-1">
                                    Editar
                                </a>

                                <form action="{{ route('admin.trabajadores.destroy', $trabajador->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar a este trabajador? Esta acción no se puede deshacer.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-5">
                <h4 class="text-muted">No hay trabajadores registrados aún.</h4>
                <p>Crea el primer trabajador usando el botón de arriba.</p>
            </div>
            @endif
        </div>
    </div>

    @if(isset($trabajadores) && $trabajadores->count() > 0 && method_exists($trabajadores, 'links'))
    <div class="d-flex justify-content-center mt-3">
        {{ $trabajadores->links() }}
    </div>
    @endif
</div>
@endsection