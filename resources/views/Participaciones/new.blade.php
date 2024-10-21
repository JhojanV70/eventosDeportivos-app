<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Participación</title>
</head>
<body>
    <div class="container">
        <h1>Add Participación</h1>  
        <form method="POST" action="{{ route('participaciones.store') }}">        
            @csrf

            <div class="mb-3">
                <label for="evento_id" class="form-label">Evento</label>
                <select name="evento_id" id="evento_id" class="form-select" required>
                    <option selected disabled value="">Elige un evento...</option>
                    @foreach ($eventos as $evento)
                        <option value="{{ $evento->id }}">{{ $evento->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="equipo_id" class="form-label">Equipo</label>
                <select name="equipo_id" id="equipo_id" class="form-select" required>
                    <option selected disabled value="">Elige un equipo...</option>
                    @foreach ($equipos as $equipo)
                        <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="resultado" class="form-label">Resultado</label>
                <input type="text" required class="form-control" id="resultado" name="resultado" placeholder="Resultado de la participación">
            </div>

            <div class="mb-3">
                <label for="premios" class="form-label">Premios</label>
                <input type="text" class="form-control" id="premios" name="premios" placeholder="Premios obtenidos (opcional)">
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('participaciones.index') }}" class="btn btn-warning">Regresar</a>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
