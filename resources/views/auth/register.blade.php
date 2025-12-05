<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registrarse</title>
    <!-- Incluye Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos de Bootstrap (útil para el diseño) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Estilos para centrar y darle un toque a la tarjeta */
        .card-gorilla {
            width: 450px;
            border-radius: 15px;
            border-top: 5px solid #ffd768; /* Color de tu navbar */
        }
    </style>
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card p-4 shadow-lg card-gorilla">

            <!-- Botón de regreso al Login -->
            <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm mb-3">
                <i class="bi bi-arrow-left"></i> Volver al Login
            </a>

            <h3 class="text-center mb-4 fw-bold">🦍 Crear Cuenta Cliente</h3>
            
            <!-- BLOQUE DE ERRORES DE VALIDACIÓN (Muestra los errores de Laravel) -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- FIN BLOQUE DE ERRORES -->

            <form action="{{ route('register.procesar') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nombre:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo Electrónico:</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <!-- CAMPO VITAL: Confirmación de Contraseña -->
                <div class="mb-3">
                    <label class="form-label">Confirmar Contraseña:</label>
                    <!-- Debe tener el atributo name="password_confirmation" para la regla 'confirmed' -->
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Teléfono:</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Dirección:</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                </div>

                <button class="btn btn-dark w-100 mt-3 fw-bold" type="submit">
                    <i class="bi bi-person-add"></i> Registrarse
                </button>
            </form>

        </div>
    </div>

    <!-- Incluye el script de Bootstrap 5.3 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>