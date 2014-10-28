-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2014 a las 02:38:33
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

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
-- Estructura de tabla para la tabla `hs_asistencias`
--

CREATE TABLE IF NOT EXISTS `hs_asistencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso` int(11) NOT NULL,
  `materia` int(11) NOT NULL,
  `evaluacion` int(11) NOT NULL,
  `estudiante` int(11) NOT NULL,
  `presente` tinyint(1) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `curso` (`curso`,`materia`,`evaluacion`,`estudiante`),
  KEY `materia` (`materia`),
  KEY `evaluacion` (`evaluacion`),
  KEY `estudiante` (`estudiante`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `hs_asistencias`
--

INSERT INTO `hs_asistencias` (`id`, `curso`, `materia`, `evaluacion`, `estudiante`, `presente`, `create_at`) VALUES
(5, 5, 4, 7, 5, 1, '2014-10-28 06:44:40'),
(6, 5, 4, 7, 6, 0, '2014-10-28 06:44:40');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hs_asistencias`
--
ALTER TABLE `hs_asistencias`
  ADD CONSTRAINT `hs_asistencias_ibfk_4` FOREIGN KEY (`estudiante`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hs_asistencias_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `hs_cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hs_asistencias_ibfk_2` FOREIGN KEY (`materia`) REFERENCES `hs_materias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hs_asistencias_ibfk_3` FOREIGN KEY (`evaluacion`) REFERENCES `hs_evaluaciones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
