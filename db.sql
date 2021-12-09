-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-12-2021 a las 10:13:07
-- Versión del servidor: 10.5.12-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id17980161_sza`
--
CREATE DATABASE IF NOT EXISTS `id17980161_sza` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id17980161_sza`;

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
('bsarasua@ehu.eus', 'Beñat Sarasua', 'bsarasua1', 0),
('inakiurdan@gmail.com', 'Iñaki Urdangarin', 'inakiurdan', 1),
('irakurlea@ehu.eus', 'Irakurlea Irakurlea', 'irakurlea', 0),
('manex@ehu.eus', 'Manex Atxa Landa', 'manexatxa', 1);

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
('admin@ehu.eus', 1),
('admin@ehu.eus', 2),
('admin@ehu.eus', 5),
('admin@ehu.eus', 13),
('admin@ehu.eus', 21),
('bsarasua@ehu.eus', 2),
('elorrira14@gmail.com', 13),
('elorrira14@gmail.com', 16),
('inakiurdan@gmail.com', 1),
('inakiurdan@gmail.com', 21),
('manex@ehu.eus', 12),
('manex@ehu.eus', 20);

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
