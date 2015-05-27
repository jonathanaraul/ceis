-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-05-2015 a las 20:56:55
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
-- Estructura de tabla para la tabla `hs_facturacion_empresas`
--

CREATE TABLE IF NOT EXISTS `hs_facturacion_empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empresa` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `monto` double(12,2) NOT NULL,
  `metodo_pago` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `fecha` date NOT NULL,
  `ciudad` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `numero_factura` int(11) NOT NULL,
  `numero_recibo_caja` int(11) NOT NULL,
  `numero_cheque` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `empresa` (`empresa`),
  KEY `curso` (`curso`),
  KEY `empresa_2` (`empresa`),
  KEY `curso_2` (`curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `hs_facturacion_empresas`
--

INSERT INTO `hs_facturacion_empresas` (`id`, `empresa`, `curso`, `descripcion`, `monto`, `metodo_pago`, `estado`, `fecha`, `ciudad`, `cantidad`, `numero_factura`, `numero_recibo_caja`, `numero_cheque`) VALUES
(5, 3, 12, 'descripcion de la factura de la empresa 1', 12000.00, 'Deposito', 1, '2015-05-07', 'caliz', 8, 1, 1, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hs_facturacion_empresas`
--
ALTER TABLE `hs_facturacion_empresas`
  ADD CONSTRAINT `hs_facturacion_empresas_ibfk_1` FOREIGN KEY (`empresa`) REFERENCES `hs_empresas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hs_facturacion_empresas_ibfk_2` FOREIGN KEY (`curso`) REFERENCES `hs_cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
