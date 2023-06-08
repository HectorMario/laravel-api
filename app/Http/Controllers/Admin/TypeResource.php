<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\typeRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypeResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $projects = Type::all();
        $count = Type::count();
        return view('admin.projects.index', compact('projects', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(typeRequest $request)
    {
        $data=$request->validated();
        $data['slug'] = Str::slug($data['name'], '-');
        $project = Type::create($data); // ulteriore abbreviazione di quanto sopra
        return redirect()->route('admin.types.index')->with('message', 'Il progetto ' . $project->name . ' è stato creato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(typeRequest $request, Type $type)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name'], '-'); //cosi scrivendo  viene aggiornato anche lo slug
        $type->update($data); 
        return redirect()->route('admin.types.index', $type->slug)->with('message', 'Il progetto ' . $type->title . ' è stato modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $types)
    {
        $types->delete(); 
        return redirect()->route('admin.types.index')->with('message', 'Il progetto ' . $types->title . ' è stato eliminato con successo');
    }
}
