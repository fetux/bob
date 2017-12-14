-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-04-2014 a las 16:44:10
-- Versión del servidor: 5.1.71-log
-- Versión de PHP: 5.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bw000303_bobmilanga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_deliv_prod`
--

CREATE TABLE IF NOT EXISTS `categorias_deliv_prod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `categorias_deliv_prod`
--

INSERT INTO `categorias_deliv_prod` (`id`, `nombre`) VALUES
(1, 'Guarniciones'),
(2, 'Sandwiches'),
(3, 'Bebidas'),
(4, 'Promos'),
(5, 'Agregados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_salon_prod`
--

CREATE TABLE IF NOT EXISTS `categorias_salon_prod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `categorias_salon_prod`
--

INSERT INTO `categorias_salon_prod` (`id`, `nombre`) VALUES
(1, 'Degustar'),
(2, 'Milanesas'),
(3, 'Guarniciones'),
(4, 'Ensaladas'),
(5, 'Carnes'),
(6, 'Sandwiches'),
(7, 'Postres'),
(8, 'Bebidas'),
(9, 'Cervezas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE IF NOT EXISTS `encuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `pedidos` int(11) NOT NULL,
  `temperatura` int(11) NOT NULL,
  `calidad` int(11) NOT NULL,
  `espera` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `milas` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`id`, `id_cliente`, `nombre`, `direccion`, `pedidos`, `temperatura`, `calidad`, `espera`, `precio`, `milas`) VALUES
(8, 999976, '', 'azcuenaga 597', 4, 1, 2, 1, 2, 2),
(7, 3333, '', 'misiones 765', 8, 1, 2, 1, 2, 3),
(6, 345, '', 'guayaquik 62728', 4, 2, 3, 2, 3, 4),
(9, 333, '', 'avellaneda 1345', 5, 1, 2, 2, 2, 2),
(10, 3434, '', 'luro 3022', 3, 2, 2, 2, 2, 3),
(11, 443, '', 'paunero 3131', 4, 1, 1, 2, 1, 2),
(12, 776, '', 'olavarria 2345', 2, 1, 2, 2, 2, 2),
(13, 1, '', 'jujuy 3681', 15, 1, 2, 1, 2, 3),
(14, 1, '', 'jujuy 3681', 2, 1, 1, 1, 2, 3),
(15, 922117, 'Antonella Guayarello', 'misiones 576', 1, 1, 1, 1, 1, 1),
(16, 9823489, 'federico daguerre', 'gral paz 3160', 2, 1, 1, 1, 1, 1),
(17, 98765, 'pedrita martinez', 'jh', 3, 1, 1, 1, 1, 1),
(18, 55676, 'Antonella Guayarello', 'Misiones 576', 5, 1, 1, 1, 1, 1),
(19, 767684, 'Federico daguerre', 'Gral paz 3160', 5, 1, 1, 1, 1, 1),
(20, 453452, 'Hola', 'asdfsdfds', 5, 1, 2, 1, 1, 1),
(21, 234, 'charlotte ', 'ksjdn', 1, 1, 2, 1, 1, 2),
(22, 2345, 'pepepe', 'mmmkifii788', 2, 1, 1, 1, 1, 1),
(23, 999, 'trinux', 'sdkfjn6t67', 8, 1, 1, 1, 1, 1),
(24, 5667, 'Federico Daguerre', 'paz 3160', 5, 1, 2, 1, 2, 2),
(25, 5300, 'Ignacio Mignini', 'Avellaneda 3997', 4, 2, 2, 2, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galerias`
--

CREATE TABLE IF NOT EXISTS `galerias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `galerias`
--

INSERT INTO `galerias` (`id`, `nombre`) VALUES
(1, 'slideshow'),
(2, 'fotos'),
(3, 'dibujos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_galeria` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `thumburl` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `id_galeria`, `url`, `thumburl`) VALUES
(112, 3, 'uploads/dibujos/51c09602c207c.jpg', 'uploads/dibujos/51c09602c207c-thumb.jpg'),
(107, 3, 'uploads/dibujos/51c0945f577c9.jpg', 'uploads/dibujos/51c0945f577c9-thumb.jpg'),
(108, 3, 'uploads/dibujos/51c094f48edb2.jpg', 'uploads/dibujos/51c094f48edb2-thumb.jpg'),
(109, 3, 'uploads/dibujos/51c0953107f41.jpg', 'uploads/dibujos/51c0953107f41-thumb.jpg'),
(111, 3, 'uploads/dibujos/51c095d3ccdf4.jpg', 'uploads/dibujos/51c095d3ccdf4-thumb.jpg'),
(104, 3, 'uploads/dibujos/51c092da3a0a1.jpg', 'uploads/dibujos/51c092da3a0a1-thumb.jpg'),
(103, 3, 'uploads/dibujos/51c0924fd3a80.jpg', 'uploads/dibujos/51c0924fd3a80-thumb.jpg'),
(110, 3, 'uploads/dibujos/51c095632810c.jpg', 'uploads/dibujos/51c095632810c-thumb.jpg'),
(101, 3, 'uploads/dibujos/51c091886e826.jpg', 'uploads/dibujos/51c091886e826-thumb.jpg'),
(100, 3, 'uploads/dibujos/51c09160587ed.jpg', 'uploads/dibujos/51c09160587ed-thumb.jpg'),
(99, 3, 'uploads/dibujos/51c0914c55410.jpg', 'uploads/dibujos/51c0914c55410-thumb.jpg'),
(96, 2, 'uploads/fotos/51c0907aee16a.jpg', 'uploads/fotos/51c0907aee16a-thumb.jpg'),
(95, 2, 'uploads/fotos/51c0906f8f54c.jpg', 'uploads/fotos/51c0906f8f54c-thumb.jpg'),
(94, 2, 'uploads/fotos/51c09062e3580.jpg', 'uploads/fotos/51c09062e3580-thumb.jpg'),
(93, 2, 'uploads/fotos/51c090573d577.jpg', 'uploads/fotos/51c090573d577-thumb.jpg'),
(92, 3, 'uploads/dibujos/51c08b142047f.jpg', 'uploads/dibujos/51c08b142047f-thumb.jpg'),
(91, 3, 'uploads/dibujos/51bfb990dd3ed.jpg', 'uploads/dibujos/51bfb990dd3ed-thumb.jpg'),
(90, 3, 'uploads/dibujos/51bfb88aac5e1.jpg', 'uploads/dibujos/51bfb88aac5e1-thumb.jpg'),
(89, 3, 'uploads/dibujos/51bfb7c223188.jpg', 'uploads/dibujos/51bfb7c223188-thumb.jpg'),
(88, 3, 'uploads/dibujos/51bfb74791f04.jpg', 'uploads/dibujos/51bfb74791f04-thumb.jpg'),
(87, 3, 'uploads/dibujos/51bfb6a66ee39.jpg', 'uploads/dibujos/51bfb6a66ee39-thumb.jpg'),
(86, 3, 'uploads/dibujos/51bfb4dea5903.jpg', 'uploads/dibujos/51bfb4dea5903-thumb.jpg'),
(85, 3, 'uploads/dibujos/51bfb4bc66274.jpg', 'uploads/dibujos/51bfb4bc66274-thumb.jpg'),
(84, 3, 'uploads/dibujos/51bfb1bc16b98.jpg', 'uploads/dibujos/51bfb1bc16b98-thumb.jpg'),
(83, 3, 'uploads/dibujos/51bfb1528354b.jpg', 'uploads/dibujos/51bfb1528354b-thumb.jpg'),
(82, 3, 'uploads/dibujos/51bfb13b1508d.jpg', 'uploads/dibujos/51bfb13b1508d-thumb.jpg'),
(81, 3, 'uploads/dibujos/51bfb1281f34e.jpg', 'uploads/dibujos/51bfb1281f34e-thumb.jpg'),
(80, 3, 'uploads/dibujos/51bfb0d0283e0.jpg', 'uploads/dibujos/51bfb0d0283e0-thumb.jpg'),
(79, 3, 'uploads/dibujos/51bfb0996c460.jpg', 'uploads/dibujos/51bfb0996c460-thumb.jpg'),
(98, 3, 'uploads/dibujos/51c090e2c470c.jpg', 'uploads/dibujos/51c090e2c470c-thumb.jpg'),
(75, 2, 'uploads/fotos/51be38c031337.jpg', 'uploads/fotos/51be38c031337-thumb.jpg'),
(97, 2, 'uploads/fotos/51c0909cb16ab.jpg', 'uploads/fotos/51c0909cb16ab-thumb.jpg'),
(77, 2, 'uploads/fotos/51be38fb8ce0e.jpg', 'uploads/fotos/51be38fb8ce0e-thumb.jpg'),
(78, 2, 'uploads/fotos/51be39114683f.jpg', 'uploads/fotos/51be39114683f-thumb.jpg'),
(113, 3, 'uploads/dibujos/51c09a16a27ec.jpg', 'uploads/dibujos/51c09a16a27ec-thumb.jpg'),
(114, 3, 'uploads/dibujos/51c09b96cca37.jpg', 'uploads/dibujos/51c09b96cca37-thumb.jpg'),
(115, 3, 'uploads/dibujos/51c09c4e61d2d.jpg', 'uploads/dibujos/51c09c4e61d2d-thumb.jpg'),
(116, 3, 'uploads/dibujos/51c0b015222bf.jpg', 'uploads/dibujos/51c0b015222bf-thumb.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images_variedades`
--

CREATE TABLE IF NOT EXISTS `images_variedades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mila` int(11) NOT NULL,
  `id_variedad` int(11) NOT NULL,
  `media` tinyint(1) NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios_deliv_milas`
--

CREATE TABLE IF NOT EXISTS `precios_deliv_milas` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) NOT NULL,
  `media_nop` int(11) NOT NULL,
  `nalga` int(11) NOT NULL,
  `pollo` int(11) NOT NULL,
  `peceto` int(11) NOT NULL,
  `merluza` int(11) NOT NULL,
  `bob_milanga` int(11) NOT NULL,
  `calabaza` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `precios_deliv_milas`
--

INSERT INTO `precios_deliv_milas` (`id`, `descripcion`, `media_nop`, `nalga`, `pollo`, `peceto`, `merluza`, `bob_milanga`, `calabaza`) VALUES
(1, 'sola', 23, 42, 40, 40, 28, 76, 16),
(2, 'a caballo - verduras', 4, 8, 8, 8, 8, 16, 4),
(3, 'capresse - fugazzeta - napolitana', 6, 12, 12, 12, 12, 24, 6),
(4, 'napo con jamon - verdeo - acelga', 8, 15, 15, 15, 15, 30, 8),
(5, 'calabresa - cheddar - champignones', 8, 16, 16, 16, 16, 32, 8),
(6, 'j crudo - especial - 4quesos - maestra', 8, 17, 17, 17, 17, 34, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios_deliv_prod`
--

CREATE TABLE IF NOT EXISTS `precios_deliv_prod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `importe` int(11) NOT NULL,
  `en_stock` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `precios_deliv_prod`
--

INSERT INTO `precios_deliv_prod` (`id`, `id_categoria`, `descripcion`, `importe`, `en_stock`) VALUES
(1, 1, 'Puré', 16, 1),
(2, 1, 'Papas fritas', 16, 1),
(3, 1, 'Batatas fritas', 16, 1),
(4, 1, 'Tortilla de papa', 20, 1),
(5, 1, 'Ensalada', 16, 1),
(6, 1, 'Empanada', 6, 1),
(7, 2, 'Hamburguesa', 25, 1),
(8, 2, 'Milanesa', 25, 1),
(9, 5, 'Agregados : lechuga, tomate o huevo', 1, 1),
(10, 5, 'Agregados: jamon, queso o panceta', 2, 1),
(11, 3, 'Gaseosa 1 &frac12; litros.', 20, 1),
(12, 4, 'Promo 1 Delivery (4 pers.) - milanesa Bob Milanga - variedad a elección + 2 guarniciones + cerveza Quilmes o gaseosa.', 132, 1),
(13, 4, 'Promo 2 Delivery (1 pers.) - variedad de 1 a 6 + guarnición', 35, 1),
(14, 4, 'Promo 3 Delivery (1 pers.) &frac12; nalga o pollo + guarnición', 29, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios_salon_milas`
--

CREATE TABLE IF NOT EXISTS `precios_salon_milas` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) NOT NULL,
  `media_nop` float NOT NULL,
  `nalga` float NOT NULL,
  `pollo` float NOT NULL,
  `peceto` float NOT NULL,
  `merluza` float NOT NULL,
  `bob_milanga` float NOT NULL,
  `calabaza` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `precios_salon_milas`
--

INSERT INTO `precios_salon_milas` (`id`, `descripcion`, `media_nop`, `nalga`, `pollo`, `peceto`, `merluza`, `bob_milanga`, `calabaza`) VALUES
(1, 'sola', 29, 52, 50, 50, 35, 94, 19),
(2, 'a caballo - verduras', 39, 62, 60, 60, 45, 114, 39),
(3, 'capresse - fugazzeta - napolitana', 36.5, 67, 65, 65, 50, 124, 49),
(4, 'napo con jamon - verdeo - acelga', 37, 70, 68, 68, 53, 126, 51),
(5, 'calabresa - cheddar - champignones', 39.5, 73, 71, 71, 56, 136, 61),
(6, 'j crudo - especial - 4quesos - maestra', 40, 74, 72, 72, 57, 138, 63);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios_salon_prod`
--

CREATE TABLE IF NOT EXISTS `precios_salon_prod` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `importe` int(11) NOT NULL,
  `en_stock` tinyint(1) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `precios_salon_prod`
--

INSERT INTO `precios_salon_prod` (`id`, `id_categoria`, `descripcion`, `importe`, `en_stock`) VALUES
(1, 1, 'Croquetas de verduras', 23, 1),
(2, 1, 'Rabas', 46, 1),
(3, 1, 'Bastones de muzzarella', 25, 1),
(4, 1, 'Papas Rusticas', 25, 1),
(5, 1, 'Omelette de jamon y queso', 27, 1),
(6, 1, 'Omelette capresse', 27, 1),
(7, 1, 'Tabla de quesos y fiambres', 90, 1),
(8, 1, 'Empanadas de carne y jamon y queso', 6, 1),
(9, 1, 'Picada Bob', 170, 1),
(10, 1, 'Cubiertos', 7, 1),
(11, 3, 'Pure', 20, 1),
(15, 3, 'Tortilla de papas', 26, 1),
(16, 4, 'Ensaladas', 25, 1),
(12, 3, 'Papas fritas', 22, 1),
(14, 3, 'Batatas fritas', 22, 1),
(13, 3, 'Papas argentinas', 22, 1),
(17, 4, 'Adicional parmesano', 4, 1),
(18, 4, 'Caprese', 28, 1),
(19, 4, 'Bob 1', 28, 1),
(20, 4, 'Bob 2', 28, 1),
(21, 5, 'Bife de chorizo', 45, 1),
(22, 5, 'Pechuga', 40, 1),
(23, 5, 'Chernia', 40, 1),
(24, 6, 'Hamburguesa', 30, 1),
(25, 6, 'Milanesa', 30, 1),
(26, 6, 'Agregados : lechuga, tomate o huevo', 1, 1),
(27, 6, 'Agregados: jamon, queso o panceta', 2, 1),
(28, 7, 'Helado', 15, 1),
(29, 7, 'Bombon helado', 16, 1),
(30, 7, 'Almendrado', 16, 1),
(31, 7, 'Mousse de chocolate', 16, 1),
(32, 7, 'Panqueques con dulce de leche', 12, 1),
(33, 7, 'Flan', 12, 1),
(34, 7, 'Postres de la casa', 0, 1),
(35, 7, 'Adicional: Dulce de leche o crema', 2, 1),
(36, 8, 'Agua mineral', 0, 1),
(37, 8, 'Gaseosa chica', 12, 1),
(38, 8, 'Gaseosa grande', 25, 1),
(39, 8, 'H2O citrus ', 0, 1),
(40, 8, 'Twister pomelo/naranja', 0, 1),
(41, 8, 'Quilmes Lieber', 0, 1),
(42, 8, 'Etchart Privado', 24, 1),
(43, 8, 'Norton 3/8', 25, 1),
(44, 8, 'Norton 3/4', 35, 1),
(45, 8, 'Castel Chandon', 38, 1),
(46, 8, 'Cosecha Tardía', 45, 1),
(47, 8, 'Colón', 24, 1),
(48, 8, 'Norton clasico 3/8', 25, 1),
(49, 8, 'Norton 3/4', 35, 1),
(50, 8, 'Callia ', 40, 1),
(51, 8, 'Benjamín Nieto', 40, 1),
(52, 8, 'Don Valentín', 50, 1),
(53, 8, 'Valmont', 50, 1),
(54, 8, 'Nieto Senetiner', 70, 1),
(55, 8, 'New Age', 38, 1),
(56, 8, 'Norton Extra Brut', 55, 1),
(57, 9, 'Porrón', 16, 1),
(58, 9, 'Quilmes 1lt', 28, 1),
(59, 9, 'Quiles Bajo Cero', 28, 1),
(60, 9, 'Bock, Stout, Red Lager 1 lt', 0, 1),
(61, 9, 'Stella Artois 1lt', 35, 1),
(62, 9, 'Porrón Hecks', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_milanesas`
--

CREATE TABLE IF NOT EXISTS `stock_milanesas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `tooltip` varchar(20) NOT NULL,
  `en_stock` tinyint(1) NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `stock_milanesas`
--

INSERT INTO `stock_milanesas` (`id`, `nombre`, `tooltip`, `en_stock`, `url`) VALUES
(1, '&frac12; Nalga', '(1 pers.)', 1, ''),
(2, '&frac12; Pollo', '(1 pers.)', 1, ''),
(3, '&frac12; Peceto', '(1 pers.)', 1, ''),
(4, 'Nalga', '(2 pers.)', 1, ''),
(5, 'Pollo', '(2 pers.)', 1, ''),
(6, 'Peceto', '(1 ó 2 pers.)', 1, ''),
(7, 'Merluza', '(1 ó 2 pers.)', 1, ''),
(8, 'Bob Milanga', '(3 ó 4 pers.)', 1, ''),
(9, 'Calabaza', '(1 pers.)', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock_variedades`
--

CREATE TABLE IF NOT EXISTS `stock_variedades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `en_stock` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `stock_variedades`
--

INSERT INTO `stock_variedades` (`id`, `nombre`, `descripcion`, `en_stock`) VALUES
(1, 'A caballo', '(con huevo frito)', 1),
(2, 'Verduras', '(morrones, cebolla de verdeo, arvejas, ajo, perejil)', 1),
(3, 'Capresse', ' (muzzarella, rodajas de tomate, albahaca)', 1),
(4, 'Fugazzeta', '(muzzarella, cebolla, orégano)', 1),
(5, 'Napolitana', '(salsa de tomate, muzzarella, orégano)', 1),
(6, 'Napolitana con jamón', '(salsa de tomate, muzzarella, jamón, orégano)', 1),
(7, 'Verdeo', '(muzzarella, cebolla de verdeo, jamón cocido)', 1),
(8, 'Acelga', '(acelga a la crema y queso parmesano gratinado)', 1),
(9, 'Calabresa', '(salsa de tomate, muzzarella, longaniza, perejil)', 1),
(10, 'Cheddar', '(queso cheddar y panceta)', 1),
(11, 'Champignones', '(crema y champignones gratinados)', 1),
(12, 'Jamón crudo', '(muzzarella, jamón crudo, rúcula, oliva, pimienta negra)', 1),
(13, 'Especial', '(muzzarella, jamón cocido, morrón y huevos fritos)', 1),
(14, 'Cuatro Quesos', '(muzzarella, provolone, roquefort y parmesano)', 1),
(15, 'Maestra', '(cebolla caramelizada, parmesano, jamón cocido y crema)', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
