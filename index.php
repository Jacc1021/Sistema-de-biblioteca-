<!doctype html>
<html lang="es" data-bs-theme="auto">

<head>
  <script src="../assets/js/color-modes.js"></script>
  

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.118.2">
  <title>Operaciones CRUD</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">

  <!-- Custom styles for this template -->
  <link href="navbar-static.css" rel="stylesheet">
</head>

<body>
  <!-- Encabezado -->
  <?php
  // Incluir encabezado
  include_once "encabezado.php";
  ?>

<!doctype html>
<html lang="es" data-bs-theme="auto">

<head>
  <script src="../assets/js/color-modes.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.118.2">
  <title>Operaciones CRUD</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">

  <!-- Custom styles for this template -->
  <link href="navbar-static.css" rel="stylesheet">
</head>

<body>
  <!-- Encabezado -->
  <?php
  // Incluir encabezado
  include_once "encabezado.php";
  ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-2">
        <a class="btn btn-lg mt-3" href="crear.php" role="button">Listar</a><br>
        <a class="btn btn-lg mt-3" href="leer.php" role="button">Administrar</a><br>
      </div>
      <div class="col-10">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Clave</th>
              <th scope="col">Nombre</th>
              <th scope="col">Autor</th>
              <th scope="col">Fecha/publicacion</th>
              <th scope="col">Editorial</th>
              <th scope="col">Portada</th>
            </tr>
          </thead>
          <tbody>
            <!-- Aquí se llenaría la tabla con los datos -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>
