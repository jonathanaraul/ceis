-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 27, 2014 at 12:59 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ceiscomc_ceisc`
--

-- --------------------------------------------------------

--
-- Table structure for table `hs_cursos`
--

CREATE TABLE IF NOT EXISTS `hs_cursos` (
`id` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `periodo` int(11) NOT NULL,
  `seccion` varchar(10) NOT NULL,
  `cupo` int(11) NOT NULL,
  `fecha_ini` longtext NOT NULL,
  `fecha_cul` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hs_cursos`
--

INSERT INTO `hs_cursos` (`id`, `nombre`, `periodo`, `seccion`, `cupo`, `fecha_ini`, `fecha_cul`) VALUES
(1, 'FUNDAMENTACION VIGILANCIA', 1, 'A', 50, '0000-00-00', '0000-00-00'),
(2, 'REENTRENAMIENTO VIGILANCIA', 1, 'A', 50, '0000-00-00', '0000-00-00'),
(3, 'ESPECIALIZACION VIGILANCIA SECTOR FINANCIERO', 2, 'A', 20, '0000-00-00', '0000-00-00'),
(5, 'ESPECIALIZACION VIGILANCIA HOSPITALARIA', 1, 'B', 30, '0000-00-00', '0000-00-00'),
(6, 'ESPECIALIZACION VIGILANCIA EDUCATIVA', 2, 'C', 30, '10/27/2014', '10/30/2014');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hs_cursos`
--
ALTER TABLE `hs_cursos`
 ADD PRIMARY KEY (`id`), ADD KEY `periodo` (`periodo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hs_cursos`
--
ALTER TABLE `hs_cursos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hs_cursos`
--
ALTER TABLE `hs_cursos`
ADD CONSTRAINT `hs_cursos_ibfk_1` FOREIGN KEY (`periodo`) REFERENCES `hs_periodo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
