@extends('layouts.app') {{-- ou ton layout principal --}}

@section('content')

@foreach($tutos as $tuto)
        <div class="bg-light p-4 rounded shadow-sm mb-4 d-flex flex-column flex-md-row align-items-center">
            {{-- Image --}}
            <div class="me-md-4 mb-3 mb-md-0 text-center">
                <img src="{{ asset('uploads/actualites/' . ($tuto->image ?? 'default.jpg')) }}"
                     alt="{{ $tuto->titre }}"
                     class="img-fluid rounded"
                     style="max-width: 200px; height: auto;">
            </div>

            {{-- Contenu --}}
            <div class="flex-grow-1">
                <h5 class="fw-bold mb-2">
                    <a href="{{ route('ressources.show', $tuto->slug) }}" class="text-decoration-none text-dark">
                        {{ $tuto->titre }}
                    </a>
                </h5>
                <p class="mb-2 text-muted small">
                    {{ $tuto->date_publication ? \Carbon\Carbon::parse($tuto->date_publication)->format('d M Y') : '' }} 
                    • Par {{ $tuto->auteur->name ?? 'Admin' }}
                </p>
                <p class="mb-0">
                    {{ Str::limit(strip_tags($tuto->contenu), 150) }}
                </p>
            </div>
        </div>
    @endforeach

    @foreach($articles as $actu)
        <div class="bg-light p-4 rounded shadow-sm mb-4 d-flex flex-column flex-md-row align-items-center">
            {{-- Image --}}
            <div class="me-md-4 mb-3 mb-md-0 text-center">
                <img src="{{ asset('uploads/actualites/' . ($actu->image ?? 'default.jpg')) }}"
                     alt="{{ $actu->titre }}"
                     class="img-fluid rounded"
                     style="max-width: 200px; height: auto;">
            </div>

            {{-- Contenu --}}
            <div class="flex-grow-1">
                <h5 class="fw-bold mb-2">
                    <a href="{{ route('ressources.show', $actu->slug) }}" class="text-decoration-none text-dark">
                        {{ $actu->titre }}
                    </a>
                </h5>
                <p class="mb-2 text-muted small">
                    {{ $actu->date_publication ? \Carbon\Carbon::parse($actu->date_publication)->format('d M Y') : '' }} 
                    • Par {{ $actu->auteur->name ?? 'Admin' }}
                </p>
                <p class="mb-0">
                    {{ Str::limit(strip_tags($actu->contenu), 150) }}
                </p>
            </div>
        </div>
    @endforeach
@endsection