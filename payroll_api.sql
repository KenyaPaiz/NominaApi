-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2022 a las 14:56:19
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
  `password` varchar(8) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `name`, `lastName`, `address`, `phoneNumber`, `userName`, `password`, `idRol`) VALUES
(1, 'Enrique Alexander', 'Quintanilla', 'San Salvador', 78964512, 'admin', '12345', 1);

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
  `password` varchar(8) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `boss`
--

INSERT INTO `boss` (`id`, `name`, `lastName`, `address`, `phoneNumber`, `userName`, `password`, `idStatus`, `idRol`) VALUES
(1, 'Ernesto', 'Navarrete', 'San Salvador', 72564879, 'neto', '123', 1, 2),
(2, 'Ana Leticia', 'Ramirez', 'Chalatenango', 75508975, 'ana', '12345', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(100) NOT NULL,
  `idBoss` int(11) NOT NULL,
  `idStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `idBoss`, `idStatus`) VALUES
(1, 'Coca Cola', 'San Fernando, Chalatenango', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'Sonsonate'),
(2, 'Santa Ana'),
(3, 'Ahuachapan'),
(4, 'San Salvador'),
(5, 'La Libertad'),
(6, 'Chalatenango'),
(7, 'Cuscatlan'),
(8, 'La Paz'),
(9, 'Las Cabañas'),
(10, 'San Vicente'),
(11, 'San Miguel'),
(12, 'Usulutan'),
(13, 'La Union'),
(14, 'Morazan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `phoneNumber` int(8) NOT NULL,
  `position` varchar(100) NOT NULL,
  `salary` float NOT NULL,
  `userName` varchar(10) NOT NULL,
  `password` varchar(8) NOT NULL,
  `idDepartment` int(11) NOT NULL,
  `idBoss` int(11) NOT NULL,
  `idStatus` int(11) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `employee`
--

INSERT INTO `employee` (`id`, `name`, `lastName`, `phoneNumber`, `position`, `salary`, `userName`, `password`, `idDepartment`, `idBoss`, `idStatus`, `idRol`) VALUES
(1, 'Jose Luis', 'Quintanilla', 75894612, 'Sala de ventas', 400, 'luis', '123', 5, 2, 1, 3),
(2, 'Maria Fernandas', 'Zelaya', 78954612, 'Mantenimiento', 550, 'fernanda', '123', 6, 2, 1, 3),
(3, 'Pedro Antonio', 'Deras', 75506626, 'Jefe de ventas', 600, 'pedro', '12345', 6, 2, 1, 3),
(4, 'Keren Abigail', 'Ruiz', 75894612, 'Contabilidad', 600, 'keren', '123', 10, 1, 1, 3),
(5, 'Karla Alexandra', 'Landaverde', 75894512, 'Sala de ventas', 450, 'karla', 'karla', 7, 2, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `salaryTotal` double NOT NULL,
  `taxes` double NOT NULL,
  `idEmployee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `payroll`
--

INSERT INTO `payroll` (`id`, `salaryTotal`, `taxes`, `idEmployee`) VALUES
(1, 360, 40, 1),
(2, 475.75, 74.25, 2),
(3, 519, 81, 3),
(4, 519, 81, 4),
(5, 405, 45, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol`) VALUES
(1, 'admin'),
(2, 'boss'),
(3, 'employee');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'active'),
(2, 'inactive');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idRol` (`idRol`);

--
-- Indices de la tabla `boss`
--
ALTER TABLE `boss`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idStatus` (`idStatus`),
  ADD KEY `fk_idRol` (`idRol`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idBoss` (`idBoss`),
  ADD KEY `fk_idStatus` (`idStatus`) USING BTREE;

--
-- Indices de la tabla `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idBoss` (`idBoss`),
  ADD KEY `fk_idStatus` (`idStatus`),
  ADD KEY `fk_idRol` (`idRol`),
  ADD KEY `fk_idDepartment` (`idDepartment`);

--
-- Indices de la tabla `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idEmployee` (`idEmployee`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `boss`
--
ALTER TABLE `boss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
