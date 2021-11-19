-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2021 a las 22:31:00
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
(1, 'Donda', 'https://upload.wikimedia.org/wikipedia/commons/6/60/Kanye_donda.jpg', 2021, 6.5, 4),
(2, 'Yeezus', 'https://m.media-amazon.com/images/I/818PQwC6UcL._AC_SX466_.jpg', 2013, 7.7, 4),
(3, 'My Beautiful Dark Twisted Fantasy', 'https://www.udiscovermusic.com/wp-content/uploads/2017/11/Kanye-West-My-Beautiful-Dark-Twisted-Fantasy-album-cover-web-optimisd-820.jpg', 2010, 8.4, 4),
(4, 'Random Access Memories', 'https://images-na.ssl-images-amazon.com/images/I/61Ia07wdZQL._SS400_.jpg', 2013, 8.4, 3),
(5, 'Is This It', 'https://img.discogs.com/XKij16aQWckPsygJDGSL71gP6zU=/fit-in/600x600/filters:strip_icc():format(webp):mode_rgb():quality(90)/discogs-images/R-667892-1249548979.jpeg.jpg', 2001, 9, 7),
(6, 'The New Abnormal', 'https://www.mondosonoro.com/wp-content/uploads/2020/04/strokes-new-abnormal.jpg', 2020, 9, 7),
(8, 'A Night At The Opera', 'https://dvfnvgxhycwzf.cloudfront.net/media/SharedImage/imageFull/.fEzn8N2T/SharedImage-31099.jpg?t=5faf0bb0ddadcab897ce', 1975, 9, 6),
(9, 'News Of The World', 'https://i.pinimg.com/736x/29/a8/26/29a82673f53caf6e8a9cf3bda19aab8a.jpg', 1977, 8, 6),
(10, 'Jazz', 'https://dvfnvgxhycwzf.cloudfront.net/media/SharedImage/imageFull/.f_kC7N2T/SharedImage-12568.jpg?t=6f459d346650d59d558a', 1978, 9, 6),
(11, 'Whatever People Say I Am, Thats What Im Not', 'https://www.rockombia.com/images/upload/rockombia-201901231548303485.jpg', 2006, 8.2, 1),
(24, '24k Magic', 'https://blogmistermusic.files.wordpress.com/2018/01/bruno-mars-24k-magic-tracklist-album-cover.jpg', 2016, 6.5, 2),
(33, 'The College Dropout', 'https://upload.wikimedia.org/wikipedia/en/a/a3/Kanyewest_collegedropout.jpg', 2003, 8, 4),
(34, 'Graduation', 'https://images-na.ssl-images-amazon.com/images/I/61PIeKEMGLS._SL1200_.jpg', 2007, 7, 4),
(35, 'The Life Of Pablo', 'https://upload.wikimedia.org/wikipedia/en/4/4d/The_life_of_pablo_alternate.jpg', 2016, 10, 4),
(36, '808s and heartbreaks', 'https://upload.wikimedia.org/wikipedia/en/f/f1/808s_%26_Heartbreak.png', 2008, 9, 4),
(37, 'AM', 'https://imagenes.elpais.com/resizer/fUfW9lXRyYYPxR4aD54krruLacI=/1960x0/arc-anglerfish-eu-central-1-prod-prisa.s3.amazonaws.com/public/QFNZK4SNY7LCBER64A4OR6D7DM.jpg', 2013, 5, 1),
(38, 'To Pimp A Butterfly', 'https://images-na.ssl-images-amazon.com/images/I/81VcA8-kuZL._SX425_.jpg', 2015, 10, 5),
(39, 'Ye', 'https://pyxis.nymag.com/v1/imgs/699/1e2/965287137d49b3f29e6ff9c4d0e5a3f07b-01-kanye-west-ye.rsquare.w1200.jpg', 2018, 8, 4),
(44, 'Damn', 'https://http2.mlstatic.com/D_NQ_NP_713980-MLA46700193484_072021-O.jpg', 2017, 7, 5);

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
(12, 'The Beatles', 'Rock', 'https://images.chicmagazine.com.mx/G9HuQlkRHI4ZXaAjYJKoa-8qPLM=/958x596/uploads/media/2021/01/14/the-beatles-y-sus-hijos.jpg');

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
(1, 1, 3, 'buenardo', 100);

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
(4, 'usuario', 'juan', 'juan@juan.com', '$2y$10$C4SbQAtFjoQ9aa5C3R7qhuuHbwaqZz6qQ5B2mhxs3.6hUhKJLh.A2'),
(6, 'usuario', 'algo', 'algo@algo.com', '$2y$10$JHGczeXRQmGpK6Fm3vkoteerOdXWPXPqZbjL7x17DIuSn65Dv.dhG'),
(7, 'usuario', 'forro', 'forro@asd.com', '$2y$10$/Fbouzm0HlESOEtTSZn21e2ky0E4Pr1TE3MgJrzkkPC5GkI8VUDAi');

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
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `artist`
--
ALTER TABLE `artist`
  MODIFY `id_artist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
