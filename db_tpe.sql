-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-10-2021 a las 03:06:34
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albums`
--

CREATE TABLE `albums` (
  `id_album` int(11) NOT NULL,
  `album_name` varchar(50) NOT NULL,
  `album_img` varchar(100) NOT NULL,
  `anio` int(11) NOT NULL,
  `score` float NOT NULL,
  `artist` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `albums`
--

INSERT INTO `albums` (`id_album`, `album_name`, `album_img`, `anio`, `score`, `artist`) VALUES
(1, 'Donda', 'donda.jpeg', 2021, 6.5, 'Kanye West'),
(2, 'Yeezus', 'yeezus.jpeg', 2013, 7.7, 'Kanye West'),
(3, 'My Beautiful Dark Twisted Fantasy', 'mbdtf.jpeg', 2010, 8.4, 'Kanye West'),
(4, 'Random Access Memories', 'ram.jpeg', 2013, 8.4, 'Daft Punk'),
(5, 'Is This It', 'isthisit.jpeg', 2001, 9, 'The Strokes'),
(6, 'The New Abnormal', 'tna.jpeg', 2020, 9, 'The Strokes'),
(7, 'Room On Fire', 'rof.jpeg', 2003, 8.7, 'The Strokes'),
(8, 'A Night At The Opera', 'anato.jpeg', 1975, 9, 'Queen'),
(9, 'News Of The World', 'notw.jpeg', 1977, 8, 'Queen'),
(10, 'Jazz', 'jazz.jpeg', 1978, 9, 'Queen'),
(11, 'Whatever People Say I Am, Thats What Im Not', 'wpsiatwin.jpeg', 2006, 8.2, 'Arctic Monkeys');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `artist` (`artist`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albums`
--
ALTER TABLE `albums`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`artist`) REFERENCES `artists` (`artist`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
