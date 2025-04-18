@extends('layouts.app')

@section('content')

<div class="container my-5">
    <h2 class="mb-4 text-center">Nos derniers articles</h2>
    
    <div class="row row-cols-1 row-cols-md-3 g-4">
  
      @foreach ($actualites as $article)
        <div class="col">
          <div class="card h-100">
  
            {{-- Image si elle existe --}}
            @if (!empty($article->image))
              <img src="{{ asset('uploads/actualites/' . $article->image) }}" 
              alt="Image de l'article" class="card-img-top object-fit-cover"
              style="height: 200px; object-fit: cover;">
            @endif
  
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">{{ $article->titre }}</h5>
  
              <p class="card-text text-muted">
                <small>Publié le {{ \Carbon\Carbon::parse($article->date_publication)->format('d M Y') }}
                • Catégorie : {{ $article->categorie->nom ?? 'Non catégorisé' }}</small>
              </p>
  
              <p class="card-text flex-grow-1">{{ Str::limit(strip_tags($article->contenu), 100) }}</p>
  
              <a href="{{ route('actualites.show', $article->slug) }}" class="btn btn-primary mx-auto mt-auto d-block">Lire l'article</a>
            </div>
  
          </div>
        </div>
      @endforeach
  
    </div>
  
    {{-- Pagination --}}
    <div class="mt-5 d-flex justify-content-center">
      {{ $actualites->links() }}
    </div>
  </div>
  
@endsection