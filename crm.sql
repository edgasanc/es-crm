-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2015 a las 00:37:37
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

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
-- Estructura de tabla para la tabla `carropedidos`
--

CREATE TABLE IF NOT EXISTS `carropedidos` (
  `idCarroPedidos` int(11) NOT NULL,
  `pedidos_idPedidos` int(11) NOT NULL,
  `productos_idProducos` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `estadoCarroPedidos` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idClientes` int(11) NOT NULL,
  `razonSocial` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `barrio` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL,
  `nit` int(10) DEFAULT NULL,
  `nitVer` int(1) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idClientes`, `razonSocial`, `barrio`, `telefono`, `nit`, `nitVer`, `create_time`, `update_time`) VALUES
(1, 'Escuela Superior de Administración Pública', 'CAN', 2202790, 899999054, 7, '2015-09-03 22:10:44', '2015-09-03 22:12:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `embalaje`
--

CREATE TABLE IF NOT EXISTS `embalaje` (
  `idEmbalaje` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `embalaje`
--

INSERT INTO `embalaje` (`idEmbalaje`, `nombre`, `create_time`, `update_time`) VALUES
(1, 'Unidad', '2015-09-03 22:14:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE IF NOT EXISTS `entradas` (
  `idEntradas` int(11) NOT NULL,
  `productos_idProducos` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(12,2) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impuestos`
--

CREATE TABLE IF NOT EXISTS `impuestos` (
  `idImpuesto` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `valor` decimal(4,2) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `impuestos`
--

INSERT INTO `impuestos` (`idImpuesto`, `nombre`, `valor`, `create_time`, `update_time`) VALUES
(1, 'IVA General', '16.00', '2015-09-03 22:14:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
  `idAlmacen` int(11) NOT NULL,
  `productos_idProducos` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `idPedidos` int(11) NOT NULL,
  `clientes_idClientes` int(11) NOT NULL,
  `estadoPedido` int(1) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idProducos` int(11) NOT NULL,
  `codigo` int(11) DEFAULT NULL,
  `producto` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `precio` decimal(12,2) DEFAULT NULL,
  `embalaje_idEmbalaje` int(11) NOT NULL,
  `impuestos_idImpuesto` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducos`, `codigo`, `producto`, `precio`, `embalaje_idEmbalaje`, `impuestos_idImpuesto`, `create_time`, `update_time`) VALUES
(1, 10001, 'ACT II Natural', '1690.00', 1, 1, '2015-09-03 22:30:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE IF NOT EXISTS `salidas` (
  `idSalidas` int(11) NOT NULL,
  `pedidos_idPedidos` int(11) NOT NULL,
  `productos_idProducos` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(12,2) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carropedidos`
--
ALTER TABLE `carropedidos`
  ADD PRIMARY KEY (`idCarroPedidos`,`pedidos_idPedidos`,`productos_idProducos`),
  ADD KEY `fk_carroPedidos_productos1_idx` (`productos_idProducos`),
  ADD KEY `fk_carroPedidos_pedidos1_idx` (`pedidos_idPedidos`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idClientes`);

--
-- Indices de la tabla `embalaje`
--
ALTER TABLE `embalaje`
  ADD PRIMARY KEY (`idEmbalaje`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`idEntradas`,`productos_idProducos`),
  ADD KEY `fk_entradas_productos1_idx` (`productos_idProducos`);

--
-- Indices de la tabla `impuestos`
--
ALTER TABLE `impuestos`
  ADD PRIMARY KEY (`idImpuesto`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idAlmacen`,`productos_idProducos`),
  ADD KEY `fk_almacen_productos1_idx` (`productos_idProducos`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedidos`,`clientes_idClientes`),
  ADD KEY `fk_pedidos_clientes1_idx` (`clientes_idClientes`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducos`,`embalaje_idEmbalaje`,`impuestos_idImpuesto`),
  ADD KEY `fk_productos_embalaje_idx` (`embalaje_idEmbalaje`),
  ADD KEY `fk_productos_impuestos1_idx` (`impuestos_idImpuesto`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`idSalidas`,`pedidos_idPedidos`,`productos_idProducos`),
  ADD KEY `fk_salidas_productos1_idx` (`productos_idProducos`),
  ADD KEY `fk_salidas_pedidos1_idx` (`pedidos_idPedidos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carropedidos`
--
ALTER TABLE `carropedidos`
  MODIFY `idCarroPedidos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idClientes` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `embalaje`
--
ALTER TABLE `embalaje`
  MODIFY `idEmbalaje` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `idEntradas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `impuestos`
--
ALTER TABLE `impuestos`
  MODIFY `idImpuesto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idAlmacen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedidos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `idSalidas` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carropedidos`
--
ALTER TABLE `carropedidos`
  ADD CONSTRAINT `fk_carroPedidos_pedidos1` FOREIGN KEY (`pedidos_idPedidos`) REFERENCES `pedidos` (`idPedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_carroPedidos_productos1` FOREIGN KEY (`productos_idProducos`) REFERENCES `productos` (`idProducos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `fk_entradas_productos1` FOREIGN KEY (`productos_idProducos`) REFERENCES `productos` (`idProducos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_almacen_productos1` FOREIGN KEY (`productos_idProducos`) REFERENCES `productos` (`idProducos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_clientes1` FOREIGN KEY (`clientes_idClientes`) REFERENCES `clientes` (`idClientes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_embalaje` FOREIGN KEY (`embalaje_idEmbalaje`) REFERENCES `embalaje` (`idEmbalaje`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_impuestos1` FOREIGN KEY (`impuestos_idImpuesto`) REFERENCES `impuestos` (`idImpuesto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD CONSTRAINT `fk_salidas_pedidos1` FOREIGN KEY (`pedidos_idPedidos`) REFERENCES `pedidos` (`idPedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_salidas_productos1` FOREIGN KEY (`productos_idProducos`) REFERENCES `productos` (`idProducos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
