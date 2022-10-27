-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-10-2022 a las 12:27:03
-- Versión del servidor: 10.5.16-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `capsula`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_prenda` int(11) NOT NULL,
  `prenda` varchar(255) NOT NULL,
  `talle` varchar(255) NOT NULL,
  `nombre_apellido` varchar(255) NOT NULL,
  `precio` int(11) NOT NULL,
  `entrega` int(11) NOT NULL,
  `resto` int(11) NOT NULL,
  `fecha_pedido` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_entrega` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prendas`
--

CREATE TABLE `prendas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(55) COLLATE utf16_estonian_ci NOT NULL,
  `telas` text COLLATE utf16_estonian_ci NOT NULL,
  `metros_por_tela` varchar(255) COLLATE utf16_estonian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_estonian_ci;

--
-- Volcado de datos para la tabla `prendas`
--

INSERT INTO `prendas` (`id`, `nombre`, `telas`, `metros_por_tela`) VALUES
(3, 'Top Beige', 'lycra', '0.25'),
(4, 'Top Chocolate', 'lycra,microtul', '0.35,0.35'),
(6, 'Pupera Beige', 'jersey stone', '0.70'),
(7, 'Pupera Clásica', 'jersey chocolate', '0.35'),
(8, 'Pupera Capucha', 'jersey chocolate', '0.50'),
(9, 'Remerón Clásico', 'jersey stone', '0.70'),
(10, 'Remerón Cinta', 'jersey stone', '0.70'),
(11, 'Remerón Cierre Beige', 'jersey stone', '0.70'),
(12, 'Remerón Cierre Chocolate', 'jersey chocolate', '0.70'),
(13, 'Buzo Pupera', 'rustico stone,rustico chocolate,ribb stone', '0.36,0.60,0.15'),
(14, 'Buzo Broche', 'rustico stone,rustico chocolate,ribb stone', '0.30,0.70,0.30'),
(15, 'Short Cinta', 'rustico stone', '0.50'),
(16, 'Short Bolsillos', 'rustico chocolate', '0.50'),
(17, 'Calza Biker', 'lycra,microtul', '0.50,0.38'),
(18, 'Calza Larga', 'lycra,microtul', '0.98,0.50'),
(19, 'Pantalón Biege', 'rustico stone,ribb stone', '0.99,0.15'),
(20, 'Pantalón Broches', 'rustico chocolate,rustico stone,ribb chocolate', '0.50,0.50,0.15'),
(21, 'Palazzo', 'Jersey stone', '0.99'),
(22, 'Catsuit', 'lycra,microtul', '0.70,0.35'),
(23, 'Malla Beige', 'lycra,microtul', '0.75,0.25'),
(24, 'Malla Chocolate', 'lycra,microtul', '0.75,0.30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telas`
--

CREATE TABLE `telas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(55) COLLATE utf16_estonian_ci NOT NULL,
  `precio_por_kg` int(11) NOT NULL,
  `metros_por_kg` float NOT NULL,
  `precio_por_metro` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_estonian_ci;

--
-- Volcado de datos para la tabla `telas`
--

INSERT INTO `telas` (`id`, `nombre`, `precio_por_kg`, `metros_por_kg`, `precio_por_metro`) VALUES
(1, 'Rustico chocolate', 3477, 1.7, 2045),
(2, 'Rustico Stone', 2946, 1.7, 1733),
(3, 'Jersey Chocolate', 4271, 3.2, 1335),
(6, 'Lycra', 5500, 1.7, 3235),
(5, 'Microtul', 10400, 6, 1733.33),
(4, 'Jersey Stone', 3540, 3.2, 1106.25),
(7, 'Ribb Stone', 4077, 1.8, 2265),
(8, 'Ribb Chocolate', 4770, 2.5, 1908);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(55) COLLATE utf16_estonian_ci NOT NULL,
  `password` varchar(999) COLLATE utf16_estonian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_estonian_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `password`) VALUES
(1, 'cavila', '123741852'),
(2, 'kuality', 'kapsula');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vinilos`
--

CREATE TABLE `vinilos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(55) COLLATE utf16_estonian_ci NOT NULL,
  `nombre_para_mostrar` varchar(255) COLLATE utf16_estonian_ci NOT NULL,
  `dimension` int(11) NOT NULL COMMENT 'medida en cm2',
  `precio` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_estonian_ci;

--
-- Volcado de datos para la tabla `vinilos`
--

INSERT INTO `vinilos` (`id`, `nombre`, `nombre_para_mostrar`, `dimension`, `precio`) VALUES
(1, 'termocomun', 'Textil comun', 5000, 2100),
(2, 'autoadhesivo', 'Oracal 651', 6000, 1500),
(3, 'especial', 'Oro - Plata - Holo', 5000, 3800),
(4, 'fluo', 'Fluo - Metalizado', 5000, 2900),
(5, 'reflec', 'Reflex', 5000, 5300),
(6, 'holo', 'Holografico', 5000, 2900);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prendas`
--
ALTER TABLE `prendas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `telas`
--
ALTER TABLE `telas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vinilos`
--
ALTER TABLE `vinilos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `prendas`
--
ALTER TABLE `prendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `telas`
--
ALTER TABLE `telas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vinilos`
--
ALTER TABLE `vinilos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
