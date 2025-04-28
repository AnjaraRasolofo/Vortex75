@extends('layouts.admin') <!-- ou ton layout principal -->

@section('title','Newsletter')

@section('content')
<div class="container py-5">
    <!-- Afficher un message de succès si une catégorie a été ajoutée ou mise à jour -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
  <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Email</th>
        <th>Date d'inscription</th>
      </tr>
    </thead>
    <tbody>
      @foreach($newsletters as $newsletter)
        <tr>
          <td>{{ $newsletter->id }}</td>
          <td>{{ $newsletter->email }}</td>
          <td>{{ $newsletter->created_at->format('d/m/Y H:i') }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div class="d-flex justify-content-center">
    {{ $newsletters->links() }}
  </div>
</div>
@endsection
