<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Event List</title>
  </head>
  <body>
    <div class="container">
      <h1>Listado de eventos</h1>
    <table class="table">
   <thead>
     <tr>
     <th scope="col">Event ID</th>
     <th scope="col">Event Name</th>
     <th scope="col">Description</th>
     <th scope="col">Date</th>
     <th scope="col">Location</th>
     <th scope="col">Type</th>
     <th scope="col">Actions</th>
      </tr>
   </thead>
    <tbody>
      @foreach ($eventos as $evento)
        <tr>
          <th scope="row">{{$evento->id}}</th>
          <td>{{ $evento->nombre }}</td>
          <td>{{ $evento->descripcion }}</td>
          <td>{{ $evento->fecha }}</td>
          <td>{{ $evento->ubicacion }}</td>
          <td>{{ $evento->tipo }}</td>
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
