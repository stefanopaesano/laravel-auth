@extends('layouts.app')

@section('page-title', 'Tutti i project')

@section('main-content')
    <h1>Projects Index</h1>

    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('project.create') }}" class="btn btn-success mb-3">Aggiungi</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Immagine</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Data</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">scegli</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->image }}</td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->date }}</td>
                            <td>{{ $project->type }}</td>
                            <td>
                                <a href="{{ route('project.edit', $project->id) }}" class="btn btn-primary">Modifica</a>
                                <form action="{{ route('project.destroy', $project->id) }}" method="POST" style="display: inline-block;">
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
@endsection
