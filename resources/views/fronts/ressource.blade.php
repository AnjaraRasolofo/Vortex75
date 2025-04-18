@extends('layouts.app') {{-- ou ton layout principal --}}

@section('title', $tuto->titre)

@section('content')
<div class="container py-5">
    <h1>{{ $tuto->titre }}</h1>
    <p class="text-muted">
        Publié le {{ $tuto->date_publication ?  \Carbon\Carbon::parse($tuto->date_publication)->format('d/m/Y')  : \Carbon\Carbon::parse($tuto->created_at)->format('d/m/Y') }}
        par {{ $tuto->user->name ?? 'Auteur inconnu' }} |
        Catégorie : {{ $tuto->categorie->nom ?? 'Non catégorisé' }}
    </p>

    @if($tuto->image)
        <img src="{{ asset('uploads/actualites/' . $tuto->image) }}" 
        alt="{{ $tuto->titre }}" 
        class="d-block mx-auto img-fluid my-3"
        style="max-height: 400px; object-fit: cover;">
    @endif

    <div class="mt-4">
        {!! $tuto->contenu !!}
    </div>
</div>
@endsection