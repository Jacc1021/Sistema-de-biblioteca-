<?php
// Cargar el código de la conexión a la BD
include_once "conexion.php";

// Verificar si se hizo click en el botón guardar
if (isset($_POST['guardar'])) {
    // Recuperar los valores del formulario
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $autor = mysqli_real_escape_string($conexion, $_POST['autor']);
    $fechaP = mysqli_real_escape_string($conexion, $_POST['fechaP']);
    $editorial = mysqli_real_escape_string($conexion, $_POST['editorial']);

    // Obtener el nombre de la imagen y su contenido
    $portadaNombre = $_FILES['portada']['name'];
    $portadaContenido = file_get_contents($_FILES['portada']['tmp_name']);
    $portada = mysqli_real_escape_string($conexion, $portadaContenido);

    // Verificar que la clave no se encuentre almacenada previamente
    $queryIdProducto = "SELECT clave FROM listado WHERE clave = '$clave'";
    // Ejecutar el query de validación de id duplicado
    $resultadoClave = mysqli_query($conexion, $queryIdProducto);
    // Obtener el número de claves que se encontraron
    $numeroClaves = mysqli_num_rows($resultadoClave);
    // Si se obtuvo una clave, mostrar error "clave existente", de lo contrario, permitir guardar
    if ($numeroClaves >= 1) {
        echo '<div class="alert alert-danger mt-3" role="alert">';
        echo '¡¡¡ ERROR la clave del producto ya existe en la BD !!!';
        echo '<br>Capture nuevamente los datos';
        echo '</div>';
    } else {
        // Si no existe la clave, entonces guardar el registro en la BD
        $queryGuardar = "INSERT INTO listado (clave, nombre, autor, fecha_publicacion, editorial, portada) VALUES ('$clave', '$nombre', '$autor', '$fechaP', '$editorial', '$portada')";
        // Ejecutar query
        if (mysqli_query($conexion, $queryGuardar)) {
            echo '<div class="alert alert-primary mt-3" role="alert">';
            echo 'Producto guardado Satisfactoriamente!!!';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger mt-3" role="alert">';
            echo '¡¡¡ ERROR NO se pudo guardar el producto !!!';
            echo '</div>';
        } // if mysqli_query
    } // if $numeroIds
}

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

    <main class="container">
        <div class="row">
            <div class="col-md-2">
                <a class="btn btn-lg mt-3" href="crear.php" role="button">Listar</a><br>
                <a class="btn btn-lg mt-3" href="leer.php" role="button">Administrar</a><br>
            </div>
            <div class="col-md-10">
                <div class="bg-body-tertiary p-5 rounded">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="clave" class="form-label">Clave</label>
                            <input type="text" name="clave" class="form-control" id="clave" aria-describedby="clave" required>
                        </div>

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" aria-describedby="nombre" required>
                        </div>

                        <div class="mb-3">
                            <label for="autor" class="form-label">Autor</label>
                            <input type="text" name="autor" class="form-control" id="autor" aria-describedby="autor">
                        </div>

                        <div class="mb-3">
                            <label for="fechaP" class="form-label">Fecha Publicación</label>
                            <input type="date" name="fechaP" class="form-control" id="fechaP" aria-describedby="fechaP">
                        </div>

                        <div class="mb-3">
                            <label for="editorial" class="form-label">Editorial</label>
                            <input type="text" name="editorial" class="form-control" id="editorial" aria-describedby="editorial">
                        </div>

                        <div class="mb-3">
                            <label for="portada" class="form-label">Portada</label>
                            <input type="file" name="portada" class="form-control" id="portada" aria-describedby="portada">
                        </div>
                        <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
                    </form>

                    <!-- Botón Regresar -->
                    <div>
                        <a class="btn btn-bd-primary my-3" href="leer.php">Regresar al menú principal</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
