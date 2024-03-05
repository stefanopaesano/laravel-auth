@extends('layouts.app')

@section('page-title', 'Tutti i project')

@section('main-content')
<h1>
    projects Index
</h1>

<h2>
    <div class="row">
        <table class="table">
        <div class="mb-4">
            <a href="{{ route('project.create') }}" class="btn btn-success w-100 fs-5">
                + Aggiungi
            </a>
        </div>
            <div class="thead">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Titolo</th>
                   
                    <th scope="col">immagine</th>
                    <th scope="col">descrizione</th>
                    <th scope="col">Data</th>
                    <th scope="col">Tipo</th>
                   
                </tr>
            </div>
            <div class="tbody">
                
                @foreach ($projects as $project)
                    <tr>
                         <td scope="row"> 
                            {{$comic->id}} 
                        </td> 

                        <td>{{ $project->title}}</td>
                        <td>${{ $project->image}}</td>
                        <td>{{ $project->description}}</td>
                        <td>{{ $project->date}}</td>
                        <td>{{ $project->type}}</td>
                       
                        <td>
                            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">Crea Nuovo Progetto</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.projects.show', $project->slug) }}" class="text-decoration-none text-dark">
                        </td>
                    </tr>
                    
                @endforeach
            </div>
        </div>
    </div> 
</h2>
@endsection





















