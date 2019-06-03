<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectCreated;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::where('owner_id',auth()->id())->get();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project)
    {
       //$this->authorize('update', $project);
        return view('projects.show',compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit',compact('project'));
    }

    public function update(Project $project)
    {
       
        $project->update(request([
            'title',
            'description'
        ]));
        return redirect('/projects');
    }

    public function destroy(Project $project)
    {
      $project->delete();
        return redirect('/projects');
    }
    public function store()
    {
        $atributos = $this->vaildateProject();
        $atributos['owner_id']= auth()->id();
        $project=Project::create($atributos);
        Mail::to($project->owner)->send(
            new ProjectCreated($project)
        );

        return redirect('/projects');
        
    }
    protected function vaildateProject(){
            return request()->validate([
            'title'=>['required','min:3'],
            'description'=>['required','min:3']
        ]);

    }
}
