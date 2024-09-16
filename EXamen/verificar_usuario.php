<?php
session_start();

// Verificar si el usuario está autenticado
if (isset($_SESSION['usuario_id'])) {
    echo 'autenticado'; // El usuario está autenticado
} else {
    echo 'no_autenticado'; // El usuario no está autenticado
}
?>
