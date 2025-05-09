@extends('layouts.admin')

@section('title', 'Modifier l\'article : ' . $actualite->titre)

@section('content')
<div class="container">
   
    <button id="btn-save" class="btn btn-warning mb-3" data-id="{{ $actualite->id }}">Sauvegarder</button>

    <form action="{{ route('admin.actualites.update', $actualite->id ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- Titre --}}
        
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre', $actualite->titre) }}" required>
        </div>

        {{-- Contenu --}}
        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu</label>
            <textarea name="contenu" id="contenu" class="form-control" rows="5">{{ old('contenu', $actualite->contenu) }}</textarea>
        </div>

        {{-- Image --}}
        <div class="mb-3">
            <label for="image" class="form-label">Image actuelle</label><br>
            @if($actualite->image)
                <img src="{{ asset('uploads/actualites/'.$actualite->image) }}" alt="Image" width="150" class="mb-2">
            @endif
            <input type="file" name="image" id="image" class="form-control">
        </div>

        {{-- Catégorie --}}
        <div class="mb-3">
            <label for="categorie_id" class="form-label">Catégorie</label>
            <select name="categorie_id" id="categorie_id" class="form-control">
                <option value="">-- Sélectionner --</option>
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ $actualite->categorie_id == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Auteur --}}
        <div class="mb-3">
            <label for="user_id" class="form-label">Auteur</label>
            <select name="user_id" id="user_id" class="form-control">
                <option value="">-- Sélectionner --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $actualite->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Date de publication --}}
        <div class="mb-3">
            <label for="date_publication" class="form-label">Date de publication</label>
            <input type="date" name="date_publication" id="date_publication" class="form-control" value="{{ $actualite->date_publication }}">
        </div>

        {{-- Statut --}}
        <div class="mb-3">
            <label for="status" class="form-label">Statut</label>
            <select name="status" id="status" class="form-control">
                <option value="brouillon" {{ $actualite->status == 'brouillon' ? 'selected' : '' }}>Brouillon</option>
                <option value="publie" {{ $actualite->status == 'publie' ? 'selected' : '' }}>Publié</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('admin.actualites.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>

@endsection
