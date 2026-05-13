-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-05-2026 a las 00:16:25
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
-- Base de datos: `proyecto_hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(2, 'Clasica'),
(3, 'Platino'),
(1, 'Sencilla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `nombre`) VALUES
(1, 'Cedula de ciudadania'),
(2, 'Tarjeta de identidad'),
(3, 'Cedula extranjera'),
(4, 'Pasaporte');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id` int(11) NOT NULL,
  `num_habitacion` varchar(10) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `estado` enum('disponible','ocupada','mantenimiento') DEFAULT 'disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id`, `num_habitacion`, `id_categoria`, `precio`, `estado`) VALUES
(1, '101', 1, 100000.00, 'disponible'),
(2, '102', 1, 100000.00, 'disponible'),
(3, '103', 1, 100000.00, 'disponible'),
(4, '201', 2, 200000.00, 'disponible'),
(5, '202', 2, 200000.00, 'disponible'),
(6, '203', 2, 200000.00, 'disponible'),
(7, '301', 3, 300000.00, 'disponible'),
(8, '302', 3, 300000.00, 'disponible'),
(9, '303', 3, 300000.00, 'disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE `metodos_pago` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodos_pago`
--

INSERT INTO `metodos_pago` (`id`, `nombre`) VALUES
(1, 'Efectivo'),
(2, 'Tarjeta'),
(3, 'Transferencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_habitacion` int(11) DEFAULT NULL,
  `id_metodo_pago` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `num_personas` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `estado` enum('activa','cancelada','finalizada') DEFAULT 'activa',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `id_usuario`, `id_habitacion`, `id_metodo_pago`, `fecha_inicio`, `fecha_final`, `num_personas`, `precio`, `estado`, `created_at`, `updated_at`) VALUES
(3, 3, 8, 1, '2026-05-01', '2026-05-02', 1, 300000.00, 'cancelada', '2026-04-30 17:59:48', '2026-04-30 19:09:12'),
(4, 3, 4, 1, '2026-05-01', '2026-05-02', 1, 200000.00, 'cancelada', '2026-04-30 20:04:47', '2026-04-30 20:06:02'),
(5, 3, 8, 2, '2026-05-03', '2026-05-05', 2, 300000.00, 'activa', '2026-04-30 20:05:30', '2026-04-30 20:05:30'),
(6, 3, 8, 2, '2026-05-06', '2026-05-06', 1, 300000.00, 'cancelada', '2026-04-30 22:13:43', '2026-04-30 22:14:15'),
(7, 8, 7, 1, '2026-05-12', '2026-05-13', 1, 300000.00, 'activa', '2026-05-11 18:28:54', '2026-05-11 18:28:54'),
(8, 8, 8, 1, '2026-05-12', '2026-05-14', 1, 600000.00, 'activa', '2026-05-12 21:49:18', '2026-05-12 21:49:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `document_type_id` int(11) DEFAULT NULL,
  `document_number` bigint(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `document_type_id`, `document_number`, `name`, `last_name`, `phone`, `email`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(2, 1, 123145321, 'Alexandra', 'Hernandez', '3134655122', 'andreahernandez.43928@gmail.com', '$2y$10$uIEkhgVLVKRieLR8b88SheQxFf77jtA9yGkiVAguu97ts24eZOtRW', 1, '2026-04-23 19:32:29', '2026-04-23 19:32:29'),
(3, 1, 123456, 'william', 'Duarte', '3182230090', 'adsosenawd@gmail.com', '$2y$10$eHyilyr.P1DK6D5f/JUcW.cMFIO.QlSvvNco3sFMWLvhtmo3So6f2', 1, '2026-04-23 19:41:57', '2026-04-23 19:41:57'),
(8, 1, 1105466825, 'Alexandra', 'Hernandez', '3134655122', 'ah0177351@gmail.com', '$2y$10$Ig5SIEOrRnllokfShLQnCOxfh8VKMRSIHeVfmseQPFeTUi83guVAC', 1, '2026-05-11 18:27:46', '2026-05-11 18:27:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `num_habitacion` (`num_habitacion`),
  ADD KEY `fk_habitacion_categoria` (`id_categoria`);

--
-- Indices de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reserva_usuario` (`id_usuario`),
  ADD KEY `fk_reserva_habitacion` (`id_habitacion`),
  ADD KEY `fk_reserva_pago` (`id_metodo_pago`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `document_number` (`document_number`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_documento` (`document_type_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD CONSTRAINT `fk_habitacion_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fk_reserva_habitacion` FOREIGN KEY (`id_habitacion`) REFERENCES `habitaciones` (`id`),
  ADD CONSTRAINT `fk_reserva_pago` FOREIGN KEY (`id_metodo_pago`) REFERENCES `metodos_pago` (`id`),
  ADD CONSTRAINT `fk_reserva_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_documento` FOREIGN KEY (`document_type_id`) REFERENCES `documentos` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`document_type_id`) REFERENCES `documentos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
