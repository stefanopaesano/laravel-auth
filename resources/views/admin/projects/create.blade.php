@extends('layouts.app')

@section('page-title', 'Tutti i projects')

@section('main-content')


<div class="container">
    <h2>{{ isset($project) ? 'Edit' : 'Create' }} Project</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    
    <form method="POST" action="{{ route('admin.projects.store') }}">
        @csrf
        

        <!-- Form fields -->

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image URL</label>
            <input type="text" class="form-control" id="image" name="image" value="{{ old('image', $project->image ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ old('description', $project->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($project) ? 'Update' : 'Submit' }}</button>
    </form>
</div>
@endsection