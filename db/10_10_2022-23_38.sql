-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 11-10-2022 a las 02:37:57
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
  `metros_por_tela` varchar(255) COLLATE utf16_estonian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf16 COLLATE=utf16_estonian_ci;

--
-- Volcado de datos para la tabla `prendas`
--

INSERT INTO `prendas` (`id`, `nombre`, `telas`, `metros_por_tela`) VALUES
(31, 'Pupera Capucha', 'jersey chocolate', '0.50'),
(30, 'Top Chocolate', 'lycra,microtul', '0.35,0.35'),
(32, 'Pupera Chocolate', 'jersey chocolate', '0.50'),
(33, 'Pupera Beige', 'jersey stone', '0.30'),
(34, 'Remeron Cierre Chocolate', 'jersey chocolate', '0.7'),
(35, 'Remeron Cierre Stone', 'jersey stone', '0.7'),
(36, 'Remeron Basico', 'jersey stone', '0.7'),
(37, 'Remerón Cinta', 'jersey stone', '0.7'),
(38, 'Buzo Pupera', 'rustico stone,rustico chocolate,ribb stone', '0.30,0.60,0.15');

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
  `precio_por_metro` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf16 COLLATE=utf16_estonian_ci;

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
