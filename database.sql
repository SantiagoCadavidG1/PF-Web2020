-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2021 a las 14:02:55
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `fecha_pedido` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  `direccion_pedido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono_pedido` varchar(12) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_usuario`, `codigo`, `fecha_pedido`, `estado`, `direccion_pedido`, `telefono_pedido`) VALUES
(1, 1, 2, '2021-01-22 22:29:58', 2, 'a', '12345678'),
(2, 1, 1, '2021-01-22 22:41:11', 2, 'asd', '123'),
(3, 1, 3, '2021-01-22 22:52:54', 2, 'asd', '123'),
(4, 1, 1, '2021-01-22 22:57:36', 2, 'asd', '1234'),
(5, 1, 4, '2021-01-22 23:08:05', 2, 'prueba1', '098'),
(6, 3, 1, '2021-01-22 23:24:10', 3, 'prueba1', '123'),
(7, 3, 2, '2021-01-22 23:33:42', 3, '123', '123'),
(8, 3, 3, '2021-01-23 00:28:11', 3, 'prueba-3-tablas', '123'),
(9, 3, 4, '2021-01-23 01:18:54', 2, '123', '123'),
(10, 5, 1, '2021-01-23 01:41:23', 2, '123', '123'),
(11, 5, 3, '2021-01-23 01:44:36', 2, '123', '123'),
(12, 5, 2, '2021-01-23 01:47:31', 2, '123', '123'),
(13, 5, 1, '2021-01-23 01:47:54', 2, '123', '123'),
(14, 5, 4, '2021-01-23 01:49:12', 2, '123', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `precio` decimal(6,2) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo`, `nombre`, `descripcion`, `precio`, `estado`, `imagen`) VALUES
(1, 'Teclado Full', 'Teclado tamaño completo, con un chasis de aluminio, teclas de PBT tipo retro y switches clicky.', '295.00', 1, 'Full.jpg'),
(2, 'Teclado 40', 'Teclado 40%, en un chasis de aluminio, teclas de PBT y switches clicky.', '115.00', 1, '40.jpg'),
(3, 'Teclado 60', 'Teclado 60%, con un chasis de madera que incluye resposa muñecas, teclas de PBT y switches lineales.', '149.00', 1, '60.jpg'),
(4, 'Teclado 75', 'Teclado ten-key-less, en chasis de aluminio anodizado,teclas de PBT (SA CHALK) y switches tactiles.', '225.00', 1, '75.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(4) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `contraseña` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `contraseña`) VALUES
(1, 'Hola', '123'),
(2, 'Chao', '456'),
(3, 'prueba1', '123'),
(4, 'Julio Zapata', '123'),
(5, 'Santiago', '123'),
(6, 'pepe', '123'),
(7, 'pepe', '123'),
(8, 'pepita', '123'),
(9, 'pepita', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
