<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    // Eliminar el producto del carrito
    $sql = "DELETE FROM carrito WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        echo 'Producto eliminado';
    } else {
        echo 'Error al eliminar el producto';
    }
    
    $stmt->close();
    $conn->close();
}
?>
