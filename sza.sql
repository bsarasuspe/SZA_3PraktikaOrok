-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2021 a las 19:47:21
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gustoko_liburuak`
--

CREATE TABLE `gustoko_liburuak` (
  `user_eposta` varchar(254) NOT NULL,
  `liburu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gustoko_liburuak`
--

INSERT INTO `gustoko_liburuak` (`user_eposta`, `liburu_id`) VALUES
('admin@ehu.eus', 2),
('bsarasua@ehu.eus', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `erabiltzaileak`
--
ALTER TABLE `erabiltzaileak`
  ADD PRIMARY KEY (`eposta`);

--
-- Indices de la tabla `gustoko_liburuak`
--
ALTER TABLE `gustoko_liburuak`
  ADD PRIMARY KEY (`user_eposta`,`liburu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
