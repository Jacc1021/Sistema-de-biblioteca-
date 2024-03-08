<?php
// Cargar el código de la conexión a la BD
include_once "conexion.php";

// Verificar si se ha enviado el formulario de edición
if (isset($_POST['editar'])) {
    // Recuperar los valores del formulario
    $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
    $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $autor = mysqli_real_escape_string($conexion, $_POST['autor']);
    $fechaP = mysqli_real_escape_string($conexion, $_POST['fechaP']);
    $editorial = mysqli_real_escape_string($conexion, $_POST['editorial']);
    $portada = mysqli_real_escape_string($conexion, $_POST['portada']);

    // Actualizar el registro en la BD
    $queryEditar = "UPDATE listado SET nombre='$nombre', autor='$autor', fecha_publicacion='$fechaP', editorial='$editorial', portada='$portada' WHERE clave='$clave'";
    if (mysqli_query($conexion, $queryEditar)) {
        echo '<div class="alert alert-success mt-3" role="alert">';
        echo 'Libro actualizado correctamente';
        echo '</div>';
    } else {
        echo '<div class="alert alert-danger mt-3" role="alert">';
        echo 'Error al actualizar el producto: ' . mysqli_error($conexion);
        echo '</div>';
    }
}

// Obtener el ID del producto a editar
if (isset($_GET['id'])) {
    $clave = $_GET['id'];
    // Obtener los datos del producto
    $query = "SELECT * FROM listado WHERE clave='$clave'";
    $result = mysqli_query($conexion, $query);
    $producto = mysqli_fetch_assoc($result);
}
?>

<!doctype html>
<html lang="es" data-bs-theme="auto">
<head>
    <script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/646ac4fad6.js" crossorigin="anonymous"></script>
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Editar Libro</title>
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
        <div class="bg-body-tertiary p-5 rounded">
            <h1 class="text-center">Editar Libro</h1>
            <form method="post" action="">
                <input type="hidden" name="clave" value="<?php echo $producto['clave']; ?>">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $producto['nombre']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="autor" class="form-label">Autor</label>
                    <input type="text" name="autor" class="form-control" id="autor" value="<?php echo $producto['autor']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="fechaP" class="form-label">Fecha Publicación</label>
                    <input type="date" name="fechaP" class="form-control" id="fechaP" value="<?php echo $producto['fecha_publicacion']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="editorial" class="form-label">Editorial</label>
                    <input type="text" name="editorial" class="form-control" id="editorial" value="<?php echo $producto['editorial']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="portada" class="form-label">Portada</label>
                    <input type="file" name="portada" class="form-control" id="portada" aria-describedby="portada"> 
                </div>
                <button type="submit" name="editar" class="btn btn-primary">Guardar Cambios</button>
            </form>
        </div>
        <!-- Botón Regresar -->
        <div>
            <a class="btn btn-bd-primary mt-2" href="leer.php">Regresar al menú principal</a>
        </div>
</main>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
