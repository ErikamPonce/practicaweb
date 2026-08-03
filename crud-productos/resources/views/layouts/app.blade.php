<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistema Escolar - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <i class="fas fa-school"></i> Sistema Escolar
            </a>
            @auth
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('escuelas.index') }}"><i class="fas fa-building"></i> Escuelas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('alumnos.index') }}"><i class="fas fa-users"></i> Alumnos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('personal.index') }}"><i class="fas fa-chalkboard-user"></i> Personal</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('carreras.index') }}"><i class="fas fa-graduation-cap"></i> Carreras</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('asignaturas.index') }}"><i class="fas fa-book"></i> Asignaturas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('horarios.index') }}"><i class="fas fa-clock"></i> Horarios</a></li>
                </ul>
            @endauth

                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registrarse</a></li>
                    @endguest
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}">Panel</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>