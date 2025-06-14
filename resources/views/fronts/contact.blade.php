@extends('layouts.app')

@section('content')
<section class="py-5 bg-white" id="contact">
    <div class="container">
        <h2 class="text-center mb-5">Contactez-nous</h2>

        <div class="row justify-content-center">
            <!-- Formulaire -->
            <div class="col-md-6">
                <form action="/contact" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nom complet</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Votre nom" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse e-mail</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="exemple@domaine.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" id="message" class="form-control" rows="5" placeholder="Votre message..." required></textarea>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-4">Envoyer</button>
                    </div>
                </form>
            </div>

            <!-- Coordonnées -->
            <div class="col-md-5 mt-5 mt-md-0">
                <div class="ps-md-4">
                    <h5>Informations</h5>
                    <p><i class="bi bi-envelope me-2"></i> contact@vortex75.com</p>
                    <p><i class="bi bi-geo-alt me-2"></i> Antananarivo, Madagascar</p>
                    <p><i class="bi bi-phone me-2"></i> +261 32 95 235 47</p>

                    <h6 class="mt-4">Suivez-nous</h6>
                    <a href="#" class="me-3"><i class="bi bi-facebook fs-4"></i></a>
                    <a href="#"><i class="bi bi-twitter-x fs-4"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection