-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2019 a las 12:47:53
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
(2, 17, 2, '2019-03-06', NULL),
(3, 43, 3, '2019-09-30', NULL);

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
(17, 'Perry', 'canina', 'pitbull', 'negro', 'F', '0000-00-00', 1, 0x457320756e20706f71756973206c6f636f206e616461206dc3a1732c20657374612070727565626120646562652073616c6972206d656c6974696361, 'medellÃ­n Belen Altavista', 'Perry83638987'),
(23, 'Hunsky', 'Gato', 'Egipcio', 'Morado', 'M', '0000-00-00', 1, 0x416c6761726574656d656e746520686f79206d6920706170c3a1, 'Robledo Bello Horizonte', 'Hunsky108567285'),
(24, 'Bebesita', 'Perro', 'Cruce', 'Morado', 'F', '0000-00-00', 0, 0x536973697369736973697320636c6172656f20636c61c3b1617320646b6a617364206b6a666473206a666a736620786a686973662076646a66, 'Robledo Bello Horizonte', 'Bebesita32921580'),
(41, 'Luis Miguel', 'canina', 'Cruce', 'Morado', 'F', '0000-00-00', 1, 0x6b6c6a6c6b6a6b6c6a, 'Robledo Villa SofÃ­a', 'Luis Miguel65565197'),
(43, 'Mishi', 'felina', 'Egipcio', 'Morado', 'M', '0000-00-00', 1, 0x74616b692074616b692c2074616b692074616b692072756d6261, 'Robledo Bello Horizonte', 'Mishi26464047'),
(45, 'Dulce', 'canina', 'Cruce', 'Blanco', 'F', '0000-00-00', 1, 0x415364736164, 'Robledo Villa SofÃ­a', 'Dulce62954265'),
(46, 'Bills', 'felina', 'Egipcio', 'Morado', 'M', '0000-00-00', 1, 0x736467676664646467, 'fggfdg', 'Bills66650523'),
(47, 'Luis Miguel', 'canina', 'Pitbull', 'Morado', 'M', '0000-00-00', 1, 0x736466667364667364, 'Robledo Bello Horizonte', 'Luis Miguel55309034'),
(49, 'Feeef', 'felina', 'Egipcio', 'Blanco', 'F', '0000-00-00', 1, 0x647366667364666673647364, 'Robledo Villa SofÃ­a', 'Feeef99555216'),
(50, 'Luis Miguel', 'canina', 'Pitbull', 'CafÃ©', 'M', '2019-08-01', 1, 0x7678676666676766, 'Robledo Villa SofÃ­a', 'Luis Miguel63262816'),
(52, 'Luis Miguel', 'canina', 'Pitbull', 'Morado', 'M', '2019-05-23', 1, 0x457320756e20706572726f206a7567756574c3b36e2079206c6f636f, 'Robledo Bello Horizonte', 'Luis Miguel70647073'),
(53, 'Realito', 'felina', 'Egipcio', 'Morado', 'M', '2019-06-05', 1, 0x5265616c20676861737461206c61206a736b6168646e6a6b7361, 'Robledo Villa SofÃ­a', 'Realito69808323'),
(54, 'mishi', 'Perro', 'Pitbull', 'Blanco', 'F', '2019-05-15', 1, 0x736b6c64646b6c6b206a6b6466676e682067797574353738, 'Robledo Villa SofÃ­a', 'mishi21949708');

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
(14, 45),
(14, 45),
(14, 47),
(13, 43),
(2, 43),
(15, 46),
(2, 46),
(15, 49),
(18, 45),
(14, 50),
(18, 50),
(1, 50),
(1, 52),
(18, 52),
(13, 53),
(14, 54);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apadrinamientos`
--

CREATE TABLE `apadrinamientos` (
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `idAnimal` int(10) UNSIGNED NOT NULL,
  `colaboracion` varchar(10) NOT NULL,
  `cantidad` varchar(50) NOT NULL,
  `cadaTiempo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `numCita` int(10) UNSIGNED NOT NULL,
  `fechaHora` datetime NOT NULL,
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
  `firma` varchar(40) NOT NULL,
  `docAdopcion` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documentoslegales`
--

INSERT INTO `documentoslegales` (`idUsuario`, `firma`, `docAdopcion`) VALUES
(2, 'usuarios/juanDavid@gmail.com/firma.png', NULL),
(3, 'usuarios/amayasad@gmail.com/firma.png', NULL);

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
(68, 'Perry83638987/734323766.png', 17, 1),
(71, 'Hunsky108567285/551395160.png', 23, 1),
(72, 'Hunsky108567285/314345849.png', 23, 0),
(74, 'Bebesita32921580/720249749.png', 24, 0),
(77, 'Bebesita32921580/10119535.png', 24, 1),
(78, 'Bebesita32921580/10516368.png', 24, 0),
(79, 'Bebesita32921580/327639399.png', 24, 0),
(127, 'Luis Miguel65565197/300478373.png', 41, 1),
(130, 'Mishi26464047/495469619.png', 43, 0),
(131, 'Mishi26464047/944342162.png', 43, 0),
(132, 'Mishi26464047/767274083.png', 43, 0),
(133, 'Mishi26464047/917005991.png', 43, 0),
(134, 'Dulce62954265/983867439.png', 45, 1),
(135, 'Dulce62954265/856758800.png', 45, 0),
(136, 'Dulce62954265/782016830.png', 45, 0),
(137, 'Dulce62954265/898600710.png', 45, 0),
(138, 'Bills66650523/548597876.png', 46, 1),
(139, 'Bills66650523/902806422.png', 46, 0),
(140, 'Bills66650523/515557592.png', 46, 0),
(144, 'Perry83638987/500996034.png', 17, 0),
(145, 'Perry83638987/488412745.png', 17, 0),
(150, 'Hunsky108567285/583503175.png', 23, 0),
(151, 'Hunsky108567285/170824167.png', 23, 0),
(152, 'Hunsky108567285/61645907.png', 23, 0),
(153, 'Hunsky108567285/818591999.png', 23, 0),
(155, 'Mishi26464047/8540728.png', 43, 0),
(157, 'Mishi26464047/87755319.png', 43, 0),
(158, 'Mishi26464047/698723061.png', 43, 1),
(159, 'Mishi26464047/783129734.png', 43, 0),
(160, 'Perry83638987/943718085.png', 17, 0),
(161, 'Perry83638987/402807878.png', 17, 0),
(166, 'Luis Miguel55309034/567055129.png', 47, 1),
(169, 'Feeef99555216/507658825.png', 49, 1),
(170, 'Feeef99555216/185863572.png', 49, 0),
(171, 'Feeef99555216/955218253.png', 49, 0),
(172, 'Luis Miguel63262816/382632197.png', 50, 1),
(173, 'Luis Miguel63262816/713596431.png', 50, 0),
(174, 'Luis Miguel63262816/74502821.png', 50, 0),
(178, 'Luis Miguel70647073/270702040.png', 52, 1),
(179, 'Luis Miguel70647073/545049206.png', 52, 0),
(180, 'Luis Miguel70647073/152229220.png', 52, 0),
(181, 'Realito69808323/931032845.png', 53, 1),
(182, 'Realito69808323/256850939.png', 53, 0),
(183, 'Realito69808323/221555511.png', 53, 0),
(184, 'mishi21949708/845101586.png', 54, 1),
(185, 'mishi21949708/440618994.png', 54, 0);

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
  `dbPreguntaRespuesta` varchar(100) DEFAULT NULL,
  `numPregunta` int(10) UNSIGNED NOT NULL,
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `idAnimal` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `respuestasadopcion`
--

INSERT INTO `respuestasadopcion` (`cod`, `respuesta`, `dbPreguntaRespuesta`, `numPregunta`, `idUsuario`, `idAnimal`) VALUES
(1, 'Me siento un poquis solo y me gustarÃ­a tener una mascota para darle amor', NULL, 1, 2, 49),
(2, 'si', 'Mi hijo', 2, 2, 49),
(3, 'si', 'Porque no funciona en niÃ±os', 3, 2, 49),
(4, 'si', 'Otro hijo', 4, 2, 49),
(5, 'Se fue con la mamÃ¡', NULL, 5, 2, 49),
(6, 'si', 'Porque en cada visita que me hagan, van a resolver cualquier duda que tenga y me va permitir mejorar', 6, 2, 49),
(7, '2', NULL, 7, 2, 49),
(8, 'si', NULL, 8, 2, 49),
(9, 'si', '11', 9, 2, 49),
(10, 'no', NULL, 10, 2, 49),
(11, 'si', NULL, 11, 2, 49),
(12, 'Se va con nosotros', NULL, 12, 2, 49),
(13, 'Le harÃ­a falta la persona que se fue', NULL, 13, 2, 49),
(14, '4', NULL, 14, 2, 49),
(15, 'Lindo', NULL, 15, 2, 49),
(16, 'si', NULL, 16, 2, 49),
(17, 'En la cama', NULL, 17, 2, 49),
(18, '1 hora diaria', NULL, 18, 2, 49),
(19, 'Metodos de control animal', NULL, 19, 2, 49),
(20, '1223354', NULL, 20, 2, 49),
(21, 'yo', NULL, 21, 2, 49),
(22, 'true,true,true,true,true,true,true,true,true', NULL, 22, 2, 49),
(23, 'si', NULL, 23, 2, 49),
(24, 'Alfonsi', '1234567', 24, 2, 49),
(25, 'si', NULL, 25, 2, 49),
(26, 'si', 'Porque es lo mejor para el animalito', 26, 2, 49),
(79, 'Me siento un poquis solo y me gustarÃ­a tener una mascota para darle amor', NULL, 1, 2, 49),
(80, 'si', 'Mi hijo', 2, 2, 49),
(81, 'no', 'Porque no funciona en niÃ±os', 3, 2, 49),
(82, 'si', 'Otro hijo', 4, 2, 49),
(83, 'Se fue con la mamÃ¡', NULL, 5, 2, 49),
(84, 'si', 'Porque en cada visita que me hagan, van a resolver cualquier duda que tenga y me va permitir mejorar', 6, 2, 49),
(85, '2', NULL, 7, 2, 49),
(86, 'si', NULL, 8, 2, 49),
(87, 'si', '11', 9, 2, 49),
(88, 'no', NULL, 10, 2, 49),
(89, 'si', NULL, 11, 2, 49),
(90, 'Se va con nosotros', NULL, 12, 2, 49),
(91, 'Le harÃ­a falta la persona que se fue', NULL, 13, 2, 49),
(92, '4', NULL, 14, 2, 49),
(93, 'Lindo', NULL, 15, 2, 49),
(94, 'si', NULL, 16, 2, 49),
(95, 'En la cama', NULL, 17, 2, 49),
(96, '1 hora diaria', NULL, 18, 2, 49),
(97, 'Metodos de control animal', NULL, 19, 2, 49),
(98, '213213213', NULL, 20, 2, 49),
(99, 'yo', NULL, 21, 2, 49),
(100, 'true,true,true,true,true,true,true,true,true', NULL, 22, 2, 49),
(101, 'si', NULL, 23, 2, 49),
(102, 'Alfonsi', '231321213321', 24, 2, 49),
(103, 'si', NULL, 25, 2, 49),
(104, 'si', 'Porque es lo mejor para el animalito', 26, 2, 49),
(105, 'Me siento un poquis solo y me gustarÃ­a tener una mascota para darle amor', NULL, 1, 3, 43),
(106, 'no', NULL, 2, 3, 43),
(107, 'no', 'No aplica', 3, 3, 43),
(108, 'si', 'Gato', 4, 3, 43),
(109, 'MuriÃ³ de vejez', NULL, 5, 3, 43),
(110, 'si', 'Porque en cada visita que me hagan, van a resolver cualquier duda que tenga y me va permitir mejorar', 6, 3, 43),
(111, '2', NULL, 7, 3, 43),
(112, 'si', NULL, 8, 3, 43),
(113, 'si', '11', 9, 3, 43),
(114, 'no', NULL, 10, 3, 43),
(115, 'si', NULL, 11, 3, 43),
(116, 'Se va con nosotros', NULL, 12, 3, 43),
(117, 'Le harÃ­a falta la persona que se fue', NULL, 13, 3, 43),
(118, '4', NULL, 14, 3, 43),
(119, 'Lindo', NULL, 15, 3, 43),
(120, 'si', NULL, 16, 3, 43),
(121, 'En la cama', NULL, 17, 3, 43),
(122, '1 hora diaria', NULL, 18, 3, 43),
(123, 'Metodos de control animal', NULL, 19, 3, 43),
(124, '277867', NULL, 20, 3, 43),
(125, 'yo', NULL, 21, 3, 43),
(126, 'true,true,true,true,true,true,true,true,true', NULL, 22, 3, 43),
(127, 'si', NULL, 23, 3, 43),
(128, 'Alfonsi', '3122315672', 24, 3, 43),
(129, 'si', NULL, 25, 3, 43),
(130, 'si', 'Porque es lo mejor para el animalito', 26, 3, 43);

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
(3, 2, 23, '2019-09-22', 'rechazada', 1, 'La solicitud de adoptar ha sido rechazada'),
(5, 2, 49, '2019-09-23', 'rechazada', 1, 'Se ha cancelado la solicitud de adopciÃ³n por mala diligenciaciÃ³n del formulario'),
(6, 4, 43, '2019-09-23', 'rechazada', 0, 'La solicitud de adoptar ha sido rechazada'),
(8, 3, 23, '2019-09-26', 'a un paso', 1, 'El administrador estÃ¡ mirando tus respuestas y agregando la firma de la fundaciÃ³n para que puedas adoptar'),
(9, 3, 24, '2019-09-29', 'espera', 0, NULL),
(10, 3, 43, '2019-09-29', 'adoptado', 1, 'Has completado el proceso de adopciÃ³n, ahora Mishi es tu mascota, debes venir a la fundaciÃ³n durante los proximos dÃ­as para llevar a tu mascota y llenarla de amor'),
(11, 3, 52, '2019-09-29', 'espera', 0, NULL);

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
(2, 'Juan David', 'Mosquera MuÃ±oz', 'juanDavid@gmail.com', '89213474897', '1000000000', '$2y$10$Mm94QGw18PaMXLNzfLwOGeiKw9NG1Fmi5w6gWjOw3RDhvDLvTrlBa', 'u', '', 'Casado', 'cll56#79A47', 'Daniel Amaya', 2147483647),
(3, 'Daniel', 'Amaya ', 'amayasad@gmail.com', '122134324', '432324234', '$2y$10$ohWsDPErI7So5MYiZDRS4OQcCbdSvNcg9cJpSG/Q/0NWAi1ZOAaKu', 'u', '', 'Soltero', 'cll56#79A49', 'Daniel Amaya', 2147483647),
(4, 'Sofia', 'Cano', 'qqqq@gmail.com', '232432', '434433', '$2y$10$jNGKQHgHzV2fhzQRvRDWHeWqU.GYtKdjCzO51oUu30jpauxvi6h9O', 'u', '', NULL, NULL, NULL, NULL),
(10, 'Luis Miguel', 'Zabala RendÃ³n', 'zabalaRenLuis@gmail.com', '2312321', '532312323', '$2y$10$diQXgl1JCjMio6fA1uTsfOCo6yzk.rL5gnv.KIU2Rwlb2qhnsBqyy', 'u', 'usuarios/zabalaRenLuis@gmail.com/fotoPerfil.png', NULL, NULL, NULL, NULL);

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
(1, 'canina', 'Rataviru', 0x416c2063756d706c697220342c203620792037206d65736573),
(2, 'felina', 'Neumococo', 0x416c2061c3b16f2c20616c2061c3b16f2079206d6564696f20792061206c6f7320352061c3b16f73),
(13, 'felina', 'felina', 0x54752063756572706f2065732074616e2070726f766f63616e7465),
(14, 'canina', 'AntiDengue', 0x50726576656e697220656c2064656e67756520656e206c6f73207065727269746f73),
(15, 'felina', 'AntiDengue', 0x506172612070726576656e697220656c2064656e67756520656e206c6f732067617469746f7320792074696772657320),
(18, 'canina', 'DengueAnti', 0x50617261206e6f206861636572206e6164612070616e610a);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adopciones`
--
ALTER TABLE `adopciones`
  ADD PRIMARY KEY (`numAdopcion`),
  ADD UNIQUE KEY `unique_idAnimalesAdoptados` (`idAnimalAdoptado`),
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
  ADD KEY `fk_USUAPA` (`idUsuario`),
  ADD KEY `fk_ANIAPA` (`idAnimal`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`numCita`),
  ADD KEY `fk_citasUsuarios` (`idUsuario`);

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
  MODIFY `numAdopcion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `animales`
--
ALTER TABLE `animales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `numCita` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compromisoesterilizacion`
--
ALTER TABLE `compromisoesterilizacion`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT de la tabla `preguntasadopcion`
--
ALTER TABLE `preguntasadopcion`
  MODIFY `numPregunta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `respuestasadopcion`
--
ALTER TABLE `respuestasadopcion`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de la tabla `solicitudesadopcion`
--
ALTER TABLE `solicitudesadopcion`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_citasUsuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `documentoslegales`
--
ALTER TABLE `documentoslegales`
  ADD CONSTRAINT `documentoslegales_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

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
-- Filtros para la tabla `solicitudesadopcion`
--
ALTER TABLE `solicitudesadopcion`
  ADD CONSTRAINT `solicitudesadopcion_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitudesadopcion_ibfk_2` FOREIGN KEY (`idAnimal`) REFERENCES `animales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
