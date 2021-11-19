-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2021 a las 18:37:24
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sza`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `erabiltzaileak`
--

CREATE TABLE `erabiltzaileak` (
  `eposta` varchar(254) NOT NULL,
  `izena` text NOT NULL,
  `pasahitza` text NOT NULL,
  `mota` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `erabiltzaileak`
--

INSERT INTO `erabiltzaileak` (`eposta`, `izena`, `pasahitza`, `mota`) VALUES
('admin@ehu.eus', 'Admin Admin', 'admin000', 1),
('bsarasua@ehu.eus', 'Beñat Sarasua', 'bsarasua1', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `erabiltzaileak`
--
ALTER TABLE `erabiltzaileak`
  ADD PRIMARY KEY (`eposta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
