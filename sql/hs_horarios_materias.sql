-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-05-2015 a las 17:01:17
-- Versión del servidor: 5.5.43-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ceiscomc_ceisc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hs_horarios_materias`
--

CREATE TABLE IF NOT EXISTS `hs_horarios_materias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso` int(11) NOT NULL,
  `materia` int(11) NOT NULL,
  `hora_inicio` int(11) NOT NULL,
  `minutos_hora_inicio` varchar(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `hora_fin` int(11) NOT NULL,
  `minutos_hora_fin` varchar(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dia` int(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `curso` (`curso`,`materia`),
  KEY `materia` (`materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `hs_horarios_materias`
--

INSERT INTO `hs_horarios_materias` (`id`, `curso`, `materia`, `hora_inicio`, `minutos_hora_inicio`, `hora_fin`, `minutos_hora_fin`, `dia`) VALUES
(1, 10, 35, 2, '45', 3, '25', 3),
(2, 12, 37, 12, '00', 14, '00', 1),
(5, 12, 37, 11, '00', 24, '00', 5),
(6, 12, 37, 7, '30', 8, '00', 2),
(7, 10, 36, 20, '25', 21, '00', 5);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hs_horarios_materias`
--
ALTER TABLE `hs_horarios_materias`
  ADD CONSTRAINT `hs_horarios_materias_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `hs_cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hs_horarios_materias_ibfk_2` FOREIGN KEY (`materia`) REFERENCES `hs_materias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
