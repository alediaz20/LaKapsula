-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-10-2022 a las 23:38:25
-- Versión del servidor: 8.0.25
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `prendas`
--

DROP TABLE IF EXISTS `prendas`;
CREATE TABLE IF NOT EXISTS `prendas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(55) CHARACTER SET utf16 COLLATE utf16_estonian_ci NOT NULL,
  `telas` text CHARACTER SET utf16 COLLATE utf16_estonian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf16 COLLATE=utf16_estonian_ci;

--
-- Volcado de datos para la tabla `prendas`
--

INSERT INTO `prendas` (`id`, `nombre`, `telas`) VALUES
(1, 'Top Deportivo', 'lycra,microtul'),
(2, 'Top Deportivo 2', 'lycra,microtul,cuero,lana,coso1,coso2,coso3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telas`
--

DROP TABLE IF EXISTS `telas`;
CREATE TABLE IF NOT EXISTS `telas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(55) CHARACTER SET utf16 COLLATE utf16_estonian_ci NOT NULL,
  `precio_por_kg` int NOT NULL,
  `metros_por_kg` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf16 COLLATE=utf16_estonian_ci;

--
-- Volcado de datos para la tabla `telas`
--

INSERT INTO `telas` (`id`, `nombre`, `precio_por_kg`, `metros_por_kg`) VALUES
(1, 'Rustico chocolate', 3477, 1.7),
(2, 'Rustico Stone', 2946, 1.7),
(3, 'Jersey Chocolate', 4271, 3.2),
(4, 'Lycra', 5500, 1.7),
(5, 'sarasa', 23, 1),
(6, 'chirimbolo', 42, 1),
(7, 'caca', 2323, 2323230),
(8, 'tela pongo', 2355, 966),
(9, 'telansarto', 23, 512),
(10, '23', 52222, 4444),
(11, 'asdas', 42, 1),
(12, 'asdas', 42, 1),
(13, 'asdas', 42, 1),
(14, 'asdas', 42, 1),
(15, 'asdas', 42, 1),
(16, 'ffff', 2, 41),
(17, 'asd', 52, 1),
(18, 'termostanley', 422, 12),
(19, 'sarasa', 24, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(55) CHARACTER SET utf16 COLLATE utf16_estonian_ci NOT NULL,
  `password` varchar(999) CHARACTER SET utf16 COLLATE utf16_estonian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_estonian_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
