@extends('layouts.admin') {{-- ou ton layout principal --}}

@section('title', 'Aperçu de l\'article : ' . $actualite->titre)

@section('content')
<div class="container py-5">
    <h1>{{ $actualite->titre }}</h1>
    <p class="text-muted">
        Publié le {{ $actualite->date_publication ?  \Carbon\Carbon::parse($actualite->date_publication)->format('d/m/Y')  : \Carbon\Carbon::parse($actualite->created_at)->format('d/m/Y') }}
        par {{ $actualite->user->name ?? 'Auteur inconnu' }} |
        Catégorie : {{ $actualite->categorie->nom ?? 'Non catégorisé' }}
    </p>

    @if($actualite->image)
        <img src="{{ asset('uploads/actualites/' . $actualite->image) }}" 
        alt="{{ $actualite->titre }}" 
        class="d-block mx-auto img-fluid my-3"
        style="max-height: 400px; object-fit: cover;">
    @endif

    <div class="mt-4">
        {!! $actualite->contenu !!}
    </div>
</div>
@endsection
