@extends('layout')

@section('content')

<h1 class="title">Editar proyecto</h1>
<form method="POST" action="/projects/{{ $project->id }}" style="margin-bottom: 1em;">
    @method('PATCH')
    @csrf
    <div class="field">
        <label for="title" class="label">Titulo</label>

        <div class="control">
            <input type="text" class="input" name="title" placeholder="Titulo" value="{{ $project->title }}">
        </div>
    </div>

    <div class="field">
        <label for="description" class="label">Descripcion</label>

        <div class="control">
            <textarea name="description" class="textarea">{{ $project->description }}</textarea>
        </div>
    </div>

    <div class="field">

        <div class="control">
            <button type="submit" class="button is-link">Actualizar</button>
        </div>
    </div>
</form>
<form method="POST" action="/projects/{{ $project->id }}">
    <!--
    {{ method_field('DELETE') }}
    {{ csrf_field() }} 
    Esto es equivalente 
-->
    @method('DELETE')
    @csrf

    <div class="field">

        <div class="control">
            <button type="submit" class="button is-link">Borrar</button>
        </div>
    </div>
</form>
@endsection