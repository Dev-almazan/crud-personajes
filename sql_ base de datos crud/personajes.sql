-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 192.168.0.109
-- Tiempo de generación: 03-06-2024 a las 04:47:34
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `personajes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_personaje` int(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `momento` datetime NOT NULL DEFAULT current_timestamp(),
  `id_marvel` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_personaje`, `name`, `url`, `momento`, `id_marvel`) VALUES
(1009144, 'A.I.M.', 'http://i.annihil.us/u/prod/marvel/i/mg/6/20/52602f21f29ec.jpg', '2024-06-02 20:47:06', 0),
(1009146, 'Abomination (Emil Blonsky)', 'http://i.annihil.us/u/prod/marvel/i/mg/9/50/4ce18691cbf04.jpg', '2024-06-02 20:47:06', 0),
(1009148, 'Absorbing Man', 'http://i.annihil.us/u/prod/marvel/i/mg/1/b0/5269678709fb7.jpg', '2024-06-02 20:47:06', 0),
(1009149, 'Abyss', 'http://i.annihil.us/u/prod/marvel/i/mg/9/30/535feab462a64.jpg', '2024-06-02 20:47:06', 0),
(1009150, 'Agent Zero', 'http://i.annihil.us/u/prod/marvel/i/mg/f/60/4c0042121d790.jpg', '2024-06-02 20:47:06', 0),
(1010354, 'Adam Warlock', 'http://i.annihil.us/u/prod/marvel/i/mg/a/f0/5202887448860.jpg', '2024-06-02 20:47:06', 0),
(1010699, 'Aaron Stack', 'http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available.jpg', '2024-06-02 20:47:06', 0),
(1010846, 'Aegis (Trey Rollins)', 'http://i.annihil.us/u/prod/marvel/i/mg/5/e0/4c0035c9c425d.gif', '2024-06-02 20:47:06', 0),
(1010903, 'Abyss (Age of Apocalypse)', 'http://i.annihil.us/u/prod/marvel/i/mg/3/80/4c00358ec7548.jpg', '2024-06-02 20:47:06', 0),
(1011031, 'Agent X (Nijo)', 'http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available.jpg', '2024-06-02 20:47:06', 0),
(1011136, 'Air-Walker (Gabriel Lan)', 'http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available.jpg', '2024-06-02 20:47:06', 0),
(1011175, 'Aginar', 'http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available.jpg', '2024-06-02 20:47:06', 0),
(1011198, 'Agents of Atlas', 'http://i.annihil.us/u/prod/marvel/i/mg/9/a0/4ce18a834b7f5.jpg', '2024-06-02 20:47:06', 0),
(1011266, 'Adam Destine', 'http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available.jpg', '2024-06-02 20:47:06', 0),
(1011297, 'Agent Brand', 'http://i.annihil.us/u/prod/marvel/i/mg/4/60/52695285d6e7e.jpg', '2024-06-02 20:47:06', 0),
(1011334, '3-D Man', 'http://i.annihil.us/u/prod/marvel/i/mg/c/e0/535fecbbb9784.jpg', '2024-06-02 20:47:06', 0),
(1012717, 'Agatha Harkness', 'http://i.annihil.us/u/prod/marvel/i/mg/c/a0/4ce5a9bf70e19.jpg', '2024-06-02 20:47:06', 0),
(1016823, 'Abomination (Ultimate)', 'http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available.jpg', '2024-06-02 20:47:06', 0),
(1017100, 'A-Bomb (HAS)', 'http://i.annihil.us/u/prod/marvel/i/mg/3/20/5232158de5b16.jpg', '2024-06-02 20:47:06', 0),
(1017851, 'Aero (Aero)', 'http://i.annihil.us/u/prod/marvel/i/mg/b/40/image_not_available.jpg', '2024-06-02 20:47:06', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_personaje`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_personaje` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1017876;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
