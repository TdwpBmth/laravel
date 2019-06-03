<?php

namespace App\Http\Controllers;

use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{

    public function store(Project $project)
{
    $atributes = request()->validate(['description'=>'required']);
        
    $project-> addTask($atributes);

    return back();
}
    public function update(Task $task){

       //$task->complete(request()->has('completed'));
        // $task->update([
        //     'completed' => request()->has('completed')
        // ]);

        $method = request()->has('completed') ? 'complete' : 'incomplete';
        $task->$method();

        return back();
    }
}
