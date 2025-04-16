<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vortex75</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="{{ route('home') }}">Vortex75</a>
    
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('abouts') }}">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('guides') }}">Guides pour debuter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('ressources') }}">Coaching</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('actualites') }}">Actualités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ route('contact') }}">Contact</a>
                    </li>
    
                    <!-- Connexion / Déconnexion à droite -->
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Déconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('login') }}">Connexion</a>
                        </li>
                    @endif
    
                </ul>
            </div>
        </div>
    </nav
    

    <!-- Main Content -->
    <div class="container my-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-4">
        <p>&copy; {{ date('Y') }} Vortex75 - Tous droits réservés</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
