<?php
// Conexión con la BD de mysql
$conexion = new mysqli("localhost", "root", "admin", "crud-copia");
mysqli_set_charset($conexion, "utf8"); // Codificación de caracteres

// Verificación de la conexión con al BD
if(mysqli_connect_errno()){
    echo "<h1>Error de conexión con la BD: ". mysqli_connect_error() ."</h1>";
}else{
    // echo "<h1>Conexión Satisfactoria</h1>";
}
?>