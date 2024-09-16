<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar si se recibieron los datos
    if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['precio'])) {
        $producto_id = $_POST['id'];
        $nombre_producto = $_POST['nombre'];
        $precio = $_POST['precio'];

        // Insertar el producto en la tabla 'carrito'
        $sql = "INSERT INTO carrito (producto_id, nombre_producto, precio) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isd", $producto_id, $nombre_producto, $precio);

        if ($stmt->execute()) {
            echo 'Producto añadido al carrito con éxito.';
        } else {
            echo 'Error al añadir el producto al carrito.';
        }

        $stmt->close();
    } else {
        echo 'Datos insuficientes para añadir el producto al carrito.';
    }
} else {
    echo 'Método de solicitud no válido.';
}

$conn->close();
?>
