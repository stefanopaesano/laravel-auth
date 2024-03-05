<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Mostra un elenco dei progetti.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Mostra il modulo per creare un nuovo progetto.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Salva un nuovo progetto nel database.
     */
    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();
        Project::create($validated);
        return redirect()->route('projects.index')->with('success', 'Progetto creato con successo.');
    }

    /**
     * Mostra i dettagli di un progetto specifico.
     */
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Mostra il modulo per modificare un progetto.
     */
    public function edit(Project $project)
    {
        // Implementare il metodo edit per modificare un progetto
    }
  
    /**
     * Aggiorna un progetto nel database.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated = $request->validated();
        $project->update($validated);
        return redirect()->route('projects.index')->with('success', 'Progetto aggiornato con successo.');
    }

   
    public function destroy(Project $project)
    {
    }
}

