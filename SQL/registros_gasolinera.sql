-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-06-2023 a las 05:58:39
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gasolinera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_gasolinera`
--

CREATE TABLE `registros_gasolinera` (
  `fecha_entrada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id` int(11) NOT NULL,
  `nombre_despachador` varchar(255) NOT NULL,
  `tipo_combustible` tinyint(1) DEFAULT NULL,
  `precio_litro` decimal(10,2) DEFAULT NULL,
  `cantidad_litros` decimal(10,2) DEFAULT NULL,
  `monto_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registros_gasolinera`
--

INSERT INTO `registros_gasolinera` (`fecha_entrada`, `id`, `nombre_despachador`, `tipo_combustible`, `precio_litro`, `cantidad_litros`, `monto_total`) VALUES
('2023-06-29 03:57:46', 20, 'oscar', 0, '2.00', '2.00', '4.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registros_gasolinera`
--
ALTER TABLE `registros_gasolinera`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registros_gasolinera`
--
ALTER TABLE `registros_gasolinera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
