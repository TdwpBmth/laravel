<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    protected $guarded = [];
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }


    public function addTask($task){
         
        $this->tasks()->create($task);
    }
    public function owner(){
        return $this->BelongsTo(User::class);
    }
}
