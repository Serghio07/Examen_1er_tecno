<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $cantidad = $_POST['cantidad'];

    // Consultar la cantidad actual del producto
    $sql = "SELECT cantidad FROM carrito WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $producto = $result->fetch_assoc();
    $cantidad_actual = $producto['cantidad'];

    if ($cantidad_actual + $cantidad <= 0) {
        // Si la cantidad es 0 o menor, eliminar el producto
        $sql = "DELETE FROM carrito WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
    } else {
        // Actualizar la cantidad del producto en el carrito
        $sql = "UPDATE carrito SET cantidad = cantidad + ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii', $cantidad, $id);
        $stmt->execute();
    }

    $stmt->close();
    $conn->close();
}
?>
