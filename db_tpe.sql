-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2021 a las 02:17:15
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

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
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `album_name` varchar(50) NOT NULL,
  `album_img` varchar(255) NOT NULL,
  `anio` int(11) NOT NULL,
  `score` float NOT NULL,
  `n_artist` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`id_album`, `album_name`, `album_img`, `anio`, `score`, `n_artist`) VALUES
(1, 'Donda', 'img/albums/donda.jpg', 2021, 6.5, 4),
(2, 'Yeezus', 'img/albums/yeezus.jpg', 2013, 7.7, 4),
(3, 'My Beautiful Dark Twisted Fantasy', 'img/albums/mbdtf.jpg', 2010, 8.4, 4),
(4, 'Random Access Memories', 'img/albums/ram.jpg', 2013, 8.4, 3),
(5, 'Is This It', 'img/albums/isthisit.jpg', 2001, 9, 7),
(6, 'The New Abnormal', 'img/albums/strokes-new-abnormal.jpg', 2020, 9, 7),
(8, 'A Night At The Opera', 'img/albums/queen1.jpg', 1975, 9, 6),
(9, 'News Of The World', 'img/albums/queen3.jpg', 1977, 8, 6),
(10, 'Jazz', 'img/albums/queen2.jpg', 1978, 9, 6),
(11, 'Whatever People Say I Am, Thats What Im Not', 'img/albums/arctic.jpg', 2006, 8.2, 1),
(24, '24k Magic', 'img/albums/bruno-mars-24k-magic-tracklist-album-cover.jpg', 2016, 6.5, 2),
(33, 'The College Dropout', 'img/albums/collegedropout.jpg', 2003, 8, 4),
(34, 'Graduation', 'img/albums/graduation.jpg', 2007, 7, 4),
(35, 'The Life Of Pablo', 'img/albums/pablo.jpg', 2016, 10, 4),
(36, '808s and heartbreaks', 'img/albums/808s_&_Heartbreak.png', 2008, 9, 4),
(37, 'AM', 'img/albums/am.jpg', 2013, 5, 1),
(38, 'To Pimp A Butterfly', 'img/albums/tpab.jpg', 2015, 10, 5),
(39, 'Ye', 'img/albums/ye.jpg', 2018, 8, 4),
(44, 'Damn', 'img/albums/kendrick.jpg', 2017, 7, 5),
(73, 'Kids See Ghosts', 'img/albums/ksg.jpg', 2018, 5, 4),
(87, 'Discovery', 'img/albums/619ee1e4a0e23.jpeg', 2001, 5, 3),
(88, 'Silk Sonic', 'img/albums/619ee283de310.jpeg', 2021, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artist`
--

CREATE TABLE `artist` (
  `id_artist` int(11) NOT NULL,
  `artist` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `artist_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `artist`
--

INSERT INTO `artist` (`id_artist`, `artist`, `genre`, `artist_img`) VALUES
(1, 'Arctic Monkeys', 'Indie Rock', 'https://www.binaural.es/wp-content/uploads/2021/08/arc1.jpg'),
(2, 'Bruno Mars', 'Pop', 'https://cdn-3.expansion.mx/dims4/default/e364cb7/2147483647/strip/true/crop/620x457+0+0/resize/1800x1327!/format/webp/quality/90/?url=https%3A%2F%2Fcherry-brightspot.s3.amazonaws.com%2Fphotos%2F2013%2F12%2F28%2F35808_20131228083341-1388284421-Q000.jpg'),
(3, 'Daft Punk', 'Electronica', 'https://www.binaural.es/wp-content/uploads/2021/02/daft1.jpg'),
(4, 'Kanye West', 'Hip Hop', 'https://media.diariolasamericas.com/p/28b0891472467b4eaa390ed44c19bacd/adjuntos/216/imagenes/002/364/0002364121/kanye-west-apjpg.jpg'),
(5, 'Kendrick Lammar', 'Hip Hop', 'https://darbaculture.com/wp-content/uploads/2017/04/kendrick-lamar-humble_wide-243569df6aa6cf72dbd6355e439c43d0060cdd9d.jpg'),
(6, 'Queen', 'Rock', 'https://www.biografiasyvidas.com/biografia/q/fotos/queen.jpg'),
(7, 'The Strokes', 'Indie Rock', 'https://indiehoy.com/wp-content/uploads/2021/01/the-strokes-2001.jpg'),
(12, 'The Beatles', 'Rock', 'https://images.chicmagazine.com.mx/G9HuQlkRHI4ZXaAjYJKoa-8qPLM=/958x596/uploads/media/2021/01/14/the-beatles-y-sus-hijos.jpg'),
(22, 'Lucho Melluso', 'Virgen', 'https://e00-elmundo.uecdn.es/assets/multimedia/imagenes/2021/07/16/16264514660383.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_album`, `comment`, `score`) VALUES
(1, 1, 3, 'buenardo', 100),
(13, 1, 3, 'nashe', 100),
(14, 1, 3, 'ASAAA', 100),
(55, 1, 11, 'Tremendo album. Aguante los monkeys', 5),
(57, 1, 3, 'El mejor álbum de la historia.', 5),
(59, 1, 1, 'Tremendo', 5),
(60, 4, 1, 'Soy juan', 1),
(64, 1, 11, 'hola', 1),
(66, 4, 3, 'soy juan y me gusta este album', 5),
(67, 1, 34, 'gud mornin', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `role` varchar(20) NOT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `role`, `user`, `email`, `password`) VALUES
(1, 'admin', 'lucho', 'luchomellu@live.com.ar', '$2a$12$9/o9VstWRtK2RXb4jpiftuppePqbvNkOuv1s4JSSXI6UCvO/ZWv8y'),
(4, 'usuario', 'juan', 'juan@juan.com', '$2y$10$C4SbQAtFjoQ9aa5C3R7qhuuHbwaqZz6qQ5B2mhxs3.6hUhKJLh.A2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`),
  ADD KEY `id_artist` (`n_artist`);

--
-- Indices de la tabla `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id_artist`),
  ADD KEY `id_artist` (`id_artist`);

--
-- Indices de la tabla `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`id_album`),
  ADD KEY `id_album` (`id_album`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT de la tabla `artist`
--
ALTER TABLE `artist`
  MODIFY `id_artist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`n_artist`) REFERENCES `artist` (`id_artist`);

--
-- Filtros para la tabla `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_album`) REFERENCES `album` (`id_album`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
