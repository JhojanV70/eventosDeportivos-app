<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Equipos</title>
  </head>
  <body>
    <div class="container">
      <h1>Listado de Equipos</h1>
      <a href="{{ route('equipos.create') }}" class="btn btn-success">Agregar Equipo</a>
      <a href="{{ route('welcome') }}" class="btn btn-warning">Menu</a>      
      <table class="table">
        <thead>
          <tr>
            <th>ID Equipo</th>
            <th>Nombre</th>
            <th>Deporte</th>
            <th>Entrenador</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($equipos as $equipo)
            <tr>
              <td>{{ $equipo->id }}</td>
              <td>{{ $equipo->nombre }}</td>
              <td>{{ $equipo->deporte }}</td>
              <td>{{ $equipo->entrenador }}</td>
              <td>
              <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn btn-warning btn-sm">Editar</a>
              <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
