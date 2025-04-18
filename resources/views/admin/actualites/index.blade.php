@extends('layouts.admin')

@section('content')
<div class="container">

    <a href="{{ route('admin.actualites.create') }}" class="btn btn-success mb-3">+ Ajouter un article</a>

    @if($actualites->count())
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
            @foreach($actualites as $actualite)
                <tr>
                    <td>{{ $actualite->titre }}</td>
                    <td>{{ $actualite->categorie->nom ?? '—' }}</td>
                    <td>{{ $actualite->user->name ?? '—' }}</td>
                    <td>
                        @if($actualite->status == 'publie')
                            <span class="badge bg-success">Publié</span>
                        @else
                            <span class="badge bg-secondary">Brouillon</span>
                        @endif
                    </td>
                    <td>{{ $actualite->date_publication }}</td>
                    <td>
                        <a href="{{ route('admin.actualites.edit', $actualite->id) }}" class="btn btn-sm btn-primary">Modifier</a>

                        <form action="{{ route('admin.actualites.destroy', $actualite->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
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
    {{ $actualites->links() }}

    @else
        <div class="alert alert-info">Aucun article trouvé.</div>
    @endif
</div>
@endsection
