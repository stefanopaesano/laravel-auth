@extends('layouts.app')

@section('page-title', 'Tutti i post')

@section('main-content')


    <div class="container">
        <h1 class="text-primary text-center">Progetti</h1>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">Crea Nuovo Progetto <i class="fa-solid fa-plus"></i></a>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Immagine</th>
                            <th>Titolo</th>
                            <th>Descrizione</th>
                            <th>Data</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td><img src="{{ $project->image }}" alt="{{ $project->title }}" class="img-fluid" style="max-width: 100px;"></td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->date }}</td>
                                <td>
                                    <a href="{{ route('admin.projects.show', $project->slug) }}" class="btn btn-sm btn-primary">Visualizza</a>
                                </td>
                                <td>
                                    
                                    <a href="{{ route('admin.projects.edit', $project->slug) }}" class="btn btn-sm btn-warning">modifica</a>
                                </td>
                                <td>
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
