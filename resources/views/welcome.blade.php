<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sistema de Gestión de Eventos Deportivos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <header class="bg-dark text-white p-5">
      <div class="container text-center">
        <h1 class="display-4 fw-bold">Sistema de Gestión de Eventos Deportivos</h1>
      </div>
    </header>

    <div class="container my-5">
      <div class="card">
        <div class="card-header">
          <h2 class="mb-0">Listado de Recursos</h2>
        </div>
        <div class="card-body">
          <div class="d-grid gap-2">
            <a class="btn btn-primary" href="{{ route('participaciones.index') }}" role="button">Participaciones</a>
            <a class="btn btn-secondary" href="{{ route('equipos.index') }}" role="button">Equipos</a>
            <a class="btn btn-success" href="{{ route('eventos.index') }}" role="button">Eventos</a>
          </div>
        </div>
      </div>
    </div>

    <footer class="bg-light text-center py-4">
      <div class="container">
        <p class="mb-0">© 2024 Trabajo Municipios. Todos los derechos reservados.</p>
      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
      integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
