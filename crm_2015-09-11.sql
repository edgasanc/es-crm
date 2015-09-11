# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.44-0ubuntu0.14.04.1)
# Database: crm
# Generation Time: 2015-09-11 12:54:13 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table auth_assignment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_assignment`;

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`)
VALUES
	('Administrador','1',1441794413),
	('Vendedor','2',1441794533);

/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table auth_item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_item`;

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`)
VALUES
	('Administrador',1,'Tiene acceso a todos los módulos y todas las acciones',NULL,NULL,1441636855,1441636855),
	('Auxiliar',1,'Puede crear y editar productos, crear y editar almacén y ver los pedidos',NULL,NULL,1441636886,1441636886),
	('Vendedor',1,'Puede crear y editar clientes y crear y editar pedidos',NULL,NULL,1441636903,1441636903);

/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table auth_item_child
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_item_child`;

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table auth_rule
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_rule`;

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table carropedido
# ------------------------------------------------------------

DROP TABLE IF EXISTS `carropedido`;

CREATE TABLE `carropedido` (
  `idCarroPedido` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_idPedido` int(11) NOT NULL,
  `producto_idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idCarroPedido`,`pedido_idPedido`,`producto_idProducto`),
  KEY `fk_carroPedidos_productos1_idx` (`producto_idProducto`),
  KEY `fk_carroPedidos_pedidos1_idx` (`pedido_idPedido`),
  CONSTRAINT `fk_carroPedidos_pedidos1` FOREIGN KEY (`pedido_idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_carroPedidos_productos1` FOREIGN KEY (`producto_idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



# Dump of table cliente
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `razonSocial` varchar(255) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(255) COLLATE utf8_bin NOT NULL,
  `barrio` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `nit` varchar(12) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `owner` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `ruta` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `dia` smallint(11) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;

INSERT INTO `cliente` (`idCliente`, `razonSocial`, `direccion`, `barrio`, `telefono`, `nit`, `email`, `owner`, `nombre`, `ruta`, `dia`)
VALUES
	(1,X'48415244574152452053544F5245',X'466B2073742E202320313233',X'48696C6C73',X'',X'3838393931303130312D31',X'707275656261736465737740676D61696C2E636F6D',X'31',NULL,NULL,NULL);

/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table embalaje
# ------------------------------------------------------------

DROP TABLE IF EXISTS `embalaje`;

CREATE TABLE `embalaje` (
  `idEmbalaje` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idEmbalaje`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `embalaje` WRITE;
/*!40000 ALTER TABLE `embalaje` DISABLE KEYS */;

INSERT INTO `embalaje` (`idEmbalaje`, `nombre`)
VALUES
	(1,X'556E69646164'),
	(2,X'436172746F6E'),
	(3,X'5061636B20782036'),
	(4,X'5061636B2078203132'),
	(5,X'5061636B2078203336'),
	(6,X'43616A61'),
	(7,X'5061636B20782033'),
	(8,X'5052455041434B'),
	(9,X'5061636B20782034'),
	(10,X'54697261'),
	(11,X'446973706C6179');

/*!40000 ALTER TABLE `embalaje` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table entrada
# ------------------------------------------------------------

DROP TABLE IF EXISTS `entrada`;

CREATE TABLE `entrada` (
  `idEntrada` int(11) NOT NULL AUTO_INCREMENT,
  `producto_idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idEntrada`,`producto_idProducto`),
  KEY `fk_entradas_productos1_idx` (`producto_idProducto`),
  CONSTRAINT `fk_entradas_productos1` FOREIGN KEY (`producto_idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `entrada` WRITE;
/*!40000 ALTER TABLE `entrada` DISABLE KEYS */;

INSERT INTO `entrada` (`idEntrada`, `producto_idProducto`, `cantidad`, `fecha`)
VALUES
	(1,1,10,'2015-09-11'),
	(2,1,15,'2015-09-11'),
	(3,1,12,'2015-09-11');

/*!40000 ALTER TABLE `entrada` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table estado
# ------------------------------------------------------------

DROP TABLE IF EXISTS `estado`;

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;

INSERT INTO `estado` (`idEstado`, `nombre`)
VALUES
	(1,X'43726561646F'),
	(2,X'4465737061636861646F');

/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table impuesto
# ------------------------------------------------------------

DROP TABLE IF EXISTS `impuesto`;

CREATE TABLE `impuesto` (
  `idImpuesto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `valor` decimal(4,2) NOT NULL,
  PRIMARY KEY (`idImpuesto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `impuesto` WRITE;
/*!40000 ALTER TABLE `impuesto` DISABLE KEYS */;

INSERT INTO `impuesto` (`idImpuesto`, `nombre`, `valor`)
VALUES
	(1,X'49564120313625',16.00),
	(2,X'495641203525',5.00),
	(3,X'53494E20495641',0.00);

/*!40000 ALTER TABLE `impuesto` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table inventario
# ------------------------------------------------------------

DROP TABLE IF EXISTS `inventario`;

CREATE TABLE `inventario` (
  `idInventario` int(11) NOT NULL AUTO_INCREMENT,
  `producto_idProducto` int(11) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idInventario`,`producto_idProducto`),
  KEY `fk_inventario_producto1_idx` (`producto_idProducto`),
  CONSTRAINT `fk_inventario_producto1` FOREIGN KEY (`producto_idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;

INSERT INTO `inventario` (`idInventario`, `producto_idProducto`, `stock`)
VALUES
	(1,1,37);

/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_bin NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;

INSERT INTO `migration` (`version`, `apply_time`)
VALUES
	(X'6D3030303030305F3030303030305F62617365',1441613309),
	(X'6D3134303230395F3133323031375F696E6974',1441613313),
	(X'6D3134303430335F3137343032355F6372656174655F6163636F756E745F7461626C65',1441613313),
	(X'6D3134303530345F3131333135375F7570646174655F7461626C6573',1441613313),
	(X'6D3134303530345F3133303432395F6372656174655F746F6B656E5F7461626C65',1441613313),
	(X'6D3134303530365F3130323130365F726261635F696E6974',1441634887),
	(X'6D3134303833305F3137313933335F6669785F69705F6669656C64',1441613313),
	(X'6D3134303833305F3137323730335F6368616E67655F6163636F756E745F7461626C655F6E616D65',1441613313),
	(X'6D3134313232325F3131303032365F7570646174655F69705F6669656C64',1441613313);

/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pedido
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_idCliente` int(11) NOT NULL,
  `fechaEntrega` date NOT NULL,
  `fechaOrden` date NOT NULL,
  `estado_idEstado` int(11) NOT NULL,
  `owner` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idPedido`,`cliente_idCliente`,`estado_idEstado`),
  KEY `fk_pedidos_clientes1_idx` (`cliente_idCliente`),
  KEY `fk_estado_idEstado2_idx` (`estado_idEstado`),
  KEY `fk_pedido_estado1_idx` (`estado_idEstado`),
  CONSTRAINT `fk_pedido_estado1` FOREIGN KEY (`estado_idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_clientes1` FOREIGN KEY (`cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;

INSERT INTO `pedido` (`idPedido`, `cliente_idCliente`, `fechaEntrega`, `fechaOrden`, `estado_idEstado`, `owner`)
VALUES
	(1,1,'2015-09-30','2015-09-11',1,X'31'),
	(2,1,'2015-09-12','2015-09-11',1,X'31');

/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table producto
# ------------------------------------------------------------

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) COLLATE utf8_bin NOT NULL,
  `producto` varchar(200) COLLATE utf8_bin NOT NULL,
  `precio` decimal(12,2) NOT NULL,
  `embalaje_idEmbalaje` int(11) NOT NULL,
  `impuestos_idImpuesto` int(11) NOT NULL,
  PRIMARY KEY (`idProducto`,`embalaje_idEmbalaje`,`impuestos_idImpuesto`),
  KEY `fk_productos_embalaje_idx` (`embalaje_idEmbalaje`),
  KEY `fk_productos_impuestos1_idx` (`impuestos_idImpuesto`),
  CONSTRAINT `fk_productos_embalaje` FOREIGN KEY (`embalaje_idEmbalaje`) REFERENCES `embalaje` (`idEmbalaje`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_productos_impuestos1` FOREIGN KEY (`impuestos_idImpuesto`) REFERENCES `impuesto` (`idImpuesto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;

INSERT INTO `producto` (`idProducto`, `codigo`, `producto`, `precio`, `embalaje_idEmbalaje`, `impuestos_idImpuesto`)
VALUES
	(1,X'434F4E303031',X'414354204949204E61747572616C',1690.00,1,1),
	(2,X'434F4E303032',X'414354204949204D616E74657175696C6C61',1690.00,1,1),
	(3,X'434F4E303033',X'414354204949204D616E74657175696C6C61204578747261',1690.00,1,1),
	(4,X'434F4E303034',X'4143542049492043696E656D612044756C6365',1690.00,1,1),
	(5,X'434F4E303035',X'41435420494920517565736F2063686564646172',2240.00,1,1),
	(6,X'434F4E303036',X'41435420494920436172616D656C6F',3760.00,1,1),
	(7,X'434F4E303037',X'434F4D424F2041435420494920314E61742B324D616E742B3245787472206D616E742B312064756C63204772617469732062616C6465206C6F7320342066616E7461737469636F73',9900.00,1,1),
	(8,X'4D4F4E303031',X'4D6F6E7374657220477265656E',3970.00,1,3),
	(9,X'4D4F4E303032',X'4D6F6E73746572204C6F772063617262',3970.00,1,3),
	(10,X'4D4F4E303033',X'4D6F6E73746572205269706572',3970.00,1,3),
	(11,X'5641303031',X'5669646120416C6F65207820333330',2500.00,1,1),
	(12,X'5641303032',X'5669646120416C6F65207820353030',3300.00,1,1),
	(13,X'4147303031',X'436166C3A920416775696C6120726F6A6120782035302067',7760.00,1,2),
	(14,X'4147303032',X'436166C3A920416775696C6120726F6A612031323567',2023.00,1,2),
	(15,X'4147303033',X'436166C3A920416775696C6120726F6A6120782032353067',3900.00,1,2),
	(16,X'4147303034',X'436166C3A920416775696C6120726F6A6120782035303067',7400.00,1,2),
	(17,X'415345303031',X'4573636F6261207469706F205A756C6961',2000.00,1,1),
	(18,X'415345303032',X'4573636F6261205375706572696F72',2345.00,1,1),
	(19,X'415345303033',X'4573636F62612053757065722044616E6E61',4278.00,1,1),
	(20,X'415345303034',X'5472617065726F2065636F207820353030',3000.00,1,1),
	(21,X'415345303035',X'7472617065726F2065636F207820383030',3475.00,1,1),
	(22,X'415345303036',X'7472617065726F2065636F20782031303030',4175.00,1,1),
	(23,X'415345303037',X'7472617065726F20782035303020556E6976657273616C',3375.00,1,1),
	(24,X'415345303038',X'7472617065726F20782038303020756E6976657273616C',4175.00,1,1),
	(25,X'415345303039',X'7472617065726F2078203130303020556E6976657273616C',4875.00,1,1),
	(26,X'415345303130',X'4775616E74652063616C2033352074616C6C612037',3500.00,1,1),
	(27,X'415345303131',X'4775616E74652063616C2033352074616C6C61203720312F32',3500.00,1,1),
	(28,X'415345303132',X'4775616E74652063616C2033352074616C6C612038',3500.00,1,1),
	(29,X'415345303133',X'4775616E74652063616C2033352074616C6C6120382020312F32',3500.00,1,1),
	(30,X'415345303134',X'4775616E74652063616C2033352074616C6C612039',3500.00,1,1),
	(31,X'415345303135',X'4775616E74652074616C6C61202037202063616C203235',2850.00,1,1),
	(32,X'415345303136',X'4775616E74652074616C6C61203720312F322063616C203235',2850.00,1,1),
	(33,X'415345303137',X'4775616E74652074616C6C6120382063616C203235',2850.00,1,1),
	(34,X'415345303138',X'4775616E74652074616C6C61203820312F322063616C203235',2850.00,1,1),
	(35,X'415345303139',X'4775616E74652074616C6C6120392063616C203235',2850.00,1,1),
	(36,X'415345303230',X'4775616E746520446F6D65737469636F2054616C6C612037',2650.00,1,1),
	(37,X'415345303231',X'4775616E746520446F6D65737469636F2054616C6C61203720312F32',2650.00,1,1),
	(38,X'415345303232',X'4775616E746520446F6D65737469636F2054616C6C612038',2650.00,1,1),
	(39,X'415345303233',X'4775616E746520446F6D65737469636F2054616C6C61203820312F32',2650.00,1,1),
	(40,X'415345303234',X'4775616E746520446F6D65737469636F2054616C6C612039',2650.00,1,1),
	(41,X'415345303235',X'4573706F6E6A6120506F6C79204573706972616C20506167203132206C6C6576203134',4350.00,2,1),
	(42,X'415345303236',X'4573706F6E6A61204D756C746975736F7320426C616E6361',2050.00,3,1),
	(43,X'415345303237',X'4573706F6E6A61204D756C746975736F73204172636F69726973',3600.00,3,1),
	(44,X'415345303238',X'4573706F6E6A6120446F72616461207920506C617465616461',3600.00,3,1),
	(45,X'415345303239',X'4573706F6E6A6120446F626C652055736F20',6700.00,4,1),
	(46,X'415345303330',X'5061C3B16F20416272617369766F20',5100.00,5,1),
	(47,X'415345303331',X'4573706F6E6A696C6C6F6E20',2350.00,4,1),
	(48,X'4D4544303031',X'41636574616D6E6F66656E207820313030',5400.00,6,3),
	(49,X'4D4544303032',X'47616E636865726120546F6461792028506167203130202D206C6C65762031322953757274646F',80000.00,1,3),
	(50,X'4D4544303033',X'546F646179205375727469646F20782038',14750.00,1,3),
	(51,X'4D4544303034',X'546F64617920556C7472612073656E736974697665',7800.00,7,3),
	(52,X'4D4544303035',X'546F6461792045787472656D65',8300.00,7,3),
	(53,X'4D4544303036',X'50726573657276617469766F205461686974692028706167203132202D206C6C657620313829',6900.00,6,3),
	(54,X'4D4544303037',X'416476696C20466173742047656C2078203336',23300.00,6,3),
	(55,X'4D4544303038',X'416476696C204D61782078203230',19900.00,6,3),
	(56,X'4D4544303039',X'416476696C20556C7472612078203230',17950.00,6,3),
	(57,X'4D4544303130',X'416476696C2047726970612078203230202B203420556473204472697374616E20756C747261',20150.00,8,3),
	(58,X'4D4544303131',X'416476696C204D61782078203230202B20416476696C2047726970612078203230',40050.00,8,3),
	(59,X'4D4544303132',X'416476696C204D61782078203230202B20416476696C20756C7472612078203230',37850.00,8,3),
	(60,X'4D4544303133',X'416476696C20756C7472612078203230202B20416476696C2047726970612078203230',38100.00,8,3),
	(61,X'4D4544303134',X'4472697374616E20547269706C6520416363696F6E2078203234',11900.00,6,3),
	(62,X'4D4544303135',X'43686170737469636B205375727469646F20782034',23200.00,9,1),
	(63,X'4D4544303136',X'4173706972696E61204566657276657363656E74652078203530',22950.00,6,3),
	(64,X'4D4544303137',X'416C6B6173656C747A65722078203630',23900.00,6,3),
	(65,X'4D4544303138',X'446F6C6578204164756C746F2058203530',19350.00,6,3),
	(66,X'4D4544303139',X'446F6C6578204164756C746F205820313030',36800.00,6,3),
	(67,X'4D4544303230',X'446F6C6578204E69C3B16F2078203230',9200.00,6,3),
	(68,X'4D4544303231',X'446F6C657820466F7274652078203234',18950.00,6,3),
	(69,X'4D4544303232',X'446F6C6578204A61726162652078203930204D6C',7600.00,1,3),
	(70,X'4D4544303233',X'446F6C6578204163746976652047656C2078203230',16000.00,6,3),
	(71,X'4D4544303234',X'446F6C65782047726970612058203438',26100.00,6,3),
	(72,X'4D4544303235',X'446F6C657820466F7274652078203438',37800.00,6,3),
	(73,X'4D4544303236',X'53636F7474207820313830204D4C20436572657A61',6700.00,1,3),
	(74,X'4D4544303237',X'53636F7474207820313830204D4C204672757461732054726F706963616C6573',6700.00,1,3),
	(75,X'4D4544303238',X'53636F7474207820313830204D4C204E6172616E6A61',6700.00,1,3),
	(76,X'4D4544303239',X'53636F7474207820313830204D4C20547261646963696F6E616C',6700.00,1,3),
	(77,X'4D4544303330',X'53636F7474207820333630204D4C20436572657A61',12000.00,1,3),
	(78,X'4D4544303331',X'53636F7474207820333630204D4C204672757461732054726F706963616C6573',12000.00,1,3),
	(79,X'4D4544303332',X'53636F7474207820333630204D4C204E6172616E6A61',12000.00,1,3),
	(80,X'4D4544303333',X'53636F7474207820333630204D4C20547261646963696F6E616C',12000.00,1,3),
	(81,X'48454E303031',X'42616C616E636520436C696E6963616C2047656C2044616D6120783138',8300.00,6,1),
	(82,X'48454E303032',X'42616C616E636520436C696E6963616C2047656C20486F6D62726520783138',8300.00,6,1),
	(83,X'48454E303033',X'42616C616E636520436C696E6963616C204372656D612044616D612078203138',8300.00,6,1),
	(84,X'48454E303034',X'42616C616E636520436C696E6963616C204372656D6120486F6D6272652078203138',8300.00,6,1),
	(85,X'48454E303035',X'42616C616E6365204E6F726D616C2078203138',8300.00,6,1),
	(86,X'48454E303036',X'4B6F6E7A696C204372656D612052697A6F732078203138',6900.00,6,1),
	(87,X'48454E303037',X'4B6F6E7A696C205368616D706F6F2052656E6F766163696F6E2078203138',6900.00,6,1),
	(88,X'48454E303038',X'4B6F6E7A696C205368616D706F6F204C69736F2078203138',6900.00,6,1),
	(89,X'48454E303039',X'4B6F6E7A696C2052696E73652078203138',6900.00,6,1),
	(90,X'50494C303031',X'456E657267697A6572204141',2458.00,1,1),
	(91,X'50494C303032',X'456E657267697A6572204141412078203130',12100.00,10,1),
	(92,X'50494C303033',X'45766572656164792041412078203130',8200.00,10,1),
	(93,X'50494C303034',X'4576657265616479204141412078203130',8680.00,10,1),
	(94,X'50494C303035',X'4576657265616479203976',3250.00,1,1),
	(95,X'4D4151303031',X'53636869636B20556C74726162617262612078203132',9200.00,11,1),
	(96,X'4D4151303032',X'53636869636B20446F626C652046696C6F207820313020782033',10250.00,11,1),
	(97,X'4D4151303033',X'53636869636B2045786163746120782031322044616D61',13850.00,11,1),
	(98,X'4D4151303034',X'53636869636B204578616374612078203132',13850.00,11,1),
	(99,X'4D4151303035',X'53636869636B2078207472656D65204861776169616E612078203132',20050.00,11,1),
	(100,X'4D4151303036',X'53636869636B205069656C2053656E7369626C652078203132',20050.00,11,1),
	(101,X'4D4151303037',X'53636869636B2051756174726F20782038',20150.00,11,1),
	(102,X'434F46303031',X'426F6E61697265205370726179204272697361732054726F706963616C6573207820323330206D6C',4700.00,1,1),
	(103,X'434F46303032',X'426F6E6169726520537072617920416D626172207820323330206D6C',4700.00,1,1),
	(104,X'434F46303033',X'426F6E616972652047656C2043616E61737461207820333067204672657361',2650.00,1,1),
	(105,X'434F46303034',X'426F6E616972652047656C2043616E6173746120782033302067204C6176616E6461',2650.00,1,1),
	(106,X'434F46303035',X'426F6E616972652047656C20526570756573746F20582033302067204672657361',1550.00,1,1),
	(107,X'434F46303036',X'426F6E616972652047656C20526570756573746F20582033302047204C6176616E6461',1550.00,1,1),
	(108,X'434F46303037',X'426F6E6169726520456C65637472696320782032356D6C20726570756573746F20667275746F7320726F6A6F73',14300.00,7,1),
	(109,X'434F46303038',X'426F6E6169726520456C6563747269632078203235206D6C20436F6D62696E61646F',14300.00,7,1),
	(110,X'434F46303039',X'426F6E6169726520456C65637472696320467275746F7320526F6A6F73204774697320456D616E61646F72',9100.00,1,1),
	(111,X'434F46303130',X'426F6E6169726520456C65637472696320666C6F72616C204774697320456D616E61646F72',9100.00,1,1),
	(112,X'434F46303131',X'426F6E6169726520456C656374726963204D616E7A2043616E656C61204774697320456D616E61646F72',9100.00,1,1),
	(113,X'434F46303132',X'426F6E61697265205370726179207820343030206D6C20466C6F72616C',6850.00,1,1),
	(114,X'434F46303133',X'426F6E61697265205370726179207820343030206D6C2062616D6275',6850.00,1,1),
	(115,X'434F46303134',X'426F6E61697265205370726179207820343030206D6C2043616E656C61',6850.00,1,1),
	(116,X'434F46303135',X'426F6E61697265205370726179207820343030206D6C20467275746F7320526F6A6F73',6850.00,1,1),
	(117,X'434F46303136',X'426F6E61697265205370726179207820343030206D6C204C6176616E6461',6850.00,1,1),
	(118,X'434F46303137',X'426F6E6169726520566172697461732078203830206D6C20467275746F7320526F6A6F73',11300.00,1,1),
	(119,X'434F46303138',X'426F6E6169726520566172697461732078203830206D6C204772616E6164696C6C61',11300.00,1,1),
	(120,X'434F46303139',X'426F6E6169726520566172697461732078203830206D6C204D616E7A616E612043616E656C61',11300.00,1,1),
	(121,X'434F46303230',X'426F6E6169726520566172697461732078203830206D6C205661696E696C6C61',11300.00,1,1),
	(122,X'434F46303231',X'50696E6F6C696E61205820343630206D6C2042616279204672657368',2250.00,1,1),
	(123,X'434F46303232',X'50696E6F6C696E61207820343630206D6C2042616D6275',2250.00,1,1),
	(124,X'434F46303233',X'50696E6F6C696E61207820343630206D6C2043616E656C61',2250.00,1,1),
	(125,X'434F46303234',X'50696E6F6C696E61207820343630206D6C20466C6F72616C',2250.00,1,1),
	(126,X'434F46303235',X'50696E6F6C696E61207820343630206D6C20467275746F7320526F6A6F73',2250.00,1,1),
	(127,X'434F46303236',X'50696E6F6C696E61207820343630206D6C20436974726F6E656C61',2250.00,1,1),
	(128,X'434F46303237',X'50696E6F6C696E61207820343630206D6C204C76616E6461',2250.00,1,1),
	(129,X'434F46303238',X'50696E6F6C696E61207820393630206D6C2042616279204672657368',3800.00,1,1),
	(130,X'434F46303239',X'50696E6F6C696E61207820393630206D6C2042616D627520',3800.00,1,1),
	(131,X'434F46303330',X'50696E6F6C696E61207820393630206D6C2043616E656C6120',3800.00,1,1),
	(132,X'434F46303331',X'50696E6F6C696E61207820393630206D6C20466C6F72616C',3800.00,1,1),
	(133,X'434F46303332',X'50696E6F6C696E61207820393630206D6C20467275746F7320526F6A6F73',3800.00,1,1),
	(134,X'434F46303333',X'50696E6F6C696E61207820393630206D6C20436F74726F6E656C6120',3800.00,1,1),
	(135,X'434F46303334',X'50696E6F6C696E61207820393630206D6C204C6176616E6461',3800.00,1,1),
	(136,X'434F46303335',X'50696E6F6C696E6120446F79205061636B207820323030206D6C2043616E656C61',5550.00,3,1),
	(137,X'434F46303336',X'50696E6F6C696E6120446F79205061636B205820323030206D6C204C6176616E6461',5550.00,3,1),
	(138,X'434F46303337',X'50696E6F6C696E6120446F79205061636B207820323030206D6C20436974726F6E656C61',5550.00,3,1),
	(139,X'434F46303338',X'50696E6F6C696E6120446F79205061636B207820323030206D6C20506167203132206C6C6576203133204C61766E642D63616E6C',11100.00,8,1),
	(140,X'434F46303339',X'50696E6F6C696E61205375727469646F207820313530206D6C2078203132',9150.00,8,1),
	(141,X'434F46303430',X'5261796F6C204D6174612050756C67617320792047617272617061746173207820343030206D6C',9900.00,1,1),
	(142,X'434F46303431',X'5261796F6C2050617374696C6C61732058203132',5200.00,1,1),
	(143,X'434F46303432',X'5261796F6C20537072617920566F6C61646F726573207820323330206D6C',6400.00,1,1),
	(144,X'434F46303433',X'5261796F6C205370726179204D61746120546F646F207820323330206D6C',6500.00,1,1),
	(145,X'434F46303434',X'5261796F6C205370726179204D61746120746F646F207820343030206D6C',9800.00,1,1),
	(146,X'434F46303435',X'5261796F6C20537072617920526173747265726F73207820343030206D6C',10750.00,1,1),
	(147,X'434F46303436',X'5261796F6C20456D616E61646F72202B20342050617374696C6C6173',9600.00,1,1),
	(148,X'434F46303437',X'546572676F20476C6F7020446973636F2078203438206720436974727573',3300.00,1,1),
	(149,X'434F46303438',X'546572676F20476C6F7020446973636F20782034382067204C6176616E6461',3300.00,1,1),
	(150,X'434F46303439',X'546572676F20476C6F7020446973636F207820343820672050696E6F',3300.00,1,1);

/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table profile
# ------------------------------------------------------------

DROP TABLE IF EXISTS `profile`;

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `public_email` varchar(255) DEFAULT NULL,
  `gravatar_email` varchar(255) DEFAULT NULL,
  `gravatar_id` varchar(32) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bio` text,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`)
VALUES
	(1,NULL,NULL,'jcesarrc@gmail.com','d3e4156de72f225a2bd85467a1f00a6f',NULL,NULL,NULL),
	(2,'Juanelo Mercado','jcesarrc@gmail.com','pruebasdesw@gmail.com','83a45c96344a82cedfad4922577f8d73','Bogota','','');

/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table salida
# ------------------------------------------------------------

DROP TABLE IF EXISTS `salida`;

CREATE TABLE `salida` (
  `idSalida` int(11) NOT NULL AUTO_INCREMENT,
  `pedido_idPedido` int(11) NOT NULL,
  `producto_idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(12,2) NOT NULL,
  PRIMARY KEY (`idSalida`,`pedido_idPedido`,`producto_idProducto`),
  KEY `fk_salidas_productos1_idx` (`producto_idProducto`),
  KEY `fk_salidas_pedidos1_idx` (`pedido_idPedido`),
  CONSTRAINT `fk_salidas_pedidos1` FOREIGN KEY (`pedido_idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_salidas_productos1` FOREIGN KEY (`producto_idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



# Dump of table social_account
# ------------------------------------------------------------

DROP TABLE IF EXISTS `social_account`;

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  KEY `fk_user_account` (`user_id`),
  CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table token
# ------------------------------------------------------------

DROP TABLE IF EXISTS `token`;

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`),
  CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`)
VALUES
	(1,'admin','jcesarrc@gmail.com','$2y$10$ztk3.1gJHeB5MknWBX.08em/B3XjlJi3HS6k/xufVnLZCvsvIrJL.','fXYl0oLchrVggywmzKMbvEvxM1Lq7_XE',1441616211,NULL,NULL,'10.0.2.2',1441616196,1441616211,0),
	(2,'juanelo','pruebasdesw@gmail.com','$2y$10$e46ShVJNF4auv5liJR3XPOJ9Rs3Zsg/eEEJ0YkOXdf/d0J4DeAzX2','edVul3StC2k-ehmMx5rQU4p6TsX_cXms',1441794467,NULL,NULL,'10.0.2.2',1441794467,1441794467,0);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
