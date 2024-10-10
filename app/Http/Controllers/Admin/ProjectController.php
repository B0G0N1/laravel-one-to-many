<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        // Ottengo i dati validati dal form
        $form_data = $request->validated();
    
        // Creo un nuovo progetto
        $project = new Project();
    
        // Controllo se è stata caricata un'immagine e la salvo
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('projects_image', $request->file('image'));
            $form_data['image'] = $path;
        }
    
        // Genero lo slug usando il metodo generateSlug dal modello Project
        $form_data['slug'] = Project::generateslug($form_data['title']);
    
        // Riempio il modello Project con i dati e lo salvo
        $project->fill($form_data);
        $project->save();
    
        // Reindirizzo alla pagina dei progetti
        return redirect()->route('admin.projects.index');
    }       

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // Ottengo i dati validati dal form
        $form_data = $request->validated();
    
        // Controllo se è stata caricata una nuova immagine
        if ($request->hasFile('image')) {
            // Se il progetto ha già un'immagine, la elimino per evitare file inutili
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
    
            // Salvo la nuova immagine e aggiorno il percorso
            $path = Storage::disk('public')->put('projects_image', $request->file('image'));
            $form_data['image'] = $path;
        }
    
        // Genero lo slug usando il metodo generateSlug dal modello Project
        $form_data['slug'] = Project::generateslug($form_data['title']);
    
        // Aggiorno il progetto con i nuovi dati
        $project->update($form_data);
    
        // Reindirizzo alla pagina show del progetto aggiornato
        return redirect()->route('admin.projects.show', $project->id);
    }       

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        // Controlla se il progetto ha un'immagine e la cancella
        if ($project->image !== null) {
            Storage::delete($project->image);
        }
    
        // Cancella il progetto
        $project->delete();
    
        // Reindirizza alla lista dei progetti
        return redirect()->route('admin.projects.index');
    }    
}
