<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Add Evento</title>
  </head>
  <body>
    <div class="container">
        <h1>Add Evento</h1>  
        <form method="POST" action="{{route('eventos.store')}}">
         @csrf
            <div class="mb-3">
              <label for="id" class="form-label">ID</label>
              <input type="text" class="form-control" id="id" aria-describedby="idHelp" name="id" disabled="disabled">
              <div id="idHelp" class="form-text">Evento ID</div>
            </div>

            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" required class="form-control" id="nombre" aria-describedby="nombreHelp" name="nombre" placeholder="Nombre del evento">
            </div>

            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción</label>
              <textarea required class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción del evento"></textarea>
            </div>

            <div class="mb-3">
              <label for="fecha" class="form-label">Fecha</label>
              <input type="date" required class="form-control" id="fecha" name="fecha">
            </div>

            <div class="mb-3">
              <label for="ubicacion" class="form-label">Ubicación</label>
              <input type="text" required class="form-control" id="ubicacion" name="ubicacion" placeholder="Ubicación del evento">
            </div>

            <label for="tipo">Tipo de evento</label>
            <select class="form-select" id="tipo" name="tipo" required>
                <option selected disabled value="">Elige uno...</option>
                <option value="torneo">Torneo</option>
                <option value="partido amistoso">Partido Amistoso</option>
                <option value="maratón">Maratón</option>
            </select>

            <div class="mt-3">
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="{{route('eventos.index')}}" class="btn btn-warning">Back</a>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
