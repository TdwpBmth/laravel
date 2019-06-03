<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Crear un nuevo proyecto</h1>
    <form action="/projects" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <input type="text" class="input $errors->has('title') ? 'is-danger' : '' }}" name="title" value="{{ old('title') }}" placeholder="Titulo">
        </div>
        <div>
            <textarea name="description" class="input $errors->has('title') ? 'is-danger' : '' }}" name="title" value="{{ old('title') }}" placeholder="Descripcion del pryecto"></textarea>
        </div>
        
        <div>
            
            <button type="submit">Crear proyecto</button>

        </div>
        @include('errors')
    </form>
</body>
</html>