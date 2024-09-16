
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="/EXamen/styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
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
        <section>
            <div class="banner">
                <div class="slides">
                    <img src="/EXamen/img/ban1.jpg" alt="Banner 1">
                    <img src="/EXamen/img/ban2.jpg" alt="Banner 2">
                    <img src="/EXamen/img/ban3.jpg" alt="Banner 3">
                    <img src="/EXamen/img/ban4.jpg" alt="Banner 4">
                </div>
            </div>
        </section>

        <section>
            <div class="seccion-informacion">
                <div class="bloque">
                    <h1>Bienvenidos a Fragancia UCB</h1>
                    <p>Nuestras fragancias están diseñadas para acompañarte en cada momento especial. Explora nuestra colección de perfumes que combinan elegancia, calidad y originalidad. Nos dedicamos a brindarte lo mejor de la alta perfumería con una atención excepcional.</p>
                </div>
                <div class="bloque">
                    <img src="/EXamen/img/people.jpg" alt="Imagen de bienvenida">
                </div>
            </div>
        </section>

        <section>
            <div id="card-area">
                <h1 style="text-align: center;">Perfumes</h1>
                <div class="wrapper">
                    <div class="box-area">
                        <div class="box">
                            <a href="/EXamen/perfumes.php">
                                <img alt="Perfume para hombres" src="/EXamen/img/homre.jpg">
                                <div class="overlay">
                                    <h3>Hombres</h3>
                                    <p>Perfumes para hombres</p>
                                </div>
                            </a>
                        </div>
                        <div class="box">
                            <a href="/EXamen/perfumes.php"> 
                                <img alt="Perfume para mujeres" src="/EXamen/img/mujer.jpg">
                                <div class="overlay">
                                    <h3>Mujeres</h3>
                                    <p>Perfumes para mujeres</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="nosotros">
            <div class="container">
                <div class="row">
                    <div class="col-md-1">
                        <figure class="imagen-acerca-de">
                            <img src="/EXamen/img/logo.png" alt="Logo de la óptica">
                        </figure>
                    </div>
                    <div class="col-md-2">
                        <div class="titulo-pagina">
                            <h2>Acerca de nosotros</h2>
                            <p>Somos un grupo de jóvenes que creó esta perfumería para todo tipo de personas.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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

    </body>
    </html>
