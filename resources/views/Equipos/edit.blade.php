<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Equipo</title>
</head>
<body>
    <div class="container">
        <h1>Edit Equipo</h1>          
        <form method="POST" action="{{ route('equipos.update', ['equipo' => $equipo->id]) }}">
        
            @method('put')
            @csrf
            
            <div class="mb-3">
                <label for="id" class="form-label">Id</label>
                <input type="text" class="form-control" id="id" name="id" disabled="disabled" value="{{ $equipo->id }}">
                <div class="form-text">Equipo Id</div>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" required class="form-control" id="nombre" name="nombre" value="{{ $equipo->nombre }}">
            </div>
            
            <div class="mb-3">
                <label for="deporte" class="form-label">Deporte</label>
                <input type="text" required class="form-control" id="deporte" name="deporte" value="{{ $equipo->deporte }}">
            </div>

            <div class="mb-3">
                <label for="entrenador" class="form-label">Entrenador</label>
                <input type="text" required class="form-control" id="entrenador" name="entrenador" value="{{ $equipo->entrenador }}">
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('equipos.index') }}" class="btn btn-warning">Volver</a>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
