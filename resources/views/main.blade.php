@extends('layouts.app')

@section('content')

    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand nav-link" href="#page-top">Amig<i class="bi bi-geo-alt-fill"></i></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link" href="">App</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Conócenos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Idioma</a></li>
                    @guest
                    <li class="nav-item"><a class="nav-link"  data-bs-toggle="modal" data-bs-target="#loginModal">Inicia Sesión</a></li>
                    @endguest
                    @auth
                        @if (Auth::user()->admin == 1)
                            <li class="nav-item"><a class="nav-link" href="{{ route('management') }}">Gestión</a></li>
                        @else
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <li class="nav-item"><button type="submit" class="nav-link">Logout</button></li>
                        </form>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <!-- Modal de inicio de sesión -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-3" style="background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(255, 69, 0, 0.8)); border: 2px solid #FF4500;">
                <div class="modal-header bg-dark text-white border-0 rounded-top">
                    <h5 class="modal-title" id="loginModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario de inicio de sesión -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label text-white">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Ejemplo@ejemplo.com" required autocomplete="email" autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label text-white">Contraseña</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 {{--h-100--}} align-items-center justify-content-center text-center" style="margin-top:100px">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold">Conoce gente nueva en tus sitios favoritos</h1>
                    <hr class="divider"/>
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5"> Descubre experiencias únicas que cambiarán tu vida.</p>
                    <a class="btn btn-primary btn-xl" href="">Crea una cuenta</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">Sobre Nosotros</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>

                        <p class="text-muted mb-0">Compatible con Todos tus Dispositivos.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-geo-alt fs-1 text-primary"></i></div>

                        <p class="text-muted mb-0">¡Explora Más allá de los límites!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi bi-people-fill fs-1 text-primary"></i></div>

                        <p class="text-muted mb-0">Conectando corazones, uniendo mentes.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>

                        <p class="text-muted mb-0"> Tu felicidad es nuestra prioridad.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5"><div class="small text-center text-muted">Copyright &copy; 2024 - Daniel & Alberto - Amigo</div></div>
    </footer>
    <script>
        // Inicializa los modals de Bootstrap
        var modals = document.querySelectorAll('.modal');
        modals.forEach(function (modal) {
            new bootstrap.Modal(modal);
        });
    </script>
@endsection