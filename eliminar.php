<?php
// Cargar el código de la conexión a la BD
include_once "conexion.php";

// Verificar si se ha enviado el ID del producto a eliminar
if (isset($_POST['id'])) {
    $clave = $_POST['id'];

    // Eliminar el producto de la BD
    $queryEliminar = "DELETE FROM listado WHERE clave='$clave'";
    if (mysqli_query($conexion, $queryEliminar)) {
        echo 'Producto eliminado correctamente';
    } else {
        echo 'Error al eliminar el producto: ' . mysqli_error($conexion);
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>
