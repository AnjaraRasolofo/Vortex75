@extends('layouts.admin')

@section('title','Tutoriels')

@section('content')
<div class="container">

    <a href="{{ route('admin.ressources.create') }}" class="btn btn-success mb-3">+ Ajouter un tutoriel</a>

    @if($ressources->count())
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Auteur</th>
                <th>Status</th>
                <th>Date publication</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ressources as $ressource)
                <tr>
                    <td>{{ $ressource->titre }}</td>
                    <td>{{ $ressource->categorie->nom ?? '—' }}</td>
                    <td>{{ $ressource->user->name ?? '—' }}</td>
                    <td>
                        @if($ressource->status == 'publie')
                            <span class="badge bg-success">Publié</span>
                        @else
                            <span class="badge bg-secondary">Brouillon</span>
                        @endif
                    </td>
                    <td>{{ $ressource->date_publication }}</td>
                    <td>
                        <a href="{{ route('admin.ressources.edit', $ressource->id) }}" class="btn btn-sm btn-primary">Modifier</a>

                        <form action="{{ route('admin.ressources.destroy', $ressource->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    {{ $ressources->links() }}

    @else
        <div class="alert alert-info">Aucun tutoriel trouvé.</div>
    @endif
</div>
@endsection
