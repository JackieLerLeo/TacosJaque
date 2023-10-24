-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-10-2023 a las 21:45:42
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tacosjaque`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `id_producto`, `id_usuario`, `cantidad`) VALUES
(7, 40, 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `primer_apellido` varchar(100) DEFAULT NULL,
  `segundo_apellido` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `primer_apellido`, `segundo_apellido`) VALUES
(1, 'Cliente1', 'Apellido1', 'Apellido2'),
(2, 'Cliente2', 'Apellido1', 'Apellido2'),
(3, 'Cliente3', 'Apellido1', 'Apellido2'),
(4, 'Cliente4', 'Apellido1', 'Apellido2'),
(5, 'Cliente5', 'Apellido1', 'Apellido2'),
(6, 'Cliente6', 'Apellido1', 'Apellido2'),
(7, 'Cliente7', 'Apellido1', 'Apellido2'),
(8, 'Cliente8', 'Apellido1', 'Apellido2'),
(9, 'Cliente9', 'Apellido1', 'Apellido2'),
(10, 'Cliente10', 'Apellido1', 'Apellido2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `precio`, `foto`, `stock`, `status`) VALUES
(40, 'Tacos de pollo', 6, 'bAD.jpg', 76, 1),
(41, 'Tacos de carne', 7, 'download (4).jpg', 67, 1),
(42, 'Tacos de pescado', 7, 'pescado.jpg', 43, 1),
(43, 'Tacos vegetarianos', 6, 'siete-aplicaciones-vision-artificial.jpg', 80, 1),
(44, 'Tacos al pastor', 8, 'pastor.jpg', 60, 1),
(45, 'Tacos de chorizo', 7, 'chorizo.jpg', 70, 2),
(46, 'Tacos de cordero', 9, 'cordero.jpg', 40, 1),
(47, 'Tacos de res', 8, 'res.jpg', 90, 2),
(48, 'Tacos de camaron', 10, 'camaron.jpg', 30, 1),
(49, 'Tacos de hongos', 6, 'hongos.jpg', 60, 2),
(50, 'Tacos de cochinita', 8, 'cochinita.jpg', 45, 1),
(51, 'Tacos de barbacoa', 9, 'barbacoa.jpg', 35, 2),
(52, 'Tacos de lengua', 7, 'lengua.jpg', 55, 1),
(53, 'Tacos de nopales', 6, 'nopales.jpg', 70, 2),
(54, 'Tacos de chicharrón', 8, 'chicharron.jpg', 40, 1),
(55, 'Tacos de suadero', 8, 'suadero.jpg', 60, 2),
(56, 'Tacos de tripa', 7, 'tripa.jpg', 45, 1),
(57, 'Tacos de birria', 9, 'birria.jpg', 30, 2),
(58, 'Tacos de aguacate', 6, 'aguacate.jpg', 75, 1),
(59, 'Tacos de queso', 8, 'queso.jpg', 65, 2),
(60, 'Tacos de cangrejo', 10, 'cangrejo.jpg', 25, 1),
(61, 'Tacos de cerdo', 7, 'cerdo.jpg', 85, 2),
(62, 'Tacos de huevo', 7, 'huevo.jpg', 60, 1),
(63, 'Tacos de chorizo y papas', 8, 'chorizo_papas.jpg', 50, 2),
(64, 'Tacos de carnitas', 8, 'carnitas.jpg', 45, 1),
(65, 'Tacos de camarones al ajillo', 10, 'camarones_ajillo.jpg', 35, 2),
(66, 'Tacos de salmón', 9, 'salmón.jpg', 30, 1),
(67, 'Tacos de carne asada', 8, 'carne_asada.jpg', 70, 2),
(68, 'Tacos de pato', 9, 'pato.jpg', 25, 1),
(69, 'Tacos de lomo', 8, 'lomo.jpg', 50, 2),
(70, 'Tacos de pato a la naranja', 11, 'pato_naranja.jpg', 20, 1),
(71, 'Tacos de res a la plancha', 9, 'res_plancha.jpg', 60, 2),
(72, 'Tacos de atún', 9, 'atun.jpg', 25, 1),
(73, 'Tacos de costilla', 8, 'costilla.jpg', 40, 2),
(74, 'Tacos de venado', 11, 'venado.jpg', 20, 1),
(75, 'Tacos de chorizo y huevo', 8, 'chorizo_huevo.jpg', 55, 2),
(76, 'Tacos de pollo a la barbacoa', 9, 'pollo_barbacoa.jpg', 30, 1),
(77, 'Tacos de arrachera', 9, 'arrachera.jpg', 70, 2),
(78, 'Tacos de pavo', 10, 'pavo.jpg', 25, 1),
(79, 'sasa', 50, 'a.jpg', 1, 1),
(80, '2123123', 1212, 'capsule_616x353.jpg', 321312, 1),
(81, 'wqeqwe', 12, 'images (50).jpg', 321312, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Activo'),
(2, 'NO ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `contrasena` varchar(18) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `contrasena`, `usuario`) VALUES
(1, 'password1', 'usuario1@example.com'),
(2, 'password2', 'usuario2@example.com'),
(3, 'password3', 'usuario3@example.com'),
(4, 'password4', 'usuario4@example.com'),
(5, 'password5', 'usuario5@example.com'),
(6, 'password6', 'usuario6@example.com'),
(7, 'password7', 'usuario7@example.com'),
(8, 'password8', 'usuario8@example.com'),
(9, 'password9', 'usuario9@example.com'),
(10, 'password10', 'usuario10@example.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `id_producto`, `id_usuario`, `fecha`, `cantidad`, `subtotal`) VALUES
(1, 40, 1, '2023-10-22', 4, 24),
(2, 42, 1, '2023-10-22', 7, 49),
(3, 41, 1, '2023-10-22', 8, 56);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `carrito_productoFk` (`id_producto`),
  ADD KEY `carrito_usuario` (`id_usuario`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `p_s` (`status`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `ventaUsuarioFk` (`id_usuario`),
  ADD KEY `venta_productoFk` (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_productoFk` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `carrito_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_userFk` FOREIGN KEY (`id_cliente`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `p_s` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `ventaUsuarioFk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `venta_productoFk` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
