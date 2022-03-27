-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2020 a las 22:51:00
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_almacenes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ProductoId` int(255) NOT NULL,
  `Nombre` varchar(255) DEFAULT 'Producto',
  `Codigo` int(255) DEFAULT 4,
  `Presentacion` varchar(100) DEFAULT '1.5L',
  `Foto` varchar(255) DEFAULT NULL,
  `MarcaId` int(255) DEFAULT 2,
  `FamiliaId` int(255) DEFAULT 3,
  `Rating` int(255) DEFAULT 5,
  `Estado` int(255) DEFAULT 0,
  `AppMovil` int(255) DEFAULT 0,
  `CreadorPor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ProductoId`, `Nombre`, `Codigo`, `Presentacion`, `Foto`, `MarcaId`, `FamiliaId`, `Rating`, `Estado`, `AppMovil`, `CreadorPor`) VALUES
(1, 'Producto', 4, '1.5L', 'https://i.ibb.co/f180R8q/1.jpg', 2, 3, 5, 0, 0, NULL),
(2, 'Producto', 4, '1.5L', 'https://i.ibb.co/YPxwn5T/2.jpg', 2, 3, 5, 0, 0, NULL),
(3, 'Producto', 4, '1.5L', 'https://i.ibb.co/bWNKc08/3.jpg', 2, 3, 5, 0, 0, NULL),
(4, 'Producto', 4, '1.5L', 'https://i.ibb.co/bvLSpTH/4.jpg', 2, 3, 5, 0, 0, NULL),
(5, 'Producto', 4, '1.5L', 'https://i.ibb.co/80rqt35/5.jpg', 2, 3, 5, 0, 0, NULL),
(6, 'Producto', 4, '1.5L', 'https://i.ibb.co/DQg0kB6/6.jpg', 2, 3, 5, 0, 0, NULL),
(7, 'Producto', 4, '1.5L', 'https://i.ibb.co/KzTTXr1/7.jpg', 2, 3, 5, 0, 0, NULL),
(8, 'Producto', 4, '1.5L', 'https://i.ibb.co/gvLP2Bd/8.jpg', 2, 3, 5, 0, 0, NULL),
(9, 'Producto', 4, '1.5L', 'https://i.ibb.co/5cGtZ0g/9.jpg', 2, 3, 5, 0, 0, NULL),
(10, 'Producto', 4, '1.5L', 'https://i.ibb.co/0GK5XXV/10.jpg', 2, 3, 5, 0, 0, NULL),
(11, 'Producto', 4, '1.5L', 'https://i.ibb.co/WkqrN45/11.jpg', 2, 3, 5, 0, 0, NULL),
(12, 'Producto', 4, '1.5L', 'https://i.ibb.co/4jhcZ3v/12.jpg', 2, 3, 5, 0, 0, NULL),
(13, 'Producto', 4, '1.5L', 'https://i.ibb.co/0QBZ363/13.jpg', 2, 3, 5, 0, 0, NULL),
(14, 'Producto', 4, '1.5L', 'https://i.ibb.co/dQjXdyr/14.jpg', 2, 3, 5, 0, 0, NULL),
(15, 'Producto de Calificación', 4, '1.5L', NULL, 2, 3, 5, 0, 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ProductoId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ProductoId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
