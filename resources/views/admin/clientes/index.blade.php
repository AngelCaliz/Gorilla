@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2 class="fw-bold">🦍 Gestión de Clientes</h2>
            <p class="text-muted">Administra los usuarios que compran en la tienda.</p>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('admin.clientes.create') }}" class="btn btn-primary">
                + Nuevo Cliente
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            @if($clientes->count() > 0)
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
                            @foreach($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->id }}</td>
                                    <td>
                                        <span class="fw-bold">{{ $cliente->name }}</span>
                                    </td>
                                    <td>{{ $cliente->email }}</td>
                                    <td>{{ $cliente->created_at->format('d/m/Y') }}</td>
                                    <td class="text-end">
                                        
                                        <a href="{{ route('admin.clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning me-1">
                                            Editar
                                        </a>

                                        <form action="{{ route('admin.clientes.destroy', $cliente->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar a este cliente? Esta acción no se puede deshacer.');">
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

                <div class="d-flex justify-content-center mt-3">
                    {{ $clientes->links() }}
                </div>

            @else
                <div class="text-center py-5">
                    <h4 class="text-muted">No hay clientes registrados aún.</h4>
                    <p>¡Añade el primero con el botón de arriba!</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection