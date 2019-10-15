-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2019 a las 22:13:01
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
(1, 62, 15, '2019-10-13', NULL);

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
(63, 'Mishi', 'felina', 'Egipcio', 'Morado', 'M', '2018-05-09', 1, 0x5265616c206168737461206c61206d7565727465, 'Calle', 'Mishi37460585');

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
(21, 63);

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
(16, 'usuarios/danytf2103@gmail.com/firma.png', 'usuarios/danytf2103@gmail.com/cedula.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donaciones`
--

CREATE TABLE `donaciones` (
  `iddonacion` int(11) NOT NULL,
  `donacion` varchar(255) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `valor` varchar(255) DEFAULT NULL,
  `ruta_imagen` varchar(255) DEFAULT NULL,
  `mensaje` text DEFAULT NULL
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(0, '', '', '2019-10-15 00:00:00', '2019-10-16 00:00:00'),
(0, '21321', '#0071c5', '2019-10-15 00:00:00', '2019-10-16 00:00:00');

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
(5, 'Mishi37460585/728599478.png', 63, 0);

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
(52, 'SÃ­', 'Porque es lo mejor para el animalito', 26, 16, 63);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `cod` int(10) UNSIGNED NOT NULL,
  `visita` varchar(30) NOT NULL,
  `fechaVisita` datetime NOT NULL,
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `idAnimal` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`cod`, `visita`, `fechaVisita`, `idUsuario`, `idAnimal`) VALUES
(1, 'Visita 1 husky', '2019-10-15 10:21:02', 15, 62),
(2, 'lkjlk', '2019-10-22 00:00:00', 15, 62),
(3, 'lkjlk', '2019-10-22 00:00:00', 15, 62),
(4, '21321', '2019-10-09 00:00:00', 15, 62),
(5, '21321', '2019-10-09 00:00:00', 15, 62);

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
(1, 15, 62, '2019-10-13', 'adoptado', 0, 'Has completado el proceso de adopciÃ³n, ahora Toby es tu mascota, debes venir a la fundaciÃ³n durante los proximos dÃ­as para llevar a tu mascota y llenarla de amor'),
(2, 16, 63, '2019-10-13', 'procesando adopciÃ³n', 1, 'El administrador estÃ¡ mirando tus respuestas y agregando la firma de la fundaciÃ³n para que puedas adoptar');

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
(15, 'Juan David', 'Mosquera MuÃ±oz', 'juanDavid@gmail.com', '3117033212', '542439876', '$2y$10$LTGfV7RwnueXXmOMMcGG6.1IlGP01DevTI4fpDHFg8j9d4c4yAgya', 'u', 'usuarios/juanDavid@gmail.com/fotoPerfil.png', 'Casado', 'cll56#79A47', 'Daniel Amaya', 31212),
(16, 'Daniel', 'Amaya Arango', 'danytf2103@gmail.com', '3012345434', '1000557673', '$2y$10$qJJUaKXim4QvupGaWhbxKOA4Ox.KN.qSKJbEmJCeQNajsxttFw5yW', 'u', 'usuarios/danytf2103@gmail.com/fotoPerfil.png', 'Casado', 'sdfdsfdsf', 'Daniel Amaya', 2147483647);

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
(21, 'felina', 'Rabia', 0x50617261206375726172206c6120726162696120656e206c6f7320616e696d616c6573);

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
  MODIFY `numAdopcion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `animales`
--
ALTER TABLE `animales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `compromisoesterilizacion`
--
ALTER TABLE `compromisoesterilizacion`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `preguntasadopcion`
--
ALTER TABLE `preguntasadopcion`
  MODIFY `numPregunta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `respuestasadopcion`
--
ALTER TABLE `respuestasadopcion`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `solicitudesadopcion`
--
ALTER TABLE `solicitudesadopcion`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
