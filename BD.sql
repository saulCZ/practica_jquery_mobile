-- Base de datos: `jquerymobile`
--
CREATE DATABASE IF NOT EXISTS `jquerymobile` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `jquerymobile`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE IF NOT EXISTS `alumnos` (
  `cod_alumno` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `curso` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`cod_alumno`, `nombre`, `curso`) VALUES
(1, 'Alumno 1', 1),
(2, 'Alumno 2', 3),
(3, 'Alumno 3', 1),
(4, 'Alumno 4', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `cod_curso` int(11) NOT NULL,
  `curso` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `siglas` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`cod_curso`, `curso`, `siglas`) VALUES
(1, 'Adimistracion de Sistemas Informaticos y Redes', 'ASIR'),
(2, 'Desarrollo de Aplicaciones Multiplataforma', 'DAM'),
(3, 'Desarrollo de Aplicaciones WEB', 'DAW'),
(4, 'Sistemas Microinformaticos y Redes', 'SMR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE IF NOT EXISTS `profesores` (
  `cod_prof` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`cod_prof`, `nombre`, `password`) VALUES
(1, 'saul', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'ruben', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

CREATE TABLE IF NOT EXISTS `valoraciones` (
  `cod_alumno` int(11) NOT NULL,
  `cod_curso` int(11) NOT NULL,
  `cod_prof` int(11) NOT NULL,
  `planteamiento` int(11) NOT NULL,
  `contenido` int(11) NOT NULL,
  `result_obtenidos` int(11) NOT NULL,
  `escrito` int(11) NOT NULL,
  `redaccion` int(11) NOT NULL,
  `organizacion` int(11) NOT NULL,
  `introduccion` int(11) NOT NULL,
  `desarrollo` int(11) NOT NULL,
  `conclusion` int(11) NOT NULL,
  `segur_entusias` int(11) NOT NULL,
  `entonacion` int(11) NOT NULL,
  `volumen` int(11) NOT NULL,
  `velocidad` int(11) NOT NULL,
  `vacilacion` int(11) NOT NULL,
  `pausas` int(11) NOT NULL,
  `muletillas` int(11) NOT NULL,
  `duracion` int(11) NOT NULL,
  `indumentaria` int(11) NOT NULL,
  `mirada` int(11) NOT NULL,
  `exp_facial` int(11) NOT NULL,
  `posicion` int(11) NOT NULL,
  `tics` int(11) NOT NULL,
  `atencion_publico` int(11) NOT NULL,
  `responder` int(11) NOT NULL,
  `nota_final` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`cod_alumno`), ADD KEY `curso` (`curso`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`cod_curso`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`cod_prof`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`cod_alumno`,`cod_curso`,`cod_prof`), ADD KEY `cod_alumno` (`cod_alumno`), ADD KEY `cod_curso` (`cod_curso`), ADD KEY `cod_prof` (`cod_prof`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `cod_alumno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `cod_curso` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `cod_prof` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`curso`) REFERENCES `cursos` (`cod_curso`);

--
-- Filtros para la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
ADD CONSTRAINT `valoraciones_ibfk_1` FOREIGN KEY (`cod_alumno`) REFERENCES `alumnos` (`cod_alumno`),
ADD CONSTRAINT `valoraciones_ibfk_2` FOREIGN KEY (`cod_prof`) REFERENCES `profesores` (`cod_prof`),
ADD CONSTRAINT `valoraciones_ibfk_3` FOREIGN KEY (`cod_curso`) REFERENCES `cursos` (`cod_curso`);
