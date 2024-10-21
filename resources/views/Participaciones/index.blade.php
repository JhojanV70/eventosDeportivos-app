<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Participaciones</title>
  </head>
  <body>
    <div class="container">
      <h1>Listado de Participaciones</h1>
      <a href="{{ route('participaciones.create') }}" class="btn btn-success">Agregar Participación</a>
      <a href="{{route('municipios.menu')}}" class="btn btn-warning">Volver</a>      
      <table class="table">
        <thead>
          <tr>
            <th>ID Participación</th>
            <th>Evento</th>
            <th>Equipo</th>
            <th>Resultado</th>
            <th>Premios</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($participaciones as $participacion)
            <tr>
                <td>{{ $participacion->id }}</td>
                <td>{{ $participacion->evento_nombre }}</td> <!-- Nombre del evento -->
                <td>{{ $participacion->equipo_nombre }}</td> <!-- Nombre del equipo -->
                <td>{{ $participacion->resultado }}</td>
                <td>{{ $participacion->premios ?? 'N/A' }}</td> <!-- Muestra 'N/A' si premios es null -->
                <td>
                <a href="{{ route('participaciones.edit', $participacion->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('participaciones.destroy', $participacion->id) }}" method="POST" style="display:inline-block;">
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
