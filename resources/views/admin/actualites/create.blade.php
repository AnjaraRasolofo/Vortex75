@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Créer un article</h1>
    <a href="{{ route('admin.actualites.show', $actualite->id ?? '') }}" class="btn btn-success mb-3" target="_blank">Voir l'article</a>

    <form action="{{ route('admin.actualites.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Titre --}}
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre') }}" required>
            @error('titre') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        {{-- Contenu --}}
        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu</label>
            <textarea name="contenu" id="contenu" class="form-control" rows="5">{{ old('contenu') }}</textarea>
            @error('contenu') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        {{-- Image --}}
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        {{-- Catégorie --}}
        <div class="mb-3">
            <label for="categorie_id" class="form-label">Catégorie</label>
            <select name="categorie_id" id="categorie_id" class="form-control">
                <option value="">-- Sélectionner --</option>
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nom }}
                    </option>
                @endforeach
            </select>
            @error('categorie_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        {{-- Auteur --}}
        <div class="mb-3">
            <label for="user_id" class="form-label">Auteur</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="">-- Sélectionner --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        {{-- Date de publication --}}
        <div class="mb-3">
            <label for="date_publication" class="form-label">Date de publication</label>
            <input type="date" name="date_publication" id="date_publication" class="form-control" value="{{ old('date_publication') }}">
            @error('date_publication') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        {{-- Statut --}}
        <div class="mb-3">
            <label for="status" class="form-label">Statut</label>
            <select name="status" id="status" class="form-control" required>
                <option value="brouillon" {{ old('status') == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                <option value="publie" {{ old('status') == 'publie' ? 'selected' : '' }}>Publié</option>
            </select>
            @error('status') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        {{-- Bouton submit --}}
        <button type="submit" class="btn btn-success">Créer l’article</button>
        <a href="{{ route('admin.actualites.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
