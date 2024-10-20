<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Listado de Equipos</title>
  </head>
  <body>
    <div class="container">
      <h1>Listado de Equipos</h1>
      
      
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID Equipo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Deporte</th>
            <th scope="col">Entrenador</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($equipos as $equipo)
            <tr>
              <th scope="row">{{ $equipo->id }}</th>
              <td>{{ $equipo->nombre }}</td>
              <td>{{ $equipo->deporte }}</td>
              <td>{{ $equipo->entrenador }}</td>
              <td>
                
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
