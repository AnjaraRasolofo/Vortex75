@extends('layouts.admin')

@section('title', 'Utilisateurs')

@section('content')
  <h1>Modifier le rôle de {{ $user->name }}</h1>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <form action="{{ route('admin.users.update', $user) }}" method="POST">
    @csrf @method('PUT')

    <div class="mb-3">
      <label for="role" class="form-label">Rôle</label>
      <select name="role" id="role" class="form-select">
        @foreach($roles as $value => $label)
          <option value="{{ $value }}" {{ $user->role === $value ? 'selected' : '' }}>
            {{ $label }}
          </option>
        @endforeach
      </select>
      @error('role')
        <div class="text-danger">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Annuler</a>
  </form>
@endsection
