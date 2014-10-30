-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2014 a las 08:13:53
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
-- Estructura de tabla para la tabla `hs_users`
--

CREATE TABLE IF NOT EXISTS `hs_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `snombre` longtext COLLATE utf8_unicode_ci NOT NULL,
  `papellido` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sapellido` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `rol` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `hs_users`
--

INSERT INTO `hs_users` (`user_id`, `name`, `snombre`, `papellido`, `sapellido`, `sex`, `address`, `phone`, `email`, `password`, `rol`) VALUES
(1, 'maria', '', '', '', '', '', '', 'maria@gmail.com', '', 1),
(2, 'GRECIA', '', 'pico', 'muñoz', 'female', '', '', 'gre@gmail.com', '2212', 2),
(3, 'carlos', '', 'oronoz', 'cabello', 'male', '', '', 'hola', 'ipuZOqpMwgOkZvvmc1H4/8YqoUITz6vJLsTLjsAPvdFSOKF2SrKOgf7hUzi1W4JfPXwgPd6qADRmIvvAX7WqXw==', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
