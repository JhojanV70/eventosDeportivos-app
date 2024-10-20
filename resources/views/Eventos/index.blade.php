<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Listado de Eventos</title>
  </head>
  <body>
    <div class="container">
      <h1>Listado de Eventos</h1>
      <a href="{{ route('eventos.create') }}" class="btn btn-success">Agregar Evento</a>
      
      <table class="table">
        <thead>
          <tr>
            <th>ID Evento</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Fecha</th>
            <th>Ubicación</th>
            <th>Tipo</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($eventos as $evento)
            <tr>
              <td>{{ $evento->id }}</td>
              <td>{{ $evento->nombre }}</td>
              <td>{{ $evento->descripcion }}</td>
              <td>{{ $evento->fecha }}</td>
              <td>{{ $evento->ubicacion }}</td>
              <td>{{ $evento->tipo }}</td>
              <td>
                <a href="{{ route('eventos.edit', $evento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('eventos.destroy', $evento->id) }}" method="POST" style="display:inline-block;">
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
