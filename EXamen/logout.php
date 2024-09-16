<?php
session_start();

// Destruir la sesión
session_unset(); // Destruye todas las variables de la sesión
session_destroy(); // Destruye la sesión actual

// Redirigir al inicio o página de login
header("Location: index.php");
exit();
?>
