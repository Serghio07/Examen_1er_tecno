<?php
include 'db.php';

// Verificar si se ha pasado una ID de perfume
if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $id = $_GET['id'];

    // Preparar y ejecutar la consulta para obtener los detalles del perfume
    $stmt = $conn->prepare("SELECT * FROM perfumes WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si se encontró el perfume
    if ($result->num_rows > 0) {
        $perfume = $result->fetch_assoc();

        // Escapar el contenido para evitar XSS
        $nombre = htmlspecialchars($perfume['nombre']);
        $precio = htmlspecialchars($perfume['precio']);
        $descripcion = htmlspecialchars($perfume['descripcion']);
        $detalles = htmlspecialchars($perfume['detalles']);
        $imagen = htmlspecialchars($perfume['imagen']);

        // Mostrar los detalles del perfume
        echo '
        <div id="perfume-details">
            <img src="'.$imagen.'" alt="'.$nombre.'" style="width:100%; border-radius:10px;"/>
            <h2>'.$nombre.'</h2>
            <p><strong>Precio:</strong> Bs.'.$precio.'</p>
            <p><strong>Descripción:</strong> '.$descripcion.'</p>
            <p><strong>Detalles adicionales:</strong> '.$detalles.'</p>
        </div>';
    } else {
        echo 'Perfume no encontrado.';
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
} else {
    echo 'ID de perfume no proporcionada o no válida.';
}
?>
