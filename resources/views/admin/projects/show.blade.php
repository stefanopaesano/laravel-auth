@extends('layouts.app')

@section('page-title', 'Tutti i post')

@section('main-content')
<div class="container">
    <div class="card mb-3">
        <img src="{{ $project->image }}" class="card-img-top" alt="{{ $project->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $project->title }}</h5>
            <p class="card-text">{{ $project->description }}</p>
            <p class="card-text"><small class="text-muted">{{ $project->date }}</small></p>
        </div>
    </div>
</div>
@endsection