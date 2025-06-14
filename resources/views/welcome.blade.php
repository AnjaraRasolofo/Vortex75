@extends('layouts.app')

@section('content')
    <section class="bg-light py-5">
        <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
            
            <div class="text-center text-md-start">
                <h1 class="display-4 fw-bold">Bienvenue sur Vortex75</h1>
                <p class="lead text-muted">Apprenez à maîtriser les indices synthétiques avec nos outils, formations et coaching personnalisés.</p>

                <div class="d-flex text-center justify-content-center">
                    <a href="{{ route('guides') }}" class="btn btn-primary btn-lg mt-3">Commencer maintenant</a>
                </div>
            </div>
            <div class="mt-4 mt-md-0">
                <img src="{{ asset('images/Analytics-bro.png') }}" alt="Trading illustration" class="img-fluid" style="max-width: 600px; height: auto; display: block;">
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Nos fonctionnalités clés</h2>
            <div class="row g-4">
                @foreach ([
                    ['icon' => 'line-graph.png', 'title' => 'Analyse de Marché en temps réel',
                     'desc' => 'Recevez des analyses détaillées des tendances du marché.','btn'=>'En savoir plus'],
                    ['icon' => 'ai.png', 'title' => 'Trading Automatisé',
                     'desc' => 'Utilisez des bots intelligents pour optimiser vos trades.','btn'=>'Découvrir'],
                    ['icon' => 'graduation.png', 'title' => 'Formation Trading',
                     'desc' => 'Apprenez les stratégies gagnantes pour mieux trader.','btn'=>'Apprendre'],
                    ['icon' => 'loan.png', 'title' => 'Gestion du Capital',
                     'desc' => 'Apprenez à gérer efficacement votre portefeuille d’investissement.','btn'=>'Voir plus'],
                    ['icon' => 'attention.png', 'title' => 'Alertes de Trading', 
                    'desc' => 'Recevez des alertes en temps réel pour ne manquer aucune opportunité.','btn'=>'S\'inscrire'],
                    ['icon' => 'strategy.png', 'title' => 'Sécurité & Stratégie', 
                    'desc' => 'Protégez vos investissements avec des stratégies avancées.','btn'=>'Commencer'],
                ] as $feature)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card bg-light h-100 text-center shadow-sm border">
                            <div class="card-body">
                                <div class="display-4 mb-3"> <img src="{{ asset('images/'.$feature['icon']) }}" alt="graduation-icon" class="features-icon"></div>
                                <h5 class="card-title">{{ $feature['title'] }}</h5>
                                <p class="card-text text-muted">{{ $feature['desc'] }}</p>
                                <a href="#" class="btn">{{$feature['btn']}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="py-5 bg-light section-biblio">
        <div class="container d-flex flex-column flex-lg-row align-items-center justify-content-between">
            <!-- Texte -->
            <div class="text-center text-lg-start mb-4 mb-lg-0 mr-4">
                <h1 class="display-5 fw-bold">Tutoriels sur le trading</h1>
                <p class="lead text-muted">Que tu sois débutant ou trader expérimenté, cette section regroupe des guides pratiques et des analyses approfondies pour t’aider à maîtriser les stratégies de trading, notamment sur les indices de volatilité comme le VIX75.</p>
                <p>Explore les tutoriels et améliore tes compétences dès maintenant !</p>
                <a href="{{ route('ressources') }}" class="btn btn-primary btn-lg mt-3">Explorer les tutoriels</a>
            </div>
    
            <!-- Image illustrative -->
            <div class="text-center">
                <img src="{{ asset('images/livre.jpg') }}" 
                     alt="Bibliographie illustration" 
                     class="img-fluid rounded-1 shadow-lg hero-img"
                     style="max-width: 560px; opacity: 0.7;">
            </div>
        </div>
    </section>
    
    <section class="py-5 bg-light section-actu">
        <div class="container d-flex flex-column flex-lg-row align-items-center justify-content-between">
            
            <!-- Image illustrative -->
            <div class="text-center">
                <img src="{{ asset('images/news.jpg') }}" 
                     alt="Bibliographie illustration" 
                     class="img-fluid rounded-1 shadow-lg hero-img mr-4"
                     style="max-width: 560px; opacity: 0.7;">
            </div>

            <!-- Texte -->
            <div class="text-center text-lg-start mb-4 mb-lg-0">
                <h1 class="display-5 fw-bold">Ne manquez aucune information essentielle</h1>
                <p class="lead text-muted">Vous retrouverez des mises à jour en temps réel, des analyses techniques et fondamentales, ainsi que des conseils d’experts pour vous guider dans vos prises de position. Nous couvrirons également les évolutions des indices de volatilité, un domaine clé pour les traders actifs sur Deriv et d'autres plateformes spécialisées.</p>
                <p>Restez connectés avec Vortex75 et ne manquez aucune information essentielle pour optimiser votre trading !</p>
                <a href="{{ route('actualites') }}" class="btn btn-primary btn-lg mt-3">Voir les actualités</a>
            </div>
    
            
        </div>
    </section>


    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Ce que disent nos clients</h2>
    
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
    
                    <!-- Avis 1 -->
                    <div class="carousel-item active">
                        <div class="card mx-auto shadow-sm p-4 text-center" style="max-width: 600px;">
                            <img src="{{ asset('images/marc.png') }}" alt="Jean M." class="rounded-circle mb-3" width="80" height="80" style="object-fit: cover;">
                            <p class="mb-3 fst-italic text-muted">"Vortex75 m’a permis de comprendre les indices synthétiques comme jamais auparavant. Simple, puissant, efficace."</p>
                            <h5 class="fw-bold mb-0">Jean Marc.</h5>
                            <small class="text-muted">Trader indépendant</small>
                        </div>
                    </div>
    
                    <!-- Avis 2 -->
                    <div class="carousel-item">
                        <div class="card mx-auto shadow-sm p-4 text-center" style="max-width: 600px;">
                            <img src="{{ asset('images/inconnue.png') }}" alt="Fatou D." class="rounded-circle mb-3" width="80" height="80" style="object-fit: cover;">
                            <p class="mb-3 fst-italic text-muted">"Le coaching est vraiment personnalisé. J’ai doublé mon compte en moins de 2 mois."</p>
                            <h5 class="fw-bold mb-0">Fatou D.</h5>
                            <small class="text-muted">Débutante en trading</small>
                        </div>
                    </div>
    
                    <!-- Avis 3 -->
                    <div class="carousel-item">
                        <div class="card mx-auto shadow-sm p-4 text-center" style="max-width: 600px;">
                            <img src="{{ asset('images/inconnu.png') }}" alt="Karim A." class="rounded-circle mb-3" width="80" height="80" style="object-fit: cover;">
                            <p class="mb-3 fst-italic text-muted">"La plateforme est intuitive et les guides sont à jour. Je recommande vivement !"</p>
                            <h5 class="fw-bold mb-0">Karim A.</h5>
                            <small class="text-muted">Analyste</small>
                        </div>
                    </div>

                    <!-- Avis 4 -->
                    <div class="carousel-item">
                        <div class="card mx-auto shadow-sm p-4 text-center" style="max-width: 600px;">
                            <img src="{{ asset('images/inconnu2.png') }}" alt="Karim A." class="rounded-circle mb-3" width="80" height="80" style="object-fit: cover;">
                            <p class="mb-3 fst-italic text-muted">"La plateforme est intuitive et les guides sont à jour. Je recommande vivement !"</p>
                            <h5 class="fw-bold mb-0">Karim A.</h5>
                            <small class="text-muted">Analyste</small>
                        </div>
                    </div>
    
                </div>
    
                <!-- Boutons de navigation -->
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>
     
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Contactez-nous facilement</h2>
    
            <div class="row g-4">
                <!-- Email -->
                <div class="col-md-4">
                    <div class="card text-center h-100 p-4 shadow-sm">
                        <img src="{{ asset('images/mail.png') }}" alt="email_icon" class="mx-auto mb-3" style="width: 60px;">
                        <h4 class="mb-2">Envoyez-nous un email</h4>
                        <form action="#" method="POST" class="d-flex flex-column gap-2 mt-3">
                            <input type="email" name="email" class="form-control" placeholder="Votre email" required>
                            <button type="submit" class="btn btn-primary">Soumettre</button>
                        </form>
                    </div>
                </div>
    
                <!-- WhatsApp -->
                <div class="col-md-4">
                    <div class="card text-center h-100 p-4 shadow-sm">
                        <img src="{{ asset('images/whatsapp.png') }}" alt="whatsapp_icon" class="mx-auto mb-3" style="width: 60px;">
                        <h4 class="mb-2">Assistance WhatsApp</h4>
                        <p class="mb-3">Ajoutez-nous sur WhatsApp pour une réponse instantanée.</p>
                        <a href="https://wa.me/261329523547" target="_blank" class="btn btn-success">Nous écrire</a>
                    </div>
                </div>
    
                <!-- Chat -->
                <div class="col-md-4">
                    <div class="card text-center h-100 p-4 shadow-sm">
                        <img src="{{ asset('images/chat.png') }}" alt="chat_icon" class="mx-auto mb-3" style="width: 60px;">
                        <h4 class="mb-2">Chat en direct</h4>
                        <p class="mb-3">Le moyen le plus rapide de contacter nos experts en trading.</p>
                        <button class="btn btn-secondary">Discutez en direct</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection