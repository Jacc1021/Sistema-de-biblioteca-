<?php
// Cargar el código de la conexión a la BD
include_once "conexion.php";

// Variable para almacenar el término de búsqueda
$termino = "";

// Verificar si se recibió un término de búsqueda
if (isset($_GET['q'])) {
    // Obtener el término de búsqueda
    $termino = mysqli_real_escape_string($conexion, $_GET['q']);

    // Realizar la consulta para buscar libros que coincidan con el término
    $queryBusqueda = "SELECT clave, nombre, autor, fecha_publicacion, editorial, portada FROM listado WHERE nombre LIKE '%$termino%' OR autor LIKE '%$termino%' OR editorial LIKE '%$termino%';";
    $resultadosBusqueda = mysqli_query($conexion, $queryBusqueda); // Ejecutar el query
    $totalResultados = mysqli_num_rows($resultadosBusqueda); // Contar el número de resultados
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

    
            <!-- Resultados de la búsqueda -->
            <?php if (isset($totalResultados)) : ?>
                <div class="text-center mt-4 mb-2">
                    <?php if ($totalResultados > 0) : ?>
                        <p>Resultados de la búsqueda para '<?php echo $termino; ?>':</p>
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
                                <?php while ($libro = mysqli_fetch_array($resultadosBusqueda)) : ?>
                                    <tr>
                                        <th scope='row'><?php echo $libro['clave']; ?></th>
                                        <td><?php echo $libro['nombre']; ?></td>
                                        <td><?php echo $libro['autor']; ?></td>
                                        <td><?php echo $libro['fecha_publicacion']; ?></td>
                                        <td><?php echo $libro['editorial']; ?></td>
                                        <td><img src='data:image/png;base64,<?php echo base64_encode($libro['portada']); ?>' alt='Imagen'></td>
                                        <td><a href='editar.php?id=<?php echo $libro['clave']; ?>'><i class='fa-solid fa-pen-to-square'></i>Editar</a></td>
                                        <td><a href='#' onclick='confirmarEliminacion(<?php echo $libro['clave']; ?>)'><i class='fas fa-trash'></i>Eliminar</a></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>No se encontraron resultados para '<?php echo $termino; ?>'.</p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- Botón Regresar -->
            <div>
                <a class="btn btn-bd-primary mt-2" href="leer.php">Regresar al menú principal</a>
            </div>
        </div>
    </main>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
