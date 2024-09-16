<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfumes - Fragancia UCB</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="/EXamen/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/EXamen/estilo.css">
</head>
<body>
  <style>
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

    .text-end {
        text-align: right;
    }

    /* Estilos para el banner */
    .banner {
        width: 100%;
        height: 300px;
        background: url('/EXamen/img/banner3.jpg') no-repeat center center;
        background-size: cover;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        font-size: 2em;
        font-family: 'Bebas Neue', sans-serif;
    }

    .banner h1 {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 20px;
        border-radius: 10px;
    }

    /* Estilos para el grid de tarjetas */
    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }

    .card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.2s ease;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .card-content {
        padding: 15px;
        text-align: center;
    }

    .card-content h3 {
        font-size: 1.5em;
        margin-bottom: 10px;
    }

    .card-content p {
        margin: 5px 0;
    }

    .card button {
        margin-top: 10px;
        padding: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        font-size: 1em;
        transition: background-color 0.2s ease;
    }

    .card button:hover {
        background-color: #218838;
    }

    /* Modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        max-width: 500px;
        width: 90%;
        margin: auto;
        position: relative;
    }

    .modal-content .close {
        position: absolute;
        top: 10px;
        right: 10px;
        color: black;
        font-size: 1.5em;
        cursor: pointer;
    }

    .modal-footer {
        margin-top: 20px;
        text-align: right;
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
        </nav>
    </header>

    <!-- Aquí va el banner -->
    <div class="banner">
        <h1>Descubre las mejores fragancias</h1>
    </div>

    <div class="container">
        <div class="grid">
            <?php
            // Consultar los perfumes desde la base de datos
            $sql = "SELECT * FROM perfumes";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Mostrar cada perfume en una tarjeta
                while ($perfume = $result->fetch_assoc()) {
                    echo '
                    <div class="card">
                        <img src="http://localhost/EXamen/img/perfumes/'.$perfume['imagen'].'" alt="'.$perfume['nombre'].'" style="width:100%; height:200px; object-fit:cover;">
                        <div class="card-content">
                            <h3>'.$perfume['nombre'].'</h3>
                            <p>Precio: Bs.'.$perfume['precio'].'</p>
                            <p>'.$perfume['descripcion'].'</p>
                        </div>
                        <button class="add-to-cart" data-id="'.$perfume['id'].'" data-nombre="'.$perfume['nombre'].'" data-precio="'.$perfume['precio'].'">Añadir al carrito</button>
                        <button class="details" data-id="'.$perfume['id'].'">Detalles</button>
                    </div>';
                }
            } else {
                echo "No hay perfumes disponibles.";
            }

            // Cerrar la conexión a la base de datos
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Modal para los detalles -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="modal-body">
                <!-- Los detalles del producto se cargarán aquí -->
            </div>
            <div id="modal-footer">
                <button id="modal-add-to-cart" class="add-to-cart-modal">Añadir al carrito</button>
                <button class="close">Cerrar</button>
            </div>
        </div>
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
                    <li><a href="https://wa.me/62295637"><img src="/EXamen/img/whatsapp.png" alt="WhatsApp" class="social-icon"></a></li>
                </ul>
            </div>
        </div>
        <div class="bottom-bar">
            <p>&copy;  Todos los derechos reservados.</p>
        </div>
    </footer>

    <script>
    $(document).ready(function() {
        var currentProductId;
        var currentProductName;
        var currentProductPrice;

        // Abrir el modal con los detalles del perfume
        $('.details').on('click', function() {
            currentProductId = $(this).data('id');
            $.ajax({
                url: 'detalle_perfume.php',
                type: 'GET',
                data: { id: currentProductId },
                success: function(response) {
                    $('#modal-body').html(response);
                    $('#modal').show();
                    
                    // Actualizar los datos actuales
                    currentProductName = $('#modal-body').data('nombre');
                    currentProductPrice = $('#modal-body').data('precio');
                }
            });
        });

        // Cerrar el modal
        $('.close').on('click', function() {
            $('#modal').hide();
        });

        // Añadir al carrito desde el modal
        $('#modal-add-to-cart').on('click', function() {
            $.ajax({
                url: 'agregar_carrito.php',
                type: 'POST',
                data: {
                    id: currentProductId,
                    nombre: currentProductName,
                    precio: currentProductPrice
                },
                success: function(response) {
                    alert('Producto añadido al carrito.');
                    $('#modal').hide();
                },
                error: function() {
                    alert('Error al añadir el producto al carrito.');
                }
            });
        });

        // Añadir al carrito desde la tarjeta del producto
        $('.add-to-cart').on('click', function() {
            var perfumeId = $(this).data('id');
            var nombreProducto = $(this).data('nombre');
            var precioProducto = $(this).data('precio');

            $.ajax({
                url: 'agregar_carrito.php',
                type: 'POST',
                data: {
                    id: perfumeId,
                    nombre: nombreProducto,
                    precio: precioProducto
                },
                success: function(response) {
                    alert('Producto añadido al carrito.');
                },
                error: function() {
                    alert('Error al añadir el producto al carrito.');
                }
            });
        });
    });
    </script>
</body>
</html>
