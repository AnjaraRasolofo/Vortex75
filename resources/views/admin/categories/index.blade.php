@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Liste des catégories</h1>

        <!-- Afficher un message de succès si une catégorie a été ajoutée ou mise à jour -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Ajouter une catégorie</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $categorie)
                    <tr>
                        <td>{{ $categorie->nom }}</td>
                        <td>{{ $categorie->slug }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $categorie->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <!-- Formulaire de suppression -->
                            <form action="{{ route('admin.categories.destroy', $categorie->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
