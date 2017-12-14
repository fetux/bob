-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-04-2013 a las 17:29:50
-- Versión del servidor: 5.1.67
-- Versión de PHP: 5.3.6-13ubuntu3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bobmilanga`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`) VALUES
(1, 'Guarniciones'),
(2, 'Sandwiches'),
(3, 'Bebidas'),
(4, 'Promos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `importe` int(11) NOT NULL,
  `en_stock` int(11) NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id_item`, `id_categoria`, `descripcion`, `importe`, `en_stock`) VALUES
(1, 1, 'Puré (papa o calabaza)', 16, 1),
(2, 1, 'Papas fritas', 16, 1),
(3, 1, 'Batatas fritas', 16, 1),
(4, 1, 'Tortilla de papa', 20, 1),
(5, 1, 'Ensalada (lechuga, choclo, tomate, zanahoria, cebolla, huevo, remolacha)', 16, 1),
(6, 1, 'Empanadas (jamón y queso, carne cortada a cuchillo)', 6, 1),
(7, 2, 'Hamburguesa', 20, 1),
(8, 2, 'Milanesa (carne o pollo)', 23, 1),
(9, 3, 'Gaseosa 1 1/2 litros.', 18, 1),
(10, 4, 'Promo 1 Delivery (4 pers.) - milanesa Bob Milanga - variedad a elección + 2 guarniciones + cerveza Quilmes o gaseosa.', 125, 1),
(11, 4, 'Promo 2 Delivery (1 pers.) - variedad de 1 a 6 + guarnición', 33, 1),
(12, 4, 'Promo 3 Delivery (1 pers.) 1/2 nalga o pollo + guarnición', 27, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `milanesas`
--

CREATE TABLE IF NOT EXISTS `milanesas` (
  `id_mila` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `en_stock` int(11) NOT NULL,
  PRIMARY KEY (`id_mila`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `milanesas`
--

INSERT INTO `milanesas` (`id_mila`, `nombre`, `en_stock`) VALUES
(1, '1/2 nalga (1 pers.)', 1),
(2, '1/2 pollo (1 pers.)', 1),
(3, 'nalga (2 pers.)\n', 1),
(4, 'pollo (2 pers.)', 1),
(5, 'peceto (1 ó 2 pers.)', 1),
(6, 'merluza (1 ó 2 pers.', 1),
(7, 'bob milanga (3 ó 4 p', 1),
(8, 'calabaza (1 pers.)', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios_mila_var`
--

CREATE TABLE IF NOT EXISTS `precios_mila_var` (
  `id_precios` int(4) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) NOT NULL,
  `media_nop` int(11) NOT NULL,
  `nalga` int(11) NOT NULL,
  `pollo` int(11) NOT NULL,
  `peceto` int(11) NOT NULL,
  `merluza` int(11) NOT NULL,
  `bob_milanga` int(11) NOT NULL,
  `calabaza` int(11) NOT NULL,
  PRIMARY KEY (`id_precios`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `precios_mila_var`
--

INSERT INTO `precios_mila_var` (`id_precios`, `descripcion`, `media_nop`, `nalga`, `pollo`, `peceto`, `merluza`, `bob_milanga`, `calabaza`) VALUES
(1, 'sola', 23, 42, 40, 40, 28, 76, 16),
(2, 'a caballo - verduras', 4, 8, 81, 8, 8, 16, 4),
(3, 'capresse - fugazzeta - napolitana', 6, 12, 12, 12, 12, 24, 6),
(4, 'napo con jamon - verdeo - acelga', 8, 15, 15, 15, 15, 30, 8),
(5, 'calabresa - cheddar - champignones', 8, 16, 16, 16, 16, 32, 8),
(6, 'j crudo - especial - 4quesos - maestra', 8, 17, 17, 17, 17, 34, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variedades`
--

CREATE TABLE IF NOT EXISTS `variedades` (
  `id_variedad` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) NOT NULL,
  `en_stock` int(11) NOT NULL,
  PRIMARY KEY (`id_variedad`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `variedades`
--

INSERT INTO `variedades` (`id_variedad`, `descripcion`, `en_stock`) VALUES
(1, 'A caballo', 1),
(2, 'Verduras (morrones, cebolla de verdeo, arvejas, ajo, perejil)', 1),
(3, 'Capresse (muzzarella, rodajas de tomate, albahaca)', 1),
(4, 'Fugazzeta (muzzarella, cebolla, orégano)', 1),
(5, 'Napolitana (salsa de tomate, muzzarella, orégano)', 1),
(6, 'Napolitana con jamón (salsa de tomate, muzzarella, jamón, orégano)', 1),
(7, 'Verdeo (muzzarella, cebolla de verdeo, jamón cocido)', 1),
(8, 'Acelga (acelga a la crema y queso parmesano gratinado)', 1),
(9, 'Calabresa (salsa de tomate, muzzarella, longaniza, perejil)', 1),
(10, 'Cheddar (queso cheddar y panceta)', 1),
(11, 'Champignones (crema y champignones gratinados)', 1),
(12, 'Jamón crudo (muzzarella, jamón crudo, rúcula, oliva, pimienta negra)', 1),
(13, 'Especial (muzzarella, jamón cocido, morrón y huevos fritos)', 1),
(14, '4 Quesos (muzzarella, provolone, roquefort y parmesano)', 1),
(15, 'Maestra (cebolla caramelizada, parmesano, jamón cocido y crema)', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
