-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 23, 2023 at 04:31 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noticias`
--
CREATE DATABASE IF NOT EXISTS `noticias` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `noticias`;

-- --------------------------------------------------------

--
-- Table structure for table `deportes`
--

DROP TABLE IF EXISTS `deportes`;
CREATE TABLE IF NOT EXISTS `deportes` (
  `code` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(25) DEFAULT NULL,
  `descripcion` text,
  `imagen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `deportes`
--

INSERT INTO `deportes` (`code`, `titulo`, `descripcion`, `imagen`) VALUES
(1, 'Proximo Mundia en EEUU', 'Se dice que el proximo mundial se llevara acabo en EEUU, Canada y Mexico...', '650e68c77d6c4.png'),
(2, 'Listos para la EuroCopa', 'A listas las apuestas con tus amigos la eurocopa esta de vuelta...', '650e691012ccb.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `internacionales`
--

DROP TABLE IF EXISTS `internacionales`;
CREATE TABLE IF NOT EXISTS `internacionales` (
  `code` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(25) DEFAULT NULL,
  `descripcion` text,
  `imagen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `internacionales`
--

INSERT INTO `internacionales` (`code`, `titulo`, `descripcion`, `imagen`) VALUES
(1, 'Terremoto sacude El Salva', 'Un terremoto de magnitud 9 en la escala de Richter sacude a tempranas horas la capital...', '650e674465bda.jpeg'),
(2, 'Incendio consume vivienda', 'Un incendio se desato hoy por la tarde asotando todo el mercado de San Miguel', '650e678f36a9c.jpeg'),
(3, 'Se hinunda el centro', 'Se inunda el centro de San Miguel, las lluvias torrenciales y la basura acomulada...', '650e67d3912e3.jpeg'),
(4, 'Huracan se hacerca a El S', 'Un hurancan se acerco a nuestras playas este dia, se predice que no tocara tierra...', '650e684f2cf5b.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `nacionales`
--

DROP TABLE IF EXISTS `nacionales`;
CREATE TABLE IF NOT EXISTS `nacionales` (
  `code` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(25) DEFAULT NULL,
  `descripcion` text,
  `imagen` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nacionales`
--

INSERT INTO `nacionales` (`code`, `titulo`, `descripcion`, `imagen`) VALUES
(1, 'Ruge el volcan', 'El volvan de San Miguel o chaparrastique arrojo productos piroplasticos hoy...', '650e6583041f1.jpeg'),
(2, 'Nuevos Vehiculos', 'La policia de El Salvador recive nuevos vehiculos, la compra se realizo por...', '650e65df56231.jpeg'),
(3, 'Surf City', 'Ven y disfruta de las mejores olas y de los mejores atardeceres del pais...', '650e661fe3b80.jpeg'),
(4, 'Bukele caya bocas', 'El presidente de la republica de El Salvador defiende el plan control territorial..', '650e66d0901bc.jpeg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
