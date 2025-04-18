@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Modifier la catégorie</h1>

        <!-- Afficher un message de succès si la catégorie a été mise à jour avec succès -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulaire pour modifier la catégorie -->
        <form action="{{ route('admin.categories.update', $categorie->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nom" class="form-label">Nom de la catégorie</label>
                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom', $categorie->nom) }}" required>

                @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Mettre à jour la catégorie</button>
            </div>
        </form>
    </div>
@endsection
