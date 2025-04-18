@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Ajouter une nouvelle catégorie</h1>

        <!-- Afficher un message de succès si la catégorie a été ajoutée avec succès -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulaire pour créer une catégorie -->
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nom" class="form-label">Nom de la catégorie</label>
                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}" required>

                @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Ajouter la catégorie</button>
            </div>
        </form>
    </div>
@endsection
