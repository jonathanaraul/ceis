-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2014 a las 19:27:40
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
-- Estructura de tabla para la tabla `hs_evaluaciones`
--

CREATE TABLE IF NOT EXISTS `hs_evaluaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `materia` int(11) NOT NULL,
  `ponderacion` float NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `materia` (`materia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `hs_evaluaciones`
--

INSERT INTO `hs_evaluaciones` (`id`, `nombre`, `materia`, `ponderacion`, `fecha`, `hora`) VALUES
(12, 'Carlos', 4, 10, '2014-10-22', '11:12:00');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hs_evaluaciones`
--
ALTER TABLE `hs_evaluaciones`
  ADD CONSTRAINT `hs_evaluaciones_ibfk_1` FOREIGN KEY (`materia`) REFERENCES `hs_materias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
