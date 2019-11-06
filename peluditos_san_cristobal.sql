-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2019 a las 21:11:54
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peluditos_san_cristobal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adopciones`
--

CREATE TABLE `adopciones` (
  `numAdopcion` int(10) UNSIGNED NOT NULL,
  `idAnimalAdoptado` int(10) UNSIGNED NOT NULL,
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `fechaAdopcion` date NOT NULL,
  `codEsterilizacion` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `adopciones`
--

INSERT INTO `adopciones` (`numAdopcion`, `idAnimalAdoptado`, `idUsuario`, `fechaAdopcion`, `codEsterilizacion`) VALUES
(1, 62, 15, '2019-10-13', NULL),
(2, 63, 16, '2019-10-16', NULL),
(3, 64, 17, '2019-10-20', NULL),
(4, 65, 15, '2019-10-26', NULL),
(5, 69, 19, '2019-11-02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animales`
--

CREATE TABLE `animales` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `especie` varchar(30) NOT NULL,
  `raza` varchar(25) NOT NULL,
  `color` varchar(30) NOT NULL,
  `sexo` char(1) NOT NULL,
  `edad` date NOT NULL,
  `esterilizado` tinyint(1) NOT NULL,
  `descripcion` tinyblob NOT NULL,
  `procedencia` varchar(30) NOT NULL,
  `carpeta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `animales`
--

INSERT INTO `animales` (`id`, `nombre`, `especie`, `raza`, `color`, `sexo`, `edad`, `esterilizado`, `descripcion`, `procedencia`, `carpeta`) VALUES
(62, 'Toby', 'canina', 'Cruce', 'CafÃ©', 'M', '2019-08-14', 1, 0x5065727269746f206a7567756574c3b36e2c206d757920616c65677265, 'Calle', 'Toby96647843'),
(63, 'Mishi', 'canina', 'Egipcio', 'Morado', 'M', '2018-05-09', 0, 0x5265616c206861737461206c61206d7565727465, 'Calle 13', 'Mishi37460585'),
(64, 'Realito', 'felina', 'Pitbull', 'Morado', 'M', '2016-10-20', 1, 0x5265617366736420, 'Robledo Villa SofÃ­a', 'Realito94148368'),
(65, 'Hunsky', 'canina', 'Pitbull', 'Blanco', 'M', '2017-10-12', 1, 0x5245666473, 'Calle', 'Hunsky17066693'),
(66, 'Luis Miguel', 'canina', 'Pitbull', 'Morado', 'F', '2019-10-10', 1, 0x666766676764666764, 'Robledo Villa SofÃ­a', 'Luis Miguel27037673'),
(67, 'Hunsky', 'canina', 'Egipcio', 'gfdgd', 'M', '2019-10-24', 0, 0x65777272657277776572, 'Robledo Bello Horizonte - Mede', 'Hunsky38975878'),
(68, 'Hunsky', 'felina', 'Egipcio', 'gfdgd', 'M', '2017-07-05', 1, 0x736466666473646673667364, 'Robledo Bello Horizonte', 'Hunsky43104727'),
(69, 'Toby', 'felina', 'gfhf', 'Morado', 'M', '2019-10-10', 0, 0x65727274657274, 'ererer', 'Toby38975400'),
(70, 'Toby', 'felina', 'Pitbull', 'CafÃ©', 'M', '2019-10-03', 1, 0x667364646664, 'Robledo Villa SofÃ­a', 'Toby49883241');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `animalesvacunados`
--

CREATE TABLE `animalesvacunados` (
  `codVacuna` int(10) UNSIGNED NOT NULL,
  `idAnimal` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `animalesvacunados`
--

INSERT INTO `animalesvacunados` (`codVacuna`, `idAnimal`) VALUES
(20, 62),
(21, 63),
(21, 64),
(20, 65),
(20, 66),
(20, 67),
(23, 68),
(21, 69),
(23, 69),
(21, 70),
(23, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apadrinamientos`
--

CREATE TABLE `apadrinamientos` (
  `cod` int(10) UNSIGNED NOT NULL,
  `colaboracion` varchar(10) NOT NULL,
  `cantidad` varchar(50) NOT NULL,
  `cadaTiempo` varchar(30) NOT NULL,
  `idAnimal` int(10) UNSIGNED NOT NULL,
  `idUsuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compromisoesterilizacion`
--

CREATE TABLE `compromisoesterilizacion` (
  `cod` int(10) UNSIGNED NOT NULL,
  `fechaEstipulada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentoslegales`
--

CREATE TABLE `documentoslegales` (
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `firma` varchar(200) NOT NULL,
  `copiaCedula` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documentoslegales`
--

INSERT INTO `documentoslegales` (`idUsuario`, `firma`, `copiaCedula`) VALUES
(15, 'usuarios/juanDavid@gmail.com/firma.png', 'usuarios/juanDavid@gmail.com/cedula.pdf'),
(16, 'usuarios/danytf2103@gmail.com/firma.png', 'usuarios/danytf2103@gmail.com/cedula.pdf'),
(17, 'usuarios/pruebon@gmail.com/firma.png', 'usuarios/pruebon@gmail.com/cedula.pdf'),
(15, 'usuarios/juanDavid@gmail.com/firma.png', 'usuarios/juanDavid@gmail.com/cedula.pdf'),
(19, 'usuarios/wwwww@gmail.com/firma.png', 'usuarios/wwwww@gmail.com/cedula.pdf'),
(20, 'usuarios/zabalaRenLuis@gmail.com/firma.p', 'usuarios/zabalaRenLuis@gmail.com/cedula.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE `donaciones` (
  `iddonacion` int(11) UNSIGNED NOT NULL,
  `donacion` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `unidades` varchar(255) NOT NULL,
  `ruta_imagen` varchar(255) NOT NULL,
  `mensaje` text DEFAULT NULL,
  `idUsuario` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `donaciones`
--

INSERT INTO `donaciones` (`iddonacion`, `donacion`, `cantidad`, `unidades`, `ruta_imagen`, `mensaje`, `idUsuario`) VALUES
(1, 'alimentos', 2, 'libras', 'comprobanteDonaciones/383947147.png', NULL, NULL),
(2, 'medicamentos', 21, 'libras', 'comprobanteDonaciones/840832306.png', NULL, NULL),
(3, 'alimentos', 2, 'libras', 'comprobanteDonaciones/927128330.png', NULL, NULL),
(4, 'alimentos', 1, 'libras', 'comprobanteDonaciones/656998691.png', NULL, NULL),
(5, 'alimentos', 2, 'libras', 'comprobanteDonaciones/466645201.png', NULL, NULL),
(6, 'alimentos', 1, 'libras', 'comprobanteDonaciones/727836207.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregaanimal`
--

CREATE TABLE `entregaanimal` (
  `id` int(10) UNSIGNED NOT NULL,
  `fechaEntrega` datetime NOT NULL,
  `lugarEntrega` varchar(100) NOT NULL,
  `entregado` tinyint(1) NOT NULL DEFAULT 0,
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `idAnimal` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'Evento Azul', '#0071c5', '2017-08-01 00:00:00', '2017-08-02 00:00:00'),
(2, 'Eventos 2', '#40E0D0', '2017-08-02 00:00:00', '2017-08-03 00:00:00'),
(3, 'Doble click para editar evento', '#008000', '2017-08-03 00:00:00', '2017-08-07 00:00:00'),
(4, 'solanin', '#40E0D0', '2019-11-14 00:00:00', '2019-11-17 00:00:00'),
(6, 'RE: My family', '', '2019-11-19 00:00:00', '2019-11-23 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `cod` int(10) UNSIGNED NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `idAnimal` int(10) UNSIGNED NOT NULL,
  `perfil` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`cod`, `direccion`, `idAnimal`, `perfil`) VALUES
(1, 'Toby96647843/509036328.png', 62, 1),
(2, 'Toby96647843/413554197.png', 62, 0),
(3, 'Mishi37460585/797624317.png', 63, 1),
(4, 'Mishi37460585/433979721.png', 63, 0),
(5, 'Mishi37460585/728599478.png', 63, 0),
(6, 'Realito94148368/323367584.png', 64, 0),
(7, 'Realito94148368/173378701.png', 64, 1),
(8, 'Realito94148368/850366697.png', 64, 0),
(9, 'Realito94148368/188347567.png', 64, 0),
(10, 'Realito94148368/280050482.png', 64, 0),
(11, 'Toby96647843/617175245.png', 62, 0),
(12, 'Hunsky17066693/847310815.png', 65, 1),
(13, 'Hunsky17066693/716955269.png', 65, 0),
(14, 'Hunsky17066693/202448634.png', 65, 0),
(16, 'Luis Miguel27037673/755597857.png', 66, 1),
(17, 'Luis Miguel27037673/461847220.png', 66, 0),
(18, 'Luis Miguel27037673/522340137.png', 66, 0),
(19, 'Luis Miguel27037673/797815972.png', 66, 0),
(20, 'Hunsky38975878/674946027.png', 67, 1),
(21, 'Hunsky38975878/394950706.png', 67, 0),
(22, 'Hunsky38975878/270424112.png', 67, 0),
(23, 'Hunsky38975878/743216172.png', 67, 0),
(24, 'Hunsky43104727/241534301.png', 68, 1),
(25, 'Hunsky43104727/410829595.png', 68, 0),
(26, 'Hunsky43104727/134938969.png', 68, 0),
(27, 'Hunsky43104727/676645484.png', 68, 0),
(28, 'Toby38975400/827989064.png', 69, 0),
(29, 'Toby38975400/945733126.png', 69, 0),
(30, 'Toby38975400/295787794.png', 69, 1),
(31, 'Toby38975400/304348560.png', 69, 0),
(32, 'Toby49883241/955916901.png', 70, 0),
(33, 'Toby49883241/434476813.png', 70, 1),
(34, 'Toby38975400/534680578.png', 69, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntasadopcion`
--

CREATE TABLE `preguntasadopcion` (
  `numPregunta` int(10) UNSIGNED NOT NULL,
  `pregunta` blob NOT NULL,
  `typeInput` varchar(20) NOT NULL,
  `siOno` tinyint(1) NOT NULL DEFAULT 0,
  `dbPregunta` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntasadopcion`
--

INSERT INTO `preguntasadopcion` (`numPregunta`, `pregunta`, `typeInput`, `siOno`, `dbPregunta`) VALUES
(1, 0xc2bf506f72207175c3a92064657365612061646f7074617220756e61206d6173636f74613f, 'text', 0, NULL),
(2, 0xc2bf41637475616c6d656e7465207469656e65206f74726f7320616e696d616c69746f733f, 'radio', 1, 'Â¿Cuales?'),
(3, 0xc2bf5369206c6f73207469656e652c20657374c3a16e206573746572696c697a61646f733f, 'radio', 1, 'Â¿Por quÃ©?'),
(4, 0x416e746572696f726d656e74652068612074656e69646f206f74726f7320616e696d616c69746f733f, 'radio', 1, 'Â¿Cuales?'),
(5, 0xc2bf5175c3a920667565206c6f2071756520706173c3b320636f6e20c3a96c2f656c6c6f733f, 'text', 0, NULL),
(6, 0xc2bf457374c3a1206465206163756572646f20656e20717565207365206861676120756e61207669736974612070657269c3b364696361206120737520646f6d6963696c696f20706172612076657220636f6d6f20736520656e6375656e74726120656c20616e696d616c69746f2061646f707461646f3f, 'radio', 1, 'Â¿Por quÃ©?'),
(7, 0xc2bf4375616e74617320706572736f6e617320766976656e20656e20737520636173613f, 'text', 0, NULL),
(8, 0xc2bf457374c3a16e20746f646f73206465206163756572646f20656e2061646f707461723f, 'radio', 1, NULL),
(9, 0xc2bf486179206e69c3b16f7320656e20636173613f, 'radio', 1, 'Edades:'),
(10, 0xc2bf416c677569656e20717565207669766120636f6e207573746564657320657320616cc3a9726769636f2061206c6f7320616e696d616c6573206f2073756672652064652061736d613f, 'text', 0, NULL),
(11, 0x456e206361736f2064652061716c75696c65722c20c2bf53757320617272656e6461646f726573207065726d6974656e20616e696d616c69746f7320656e206c612063617361206f206170617274616d656e746f3f, 'radio', 1, 'otra respuesta:'),
(12, 0x536920706f7220616c67c3ba6e206d6f7469766f2074757669657261207175652063616d6269617220646520646f6d6963696c696f2c20c2bf5175c3a9207061736172c3ad6120636f6e20656c20616e696d616c69746f3f, 'text', 0, NULL),
(13, 0x456e206361736f20646520756e61207275707475726120656e206c612066616d696c696120286469766f7263696f2c2066616c6c6563696d69656e746f29206f206465206c61206c6c656761646120646520756e206e7565766f20696e74656772616e74652068756d616e6f20c2bf4375c3a16c657320736572c3ad616e206c6f732063616d62696f7320656e20656c20747261746f20686163696120656c20616e696d616c69746f2061646f707461646f3f, 'text', 0, NULL),
(14, 0xc2bf4375c3a16e746f732061c3b16f73206372656520717565207669766520756e20706572726f20656e2070726f6d6564696f3f, 'text', 0, NULL),
(15, 0xc2bf43c3b36d6f20736520766520636f6e2073752061646f707461646f2064656e74726f20646520352061c3b16f733f, 'text', 0, NULL),
(16, 0xc2bf5469656e65206573706163696f20737566696369656e746520706172612071756520656c20616e696d616c69746f207365207369656e74612063c3b36d6f646f3f, 'radio', 1, NULL),
(17, 0xc2bf44c3b36e646520646f726d6972c3a120656c20616e696d616c69746f2061646f707461646f3f, 'text', 0, NULL),
(18, 0xc2bf4375c3a16e746f097469656d706f207061736172c3a120736f6c6f20656c20616e696d616c69746f2061646f707461646f3f, 'text', 0, NULL),
(19, 0xc2bf536920656c20636f6d706f7274616d69656e746f2064656c20616e696d616c69746f206e6f20657320656c2071756520757374656420646573656120286a75677565746f6e2c206d6f7264656c6f6e2c20696e71756965746f2c206d696d61646f2c20726562656c6465292c207175c3a9206d65646964617320746f6d6172c3ad613f, 'text', 0, NULL),
(20, 0x5365c3b1616c65206c612063616e74696461642071756520637265652071756520736520676173746120656e20756e20706572726f20616c206d6573, 'number', 0, NULL),
(21, 0xc2bf517569c3a96e20736572c3a120656c20726573706f6e7361626c65207920736520686172c3a120636172676f20646520637562726972206c6f7320676173746f732064656c2061646f707461646f3f, 'text', 0, NULL),
(22, 0x5365c3b1616c65206c6f73206375696461646f732071756520557374656420792073752066616d696c6961206573746172c3ad616e2064697370756573746f732061206461726c6520616c2061646f707461646f3a, 'checkbox', 0, 'especial'),
(23, 0xc2bf5469656e6520756e206dc3a96469636f207665746572696e6172696f2064652063616265636572613f, 'radio', 1, NULL),
(24, 0x4e6f6d6272652064656c204dc3a96469636f205665746572696e6172696f, 'text', 0, 'y telÃ©fono'),
(25, 0xc2bf4375656e746120636f6e206c6f73207265637572736f73207061726120637562726972206c6f7320676173746f73207665746572696e6172696f732064656c20616e696d616c20646520636f6d7061c3b1c3ad613f, 'radio', 1, NULL),
(26, 0xc2bf4173756d6520656c20636f6d70726f6d69736f206465206573746572696c697a617220616c2061646f707461646f20756e612076657a207175652074656e6761206c6120656461640d0a737566696369656e74653f, 'radio', 1, 'Â¿Por quÃ©?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestasadopcion`
--

CREATE TABLE `respuestasadopcion` (
  `cod` int(10) UNSIGNED NOT NULL,
  `respuesta` varchar(255) NOT NULL,
  `dbPreguntaRespuesta` varchar(300) DEFAULT NULL,
  `numPregunta` int(10) UNSIGNED NOT NULL,
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `idAnimal` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuestasadopcion`
--

INSERT INTO `respuestasadopcion` (`cod`, `respuesta`, `dbPreguntaRespuesta`, `numPregunta`, `idUsuario`, `idAnimal`) VALUES
(1, 'Me siento un poquis solo y me gustarÃ­a tener una mascota para darle amor', NULL, 1, 15, 62),
(2, 'No', NULL, 2, 15, 62),
(3, 'no', 'Porque no funciona en niÃ±os', 3, 15, 62),
(4, 'SÃ­', 'Otro hijo', 4, 15, 62),
(5, 'Se fue con la mamÃ¡', NULL, 5, 15, 62),
(6, 'SÃ­', 'Porque en cada visita que me hagan, van a resolver cualquier duda que tenga y me va permitir mejorar mi rol como adoptante', 6, 15, 62),
(7, '2', NULL, 7, 15, 62),
(8, 'SÃ­', NULL, 8, 15, 62),
(9, 'si', '11', 9, 15, 62),
(10, 'No', NULL, 10, 15, 62),
(11, 'si', '2221', 11, 15, 62),
(12, 'Se va con nosotros', NULL, 12, 15, 62),
(13, 'Le harÃ­a falta la persona que se fue', NULL, 13, 15, 62),
(14, '15 aÃ±os', NULL, 14, 15, 62),
(15, 'Lindo', NULL, 15, 15, 62),
(16, 'SÃ­', NULL, 16, 15, 62),
(17, 'En la cama', NULL, 17, 15, 62),
(18, '1 hora diaria', NULL, 18, 15, 62),
(19, 'Metodos de control animal', NULL, 19, 15, 62),
(20, '312318', NULL, 20, 15, 62),
(21, 'yo', NULL, 21, 15, 62),
(22, 'true,false,true,true,true,true,false,true,false', NULL, 22, 15, 62),
(23, 'si', NULL, 23, 15, 62),
(24, 'Alfonsi', '32132', 24, 15, 62),
(25, 'si', NULL, 25, 15, 62),
(26, 'SÃ­', 'Porque es lo mejor para el animalito', 26, 15, 62),
(27, 'Me siento un poquis solo y me gustarÃ­a tener una mascota para darle amor', NULL, 1, 16, 63),
(28, 'SÃ­', 'dsadsa', 2, 16, 63),
(29, 'no', 'Porque no funciona en niÃ±os', 3, 16, 63),
(30, 'SÃ­', 'asddsa', 4, 16, 63),
(31, 'Se fue con la mamÃ¡', NULL, 5, 16, 63),
(32, 'SÃ­', 'Porque en cada visita que me hagan, van a resolver cualquier duda que tenga y me va permitir mejorar mi rol como adoptante', 6, 16, 63),
(33, '2', NULL, 7, 16, 63),
(34, 'SÃ­', NULL, 8, 16, 63),
(35, 'si', '11', 9, 16, 63),
(36, 'No', NULL, 10, 16, 63),
(37, 'si', '2221', 11, 16, 63),
(38, 'Se va con nosotros', NULL, 12, 16, 63),
(39, 'Le harÃ­a falta la persona que se fue', NULL, 13, 16, 63),
(40, '15 aÃ±os', NULL, 14, 16, 63),
(41, 'Lindo', NULL, 15, 16, 63),
(42, 'SÃ­', NULL, 16, 16, 63),
(43, 'En la cama', NULL, 17, 16, 63),
(44, '1 hora diaria', NULL, 18, 16, 63),
(45, 'Metodos de control animal', NULL, 19, 16, 63),
(46, '6756567', NULL, 20, 16, 63),
(47, 'yo', NULL, 21, 16, 63),
(48, 'true,true,false,true,true,true,true,true,false', NULL, 22, 16, 63),
(49, 'si', NULL, 23, 16, 63),
(50, 'Alfonsi', '45645646', 24, 16, 63),
(51, 'si', NULL, 25, 16, 63),
(52, 'SÃ­', 'Porque es lo mejor para el animalito', 26, 16, 63),
(53, 'Me siento un poquis solo y me gustarÃ­a tener una mascota para darle amor', NULL, 1, 17, 64),
(54, 'SÃ­', 'Mi hijo', 2, 17, 64),
(55, 'si', 'Porque no funciona en niÃ±os', 3, 17, 64),
(56, 'SÃ­', 'Otro hijo', 4, 17, 64),
(57, 'Se fue con la mamÃ¡', NULL, 5, 17, 64),
(58, 'SÃ­', 'Porque en cada visita que me hagan, van a resolver cualquier duda que tenga y me va permitir mejorar mi rol como adoptante', 6, 17, 64),
(59, '2', NULL, 7, 17, 64),
(60, 'SÃ­', NULL, 8, 17, 64),
(61, 'si', '11', 9, 17, 64),
(62, 'no', NULL, 10, 17, 64),
(63, 'si', '2221', 11, 17, 64),
(64, 'Se va con nosotros', NULL, 12, 17, 64),
(65, 'Le harÃ­a falta la persona que se fue', NULL, 13, 17, 64),
(66, '15 aÃ±os', NULL, 14, 17, 64),
(67, 'Lindo', NULL, 15, 17, 64),
(68, 'SÃ­', NULL, 16, 17, 64),
(69, 'En la cama', NULL, 17, 17, 64),
(70, '1 hora diaria', NULL, 18, 17, 64),
(71, 'Metodos de control animal', NULL, 19, 17, 64),
(72, '34234', NULL, 20, 17, 64),
(73, 'yo', NULL, 21, 17, 64),
(74, 'true,true,true,true,true,true,true,true,true', NULL, 22, 17, 64),
(75, 'si', NULL, 23, 17, 64),
(76, 'Alfonsi', '21321', 24, 17, 64),
(77, 'si', NULL, 25, 17, 64),
(78, 'SÃ­', 'Porque es lo mejor para el animalito', 26, 17, 64),
(79, 'asdfadsfd', NULL, 1, 15, 65),
(80, 'SÃ­', 'dfd', 2, 15, 65),
(81, 'no', 'gdf', 3, 15, 65),
(82, 'SÃ­', 'fdgfg', 4, 15, 65),
(83, 'dssgfd', NULL, 5, 15, 65),
(84, 'SÃ­', 'rwer', 6, 15, 65),
(85, 'weqeds', NULL, 7, 15, 65),
(86, 'SÃ­', NULL, 8, 15, 65),
(87, 'si', '12', 9, 15, 65),
(88, 'fbbvfc', NULL, 10, 15, 65),
(89, 'si', '32fzf', 11, 15, 65),
(90, 'fdsdfsfds', NULL, 12, 15, 65),
(91, 'vgfdgdf', NULL, 13, 15, 65),
(92, 'fbcv', NULL, 14, 15, 65),
(93, 'cdfsdf', NULL, 15, 15, 65),
(94, 'SÃ­', NULL, 16, 15, 65),
(95, 'gdfgdg', NULL, 17, 15, 65),
(96, 'fdggdf', NULL, 18, 15, 65),
(97, 'fdgghhhfg', NULL, 19, 15, 65),
(98, '32232323', NULL, 20, 15, 65),
(99, 'fvbgdfg', NULL, 21, 15, 65),
(100, 'true,true,true,true,true,true,true,true,true', NULL, 22, 15, 65),
(101, 'si', NULL, 23, 15, 65),
(102, 'dsadsadsa', '3324432', 24, 15, 65),
(103, 'si', NULL, 25, 15, 65),
(104, 'SÃ­', 'dsffdd', 26, 15, 65),
(105, 'Mi familia y yo deseamos un nuevo integrante en la familia', NULL, 1, 19, 69),
(106, 'SÃ­', 'Mi hijo', 2, 19, 69),
(107, 'si', 'Porque no funciona en niÃ±os', 3, 19, 69),
(108, 'SÃ­', 'Otro hijo', 4, 19, 69),
(109, 'Se fue con la mamÃ¡', NULL, 5, 19, 69),
(110, 'SÃ­', 'Porque en cada visita que me hagan, van a resolver cualquier duda que tenga y me va permitir mejorar mi rol como adoptante', 6, 19, 69),
(111, '2', NULL, 7, 19, 69),
(112, 'SÃ­', NULL, 8, 19, 69),
(113, 'si', '11', 9, 19, 69),
(114, 'No', NULL, 10, 19, 69),
(115, 'si', '2221', 11, 19, 69),
(116, 'Se va con nosotros', NULL, 12, 19, 69),
(117, 'Le harÃ­a falta la persona que se fue', NULL, 13, 19, 69),
(118, 'fdsfds', NULL, 14, 19, 69),
(119, 'dsffdsfd', NULL, 15, 19, 69),
(120, 'SÃ­', NULL, 16, 19, 69),
(121, 'En la cama', NULL, 17, 19, 69),
(122, '1 hora diaria', NULL, 18, 19, 69),
(123, 'Metodos de control animal', NULL, 19, 19, 69),
(124, '3344', NULL, 20, 19, 69),
(125, '333', NULL, 21, 19, 69),
(126, 'true,true,true,true,true,true,false,true,false', NULL, 22, 19, 69),
(127, 'si', NULL, 23, 19, 69),
(128, 'Alfonsi', '324234', 24, 19, 69),
(129, 'si', NULL, 25, 19, 69),
(130, 'SÃ­', 'Porque es lo mejor para el animalito', 26, 19, 69),
(131, 'Me siento un poquis solo y me gustarÃ­a tener una mascota para darle amor', NULL, 1, 20, 67),
(132, 'No', 'No aplica', 2, 20, 67),
(133, 'No', 'No aplica', 3, 20, 67),
(134, 'No', 'No aplica', 4, 20, 67),
(135, 'No aplica', NULL, 5, 20, 67),
(136, 'SÃ­', 'Porque en cada visita que me hagan, van a resolver cualquier duda que tenga y me va permitir mejorar mi rol como adoptante', 6, 20, 67),
(137, '2', NULL, 7, 20, 67),
(138, 'SÃ­', NULL, 8, 20, 67),
(139, 'No', 'No aplica', 9, 20, 67),
(140, 'No', NULL, 10, 20, 67),
(141, 'No', '2221', 11, 20, 67),
(142, 'Se va con nosotros', NULL, 12, 20, 67),
(143, 'Le harÃ­a falta la persona que se fue', NULL, 13, 20, 67),
(144, '15 aÃ±os', NULL, 14, 20, 67),
(145, 'Lindo', NULL, 15, 20, 67),
(146, 'SÃ­', NULL, 16, 20, 67),
(147, 'En la cama', NULL, 17, 20, 67),
(148, '1 hora diaria', NULL, 18, 20, 67),
(149, 'Metodos de control animal', NULL, 19, 20, 67),
(150, '66', NULL, 20, 20, 67),
(151, 'yo', NULL, 21, 20, 67),
(152, 'false,true,true,true,true,false,true,true,false', NULL, 22, 20, 67),
(153, 'No', NULL, 23, 20, 67),
(154, 'No aplica', NULL, 24, 20, 67),
(155, 'SÃ­', NULL, 25, 20, 67),
(156, 'SÃ­', 'Porque es lo mejor para el animalito', 26, 20, 67);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `cod` int(10) UNSIGNED NOT NULL,
  `visita` varchar(70) NOT NULL,
  `fechaVisita` datetime NOT NULL,
  `visitado` tinyint(1) NOT NULL DEFAULT 0,
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `idAnimal` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`cod`, `visita`, `fechaVisita`, `visitado`, `idUsuario`, `idAnimal`) VALUES
(1, 'Seguimiento #2 Juan David', '2019-11-16 15:30:00', 0, 15, 62),
(3, 'Seguimiento #4 El rondo', '2019-10-27 09:00:00', 0, 15, 62),
(4, 'Seguimiento a PruebÃ³n', '2019-10-21 06:00:00', 1, 17, 64),
(5, 'Seguimiento a PruebÃ³n #2', '2019-11-02 14:00:00', 0, 17, 64),
(6, 'Seguimiento Juan David #3', '2019-10-25 17:00:00', 1, 15, 62),
(8, 'Seguimiento Real #3', '2019-10-30 10:00:00', 0, 17, 64),
(13, 'Seguimiento Juan David Mosquera #1', '2019-11-16 15:30:00', 0, 15, 65),
(15, 'Seguimiento a Juan David Mosquera M', '2019-11-15 10:40:00', 0, 19, 69);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudesadopcion`
--

CREATE TABLE `solicitudesadopcion` (
  `cod` int(10) UNSIGNED NOT NULL,
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `idAnimal` int(10) UNSIGNED NOT NULL,
  `fechaSolicitud` date NOT NULL,
  `estado` varchar(20) NOT NULL,
  `notificado` tinyint(1) NOT NULL,
  `notificacion` varchar(535) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitudesadopcion`
--

INSERT INTO `solicitudesadopcion` (`cod`, `idUsuario`, `idAnimal`, `fechaSolicitud`, `estado`, `notificado`, `notificacion`) VALUES
(1, 15, 62, '2019-10-13', 'adoptado', 1, 'Has completado el proceso de adopciÃ³n, ahora Toby es tu mascota, debes venir a la fundaciÃ³n durante los proximos dÃ­as para llevar a tu mascota y llenarla de amor'),
(2, 16, 63, '2019-10-13', 'adoptado', 0, 'Has completado el proceso de adopciÃ³n, ahora Mishi es tu mascota, debes venir a la fundaciÃ³n durante los proximos dÃ­as para llevar a tu mascota y llenarla de amor'),
(3, 17, 64, '2019-10-20', 'adoptado', 1, 'Has completado el proceso de adopciÃ³n, ahora Realito es tu mascota, debes venir a la fundaciÃ³n durante los proximos dÃ­as para llevar a tu mascota y llenarla de amor'),
(4, 15, 65, '2019-10-26', 'adoptado', 1, 'Has completado el proceso de adopciÃ³n, ahora Hunsky es tu mascota, debes venir a la fundaciÃ³n durante los proximos dÃ­as para llevar a tu mascota y llenarla de amor â™¥, ademÃ¡s ya puedes ver los dias en los cuales se te fue asignado el seguimiento.'),
(5, 19, 69, '2019-11-01', 'adoptado', 0, 'Has completado el proceso de adopciÃ³n, ahora Toby es tu mascota, debes venir a la fundaciÃ³n durante los proximos dÃ­as para llevar a tu mascota y llenarla de amor â™¥, ademÃ¡s ya puedes ver los dias en los cuales se te fue asignado el seguimiento.'),
(6, 19, 66, '2019-11-02', 'a un paso', 0, 'EstÃ¡s a un paso de adoptar, debes llenar el formulario de adopciÃ³n para completar la adopciÃ³n'),
(9, 20, 67, '2019-11-03', 'procesando adopciÃ³n', 1, 'El administrador estÃ¡ mirando tus respuestas y agregando la firma de la fundaciÃ³n para que puedas adoptar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` char(1) NOT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `estadoCivil` varchar(30) DEFAULT NULL,
  `direccionApto` varchar(30) DEFAULT NULL,
  `referencia` varchar(70) DEFAULT NULL,
  `telefonoRef` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `correo`, `telefono`, `cedula`, `password`, `rol`, `foto`, `estadoCivil`, `direccionApto`, `referencia`, `telefonoRef`) VALUES
(1, 'michy', 'batsuayi', 'michy21@gmail.com', '2213231', '23424234', '$2y$10$zQiTa.Em5LJ0cl6YxLGjKesx0RBk3lhHmJqHzN5d.RsVn0hRtJe8a', 'a', '', NULL, NULL, NULL, NULL),
(15, 'Juan David', 'Mosquera MuÃ±oz', 'juanDavid@gmail.com', '3117033212', '542439876', '$2y$10$LTGfV7RwnueXXmOMMcGG6.1IlGP01DevTI4fpDHFg8j9d4c4yAgya', 'u', 'usuarios/juanDavid@gmail.com/fotoPerfil.png', 'Casado', 'cll43a21', 'Daniel Amaya', 2147483647),
(16, 'Daniel', 'Amaya Arango', 'danytf2103@gmail.com', '3012345434', '1000557673', '$2y$10$qJJUaKXim4QvupGaWhbxKOA4Ox.KN.qSKJbEmJCeQNajsxttFw5yW', 'u', 'usuarios/danytf2103@gmail.com/fotoPerfil.png', 'Casado', 'sdfdsfdsf', 'Daniel Amaya', 2147483647),
(17, 'Real prueba', 'Prueba', 'pruebon@gmail.com', '1234567', '4324234423', '$2y$10$bK/oIqtsis9LQaLfMvDY3.9p79Qf4sDJ3bOMSQ7RNcuDd0UeiLg0a', 'u', 'usuarios/pruebon@gmail.com/fotoPerfil.png', 'Soltero', 'cll56#79A47', 'Daniel Amaya', 123124324),
(18, 'Paula', 'Lancheros CaÃ±as', 'paula@gmail.com', '3212221222', '43212243545', '$2y$10$Ft5YqRxVMnkbPxAWEuJKcuKPKvn7Xixj5WgdKJY3H.rCs9BxrYtH2', 'u', '', NULL, NULL, NULL, NULL),
(19, 'Juan David', 'Mosquera M', 'wwwww@gmail.com', '1234567', '1234567890', '$2y$10$gxRmlZJTadaFvK0xUJNwaOZU2cXs7goTNfRklg4acMSywduzHrLQu', 'u', 'usuarios/wwwww@gmail.com/fotoPerfil.png', 'Casado', 'cll56#79A47', 'Daniel Amaya', 123124324),
(20, 'Juan David', 'Mosquera MuÃ±oz', 'zabalaRenLuis@gmail.com', '2134543', '10005576734', '$2y$10$x1/BPqkmZmHWlRuC0DkZ1OLtRkCn4piwjrKUwx9c83zOl9tX/Hcsi', 'u', '', NULL, NULL, NULL, NULL),
(21, 'Sebastian', 'Rivera Cardona', 'elrive@gmail.com', '122324', '12345678', '$2y$10$KJ.Abx8nXKuUFFEHCP7EO.xfOQS.Fkh.FMZkSwsDPEeLt7zCaBMWa', 'u', '', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

CREATE TABLE `vacunas` (
  `cod` int(10) UNSIGNED NOT NULL,
  `especie` varchar(30) NOT NULL,
  `vacuna` varchar(30) NOT NULL,
  `descripcion` tinyblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vacunas`
--

INSERT INTO `vacunas` (`cod`, `especie`, `vacuna`, `descripcion`) VALUES
(20, 'canina', 'Rabia', 0x50617261206375726172206c6120726162696120656e206c6f7320616e696d616c6573),
(21, 'felina', 'Rabia', 0x50617261206375726172206c6120726162696120656e206c6f7320616e696d616c6573),
(23, 'felina', 'Rataviru', 0x5072756562612052);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adopciones`
--
ALTER TABLE `adopciones`
  ADD PRIMARY KEY (`numAdopcion`),
  ADD UNIQUE KEY `unique_idAnimalesAdoptados` (`idAnimalAdoptado`),
  ADD UNIQUE KEY `idAnimalAdoptado` (`idAnimalAdoptado`),
  ADD KEY `fk_adopcionesUsuarios` (`idUsuario`),
  ADD KEY `fk_adopcionesEsterilizacion` (`codEsterilizacion`);

--
-- Indices de la tabla `animales`
--
ALTER TABLE `animales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `animalesvacunados`
--
ALTER TABLE `animalesvacunados`
  ADD KEY `fk_codVacuna` (`codVacuna`),
  ADD KEY `fk_idAnimal` (`idAnimal`);

--
-- Indices de la tabla `apadrinamientos`
--
ALTER TABLE `apadrinamientos`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_USUAPA` (`idUsuario`),
  ADD KEY `fk_ANIAPA` (`idAnimal`);

--
-- Indices de la tabla `compromisoesterilizacion`
--
ALTER TABLE `compromisoesterilizacion`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `documentoslegales`
--
ALTER TABLE `documentoslegales`
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD PRIMARY KEY (`iddonacion`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `entregaanimal`
--
ALTER TABLE `entregaanimal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idAnimal` (`idAnimal`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_ANFOT` (`idAnimal`);

--
-- Indices de la tabla `preguntasadopcion`
--
ALTER TABLE `preguntasadopcion`
  ADD PRIMARY KEY (`numPregunta`);

--
-- Indices de la tabla `respuestasadopcion`
--
ALTER TABLE `respuestasadopcion`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `fk_preguntaRespuesta` (`numPregunta`),
  ADD KEY `fk_usuarioRespuesta` (`idUsuario`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idAnimal` (`idAnimal`);

--
-- Indices de la tabla `solicitudesadopcion`
--
ALTER TABLE `solicitudesadopcion`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idAnimal` (`idAnimal`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `adopciones`
--
ALTER TABLE `adopciones`
  MODIFY `numAdopcion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `animales`
--
ALTER TABLE `animales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `apadrinamientos`
--
ALTER TABLE `apadrinamientos`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compromisoesterilizacion`
--
ALTER TABLE `compromisoesterilizacion`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `iddonacion` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `entregaanimal`
--
ALTER TABLE `entregaanimal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `preguntasadopcion`
--
ALTER TABLE `preguntasadopcion`
  MODIFY `numPregunta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `respuestasadopcion`
--
ALTER TABLE `respuestasadopcion`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `solicitudesadopcion`
--
ALTER TABLE `solicitudesadopcion`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adopciones`
--
ALTER TABLE `adopciones`
  ADD CONSTRAINT `fk_adopcionesAnimales` FOREIGN KEY (`idAnimalAdoptado`) REFERENCES `animales` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_adopcionesEsterilizacion` FOREIGN KEY (`codEsterilizacion`) REFERENCES `compromisoesterilizacion` (`cod`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_adopcionesUsuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `animalesvacunados`
--
ALTER TABLE `animalesvacunados`
  ADD CONSTRAINT `fk_codVacuna` FOREIGN KEY (`codVacuna`) REFERENCES `vacunas` (`cod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idAnimal` FOREIGN KEY (`idAnimal`) REFERENCES `animales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `apadrinamientos`
--
ALTER TABLE `apadrinamientos`
  ADD CONSTRAINT `fk_ANIAPA` FOREIGN KEY (`idAnimal`) REFERENCES `animales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_USUAPA` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `documentoslegales`
--
ALTER TABLE `documentoslegales`
  ADD CONSTRAINT `documentoslegales_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `donaciones`
--
ALTER TABLE `donaciones`
  ADD CONSTRAINT `donaciones_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `entregaanimal`
--
ALTER TABLE `entregaanimal`
  ADD CONSTRAINT `entregaanimal_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `entregaanimal_ibfk_2` FOREIGN KEY (`idAnimal`) REFERENCES `animales` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fk_ANFOT` FOREIGN KEY (`idAnimal`) REFERENCES `animales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestasadopcion`
--
ALTER TABLE `respuestasadopcion`
  ADD CONSTRAINT `fk_preguntaRespuesta` FOREIGN KEY (`numPregunta`) REFERENCES `preguntasadopcion` (`numPregunta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuarioRespuesta` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD CONSTRAINT `seguimiento_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seguimiento_ibfk_2` FOREIGN KEY (`idAnimal`) REFERENCES `animales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudesadopcion`
--
ALTER TABLE `solicitudesadopcion`
  ADD CONSTRAINT `solicitudesadopcion_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitudesadopcion_ibfk_2` FOREIGN KEY (`idAnimal`) REFERENCES `animales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
