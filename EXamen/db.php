<?php
$servername = "localhost"; // Cambiar si es necesario
$username = "root"; // Usuario de MySQL
$password = ""; // Contraseña de MySQL
$dbname = "tienda_perfumes"; // Base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
