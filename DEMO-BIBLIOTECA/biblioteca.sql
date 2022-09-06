-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2022 a las 02:03:50
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cahce`
--

CREATE TABLE `cahce` (
  `clave` int(10) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `editorial` varchar(50) DEFAULT NULL,
  `estand` varchar(50) DEFAULT NULL,
  `sinopsis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `clave` int(10) DEFAULT NULL,
  `libro` int(50) DEFAULT NULL,
  `nombre` int(50) DEFAULT NULL,
  `matricula` int(15) DEFAULT NULL,
  `grupo` int(50) DEFAULT NULL,
  `turno` int(50) DEFAULT NULL,
  `prestamo` date DEFAULT NULL,
  `devolucion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `clave` int(10) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `editorial` varchar(50) DEFAULT NULL,
  `estand` varchar(50) DEFAULT NULL,
  `sinopsis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `clave` int(10) DEFAULT NULL,
  `libro` int(50) DEFAULT NULL,
  `nombre` int(50) DEFAULT NULL,
  `matricula` int(15) DEFAULT NULL,
  `grupo` int(50) DEFAULT NULL,
  `turno` int(50) DEFAULT NULL,
  `prestamo` date DEFAULT NULL,
  `devolucion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
