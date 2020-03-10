-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-03-2020 a las 16:21:16
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sehs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `add_campania_colportor`
--

DROP TABLE IF EXISTS `add_campania_colportor`;
CREATE TABLE IF NOT EXISTS `add_campania_colportor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ColportorCodigo` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `CampaniaCodigo` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `IdProvincia` int(11) NOT NULL,
  `IdCiudad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ColportorCodigo` (`ColportorCodigo`),
  KEY `CampaniaCodigo` (`CampaniaCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `add_campania_user_provincia`
--

DROP TABLE IF EXISTS `add_campania_user_provincia`;
CREATE TABLE IF NOT EXISTS `add_campania_user_provincia` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CampaniaCodigo` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `CuentaCodigo` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `IdProvincia` int(11) NOT NULL,
  `IdCiudad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CuentaCodigo` (`CuentaCodigo`),
  UNIQUE KEY `CampaniaCodigo` (`CampaniaCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT,
  `AdminDNI` int(30) NOT NULL,
  `AdminNombre` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `AdminApellido` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `AdminGenero` varchar(20) CHARACTER SET utf8 NOT NULL,
  `AdminEmail` varchar(70) CHARACTER SET utf8 NOT NULL,
  `AdminTelefono` int(15) NOT NULL,
  `AdminDireccion` varchar(200) CHARACTER SET latin1 NOT NULL,
  `AdminMisionId` int(11) NOT NULL,
  `CuentaCodigo` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `AdminMisionId` (`AdminMisionId`),
  KEY `CuentaCodigo` (`CuentaCodigo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `AdminDNI`, `AdminNombre`, `AdminApellido`, `AdminGenero`, `AdminEmail`, `AdminTelefono`, `AdminDireccion`, `AdminMisionId`, `CuentaCodigo`) VALUES
(1, 1450152325, 'Emilio Yankuam', 'Senguana Wisuma', 'Masculino', 'admin123@gmail.com', 997780813, 'Cade KM 14.5', 1, 'SEHS4510072');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campania`
--

DROP TABLE IF EXISTS `campania`;
CREATE TABLE IF NOT EXISTS `campania` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CampaniaCodigo` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `NombreCampania` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `FechaInicioCampania` date NOT NULL,
  `FechaFinCampania` date NOT NULL,
  `FechaAddCampania` date DEFAULT NULL,
  `EstadoCampania` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `CampaniaCodigo` (`CampaniaCodigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `campania`
--

INSERT INTO `campania` (`Id`, `CampaniaCodigo`, `NombreCampania`, `FechaInicioCampania`, `FechaFinCampania`, `FechaAddCampania`, `EstadoCampania`) VALUES
(1, 'CAMP-4368111', 'MOISES', '2020-03-04', '2020-03-06', '2020-03-05', '0'),
(2, 'CAMP-6833952', 'MOISES DE JESUS', '2020-03-03', '2020-03-22', '2020-03-09', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE IF NOT EXISTS `ciudad` (
  `id_ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCiudad` varchar(70) CHARACTER SET latin1 NOT NULL,
  `provinciaId` int(11) NOT NULL,
  PRIMARY KEY (`id_ciudad`),
  KEY `provinceId` (`provinciaId`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `NombreCiudad`, `provinciaId`) VALUES
(1, 'Cuenca', 1),
(2, 'Guaranda', 2),
(3, 'Guayaquil', 10),
(4, 'Azogues', 3),
(5, 'Tulcan', 4),
(6, ' Riobamba', 6),
(7, 'Latacunga', 25),
(8, 'Machala', 7),
(9, ' Esmeraldas', 8),
(10, 'Puerto Baquerizo Moreno', 9),
(11, 'Macas', 15),
(12, 'Ibarra', 11),
(13, 'Loja', 12),
(14, 'Babahoyo', 13),
(15, 'Portoviejo', 14),
(16, 'Tena', 16),
(17, ' Francisco de Orellana', 17),
(18, 'Puyo', 18),
(19, 'Quito', 19),
(20, 'Santa Elena', 20),
(21, 'Santo Domingo', 21),
(22, 'Nueva Loja', 22),
(23, 'Ambato', 23),
(24, 'Zamora', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colportor`
--

DROP TABLE IF EXISTS `colportor`;
CREATE TABLE IF NOT EXISTS `colportor` (
  `id` int(45) NOT NULL AUTO_INCREMENT,
  `ColportorCodigo` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `DNI` int(12) NOT NULL,
  `ColportorNombre` varchar(80) CHARACTER SET utf8 NOT NULL,
  `ColportorApellido` varchar(50) CHARACTER SET utf16 NOT NULL,
  `ColportorGenero` varchar(30) CHARACTER SET utf8 NOT NULL,
  `ColportorDireccion` varchar(80) CHARACTER SET utf8 NOT NULL,
  `ColportorCelular` varchar(12) CHARACTER SET utf8 NOT NULL DEFAULT 'No tiene',
  `ColportorEmail` varchar(70) CHARACTER SET utf8 NOT NULL DEFAULT 'No tiene',
  `ColportorPaisId` int(11) NOT NULL,
  `ColportorProvinciaId` int(11) DEFAULT NULL,
  `ColportorCiudadId` int(11) DEFAULT NULL,
  `ColportorMisionId` int(11) DEFAULT NULL,
  `CuentaCodigo` varchar(70) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ColportorFechaAdd` date NOT NULL,
  `ColportorEstado` varchar(1) CHARACTER SET utf8 NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ColportorCodigo` (`ColportorCodigo`),
  KEY `ColportorPaisId` (`ColportorPaisId`),
  KEY `ColportorProvinciaId` (`ColportorProvinciaId`),
  KEY `ColportorCiudadId` (`ColportorCiudadId`),
  KEY `ColportorMisionId` (`ColportorMisionId`),
  KEY `CuentaCodigo` (`CuentaCodigo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `colportor`
--

INSERT INTO `colportor` (`id`, `ColportorCodigo`, `DNI`, `ColportorNombre`, `ColportorApellido`, `ColportorGenero`, `ColportorDireccion`, `ColportorCelular`, `ColportorEmail`, `ColportorPaisId`, `ColportorProvinciaId`, `ColportorCiudadId`, `ColportorMisionId`, `CuentaCodigo`, `ColportorFechaAdd`, `ColportorEstado`) VALUES
(1, 'COLP-2059551', 1450152324, 'Maria', 'Vele', 'Femenino', 'Via Rosales', '0997780813', 'mariavele@gmail', 1, 6, 6, 1, 'SEHS3363006', '2020-03-05', '1'),
(6, 'COLP-0927436', 997780814, 'Jarol', 'Jara', 'Masculino', 'Rosales', '098080', 'dhvsdh@gmail', 2, NULL, NULL, NULL, NULL, '2020-03-05', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
CREATE TABLE IF NOT EXISTS `cuenta` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CuentaCodigo` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `CuentaPrivilegio` int(1) NOT NULL,
  `CuentaUsuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `CuentaClave` varchar(535) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `CuentaEstado` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `CuentaTipo` int(11) NOT NULL,
  `CuentaFoto` varchar(535) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CuentaCodigo` (`CuentaCodigo`) USING BTREE,
  KEY `CuentaTipo` (`CuentaTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id`, `CuentaCodigo`, `CuentaPrivilegio`, `CuentaUsuario`, `CuentaClave`, `CuentaEstado`, `CuentaTipo`, `CuentaFoto`) VALUES
(11, 'SEHS3363006', 2, 'user2', 'a0FUdDMwdXhmVVRMSHZ0Rmh0N25LQT09', 'Activo', 2, 'AdminFemaleAvatar.png'),
(13, 'SEHS4510072', 1, 'admin', 'R3VSK0JycncxZjE4UWg1ZVlmSmFSUT09', 'Activo', 1, 'AdminMaleAvatar.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

DROP TABLE IF EXISTS `detalle_factura`;
CREATE TABLE IF NOT EXISTS `detalle_factura` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` int(11) NOT NULL,
  `idLibro` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` double NOT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `numero_factura` (`numero_factura`,`idLibro`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `EmpresaCodigo` varchar(40) NOT NULL,
  `EmpresaNombre` varchar(100) NOT NULL,
  `EmpresaTelefono` varchar(15) NOT NULL,
  `EmpresaEmail` varchar(70) NOT NULL,
  `EmpresaDireccion` varchar(200) NOT NULL,
  `EmpresaDirector` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

DROP TABLE IF EXISTS `facturas`;
CREATE TABLE IF NOT EXISTS `facturas` (
  `id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `numero_factura` int(11) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `ColportorCodigo` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `Encargado` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `condiciones` varchar(30) CHARACTER SET utf8 NOT NULL,
  `total_venta` varchar(30) CHARACTER SET utf8 NOT NULL,
  `estado_factura` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `ColportorCodigo` (`ColportorCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

DROP TABLE IF EXISTS `libro`;
CREATE TABLE IF NOT EXISTS `libro` (
  `idLibro` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigoLibro` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nombreLibro` char(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `estadoLibro` tinyint(4) NOT NULL,
  `precioLibro` double NOT NULL,
  `cantidad` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fechAdd` date NOT NULL,
  PRIMARY KEY (`idLibro`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`idLibro`, `codigoLibro`, `nombreLibro`, `estadoLibro`, `precioLibro`, `cantidad`, `fechAdd`) VALUES
(4, 'LIB-SEHS694462', 'COMO VIVIR CON OPTIMISMO', 1, 45, '-61', '2020-03-08'),
(5, 'LIB-SEHS310412', 'OPTIMISMO', 1, 45, '-50', '2020-03-05'),
(6, 'LIB-SEHS734633', 'LIBRO DE LOS PROFETAS', 1, 75, '-38', '2020-03-05'),
(9, 'LIB-SEHS004036', 'EL PODER MEDICINAL DE LOS JUGOS', 1, 75, '-52', '2020-03-05'),
(10, 'LIB-SEHS207346', 'LA FAMILIA QUE SOÃ‘E', 1, 45, '-66', '2020-03-08'),
(11, 'LIB-SEHS673796', 'EL MARAVILLOSO MUNDO DE LA BIBLIA PARA NIÃ‘OS', 1, 75, '-26', '2020-03-09'),
(12, 'LIB-SEHS813997', 'AMOR SIN SECRETO', 1, 45, '-47', '2020-03-09'),
(13, 'LIB-SEHS181188', 'LIBRO DE MISIONERO', 1, 45, NULL, '2020-03-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mision`
--

DROP TABLE IF EXISTS `mision`;
CREATE TABLE IF NOT EXISTS `mision` (
  `id_mision` int(12) NOT NULL AUTO_INCREMENT,
  `NombreMision` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_mision`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `mision`
--

INSERT INTO `mision` (`id_mision`, `NombreMision`) VALUES
(1, 'Mision Euatoriana del Norte'),
(2, 'Mision Euatoriana del Sur');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

DROP TABLE IF EXISTS `pais`;
CREATE TABLE IF NOT EXISTS `pais` (
  `id_pais` int(12) NOT NULL AUTO_INCREMENT,
  `NombrePais` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `NombrePais`) VALUES
(1, 'Ecuador'),
(2, 'Argentina'),
(3, 'Bolivia'),
(4, 'Brasil'),
(5, 'Chile'),
(6, 'Colombia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `pedidoId` int(15) NOT NULL AUTO_INCREMENT,
  `CodigoPedido` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `pedidoFecha` date NOT NULL,
  `ColportorCodigo` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `EncargadoPedido` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `SubTotal` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Diezmo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `CantidadTotal` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Descuento` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Total` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `MontoPagado` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Saldo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `MetodoPago` int(12) NOT NULL,
  `PagoEstado` int(12) NOT NULL,
  `PedidoEstado` int(2) NOT NULL,
  PRIMARY KEY (`pedidoId`),
  UNIQUE KEY `CodigoPedido` (`CodigoPedido`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`pedidoId`, `CodigoPedido`, `pedidoFecha`, `ColportorCodigo`, `EncargadoPedido`, `SubTotal`, `Diezmo`, `CantidadTotal`, `Descuento`, `Total`, `MontoPagado`, `Saldo`, `MetodoPago`, `PagoEstado`, `PedidoEstado`) VALUES
(1, '12157721', '2020-03-10', 'COLP-2059551', 'Emilio Senguana', '1650.00', '165.00', '1485.00', '', '1485.00', '', '1485.00', 1, 2, 1),
(2, '13973911', '2020-03-10', 'COLP-0927436', 'Emilio Senguana', '975.00', '97.50', '877.50', '', '877.50', '', '877.50', 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_item`
--

DROP TABLE IF EXISTS `pedido_item`;
CREATE TABLE IF NOT EXISTS `pedido_item` (
  `pedido_item_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `CodigoPedido` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `codigoLibro` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `tarifa` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `pedido_item_estado` int(11) NOT NULL,
  PRIMARY KEY (`pedido_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido_item`
--

INSERT INTO `pedido_item` (`pedido_item_id`, `CodigoPedido`, `codigoLibro`, `cantidad`, `tarifa`, `total`, `pedido_item_estado`) VALUES
(1, '12157721', '4', 10, 45, 450, 1),
(2, '12157721', '5', 10, 45, 450, 1),
(3, '12157721', '9', 10, 75, 750, 1),
(4, '13973911', '12', 20, 45, 900, 1),
(5, '13973911', '6', 1, 75, 75, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

DROP TABLE IF EXISTS `provincia`;
CREATE TABLE IF NOT EXISTS `provincia` (
  `id_provincia` int(12) NOT NULL AUTO_INCREMENT,
  `NombreProvincia` varchar(80) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `PaisId` int(11) NOT NULL,
  PRIMARY KEY (`id_provincia`),
  KEY `countryId` (`PaisId`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `NombreProvincia`, `PaisId`) VALUES
(1, 'Azuay', 1),
(2, 'Bolivar', 1),
(3, 'Canar', 1),
(4, 'Carchi', 1),
(6, 'Chimborazo', 1),
(7, 'El Oro', 1),
(8, 'Esmeraldas', 1),
(9, 'Galapagos', 1),
(10, 'Guayas', 1),
(11, 'Imbabura', 1),
(12, 'Loja', 1),
(13, 'Los Rios', 1),
(14, 'Manabi', 1),
(15, 'Morona Santiago', 1),
(16, 'Napo', 1),
(17, 'Orellana', 1),
(18, 'Pastaza', 1),
(19, 'Pichincha', 1),
(20, 'Santa Elena', 1),
(21, 'Santo Domingo de los Tsachilas', 1),
(22, 'Sucumbios', 1),
(23, 'Tungurahua', 1),
(24, 'Zamora Chinchipe', 1),
(25, 'Cotopaxi', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `NombreRol` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `NombreRol`) VALUES
(1, 'Administrador'),
(2, 'Lider'),
(3, 'Colportor(a)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp`
--

DROP TABLE IF EXISTS `tmp`;
CREATE TABLE IF NOT EXISTS `tmp` (
  `id_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `idLibro` int(70) NOT NULL,
  `cantidad_tmp` int(11) NOT NULL,
  `precio_tmp` double(8,2) NOT NULL,
  `session_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_tmp`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tmp`
--

INSERT INTO `tmp` (`id_tmp`, `idLibro`, `cantidad_tmp`, `precio_tmp`, `session_id`) VALUES
(2, 6, 1, 75.00, 'pmtc4ifn0b90086cpi5q5ssfn7'),
(3, 4, 1, 45.00, 'pmtc4ifn0b90086cpi5q5ssfn7');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `add_campania_colportor`
--
ALTER TABLE `add_campania_colportor`
  ADD CONSTRAINT `add_campania_colportor_ibfk_1` FOREIGN KEY (`ColportorCodigo`) REFERENCES `colportor` (`ColportorCodigo`),
  ADD CONSTRAINT `add_campania_colportor_ibfk_2` FOREIGN KEY (`CampaniaCodigo`) REFERENCES `campania` (`CampaniaCodigo`);

--
-- Filtros para la tabla `add_campania_user_provincia`
--
ALTER TABLE `add_campania_user_provincia`
  ADD CONSTRAINT `add_campania_user_provincia_ibfk_1` FOREIGN KEY (`CampaniaCodigo`) REFERENCES `campania` (`CampaniaCodigo`),
  ADD CONSTRAINT `add_campania_user_provincia_ibfk_2` FOREIGN KEY (`CuentaCodigo`) REFERENCES `cuenta` (`CuentaCodigo`);

--
-- Filtros para la tabla `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`AdminMisionId`) REFERENCES `mision` (`id_mision`),
  ADD CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`CuentaCodigo`) REFERENCES `cuenta` (`CuentaCodigo`);

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudad_ibfk_1` FOREIGN KEY (`provinciaId`) REFERENCES `provincia` (`id_provincia`);

--
-- Filtros para la tabla `colportor`
--
ALTER TABLE `colportor`
  ADD CONSTRAINT `colportor_ibfk_1` FOREIGN KEY (`ColportorPaisId`) REFERENCES `pais` (`id_pais`),
  ADD CONSTRAINT `colportor_ibfk_2` FOREIGN KEY (`ColportorProvinciaId`) REFERENCES `provincia` (`id_provincia`),
  ADD CONSTRAINT `colportor_ibfk_3` FOREIGN KEY (`ColportorCiudadId`) REFERENCES `ciudad` (`id_ciudad`),
  ADD CONSTRAINT `colportor_ibfk_4` FOREIGN KEY (`ColportorMisionId`) REFERENCES `mision` (`id_mision`),
  ADD CONSTRAINT `colportor_ibfk_5` FOREIGN KEY (`CuentaCodigo`) REFERENCES `cuenta` (`CuentaCodigo`);

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`CuentaTipo`) REFERENCES `rol` (`id`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`ColportorCodigo`) REFERENCES `colportor` (`ColportorCodigo`);

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `provincia_ibfk_1` FOREIGN KEY (`PaisId`) REFERENCES `pais` (`id_pais`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
