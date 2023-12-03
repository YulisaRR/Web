CREATE DATABASE codingcup;
use codingcup;

--
-- Estructura de tabla para la tabla `concurso`
--

CREATE TABLE `concurso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `nombreEquipo` varchar(30) NOT NULL,
  `estudiante1` varchar(40) NOT NULL,
  `estudiante2` varchar(40) NOT NULL,
  `estudiante3` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `nombreEquipo`, `estudiante1`, `estudiante2`, `estudiante3`) VALUES
(1, 'Los papitos de uriangato', 'Juan yahir Duran Ruiz', 'Juan yahir Duran Ruiz', 'Juan yahir Duran Ruiz'),
(2, 'El equipo dinamica', 'Shrek primero', 'Shrek Segundo', 'Shrek Tercer'),
(3, 'Los del ITSUR', 'Diego Torres Zavala', 'Fernando Jose Tenorio', 'Manuel Lopez Obrador'),
(4, 'Los de yuriria', 'Yusila Ramirez Tinoco', 'La carpa salada', 'La laguna de yuriria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(150) NOT NULL,
  `nombre` varchar(159) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `institucion` varchar(150) NOT NULL,
  `tipo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `password`, `institucion`, `tipo`) VALUES
(1, 'Juan Yahir Duran Ruiz', 'dd@hotmail.com', '123456', 'Instituto Tecnológico de Acapulco', 'Coach'),
(2, 'Jovany Molina', 'jovanymolina822@gmail.com', '123123123', 'Instituto Tecnológico Superior del Sur de Guanajuato', 'Administrador'),
(14, 'aaaaaaaaaaa asasa', 'dsadhj@gma.com', '123123', 'tyu ghjsdjk sadhjas', ''),
(15, 'popopo', 'sdasdjk@gmai.com', '123123', 'sadj sdjkj s', 'Coach'),
(16, 'Roberto Martinez ', 'correosDeMexico@gmail.com', '123123', 'itsur', 'Coach');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `concurso`
--
ALTER TABLE `concurso`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `concurso`
--
ALTER TABLE `concurso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
