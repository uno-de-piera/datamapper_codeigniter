datamapper_codeigniter
======================

Tutorial with a complete example usage orm datamapper in codeigniter

## Tables for tutorial

```mysql
CREATE DATABASE IF NOT EXISTS `orm_ci`;

-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2013 a las 19:20:56
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7
 
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
 
 
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
 
--
-- Base de datos: `orm_ci`
--
 
-- --------------------------------------------------------
 
--
-- Estructura de tabla para la tabla `cursos`
--
 
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(19,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;
 
--
-- Volcado de datos para la tabla `cursos`
--
 
INSERT INTO `cursos` (`id`, `curso`, `precio`) VALUES
(1, 'PHP', 150.0000);
 
-- --------------------------------------------------------
 
--
-- Estructura de tabla para la tabla `cursos_users`
--
 
CREATE TABLE IF NOT EXISTS `cursos_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;
 
-- --------------------------------------------------------
 
--
-- Estructura de tabla para la tabla `dnis`
--
 
CREATE TABLE IF NOT EXISTS `dnis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;
 
-- --------------------------------------------------------
 
--
-- Estructura de tabla para la tabla `estados`
--
 
CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;
 
--
-- Volcado de datos para la tabla `estados`
--
 
INSERT INTO `estados` (`id`, `codigo`, `nombre`) VALUES
(1, 'ES', 'Spain');
 
-- --------------------------------------------------------
 
--
-- Estructura de tabla para la tabla `users`
--
 
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;
 
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
```
