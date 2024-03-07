@extends('layouts.app')

@section('page-title', 'Tutti i post')

@section('main-content')
<div class="container">
    <h2>Modifica Progetto: {{ $project->title }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.projects.update', $project->slug) }}">
        @csrf
        @method('PUT')

        <!-- Campi del form qui -->
        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">URL dell'immagine</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $project->image) }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $project->date) }}" required>
        </div>

        <input type="submit" class="btn btn-primary" value="Modifica">
    </form>
</div>
@endsection