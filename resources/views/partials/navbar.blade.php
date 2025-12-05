<nav class="navbar navbar-expand-lg navbar-light shadow-lg py-3 bg-white">
    <div class="container">

        <!-- Logo y Marca -->
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('inicio') }}">
            <!-- Logo con borde de tu color de marca para contraste -->
            <img src="{{ asset('Gorilla.png') }}" alt="Gorilla Logo" height="35" class="me-2 rounded-circle border border-2" style="border-color: #ffd768 !important;">
            <span class="text-dark">GORILLA</span>
        </a>

        <!-- Toggler para Móviles -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">

            <!-- Enlaces Principales (Centrados) -->
            <ul class="navbar-nav mx-auto fw-medium">
                <!-- Todos los enlaces son negros sobre fondo blanco -->
                <li class="nav-item"><a class="nav-link text-dark" href="{{ route('inicio') }}">Inicio</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="{{ route('tienda.index') }}">Productos</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="{{ route('servicios') }}">Servicios</a></li>
                <li class="nav-item"><a class="nav-link text-dark" href="{{ route('contacto') }}">Contacto</a></li>
            </ul>

            <!-- Acciones Derecha (Búsqueda y Autenticación) -->
            <div class="d-flex align-items-center">

                <!-- Formulario de Búsqueda -->
                <form method="GET" action="{{ route('tienda.index') }}" class="d-flex me-3">
                    <input class="form-control form-control-sm me-2" name="buscar" type="search" placeholder="Buscar productos..." aria-label="Buscar">
                    <!-- Botón de búsqueda de tu color de marca -->
                    <button type="submit" class="btn btn-sm text-dark fw-bold" style="background-color: #ffd768;">
                        <i class="bi bi-search"></i>
                    </button>
                </form>

                @auth
                    <!-- Menú Desplegable de Usuario y Gestión -->
                    <div class="nav-item dropdown">
                        <!-- Botón del usuario de color de marca con texto oscuro -->
                        <a class="nav-link dropdown-toggle btn btn-sm ps-3 pe-3 text-dark fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #ffd768;">
                            <i class="bi bi-person-circle me-1"></i> 
                            {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 mt-2" aria-labelledby="navbarDropdown">
                            <!-- Enlace de Perfil -->
                            <li>
                                <a class="dropdown-item" href="{{ route('perfil.index') }}">
                                    <i class="bi bi-person me-2"></i> Ver Perfil
                                </a>
                            </li>
                            
                            <!-- SEPARADOR Y TÍTULO DE GESTIÓN (Solo si es admin o trabajador) -->
                            @if(Auth::user()->rol === 'admin' || Auth::user()->rol === 'trabajador')
                                <li><hr class="dropdown-divider"></li>
                                <li class="dropdown-header small text-muted">PANEL DE GESTIÓN</li>
                            @endif

                            <!-- ENLACES DE GESTIÓN PARA EL ADMINISTRADOR (Solo Clientes y Trabajadores) -->
                            @if(Auth::user()->rol === 'admin')
                                <li>
                                    <a class="dropdown-item text-primary" href="{{ route('admin.clientes.index') }}">
                                        <i class="bi bi-people-fill me-2"></i> Gestionar Clientes
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item text-info" href="{{ route('admin.trabajadores.index') }}">
                                        <i class="bi bi-person-badge-fill me-2"></i> Gestionar Trabajadores
                                    </a>
                                </li>
                            @endif

                            <!-- ENLACES DE GESTIÓN PARA EL TRABAJADOR (Solo Productos) -->
                            @if(Auth::user()->rol === 'trabajador')
                                <li>
                                    <a class="dropdown-item text-warning" href="{{ route('admin.productos.index') }}">
                                        <i class="bi bi-box-seam-fill me-2"></i> Gestionar Productos
                                    </a>
                                </li>
                            @endif

                            <!-- Cerrar Sesión -->
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="dropdown-item text-danger" type="submit">
                                        <i class="bi bi-box-arrow-right me-2"></i> Cerrar sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>

                @else
                    <!-- Botón de Ingreso (No Autenticado) -->
                    <a href="{{ route('login') }}" class="btn btn-sm text-dark ms-3 fw-bold ps-3 pe-3" style="background-color: #ffd768;">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Ingresar
                    </a>
                @endauth

            </div>
        </div>
    </div>
</nav>