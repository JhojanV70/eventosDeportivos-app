<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Equipo</title>
</head>
<body>
    <div class="container">
        <h1>Add Equipo</h1>  
        <form method="POST" action="{{ route('equipos.store') }}">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" required class="form-control" id="nombre" name="nombre" placeholder="Nombre del equipo">
            </div>

            <div class="mb-3">
                <label for="deporte" class="form-label">Deporte</label>
                <input type="text" required class="form-control" id="deporte" name="deporte" placeholder="Deporte del equipo">
            </div>

            <div class="mb-3">
                <label for="entrenador" class="form-label">Entrenador</label>
                <input type="text" required class="form-control" id="entrenador" name="entrenador" placeholder="Nombre del entrenador">
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('equipos.index') }}" class="btn btn-warning">Back</a>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
