<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="app">
        
        <nav class="navbar-custom navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="menu-logo navbar-brand" href="{{ url('/') }}">Vortex<span>75</span> </a>
        
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <!-- Liens à gauche -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('abouts') ? 'active' : '' }}" href="{{ route('abouts') }}">A propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('guides') ? 'active' : '' }}" href="{{ route('guides') }}">Guides</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('ressources') ? 'active' : '' }}" href="{{ route('ressources') }}">Formations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('actualites') ? 'active' : '' }}" href="{{ route('actualites') }}">Actualités</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
        
                    <!-- Liens à droite : Connexion / Déconnexion -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ url('/admin') }}">Administration</a></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                            @csrf
                                            <button class="dropdown-item" type="submit">Déconnexion</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="bg-dark text-light pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row mb-5">
                <div>
                    <h2>Avertissements : </h2>
                    <p style="color:#E63946;border:2px solid #E63946;padding:10px;">Le trading des instruments financiers, y compris les indices synthétiques et les actifs à effet de levier, comporte un niveau de risque élevé qui peut entraîner des pertes supérieures aux fonds investis. Il est essentiel de comprendre que le marché est imprévisible et que même les stratégies les plus avancées ne garantissent pas des gains. <strong><a href="{{ route('home') }}">Vortex75</a></strong> n'est pas responsable des pertes financières résultant des décisions de trading. Chaque trader est seul responsable de ses choix et doit s’assurer d’opérer en conformité avec la réglementation en vigueur dans son pays de résidence.</p>
                </div>
            </div>
            <div class="row">
    
                <!-- Logo & description -->
                <div class="col-md-4 mb-3">
                    <h4 class="fw-bold text-white">Vortex75</h4>
                    <p class="text-light">La plateforme dédiée au trading des indices synthétiques. Formations, outils, coaching & plus.</p>
                </div>
    
                <!-- Liens rapides -->
                <div class="col-md-3 mb-4">
                    <h5 class="text-white mb-3">Navigation</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-decoration-none text-light nav-link {{ request()->is('home') ? 'active' : '' }}">Accueil</a></li>
                        <li><a href="{{ route('abouts') }}" class="text-decoration-none text-light nav-link {{ request()->is('abouts') ? 'active' : '' }}">A propos</a></li>
                        <li><a href="{{ route('guides') }}" class="text-decoration-none text-light nav-link {{ request()->is('guides') ? 'active' : '' }}">Guides</a></li>
                        <li><a href="{{ route('ressources') }}" class="text-decoration-none text-light nav-link {{ request()->is('ressources') ? 'active' : '' }}">Coaching</a></li>
                        <li><a href="{{ route('actualites') }}" class="text-decoration-none text-light nav-link {{ request()->is('actualites') ? 'active' : '' }}">Actualités</a></li>
                        <li><a href="{{ route('contact') }}" class="text-decoration-none text-light nav-link {{ request()->is('contact') ? 'contact' : '' }}">Contact</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mb4">
                    <h5 class="text-white mb-3">Downloads</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-light">Ebook gratuit</a></li>
                        <li><a href="https://download.mql5.com/cdn/web/22698/mt5/derivsvg5setup.exe" class="text-decoration-none text-light">Meta Trader(MT5)</a></li>
                        <li><a href="https://download.mql5.com/cdn/mobile/mt5/android?utm_source=www.metatrader5.com&utm_campaign=install.metaquotes" class="text-decoration-none text-light">MT5 pour Android</a></li>
                    </ul>
                </div>
    
                <!-- Réseaux sociaux -->
                <div class="col-md-2 mb-4">
                    <h5 class="text-white mb-3">Suivez-nous</h5>
                    <a href="#" class="text-light me-3"><i class="bi bi-facebook fs-4"></i></a>
                    <a href="#" class="text-light me-3"><i class="bi bi-instagram fs-4"></i></a>
                    <a href="#" class="text-light"><i class="bi bi-twitter-x fs-4"></i></a>
                </div>
            </div>
    
            <hr class="border-secondary">
    
            <div class="text-center text-secondary small">
                &copy; {{ date('Y') }} Vortex75 — Tous droits réservés.
            </div>
        </div>
    </footer>

    <!-- Bouton flottant de chat -->
    <div id="chat-toggle">
            <img src="{{ asset('images/chat4.png') }}" alt="Chat" />
    </div>

    <!-- Boîte de chat -->
    <div id="chat-box" style="display: none; position: fixed; bottom: 120px; right: 20px; width: 300px; height: 400px; background: white; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); z-index: 1000;">
        <div style="background: #007bff; color: white; padding: 10px; border-top-left-radius: 8px; border-top-right-radius: 8px;">
            <strong>Messagerie</strong>
            <span id="chat-close" style="float: right; cursor: pointer;">&times;</span>
        </div>
        <div id="messagesContainer" style="padding: 10px; height: 290px; overflow-y: auto;">
            <!-- Messages ici -->
        </div>
        <form id="messageForm">
            <div style="padding: 10px; border-top: 1px solid #ccc;">
                <input type="hidden" name="receiver_id" value="2">
                <input type="text" id="message" name="message" placeholder="Écrire un message..." style="width: 100%; padding: 5px;">
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $('#chat-toggle').click(function () {
                $('#chat-box').fadeToggle();
            });

            $('#chat-close').click(function () {
                $('#chat-box').fadeOut();
            });

            $('#message').keypress(function (e) {
                if (e.which === 13 && $(this).val().trim() !== '') {
                    const message = $(this).val();
                    $('#chat-messages').append('<div><strong>Moi:</strong> ' + message + '</div>');
                    //$(this).val('');
                    $('#chat-messages').scrollTop($('#chat-messages')[0].scrollHeight);
                }
            });

            $('#discution-direct').click(function () {
                $('#chat-box').fadeToggle();
            });

            $('#messageForm').submit(function (e) {
                e.preventDefault();
                const content = $('#message').val().trim();

                if (!content) {
                    alert("Le message est vide !");
                    return;
                }

                $.ajax({
                    url: '{{ route("messages.send") }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        receiver_id: $('input[name="receiver_id"]').val(),
                        content: content
                    },
                    success: function (response) {
                        $('#messagesContainer').append(
                            '<div><strong>Moi:</strong> ' + response.message.content + ' <small>' + response.sent_at + '</small></div>'
                        );
                        //$('#content').val('');
                    },
                    error: function (xhr) {
                        console.log(xhr.responseJSON);
                        alert('Erreur : ' + xhr.responseJSON.message);
                    }
                });
            });

        
        });

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
        // Vérifie si l'utilisateur a déjà vu et fermé le popup pendant cette session
        if (!sessionStorage.getItem("popupAbonnementClosed")) {
            setTimeout(function () {
                var popupElement = document.getElementById('popupAbonnement');
                var popup = new bootstrap.Modal(popupElement);
                popup.show();

                // Quand le popup est fermé, on enregistre l'information
                popupElement.addEventListener('hidden.bs.modal', function () {
                    sessionStorage.setItem("popupAbonnementClosed", "true");
                });
            }, 40000); // 40 secondes
        }
    });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

