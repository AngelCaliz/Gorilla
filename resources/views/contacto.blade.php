@extends('layouts.app')

@section('content')
<h2 class="fw-bold text-center text-warning mb-4">📞 Contáctanos</h2>

<div class="row justify-content-center">
    <div class="col-md-6">
        <form class="card shadow p-4">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" placeholder="Tu nombre">
            </div>

            <div class="mb-3">
                <label class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" placeholder="tucorreo@gmail.com">
            </div>

            <div class="mb-3">
                <label class="form-label">Mensaje</label>
                <textarea class="form-control" rows="4" placeholder="Escribe tu mensaje..."></textarea>
            </div>

            <button type="submit" class="btn btn-warning w-100">Enviar</button>
        </form>
    </div>
</div>
@endsection
