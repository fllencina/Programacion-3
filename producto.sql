-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2021 a las 03:03:04
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clase5`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `codBarras` varchar(6) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` float NOT NULL,
  `fecha_de_creacion` date NOT NULL,
  `fecha_de_modificacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `codBarras`, `nombre`, `tipo`, `stock`, `precio`, `fecha_de_creacion`, `fecha_de_modificacion`) VALUES
(1, '779003', 'Westmacott', 'liquido', 33, 15.87, '2021-02-09', '2020-09-26'),
(2, '779003', 'Spirit', 'solido', 45, 66.6, '2020-09-18', '2020-04-14'),
(3, '779003', 'Newgrosh', 'polvo', 0, 68.19, '2020-11-29', '2020-02-11'),
(4, '779003', 'McNickle', 'polvo', 0, 53.51, '2020-11-28', '2020-04-17'),
(5, '779003', 'Hudd', 'solido', 68, 66.6, '2020-12-19', '2020-06-19'),
(6, '779003', 'Schrader', 'polvo', 0, 96.54, '2020-08-02', '2020-04-18'),
(7, '779003', 'Bachellier', 'solido', 59, 66.6, '2021-01-30', '2020-06-07'),
(8, '779003', 'Fleming', 'solido', 38, 66.6, '2020-10-26', '2020-10-03'),
(9, '779003', 'Hurry', 'solido', 44, 66.6, '2020-07-04', '2020-05-30'),
(11, '123456', 'chocolate', 'solido', 0, 66.6, '2021-04-18', '2021-04-18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
