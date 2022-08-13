-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-08-2022 a las 04:57:52
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `reporte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ralumno`
--

CREATE TABLE IF NOT EXISTS `ralumno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fechaEmision` datetime NOT NULL,
  `emisor` varchar(200) NOT NULL,
  `asunto` varchar(200) NOT NULL,
  `areaAsignada` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `ralumno`
--

INSERT INTO `ralumno` (`id`, `fechaEmision`, `emisor`, `asunto`, `areaAsignada`, `estado`) VALUES
(1, '2022-07-27 00:00:00', 'juan luis gerra', 'reserva de matricula', 'decanato de facultad', 'pendiente');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
