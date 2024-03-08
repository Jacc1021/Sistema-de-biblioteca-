<?php
    // Cargar el código de la conexión a la BD
    include_once "conexion.php";
?>

<!doctype html>
<html lang="es" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>
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

     <!-- Script JavaScript para confirmación de eliminación -->
     <script>
        function confirmarEliminacion(id) {
            if (confirm("¿Estás seguro de que quieres eliminar este producto?")) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "eliminar.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert(xhr.responseText);
                        location.reload();
                    }
                };
                xhr.send("id=" + id);
            }
        }
    </script>

<main class="container">
    <div class="bg-body-tertiary p-5 rounded">
        <h1 class="text-center">Listado de Libros</h1>
        <div class="row">
            <div class="col-2">
                <a class="btn btn-lg mt-3" href="crear.php" role="button">Listar</a><br>
                <a class="btn btn-lg mt-3" href="leer.php" role="button">Administrar</a><br>
            </div>
            <div class="col-10">
            <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Clave</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Fecha publicacion</th>
                            <th scope="col">Editorial</th>
                            <th scope="col">Portada</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Recuperar los productos de la BD
                        // Recuperación de datos
                        $querylibros = "SELECT clave, nombre, autor, fecha_publicacion, editorial, portada FROM listado;";
                        $resultadolibros = mysqli_query($conexion, $querylibros); // Ejecutar el query
                        $totallibros = mysqli_num_rows($resultadolibros); // Contar el número de productos

                        // Ciclo para imprimir los productos
                        if ($totallibros > 0) { // Validar si existen productos en la BD
                            // Presentar los productos en cada fila de la tabla
                            while ($listado = mysqli_fetch_array($resultadolibros)) {
                                echo "<tr>";
                                echo "<th scope='row'>" . $listado['clave'] . "</th>";
                                echo "<td>" . $listado['nombre'] . "</td>";
                                echo "<td>" . $listado['autor'] . "</td>";
                                echo "<td>" . $listado['fecha_publicacion'] . "</td>";
                                echo "<td>" . $listado['editorial'] . "</td>";
                                // echo "<td><img src='img/" . $producto['portada'] . "'></td>";
                                echo "<td><img src='data:image/png;base64," . base64_encode($listado['portada']) . "' alt='Imagen'></td>";
                                echo "<td><a href='editar.php?id=" . $listado['clave'] . "'><i class='fa-solid fa-pen-to-square'></i>Editar</a></td>";
                                echo "<td><a href='#' onclick='confirmarEliminacion(" . $listado['clave'] . ")'><i class='fas fa-trash'></i>Eliminar</a></td>";
                                echo "</tr>";
                            } // while $producto
                        } // if $totallibros

                        ?>
                    </tbody>
                </table>

                <!-- Total de productos -->
                <div class="text-center mt-4 mb-2">
                    Total de Libros Registrados : <?php echo $totallibros; ?>
                </div>

                <!-- Botón Regresar -->
                <div>
                    <a class="btn btn-bd-primary mt-2" href="leer.php">Regresar al menú principal</a>
                </div>

            </div> <!-- col-10 -->
        </div> <!-- row -->
    </div> <!-- bg-body -->
</main>

  <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
