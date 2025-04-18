@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ $categorie->nom }}</h1>

        <!-- Affichage d'une catégorie -->
        <div class="mb-4">
            <h2>Détails de la catégorie</h2>
            <p><strong>Nom :</strong> {{ $categorie->nom }}</p>
            <p><strong>Slug :</strong> {{ $categorie->slug }}</p>
        </div>

        <!-- Liste des articles associés à cette catégorie -->
        <h3>Articles de la catégorie</h3>
        @if($articles->isEmpty())
            <p>Aucun article n'est associé à cette catégorie pour le moment.</p>
        @else
            <div class="list-group">
                @foreach ($articles as $article)
                    <a href="{{ route('articles.show', $article->slug) }}" class="list-group-item list-group-item-action">
                        <h5>{{ $article->titre }}</h5>
                        <p>{{ Str::limit($article->contenu, 100) }}</p>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endsection
