-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2024 a las 07:38:05
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_perfumes`
--
CREATE DATABASE IF NOT EXISTS `tienda_perfumes` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `tienda_perfumes`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--
-- Creación: 12-09-2024 a las 03:08:31
-- Última actualización: 12-09-2024 a las 05:27:03
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `nombre_producto` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT 1,
  `imagen` varchar(255) DEFAULT NULL,
  `fecha_agregado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `producto_id`, `nombre_producto`, `precio`, `cantidad`, `imagen`, `fecha_agregado`) VALUES
(13, 8, 'Chanel No. 5', 150.00, 2, NULL, '2024-09-12 03:56:05'),
(15, 12, 'Calvin Klein Euphoria', 110.00, 1, NULL, '2024-09-12 04:29:18'),
(19, 8, 'Chanel No. 5', 150.00, 1, NULL, '2024-09-12 05:15:49'),
(21, 6, 'Yanbal', 90.00, 1, NULL, '2024-09-12 05:26:06'),
(22, 10, 'Giorgio Armani Acqua di Gio', 130.00, 2, NULL, '2024-09-12 05:26:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes_contacto`
--
-- Creación: 12-09-2024 a las 04:38:41
-- Última actualización: 12-09-2024 a las 05:28:05
--

CREATE TABLE `mensajes_contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `mensajes_contacto`
--

INSERT INTO `mensajes_contacto` (`id`, `nombre`, `email`, `mensaje`, `fecha`) VALUES
(1, 'Sergio Juan Ticona Mamani', 'ticona465@gmail.com', 'perro', '2024-09-12 04:39:20'),
(2, 'Sergio Juan Ticona Mamani', 'ticona465@gmail.com', 'Quiero un nuevo perfume', '2024-09-12 05:19:06'),
(3, 'Sergio Juan Ticona Mamani', 'ticona465@gmail.com', 'Quiero un nuevo perfume', '2024-09-12 05:23:09'),
(4, 'Sergio Juan Ticona Mamani', 'ticona465@gmail.com', 'Hola, como estas?', '2024-09-12 05:28:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfumes`
--
-- Creación: 12-09-2024 a las 02:09:50
-- Última actualización: 12-09-2024 a las 05:25:56
--

CREATE TABLE `perfumes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text NOT NULL,
  `detalles` text NOT NULL,
  `imagen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `perfumes`
--

INSERT INTO `perfumes` (`id`, `nombre`, `precio`, `descripcion`, `detalles`, `imagen`) VALUES
(4, 'avon', 90.00, 'perfume para todo tipo de persona.', 'echo en Bolivia', ''),
(6, 'Yanbal', 90.00, 'perfume para todos.', 'reecien llegado.', ''),
(8, 'Chanel No. 5', 150.00, 'Aroma floral clásico', 'El perfume más icónico de Chanel con un bouquet floral atemporal...', 'http://localhost/EXamen/img/perfumes/p1.jpg'),
(9, 'Dior Sauvage', 120.00, 'Aroma fresco y especiado', 'Una fragancia masculina con toques de bergamota y pimienta...', 'http://localhost/EXamen/img/perfumes/p2.jpg'),
(10, 'Giorgio Armani Acqua di Gio', 130.00, 'Aroma acuático', 'Una fragancia ligera y refrescante inspirada en el mar...', 'http://localhost/EXamen/img/perfumes/p3.jpg'),
(11, 'Yves Saint Laurent Black Opium', 140.00, 'Aroma dulce y especiado', 'Un perfume intenso con notas de vainilla y café...', 'http://localhost/EXamen/img/perfumes/p4.jpg'),
(12, 'Calvin Klein Euphoria', 110.00, 'Aroma oriental', 'Una fragancia exótica con toques de granada y orquídea...', 'http://localhost/EXamen/img/perfumes/p5.jpg'),
(13, 'Versace Eros', 125.00, 'Aroma fresco y amaderado', 'Un perfume vibrante con menta y notas amaderadas...', 'http://localhost/EXamen/img/perfumes/p6.jpg'),
(14, 'Hermès Terre d’Hermès', 160.00, 'Aroma amaderado y especiado', 'Una fragancia elegante con notas de tierra y especias...', 'http://localhost/EXamen/img/perfumes/p7.jpg'),
(15, 'Gucci Bloom', 135.00, 'Aroma floral', 'Una fragancia femenina con toques de jazmín y nardos...', 'http://localhost/EXamen/img/perfumes/p8.jpg'),
(16, 'Prada Candy', 145.00, 'Aroma dulce y gourmet', 'Un perfume joven y atrevido con notas de caramelo...', 'http://localhost/EXamen/img/perfumes/p9.jpg'),
(17, 'Tom Ford Oud Wood', 200.00, 'Aroma amaderado y oriental', 'Una fragancia sofisticada con maderas exóticas y especias...', 'http://localhost/EXamen/img/perfumes/p10.jpg'),
(18, 'Lancome La Vie Est Belle', 150.00, 'Aroma dulce y floral', 'Una fragancia femenina con notas de iris y pachulí...', 'http://localhost/EXamen/img/perfumes/p11.jpg'),
(19, 'Paco Rabanne 1 Million', 135.00, 'Aroma especiado y dulce', 'Un perfume audaz con canela, ámbar y cuero...', 'http://localhost/EXamen/img/perfumes/p12.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--
-- Creación: 12-09-2024 a las 03:54:12
-- Última actualización: 12-09-2024 a las 05:27:26
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `fecha_registro`) VALUES
(1, 'Sergio ticona mmani', 'ticona465@gmail.com', '$2y$10$5HZQ7XST15Ge6GjSv71IEu1u.4ta3Jm1w.63l4tNtagrI0IrdcCp6', '2024-09-12 03:58:29'),
(2, '', 'ticonaa465@gmail.com', '654321', '2024-09-12 03:59:56'),
(3, '', 'jaja@gmail.com', '654321', '2024-09-12 04:02:24'),
(4, '', 'aja@gmail.com', '654321', '2024-09-12 04:06:06'),
(5, '', 'ol@gmail.com', '12345', '2024-09-12 04:13:31'),
(6, '', 'ejemplo@gmail.com', '12345', '2024-09-12 05:17:42'),
(7, '', 'pp@gmail.com', '$2y$10$ROHI6UngvC.svoNCZwJm7.CfPlMLc.woaFe99LhysIRCotPjuXPaG', '2024-09-12 05:20:52'),
(8, '', 'prueba@gmail.com', '$2y$10$hlj.jM4EVatwbXlIFz5bUeRuXnsgEUIllMRIhGZmI75aAHLJ1qmdm', '2024-09-12 05:27:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `mensajes_contacto`
--
ALTER TABLE `mensajes_contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfumes`
--
ALTER TABLE `perfumes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `mensajes_contacto`
--
ALTER TABLE `mensajes_contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `perfumes`
--
ALTER TABLE `perfumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `perfumes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
