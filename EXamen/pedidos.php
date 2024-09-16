<?php
session_start(); // Iniciar sesión para verificar si el usuario está autenticado
include 'db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Carrito</title>
    <link rel="stylesheet" href="/EXamen/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body>
  <style>
    /* Agregamos algo de estilo */
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        padding: 20px;
    }
    h2 {
        margin-bottom: 20px;
        font-family: 'Bebas Neue', sans-serif;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    table, th, td {
        border: 1px solid #ddd;
    }
    th, td {
        padding: 10px;
        text-align: center;
    }
    th {
        background-color: #f8f9fa;
    }
    td img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 5px;
    }
    .text-end {
        text-align: right;
    }
    .btn {
        padding: 5px 10px;
        margin-right: 5px;
        border-radius: 5px;
        border: none;
    }
    .btn-danger {
        background-color: #dc3545;
        color: white;
    }
    .btn-success {
        background-color: #28a745;
        color: white;
    }
    .btn-warning {
        background-color: #ffc107;
        color: white;
    }
    button:hover {
        opacity: 0.9;
    }
  </style>

<header>
    <div class="logo-container">
        <img src="/EXamen/img/logo.png" alt="Logo">
        <h1>FRAGANCIA UCB</h1>
    </div>
    <nav class="navbar">
        <a href="index.php"><i class="fas fa-home"></i> Inicio</a>
        <a href="perfumes.php"><i class="fas fa-spray-can"></i> Perfumes</a>
        <a href="pedidos.php"><i class="fas fa-box"></i> Pedidos</a>
        <a href="contactos.php"><i class="fas fa-envelope"></i> Contactos</a>

        <!-- Si el usuario está autenticado, muestra el enlace de "Cerrar Sesión" -->
        <?php if (isset($_SESSION['usuario_id'])): ?>
            <a href="logout.php" class="btn btn-danger">Cerrar Sesión</a>
        <?php else: ?>
            <!-- Si no está autenticado, muestra el enlace para iniciar sesión -->
            <a href="login.php" class="btn btn-primary">Iniciar Sesión</a>
        <?php endif; ?>
    </nav>
</header>
<div class="container mt-5">
    <h2>Productos en tu Carrito</h2>

    <?php
    // Consultar los productos en el carrito desde la base de datos
    $sql = "SELECT * FROM carrito";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre del Producto</th>
                    <th>Precio Unitario</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>';
        // Mostrar los productos del carrito en la tabla
        $total = 0;
        while ($producto = $result->fetch_assoc()) {
            $subtotal = $producto['precio'] * $producto['cantidad'];
            $total += $subtotal;

            echo '
            <tr>
                <td><img src="http://localhost/EXamen/img/perfumes/'.$producto['imagen'].'" alt="'.$producto['nombre_producto'].'"></td>
                <td>'.$producto['nombre_producto'].'</td>
                <td>Bs.'.$producto['precio'].'</td>
                <td>'.$producto['cantidad'].'</td>
                <td>Bs.'.number_format($subtotal, 2).'</td>
                <td>
                    <button class="btn btn-success" onclick="modificarCantidad('.$producto['id'].', 1)">+</button>
                    <button class="btn btn-warning" onclick="modificarCantidad('.$producto['id'].', -1)">-</button>
                    <button class="btn btn-danger" onclick="eliminarProducto('.$producto['id'].')">Eliminar</button>
                </td>
            </tr>';
        }
        echo '
            <tr>
                <td colspan="4" class="text-end"><strong>Total:</strong></td>
                <td colspan="2"><strong>Bs.'.number_format($total, 2).'</strong></td>
            </tr>
        </tbody>
        </table>';
        
        // Botón para realizar la compra
        echo '
        <div class="text-center">
            <button class="btn btn-primary" onclick="realizarCompra()">Realizar mi compra</button>
        </div>';
    } else {
        echo '<p>No hay productos en el carrito.</p>';
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</div>
<footer>
            <div class="container">
                <div class="footer-section">
                    <h1>Contáctanos</h1>
                    <p>Email: <a href="mailto:sergio.ticona@ucb.edu.bo">sergio.ticona@ucb.edu.bo</a></p>
                    <p>Teléfono: <a href="tel:+59162295637">62295637</a></p>
                    <p>Universidad Católica Boliviana</p>
                </div>
                <div class="footer-section">
                    <h2>Links Directos</h2>
                    <ul>
                    <a href="#" aria-label="Inicio"><i class="fas fa-home"></i> Inicio</a>
                <a href="#" aria-label="Perfumes"><i class="fas fa-spray-can"></i> Perfumes</a>
                <a href="#" aria-label="Pedidos"><i class="fas fa-box"></i> Pedidos</a>
                <a href="#" aria-label="Contactos"><i class="fas fa-envelope"></i> Contactos</a>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Síguenos</h3>
                    <ul class="social-media">
                        <li><a href="https://www.facebook.com/profile.php?id=100006948167897"><img src="/EXamen/img/facebook.png" alt="Facebook" class="social-icon"></a></li>
                        <li><a href="https://www.instagram.com/sergi0_tm/"><img src="/EXamen/img/instagram.png" alt="Instagram" class="social-icon"></a></li>
                        <li><a href="https://wa.me/62295637"><img src="/EXamen/img/whatsapp.png" alt="Social" class="social-icon"></a></li>
                    </ul>
                </div>
            </div>
            <div class="bottom-bar">
                <p>&copy;  Todos los derechos reservados.</p>
            </div>
        </footer>

<script>
function modificarCantidad(id, cantidad) {
    $.ajax({
        url: 'modificar_carrito.php',
        type: 'POST',
        data: { id: id, cantidad: cantidad },
        success: function(response) {
            location.reload(); // Recargar la página para ver los cambios
        },
        error: function() {
            alert('Error al modificar la cantidad.');
        }
    });
}

function eliminarProducto(id) {
    if (confirm('¿Estás seguro de eliminar este producto del carrito?')) {
        $.ajax({
            url: 'eliminar_producto.php',
            type: 'POST',
            data: { id: id },
            success: function(response) {
                location.reload(); // Recargar la página después de eliminar
            },
            error: function() {
                alert('Error al eliminar el producto.');
            }
        });
    }
}

// Verificar si el usuario está autenticado antes de realizar la compra
function realizarCompra() {
    $.ajax({
        url: 'verificar_usuario.php',
        type: 'GET',
        success: function(response) {
            if (response === 'autenticado') {
                window.location.href = 'compra_exitosa.php';
            } else {
                window.location.href = 'login.php';
            }
        },
        error: function() {
            alert('Error al verificar autenticación.');
        }
    });
}
</script>
</body>
</html>
