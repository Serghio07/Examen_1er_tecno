<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Exitosa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        // Redirigir al index después de 5 segundos
        setTimeout(function() {
            window.location.href = "index.php";
        }, 5000); // 5000 milisegundos = 5 segundos
    </script>
</head>
<body>
    <div class="container mt-5 text-center">
        <h2 class="display-4">¡Compra Exitosa!</h2>
        <div class="alert alert-success mt-3">
            Su compra ha sido realizada con éxito. Será redirigido a la página principal en unos segundos.
        </div>
        <div class="spinner-border text-success" role="status">
            <span class="visually-hidden">Cargando...</span>
        </div>
        <p class="mt-3">Gracias por su compra.</p>
        <a href="index.php" class="btn btn-primary mt-3">Volver a Inicio</a>
    </div>
</body>
</html>
