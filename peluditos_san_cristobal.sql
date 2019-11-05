-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2019 a las 01:07:32
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

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
(2, 75, 15, '2019-11-01', NULL);

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
(71, 'Perry', 'canina', 'Bul Terrier', 'Blanco', 'M', '2019-01-29', 1, 0x556e206c696e646f207065727269746f2063616c6d61646f, 'San cristobal', 'Perry59666092'),
(72, 'Lola', 'canina', 'Misifus', 'Amarillo/blanco', 'M', '2018-06-12', 0, 0x556e6120676174697461206a75677565746f6e61, 'San cristobal', 'Lola33323674'),
(73, 'Halfonso', 'canina', 'Husky', 'Blanco', 'M', '2018-06-14', 0, 0x556e207065727269746f206a6f76656e2c2073616e6f2079206a75677565746f6e, 'San cristobal', 'Jalfonso73759285'),
(74, 'Cleo', 'canina', 'French Poodle', 'Blanco', 'F', '2018-06-06', 1, 0x5065727269746120656e636f6e747261646120656e206c61732063616c6c65732c20746f74616c6d656e746520726563757065726164612e, 'San cristobal', 'Cleo1362575'),
(75, 'Michy', 'felina', 'Misifus', 'cafÃ©', 'M', '2018-02-14', 1, 0x4d69636879206d69636879206d69636879, 'San cristobal', 'Michy7601429');

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
(23, 72),
(21, 72),
(34, 71);

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
  `copiaCedula` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documentoslegales`
--

INSERT INTO `documentoslegales` (`idUsuario`, `firma`, `copiaCedula`) VALUES
(15, 'usuarios/juanDavid@gmail.com/firma.png', 'usuarios/juanDavid@gmail.com/cedula.pdf'),
(40, 'usuarios/correo@gmail.com/firma.png', 'usuarios/correo@gmail.com/cedula.pdf');

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
(6, 'alimentos', 1, 'libras', 'comprobanteDonaciones/727836207.png', NULL, NULL),
(7, 'alimentos', 4556, 'unidades', 'comprobanteDonaciones/91464171.png', NULL, NULL),
(8, 'alimentos', 1, 'libras', 'comprobanteDonaciones/59382230.png', NULL, NULL),
(9, 'alimentos', 2, 'libras', 'comprobanteDonaciones/385350583.png', NULL, NULL),
(10, 'dinero', 100, 'pesos', 'comprobanteDonaciones/30084994.png', NULL, NULL),
(11, 'medicamentos', 20, 'libras', 'comprobanteDonaciones/584789514.png', NULL, NULL),
(12, 'alimentos', 1232, 'unidades', 'comprobanteDonaciones/198874183.png', NULL, NULL);

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
(1, 'Perry59666092/690648655.png', 71, 1),
(2, 'Perry59666092/380208498.png', 71, 0),
(3, 'Perry59666092/772392467.png', 71, 0),
(5, 'Lola33323674/436727404.png', 72, 1),
(6, 'Lola33323674/488369287.png', 72, 0),
(7, 'Jalfonso73759285/871348210.png', 73, 1),
(8, 'Jalfonso73759285/448002026.png', 73, 0),
(9, 'Jalfonso73759285/808690661.png', 73, 0),
(10, 'Cleo1362575/432102607.png', 74, 1),
(11, 'Cleo1362575/339087012.png', 74, 0),
(12, 'Cleo1362575/74660756.png', 74, 0),
(13, 'Cleo1362575/345872242.png', 74, 0),
(14, 'Michy7601429/584345879.png', 75, 0),
(15, 'Michy7601429/480617832.png', 75, 1),
(16, 'Michy7601429/41849576.png', 75, 0),
(27, 'Michy7601429/494351568.png', 75, 0),
(29, 'Michy7601429/162316107.png', 75, 0);

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
(157, 'Prueba ', NULL, 1, 15, 75),
(158, 'SÃ­', 'Prueba', 2, 15, 75),
(159, 'si', 'Prueba', 3, 15, 75),
(160, 'SÃ­', 'Prueba', 4, 15, 75),
(161, 'Prueba', NULL, 5, 15, 75),
(162, 'SÃ­', 'Prueba', 6, 15, 75),
(163, 'Prueba', NULL, 7, 15, 75),
(164, 'SÃ­', NULL, 8, 15, 75),
(165, 'si', '12', 9, 15, 75),
(166, 'Prueba', NULL, 10, 15, 75),
(167, 'si', 'Prueba', 11, 15, 75),
(168, 'Prueba', NULL, 12, 15, 75),
(169, 'Prueba', NULL, 13, 15, 75),
(170, '9', NULL, 14, 15, 75),
(171, 'Prueba', NULL, 15, 15, 75),
(172, 'SÃ­', NULL, 16, 15, 75),
(173, 'Prueba', NULL, 17, 15, 75),
(174, 'Prueba', NULL, 18, 15, 75),
(175, 'Prueba', NULL, 19, 15, 75),
(176, '123456', NULL, 20, 15, 75),
(177, 'Prueba', NULL, 21, 15, 75),
(178, 'false,false,false,true,true,false,true,false,false', NULL, 22, 15, 75),
(179, 'si', NULL, 23, 15, 75),
(180, 'Prueba', '123456', 24, 15, 75),
(181, 'si', NULL, 25, 15, 75),
(182, 'SÃ­', 'Prueba', 26, 15, 75),
(183, 'Prueba ', NULL, 1, 40, 73),
(184, 'SÃ­', 'Prueba', 2, 40, 73),
(185, 'si', 'Prueba', 3, 40, 73),
(186, 'SÃ­', 'Prueba', 4, 40, 73),
(187, 'Prueba', NULL, 5, 40, 73),
(188, 'SÃ­', 'Prueba', 6, 40, 73),
(189, 'Prueba', NULL, 7, 40, 73),
(190, 'SÃ­', NULL, 8, 40, 73),
(191, 'si', '12', 9, 40, 73),
(192, 'Prueba', NULL, 10, 40, 73),
(193, 'si', 'Prueba', 11, 40, 73),
(194, 'Prueba', NULL, 12, 40, 73),
(195, 'Prueba', NULL, 13, 40, 73),
(196, '9', NULL, 14, 40, 73),
(197, 'Prueba', NULL, 15, 40, 73),
(198, 'SÃ­', NULL, 16, 40, 73),
(199, 'Prueba', NULL, 17, 40, 73),
(200, 'Prueba', NULL, 18, 40, 73),
(201, 'Prueba', NULL, 19, 40, 73),
(202, '12314124', NULL, 20, 40, 73),
(203, 'Prueba', NULL, 21, 40, 73),
(204, 'false,false,false,true,true,false,false,false,false', NULL, 22, 40, 73),
(205, 'si', NULL, 23, 40, 73),
(206, 'Prueba', '1234567', 24, 40, 73),
(207, 'si', NULL, 25, 40, 73),
(208, 'SÃ­', 'Prueba', 26, 40, 73);

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
(14, 'Seguimiento a Juan David Mosquera MuÃ±oz', '2019-11-16 00:00:00', 0, 15, 75),
(15, 'Seguimiento', '2019-11-18 00:00:00', 0, 15, 75),
(16, 'Seguimiento 2', '2019-11-13 00:00:00', 0, 15, 75),
(17, 'Seguimiento 3', '2019-11-30 00:00:00', 0, 15, 75),
(18, 'Seguimiento 4', '2019-11-23 00:00:00', 0, 15, 75),
(19, 'Seguimiento 5', '2019-11-27 00:00:00', 0, 15, 75),
(20, 'Seguimiento 7', '2019-12-01 00:00:00', 0, 15, 75);

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
(26, 15, 75, '2019-11-01', 'adoptado', 1, 'Has completado el proceso de adopciÃ³n, ahora Michy es tu mascota, debes venir a la fundaciÃ³n durante los proximos dÃ­as para llevar a tu mascota y llenarla de amor â™¥, ademÃ¡s ya puedes ver los dias en los cuales se te fue asignado el seguimiento.'),
(27, 39, 71, '2019-11-01', 'a un paso', 1, 'EstÃ¡s a un paso de adoptar, debes llenar el formulario de adopciÃ³n para completar la adopciÃ³n'),
(28, 40, 73, '2019-11-01', 'procesando adopciÃ³n', 1, 'El administrador estÃ¡ mirando tus respuestas y agregando la firma de la fundaciÃ³n para que puedas adoptar'),
(29, 41, 72, '2019-11-01', 'a un paso', 1, 'EstÃ¡s a un paso de adoptar, debes llenar el formulario de adopciÃ³n para completar la adopciÃ³n'),
(30, 42, 72, '2019-11-01', 'a un paso', 1, 'EstÃ¡s a un paso de adoptar, debes llenar el formulario de adopciÃ³n para completar la adopciÃ³n'),
(31, 43, 71, '2019-11-01', 'a un paso', 1, 'EstÃ¡s a un paso de adoptar, debes llenar el formulario de adopciÃ³n para completar la adopciÃ³n'),
(32, 44, 73, '2019-11-01', 'a un paso', 1, 'EstÃ¡s a un paso de adoptar, debes llenar el formulario de adopciÃ³n para completar la adopciÃ³n'),
(33, 15, 71, '2019-11-01', 'a un paso', 1, 'EstÃ¡s a un paso de adoptar, debes llenar el formulario de adopciÃ³n para completar la adopciÃ³n'),
(34, 46, 73, '2019-11-01', 'a un paso', 1, 'EstÃ¡s a un paso de adoptar, debes llenar el formulario de adopciÃ³n para completar la adopciÃ³n'),
(35, 47, 71, '2019-11-01', 'a un paso', 1, 'EstÃ¡s a un paso de adoptar, debes llenar el formulario de adopciÃ³n para completar la adopciÃ³n'),
(36, 48, 71, '2019-11-01', 'a un paso', 1, 'EstÃ¡s a un paso de adoptar, debes llenar el formulario de adopciÃ³n para completar la adopciÃ³n'),
(37, 49, 72, '2019-11-01', 'a un paso', 1, 'EstÃ¡s a un paso de adoptar, debes llenar el formulario de adopciÃ³n para completar la adopciÃ³n');

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
(15, 'Juan David', 'Mosquera MuÃ±oz', 'juanDavid@gmail.com', '3117033212', '542439876', '$2y$10$LTGfV7RwnueXXmOMMcGG6.1IlGP01DevTI4fpDHFg8j9d4c4yAgya', 'u', 'usuarios/juanDavid@gmail.com/fotoPerfil.png', 'Soltero', 'Calle 14 con la 15', 'Comodoro Norrinton', 3812019),
(39, 'Jasbleidy', 'Zarrazola', 'jasbleidy200204@gmail.com', '3135060497', '1000441952', '$2y$10$hIsgDxxLQ29Dt7WWjtWN7uoN9.ApfXpyEIuPqgOnFDDXTjHjIJuHm', 'u', '', NULL, NULL, NULL, NULL),
(40, 'Daniel', 'Sebastian', 'correo@gmail.com', '12312311', '123124235', '$2y$10$K9EwELnG7qTZa9ODN7MqcOu0hxHPk8FNGZSkW147Lv2VpetN1CDcK', 'u', 'usuarios/correo@gmail.com/fotoPerfil.png', 'Soltero', 'Calle 14 con la 15', 'Comodoro Norrinton', 123123),
(41, 'RIve', 'Estrella', 'correo777@gmail.com', '323', '1000760120', '$2y$10$hkudBxMiv45ysfS06LKAB.Q08EgTqY9U8qEiFoIfpsGdYGibjWyTu', 'u', 'usuarios/correo777@gmail.com/fotoPerfil.png', NULL, NULL, NULL, NULL),
(42, 'SOfi', 'Estrella', 'fo@gmail.com', '78678', '3445345', '$2y$10$4bua4LC/E50NO27sjGZJ0OIjW67ZaWPasFKosYqKC6Pue9/xVRHlS', 'u', 'usuarios/fo@gmail.com/fotoPerfil.png', NULL, NULL, NULL, NULL),
(43, 'Alexander ', 'PinzÃ³n  CastaÃ±eda', 'alexpinzonc@gmail.com', '3113123610', '71747758', '$2y$10$Vny/Ektr948CkRAaX9TOneHguvdkROjQWJpcUwICrm0Sk2JTTJ446', 'u', '', NULL, NULL, NULL, NULL),
(44, 'Bulma', 'Estrella', 'correerffo@gmail.com', '323', '100056', '$2y$10$VAex8puUOUy.wZEezfyA/OLkqjn/wr5L6lnjz5es/myyF0RFmVGoW', 'u', '', NULL, NULL, NULL, NULL),
(45, 'Daniel', 'Amaya', 'correrwerewrweo@gmail.com', '323', '324435', '$2y$10$8dW5kKggfcoyZCburKpy9O364jqBVyt414qowelFkvHjYhh2oyE5i', 'u', '', NULL, NULL, NULL, NULL),
(46, 'Daniel', 'Amaya', 'correo777fgf@gmail.com', '323', '123456789087890', '$2y$10$A6cVhD3zCTt6gWsYFCNAwu2fNaLs/3s.cnX5YSTJCEEuRjMaykuIC', 'u', '', NULL, NULL, NULL, NULL),
(47, 'Bulma', 'Sebastian', 'correofgdf@gmail.com', '123', '1325467764', '$2y$10$6I/Fw8Oz50X9h1igv92u/uF.ejo3dYv1AcYm372PMmEhOATPmmewG', 'u', '', NULL, NULL, NULL, NULL),
(48, 'Daniel', 'Sebastian', 'corrgfgeo@gmail.com', '323', '1234567887', '$2y$10$vk7zfSDdHv.mZOWX311vHuNtZVJy6q2A5wnDP0UsrTLH6ksBxnpTC', 'u', '', NULL, NULL, NULL, NULL),
(49, 'Patricio', 'Amaya', 'Patricio23@correo.com', '123123', '123214545', '$2y$10$6CrBw2gTlZFIHSxo8s82UufH92pEa6DK/0/zANaMG.0cJ1VJOMYJK', 'u', 'usuarios/Patricio23@correo.com/fotoPerfil.png', NULL, NULL, NULL, NULL);

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
(21, 'felina', 'Rabia', 0x50617261206375726172206c6120726162696120656e206c6f7320616e696d616c6573),
(23, 'felina', 'Rataviru', 0x4f6967612063616e74696e65726f2073697276616d65206f74726f2061677561726469656e7465),
(34, 'canina', 'Es', 0x736461736461);

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
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `numAdopcion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `animales`
--
ALTER TABLE `animales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `compromisoesterilizacion`
--
ALTER TABLE `compromisoesterilizacion`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `donaciones`
--
ALTER TABLE `donaciones`
  MODIFY `iddonacion` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `preguntasadopcion`
--
ALTER TABLE `preguntasadopcion`
  MODIFY `numPregunta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `respuestasadopcion`
--
ALTER TABLE `respuestasadopcion`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `solicitudesadopcion`
--
ALTER TABLE `solicitudesadopcion`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
