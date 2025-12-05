<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card p-4 shadow" style="width: 400px;">

        <!-- BOTÓN VOLVER -->
        <a href="/" class="btn btn-outline-secondary mb-3">← Volver a Inicio</a>

        <h3 class="text-center mb-3">Iniciar Sesión</h3>

        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('login.procesar') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Correo:</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña:</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-dark w-100 mt-2" type="submit">
                Ingresar
            </button>
        </form>

        <!-- BOTÓN REGISTRARSE -->
        <a href="/register" class="btn btn-warning w-100 mt-3">Crear una cuenta</a>

    </div>
</div>

</body>
</html>
