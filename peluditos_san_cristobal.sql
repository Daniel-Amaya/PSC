-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-09-2019 a las 18:23:34
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
(2, 17, 2, '2019-03-05', NULL);

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
  `edad` int(11) NOT NULL,
  `esterilizado` tinyint(1) NOT NULL,
  `descripcion` tinyblob NOT NULL,
  `procedencia` varchar(30) NOT NULL,
  `carpeta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `animales`
--

INSERT INTO `animales` (`id`, `nombre`, `especie`, `raza`, `color`, `sexo`, `edad`, `esterilizado`, `descripcion`, `procedencia`, `carpeta`) VALUES
(17, 'Perry', 'Perro', 'pitbull', 'negro', 'F', 2019, 1, 0x457320756e20706f71756973206c6f636f206e616461206dc3a1732c20657374612070727565626120646562652073616c6972206d656c6974696361, 'medellÃ­n Belen Altavista', 'Perry83638987'),
(23, 'Hunsky', 'Gato', 'Egipcio', 'Morado', 'M', 2014, 1, 0x416c6761726574656d656e746520686f79206d6920706170c3a1, 'Robledo Bello Horizonte', 'Hunsky108567285'),
(24, 'Bebesita', 'Perro', 'Cruce', 'Morado', 'F', 2015, 0, 0x536973697369736973697320636c6172656f20636c61c3b1617320646b6a617364206b6a666473206a666a736620786a686973662076646a66, 'Robledo Bello Horizonte', 'Bebesita32921580'),
(38, 'mishi', 'canina', 'Pitbull', 'CafÃ©', 'M', 2018, 1, 0x776572666466737364, 'Robledo Villa SofÃ­a', 'mishi12618800'),
(41, 'Luis Miguel', 'canina', 'Cruce', 'Morado', 'F', 2017, 1, 0x6b6c6a6c6b6a6b6c6a, 'Robledo Villa SofÃ­a', 'Luis Miguel65565197'),
(42, 'Hunsky', 'canina', 'Pitbull', 'red', 'F', 2016, 1, 0x72746767, 'Robledo Bello Horizonte', 'Hunsky103984969'),
(43, 'Mishi', 'felina', 'Egipcio', 'Morado', 'M', 2018, 1, 0x74616b692074616b692c2074616b692074616b692072756d6261, 'Robledo Bello Horizonte', 'Mishi26464047'),
(45, 'Dulce', 'canina', 'Cruce', 'Blanco', 'F', 2017, 1, 0x415364736164, 'Robledo Villa SofÃ­a', 'Dulce62954265'),
(46, 'Bills', 'felina', 'Egipcio', 'Morado', 'M', 2018, 1, 0x736467676664646467, 'fggfdg', 'Bills66650523'),
(47, 'Luis Miguel', 'canina', 'Pitbull', 'Morado', 'M', 2017, 1, 0x736466667364667364, 'Robledo Bello Horizonte', 'Luis Miguel55309034');

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
(1, 42),
(14, 42),
(13, 43),
(15, 43),
(14, 45),
(14, 45),
(14, 47);

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
(69, 'Perry83638987/691627504.png', 17, 0),
(70, 'Perry83638987/74274343.png', 17, 0),
(71, 'Hunsky108567285/551395160.png', 23, 0),
(72, 'Hunsky108567285/314345849.png', 23, 0),
(74, 'Bebesita32921580/720249749.png', 24, 0),
(77, 'Bebesita32921580/10119535.png', 24, 1),
(78, 'Bebesita32921580/10516368.png', 24, 0),
(79, 'Bebesita32921580/327639399.png', 24, 0),
(121, 'mishi12618800/300617036.png', 38, 0),
(122, 'mishi12618800/640312766.png', 38, 1),
(123, 'mishi12618800/815016171.png', 38, 0),
(127, 'Luis Miguel65565197/300478373.png', 41, 1),
(128, 'Hunsky103984969/374387715.png', 42, 0),
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
(141, 'Luis Miguel55309034/477698675.png', 47, 1),
(142, 'Luis Miguel55309034/733681122.png', 47, 1),
(144, 'Perry83638987/500996034.png', 17, 0),
(145, 'Perry83638987/488412745.png', 17, 0),
(147, 'Perry83638987/207527761.png', 17, 0),
(150, 'Hunsky108567285/583503175.png', 23, 0),
(151, 'Hunsky108567285/170824167.png', 23, 1),
(152, 'Hunsky108567285/61645907.png', 23, 0),
(153, 'Hunsky108567285/818591999.png', 23, 0),
(155, 'Mishi26464047/8540728.png', 43, 1),
(157, 'Mishi26464047/87755319.png', 43, 0),
(158, 'Mishi26464047/698723061.png', 43, 0),
(159, 'Mishi26464047/783129734.png', 43, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntasadopcion`
--

CREATE TABLE `preguntasadopcion` (
  `numPregunta` int(10) UNSIGNED NOT NULL,
  `pregunta` blob NOT NULL,
  `siOno` tinyint(1) NOT NULL DEFAULT 0,
  `dbPregunta` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntasadopcion`
--

INSERT INTO `preguntasadopcion` (`numPregunta`, `pregunta`, `siOno`, `dbPregunta`) VALUES
(1, 0xc2bf506f72207175c3a92064657365612061646f7074617220756e61206d6173636f74613f, 0, NULL),
(2, 0xc2bf41637475616c6d656e7465207469656e65206f74726f7320616e696d616c69746f733f, 0, NULL),
(3, 0xc2bf5369206c6f73207469656e652c20657374c3a16e206573746572696c697a61646f733f, 0, NULL),
(4, 0x416e746572696f726d656e74652068612074656e69646f206f74726f7320616e696d616c69746f733f, 0, NULL),
(5, 0xc2bf5175c3a920667565206c6f2071756520706173c3b320636f6e20c3a96c2f656c6c6f733f, 0, NULL),
(6, 0xc2bf457374c3a1206465206163756572646f20656e20717565207365206861676120756e61207669736974612070657269c3b364696361206120737520646f6d6963696c696f20706172612076657220636f6d6f20736520656e6375656e74726120656c20616e696d616c69746f2061646f707461646f3f, 0, NULL),
(7, 0xc2bf4375616e74617320706572736f6e617320766976656e20656e20737520636173613f, 0, NULL),
(8, 0xc2bf457374c3a16e20746f646f73206465206163756572646f20656e2061646f707461723f, 0, NULL),
(9, 0xc2bf486179206e69c3b16f7320656e20636173613f, 0, NULL),
(10, 0xc2bf416c677569656e20717565207669766120636f6e207573746564657320657320616cc3a9726769636f2061206c6f7320616e696d616c6573206f2073756672652064652061736d613f, 0, NULL),
(11, 0x456e206361736f2064652061716c75696c65722c20c2bf53757320617272656e6461646f726573207065726d6974656e20616e696d616c69746f7320656e206c612063617361206f206170617274616d656e746f3f, 0, NULL),
(12, 0x536920706f7220616c67c3ba6e206d6f7469766f2074757669657261207175652063616d6269617220646520646f6d6963696c696f2c20c2bf5175c3a9207061736172c3ad6120636f6e20656c20616e696d616c69746f3f, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestasadopcion`
--

CREATE TABLE `respuestasadopcion` (
  `cod` int(10) UNSIGNED NOT NULL,
  `respuesta` blob NOT NULL,
  `numPregunta` int(10) UNSIGNED NOT NULL,
  `idUsuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudesadopcion`
--

CREATE TABLE `solicitudesadopcion` (
  `cod` int(10) UNSIGNED NOT NULL,
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `fechaSolicitud` date NOT NULL,
  `idAnimal` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `foto` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `correo`, `telefono`, `cedula`, `password`, `rol`, `foto`) VALUES
(1, 'michy', 'batsuayi', 'michy21@gmail.com', '2213231', '23424234', '$2y$10$zQiTa.Em5LJ0cl6YxLGjKesx0RBk3lhHmJqHzN5d.RsVn0hRtJe8a', 'a', ''),
(2, 'Juan David', 'Mosquera MuÃ±oz', 'juanDavid@gmail.com', '89213474897', '1000000000', '$2y$10$Mm94QGw18PaMXLNzfLwOGeiKw9NG1Fmi5w6gWjOw3RDhvDLvTrlBa', 'u', ''),
(3, 'Daniel', 'Amaya ', 'amayasad@gmail.com', '122134324', '432324234', '$2y$10$ohWsDPErI7So5MYiZDRS4OQcCbdSvNcg9cJpSG/Q/0NWAi1ZOAaKu', 'u', ''),
(4, 'Sofia', 'Cano', 'sdsdad@gmail.com', '232432', '434433', '$2y$10$jNGKQHgHzV2fhzQRvRDWHeWqU.GYtKdjCzO51oUu30jpauxvi6h9O', 'u', '');

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

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
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT de la tabla `preguntasadopcion`
--
ALTER TABLE `preguntasadopcion`
  MODIFY `numPregunta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `respuestasadopcion`
--
ALTER TABLE `respuestasadopcion`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitudesadopcion`
--
ALTER TABLE `solicitudesadopcion`
  MODIFY `cod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
