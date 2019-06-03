@extends('layout')

@section('content')
<h1>{{ $project->title }}</h1>

<div> {{ $project->description }}</div>
<p>
    <a href="/projects/{{ $project->id }}/edit">Editar</a>
</p>
@if ($project->tasks->count())
<div>
    @foreach($project->tasks as $task)

    <div>

        <form action="/tasks/{{ $task->id }}" method="POST">
            @method('PATCH')
            @csrf
            <label class="{{ $task->completed ? 'is-complete' : '' }}" for="completed">
                <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
                {{ $task->description }}

            </label>

        </form>

    </div>
    @endforeach
</div>
@endif

<form action="/projects/{{ $project->id }}/tasks" method="POST">
    @csrf
    <div>

        <label for="description">Nueva tarea</label>

        <div>
            <input type="text" name="description" placeholder="Nueva tarea">
        </div>

    </div>

    <div>

        <div>

            <button type="submit">Agregar tarea</button>

        </div>

    </div>
    @include('errors')
</form>

@endsection
