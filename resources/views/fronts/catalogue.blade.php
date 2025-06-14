@extends('layouts.app') {{-- ou ton layout principal --}}

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Colonne Filtres -->
        <div class="col-md-3">
            <h5>Filtres</h5>
            <form method="GET" action="{{ route('catalogue') }}">
                
                <div class="mb-3">
                    <label for="type" class="form-label">Type de produits</label>
                    <select name="type" class="form-select">
                        <option value="Toutes">Toutes</option>
                        <option value="Expert" {{ old('type', request('type')) == 'Expert' ? 'selected' : '' }}>Expert</option>
                        <option value="Indicateur" {{ old('type', request('type')) == 'Indicateur' ? 'selected' : '' }}>Indicateur</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="prix" class="form-label">Prix maximum</label>
                    <input type="number" name="prix" class="form-control" placeholder="Ex: 100$">
                </div>

                <button type="submit" class="btn btn-primary w-100">Filtrer</button>
            </form>
        </div>

        <!-- Colonne Produits -->
        <div class="col-md-9">
            <div class="row">
                @foreach($produits as $produit)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="{{ asset('images/produits/'.$produit->image) }}" class="card-img-top object-fit-cover" style="height: 200px;" alt="{{ $produit->nom }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $produit->nom }}</h5>
                                <p class="card-text">{{ $produit->company }} - {{ $produit->type }}</p>
                                <p class="card-text text-success fw-bold">{{ number_format($produit->prix,0) }}$</p>
                            </div>
                            <div class="card-footer d-flex justify-content-end gap-2">
                                {{-- Bouton fiche produit --}}
                                <a href="{{ route('produits.show', $produit->id) }}" class="btn btn-sm btn-outline-secondary">
                                    Voir
                                </a>
                            
                                {{-- Bouton ajouter au panier --}}
                                <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-outline-primary">
                                        Ajouter
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($produits->hasPages())
            <nav>
                <ul class="pagination justify-content-center">

                    {{-- Page précédente --}}
                    @if ($produits->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link"><i class="bi bi-chevron-left"></i></span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $produits->previousPageUrl() }}">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                    @endif

                    {{-- Liens intelligents --}}
                    @php
                        $current = $produits->currentPage();
                        $last = $produits->lastPage();
                        $start = max(1, $current - 2);
                        $end = min($last, $current + 2);
                    @endphp

                    {{-- Première page --}}
                    @if ($start > 1)
                        <li class="page-item">
                            <a class="page-link" href="{{ $produits->url(1) }}">1</a>
                        </li>
                        @if ($start > 2)
                            <li class="page-item disabled"><span class="page-link">…</span></li>
                        @endif
                    @endif

                    {{-- Pages centrales --}}
                    @for ($i = $start; $i <= $end; $i++)
                        <li class="page-item {{ $i == $current ? 'active' : '' }}">
                            <a class="page-link" href="{{ $produits->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- Dernière page --}}
                    @if ($end < $last)
                        @if ($end < $last - 1)
                            <li class="page-item disabled"><span class="page-link">…</span></li>
                        @endif
                        <li class="page-item">
                            <a class="page-link" href="{{ $produits->url($last) }}">{{ $last }}</a>
                        </li>
                    @endif

                    {{-- Page suivante --}}
                    @if ($produits->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $produits->nextPageUrl() }}">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link"><i class="bi bi-chevron-right"></i></span>
                        </li>
                    @endif

                </ul>
            </nav>
        @endif

        </div>
    </div>
</div>
@endsection
