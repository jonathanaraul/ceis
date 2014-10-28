-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2014 a las 01:41:01
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
-- Estructura de tabla para la tabla `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `seccion` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fcha_inicio` longtext COLLATE utf8_unicode_ci NOT NULL,
  `fcha_fin` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hora_inicio` longtext COLLATE utf8_unicode_ci NOT NULL,
  `hora_fin` longtext COLLATE utf8_unicode_ci NOT NULL,
  `cupo` int(11) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `class`
--

INSERT INTO `class` (`class_id`, `name`, `seccion`, `fcha_inicio`, `fcha_fin`, `hora_inicio`, `hora_fin`, `cupo`) VALUES
(3, 'Fundamentacion en Escolta', 'A', '09/15/2014', '09/19/2014', '7', '9', 35),
(4, 'Reentrenamiento Vigilancia', 'D', '10/20/2014', '10/31/2014', '7', '6', 25),
(6, 'FUNDAMENTACION VIGILANCIA', 'C', '10/30/2014', '10/31/2014', '13', '15', 25);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
