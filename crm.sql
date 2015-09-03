-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-09-2015 a las 18:29:09
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idCliente` int(10) NOT NULL COMMENT 'ID del cliente',
  `razonSocial` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Ingrese la razón social del cliente o nombre del cliente',
  `direccion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Ingrese la dirección del cliente',
  `barrio` varchar(100) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Ingrese el barrio de domicilio del cliente',
  `telefono` varchar(12) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Ingrese el numero telefonico del cliente',
  `nit` varchar(50) COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Ingrese el NIT o CEDULA del cliente',
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `razonSocial`, `direccion`, `barrio`, `telefono`, `nit`, `fechaCreacion`) VALUES
(1, 'Integra SAS', 'Carrera 24 No 45 36', 'Galerias', '2202790', '8345678-1', '2015-09-01 23:55:51'),
(2, 'Escuela Superior de Administración Pública', 'Calle 44 No 53 37 CAN', 'CAN', '2202790', '90034592-2', '2015-09-02 00:13:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `embalaje`
--

CREATE TABLE IF NOT EXISTS `embalaje` (
  `idEmbalaje` int(10) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `embalaje`
--

INSERT INTO `embalaje` (`idEmbalaje`, `nombre`) VALUES
(1, 'Unidad'),
(2, 'Caja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impuestos`
--

CREATE TABLE IF NOT EXISTS `impuestos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `valor` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `impuestos`
--

INSERT INTO `impuestos` (`id`, `nombre`, `valor`) VALUES
(1, 'IVA General', 16),
(2, 'IVA Especial', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idProductos` int(10) NOT NULL,
  `codigo` int(10) NOT NULL,
  `producto` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `embalaje` int(1) NOT NULL,
  `impuesto` int(2) NOT NULL,
  `precio` int(11) NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProductos`, `codigo`, `producto`, `embalaje`, `impuesto`, `precio`, `fechaCreacion`) VALUES
(1, 10001, 'ACT II Natural', 1, 16, 1690, '2015-09-02 00:28:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `idCliente_2` (`idCliente`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indices de la tabla `embalaje`
--
ALTER TABLE `embalaje`
  ADD PRIMARY KEY (`idEmbalaje`),
  ADD UNIQUE KEY `idEmbalaje_2` (`idEmbalaje`),
  ADD KEY `idEmbalaje` (`idEmbalaje`),
  ADD KEY `idEmbalaje_3` (`idEmbalaje`);

--
-- Indices de la tabla `impuestos`
--
ALTER TABLE `impuestos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD KEY `idProductos` (`idProductos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID del cliente',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `embalaje`
--
ALTER TABLE `embalaje`
  MODIFY `idEmbalaje` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `impuestos`
--
ALTER TABLE `impuestos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProductos` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
