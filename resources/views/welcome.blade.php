<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GORILLA STORE</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <!-- NAVBAR -->
    @include('partials.navbar')

    <!-- CARRUSEL -------------------------------------------------------------->
    <div id="hero" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1589881268901-1dfddeb6bff0" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1600423115367-eda2c288e0a0" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1610992015731-c7ebe97ed8c5" class="d-block w-100">
            </div>
        </div>
    </div>

    <!-- LOGO CENTRAL -------------------------------------------------------------->
    <div class="text-center my-4">
        <img class="gorilla-logo" src="Gorilla.png">
        <h2 class="fw-bold mt-3">GORILLA STORE</h2>
        <p class="text-muted">Equipamiento Profesional de Barbería y Belleza</p>
    </div>

    <!-- PRODUCTOS DESTACADOS ------------------------------------------------------->
    <section class="container">
        <h2 class="text-center fw-bold mb-4">Productos Destacados</h2>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card producto-card shadow">
                    <img src="https://images.unsplash.com/photo-1600423115367-eda2c288e0a0" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="fw-bold">Máquina de Corte</h5>
                        <p>Máxima precisión y potencia profesional.</p>
                        <a href="/productos" class="btn btn-dark">Ver más</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card producto-card shadow">
                    <img src="https://images.unsplash.com/photo-1610992015731-c7ebe97ed8c5" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="fw-bold">Trimmer Precision</h5>
                        <p>Perfecto para delineado profesional.</p>
                        <a href="/productos" class="btn btn-dark">Ver más</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card producto-card shadow">
                    <img src="https://images.unsplash.com/photo-1589881268901-1dfddeb6bff0" class="card-img-top">
                    <div class="card-body text-center">
                        <h5 class="fw-bold">Tintes Premium</h5>
                        <p>Colores intensos y de larga duración.</p>
                        <a href="/productos" class="btn btn-dark">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- REDES SOCIALES ----------------------------------------------------------->
    <div class="social-container">
        <a href="https://facebook.com" target="_blank"><i class="bi bi-facebook"></i></a>
        <a href="https://wa.me/51999999999" target="_blank"><i class="bi bi-whatsapp"></i></a>
        <a href="https://youtube.com" target="_blank"><i class="bi bi-youtube"></i></a>
    </div>

    <!-- FOOTER ------------------------------------------------------------------->
    <footer class="text-center">
        &copy; 2025 Gorilla Store — Calidad Profesional para Barberías y Belleza
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
