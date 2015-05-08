/*
Navicat MySQL Data Transfer

Source Server         : ci
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : ceiscomc_ceisc

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-05-06 17:11:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hs_estudiantes
-- ----------------------------
DROP TABLE IF EXISTS `hs_estudiantes`;
CREATE TABLE `hs_estudiantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` bigint(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `snombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `papellido` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `sapellido` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_ingreso` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `empresa` int(11) NOT NULL,
  `convenio` int(11) NOT NULL,
  `nom_regional` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_regional` int(11) NOT NULL,
  `nom_departamento` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_departamento` int(11) NOT NULL,
  `nom_municipio` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cod_municipio` int(11) NOT NULL,
  `emp_gremio` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `linea_formacion` int(11) NOT NULL,
  `sector_economico` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `sub_sector_economico` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `caracterizacion` int(11) NOT NULL,
  `f_nacimiento` date NOT NULL DEFAULT '0000-00-00',
  `sexo` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `num_lib_militar` int(50) NOT NULL,
  `edo_civil` int(11) NOT NULL,
  `hijos` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `num_hijos` int(11) NOT NULL,
  `departamento` int(11) NOT NULL,
  `municipio` int(11) NOT NULL,
  `residencia` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `barrio` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `talla_camisa` int(11) NOT NULL,
  `foto` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `check_cedula` int(11) NOT NULL,
  `check_lib_militar` int(11) NOT NULL,
  `check_certificado` int(11) NOT NULL,
  `check_foto` int(11) NOT NULL,
  `seccion` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `curso` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '0',
  `fecha_egreso` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `no_egresado` int(11) NOT NULL DEFAULT '0',
  `nro` varchar(20) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'No asignado',
  `nro_anual` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `nro_factura` int(11) NOT NULL,
  `nro_recibo` int(11) NOT NULL,
  `observacion_1` text COLLATE utf8_spanish2_ci NOT NULL,
  `observacion_2` text COLLATE utf8_spanish2_ci,
  `observacion_3` text COLLATE utf8_spanish2_ci,
  `observacion_4` text COLLATE utf8_spanish2_ci,
  `expedicion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `curso_interes` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `empresa` (`empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=17461 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
