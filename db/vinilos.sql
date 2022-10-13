-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 13-10-2022 a las 14:56:20
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.4.0

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
-- Estructura de tabla para la tabla `vinilos`
--

DROP TABLE IF EXISTS `vinilos`;
CREATE TABLE IF NOT EXISTS `vinilos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(55) COLLATE utf16_estonian_ci NOT NULL,
  `nombre_para_mostrar` varchar(255) COLLATE utf16_estonian_ci NOT NULL,
  `dimension` int(11) NOT NULL COMMENT 'medida en cm2',
  `precio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf16 COLLATE=utf16_estonian_ci;

--
-- Volcado de datos para la tabla `vinilos`
--

INSERT INTO `vinilos` (`id`, `nombre`, `nombre_para_mostrar`, `dimension`, `precio`) VALUES
(1, 'termocomun', 'Textil comun', 5000, 1500),
(2, 'autoadhesivo', 'Oracal 651', 6000, 2100),
(3, 'especial', 'Oro - Plata - Holo', 5000, 3800),
(4, 'fluo', 'Fluo - Metalizado', 5000, 2900),
(5, 'reflec', 'Reflex', 5000, 5300),
(6, 'holo', 'Holografico', 5000, 2900);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
