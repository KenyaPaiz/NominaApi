-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2022 a las 19:39:43
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `payroll_api`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phoneNumber` int(8) NOT NULL,
  `userName` varchar(10) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `name`, `lastName`, `address`, `phoneNumber`, `userName`, `password`) VALUES
(1, 'prueba', 'prueba', 'diree', 75895, 'prueb', '123'),
(2, 'Ivan', 'Montenegro', 'San Salvador', 7895623, 'ivanadmin', '12345'),
(3, 'Rebeca', 'Ruano', 'Soyapango', 75236970, 'rebequita', '1234'),
(4, 'Miguel', 'Solar', 'Soyapango', 75236578, 'migue', '1234456'),
(5, 'prueba', '2ert', 'Soyapango', 752895, 'prueba', '1234456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boss`
--

CREATE TABLE `boss` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phoneNumber` int(8) NOT NULL,
  `userName` varchar(10) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `boss`
--

INSERT INTO `boss` (`id`, `name`, `lastName`, `address`, `phoneNumber`, `userName`, `password`) VALUES
(1, 'Luis', 'Panameño', 'Antiguo Cuscatlan', 78956324, 'luisito', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(100) NOT NULL,
  `idBoss` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `idBoss`) VALUES
(2, 'comunication2', 'San Salvador', 1),
(3, 'comunication3', 'San Salvador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `phoneNumber` int(8) NOT NULL,
  `address` varchar(100) NOT NULL,
  `salary` float NOT NULL,
  `taxes` float NOT NULL,
  `userName` varchar(10) NOT NULL,
  `password` varchar(8) NOT NULL,
  `idBoss` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `boss`
--
ALTER TABLE `boss`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idBoss` (`idBoss`);

--
-- Indices de la tabla `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idBoss` (`idBoss`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `boss`
--
ALTER TABLE `boss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
