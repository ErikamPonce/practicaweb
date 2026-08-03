<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Escolar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h1 class="display-6 fw-bold text-dark">Sistema Escolar</h1>
                            <p class="text-muted">Gestiona escuelas, alumnos, personal, carreras y horarios desde una sola plataforma.</p>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="border rounded-3 p-4 h-100">
                                    <h4 class="mb-3">Acceso</h4>
                                    <p class="text-muted">Inicia sesión para administrar el sistema y acceder a las secciones protegidas.</p>
                                    @if (Route::has('login'))
                                        @auth
                                            <a href="{{ url('/home') }}" class="btn btn-primary w-100">Ir al panel</a>
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-primary w-100 mb-2">Iniciar sesión</a>
                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="btn btn-outline-secondary w-100">Registrarse</a>
                                            @endif
                                        @endauth
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="border rounded-3 p-4 h-100">
                                    <h4 class="mb-3">Opciones disponibles</h4>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item px-0">Escuelas</li>
                                        <li class="list-group-item px-0">Alumnos</li>
                                        <li class="list-group-item px-0">Personal</li>
                                        <li class="list-group-item px-0">Carreras y asignaturas</li>
                                        <li class="list-group-item px-0">Horarios</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
