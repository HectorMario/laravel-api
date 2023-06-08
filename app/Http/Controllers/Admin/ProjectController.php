<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectReqeust;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $count = Project::count();
        return view('admin.projects.index', compact('projects', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technologies = Technology::all();
        return view('admin.projects.create', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data=$request->validated();
        $data['slug'] = Str::slug($data['title'], '-');
        $project = Project::create($data); 
        $project->technologies()->attach($data['technology_id']);
        return redirect()->route('admin.projects.index')->with('message', 'Il progetto ' . $project->title . ' è stato creato con successo');
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
        $technologies = Technology::all();
        return view('admin.projects.edit', compact('project','technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectReqeust $request, Project $project)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title'], '-'); //cosi scrivendo  viene aggiornato anche lo slug
        $project->update($data); 
        $project->technologies()->sync($data['technology_id']);
        return redirect()->route('admin.projects.index', $project->slug)->with('message', 'Il progetto ' . $project->title . ' è stato modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete(); 
        return redirect()->route('admin.projects.index')->with('message', 'Il progetto ' . $project->title . ' è stato eliminato con successo');
    }
}
