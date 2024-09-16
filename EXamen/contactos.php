<?php
include 'db.php'; // Asegúrate de tener este archivo para la conexión a la base de datos

// Si el formulario fue enviado, procesamos el mensaje
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Validar los datos
    if (!empty($nombre) && !empty($email) && !empty($mensaje)) {
        // Preparar la consulta SQL para insertar el mensaje en la base de datos
        $sql = "INSERT INTO mensajes_contacto (nombre, email, mensaje) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nombre, $email, $mensaje);

        // Ejecutar la consulta y verificar si fue exitosa
        if ($stmt->execute()) {
            $success_message = "Mensaje enviado con éxito.";
        } else {
            $error_message = "Hubo un error al guardar el mensaje. Inténtelo de nuevo.";
        }

        // Cerrar la consulta preparada
        $stmt->close();
    } else {
        $error_message = "Todos los campos son obligatorios.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Fragancia UCB</title>
    <link rel="stylesheet" href="responsive.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
        header {
    background: linear-gradient(to right, #000000, #0d47a1); /* Degradado de negro a azul oscuro */
    color: white;
    padding: 30px 0; /* Espacio superior e inferior */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3); /* Sombra más pronunciada para un efecto más oscuro */
    text-align: center;
    font-size: 1.5rem; /* Ajusta el tamaño del texto */
    border-bottom: 2px solid #0d47a1; /* Opcional: línea inferior azul oscuro */
}


.logo-container {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
    margin-bottom: 10px;
}

.logo-container img {
    width: 60px;
    height: auto;
}

.logo-container h1 {
    margin: 0;
    font-size: 24px;
}

nav.navbar {
    display: flex;
    justify-content: center;
    gap: 30px;
    padding: 10px 0;
}

nav.navbar a {
    color: white;
    padding: 10px 20px;
    border-radius: 50px;
    background-color: #0072e5;
    transition: background-color 0.3s, transform 0.3s;
    font-weight: bold;
    display: flex;
    align-items: center;
    gap: 8px;
}

nav.navbar a:hover {
    background-color: #003d82;
    transform: scale(1.05);
}

.navbar img {
    width: 24px;
    height: auto;
}

        h1 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 3rem;
            margin-bottom: 30px;
        }

        .contact-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .contact-form h2 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .map-container {
            height: 300px;
            margin-bottom: 30px;
            border-radius: 8px;
            overflow: hidden;
        }

        .social-icons {
            text-align: center;
            margin-top: 30px;
        }

        .social-icons a {
            margin: 0 10px;
            font-size: 2rem;
            color: #555;
            text-decoration: none;
        }

        .social-icons a:hover {
            color: #007bff;
        }
        .banner {
            position: relative;
            text-align: center;
            color: white;
            background: #000;
        }

        .banner img {
            width: 100%;
            height: auto;
            opacity: 0.7;
        }

        .banner h1 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 4rem;
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: 2px;
            color: #fff;
        }

    </style>
</head>
<body>

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
    <div class="banner">
        <h1>Contactate!!!</h1>
        <img src="/EXamen/img/ban4.jpg" alt="">

    </div>

    <div class="container">
        <!-- Mensajes de éxito o error -->
        <?php if (isset($success_message)): ?>
            <div class="alert alert-success">
                <?php echo $success_message; ?>
            </div>
        <?php elseif (isset($error_message)): ?>
            <div class="alert alert-danger">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6">
                <!-- Formulario de contacto -->
                <div class="contact-form">
                    <h2>Formulario de Contacto</h2>
                    <form action="contactos.php" method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre Completo</label>
                            <input type="text" name="nombre" class="form-control" id="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="mensaje" class="form-label">Mensaje</label>
                            <textarea name="mensaje" class="form-control" id="mensaje" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Mapa de Google Maps -->
                <h2>Ubicación de la Empresa</h2>
                <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3728.1385472410993!2d-68.10854433349398!3d-16.521698508977092!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x915f20ee187a3103%3A0x2f2bb2b7df32a24d!2sUniversidad%20Cat%C3%B3lica%20Boliviana%20%22San%20Pablo%22!5e0!3m2!1ses-419!2sbo!4v1726116576911!5m2!1ses-419!2sbo" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        <!-- Redes Sociales -->
        <div class="social-icons">
            <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-square"></i></a>
            <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter-square"></i></a>
            <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram-square"></i></a>
        </div>
    </div>

    <!-- Incluir Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
