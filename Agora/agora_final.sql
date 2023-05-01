-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-04-2023 a las 19:37:36
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario`
--

CREATE TABLE `cuestionario` (
  `id_cuestionario` int(11) NOT NULL,
  `nombre_cuestionario` text NOT NULL,
  `tema` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_realizado` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `estado_cuestionario` int(11) NOT NULL,
  `duracion_cuestionario` time NOT NULL,
  `unidad_id` int(11) NOT NULL,
  `grado_materia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuestionario`
--

INSERT INTO `cuestionario` (`id_cuestionario`, `nombre_cuestionario`, `tema`, `descripcion`, `fecha_realizado`, `fecha_actualizacion`, `estado_cuestionario`, `duracion_cuestionario`, `unidad_id`, `grado_materia_id`) VALUES
(1, 'Aprendiendo reacciones quimicas', 'Conocer las reacciones quimicas', 'Conoceras y aprenderas de las reacciones quimicas', '2023-04-13 09:13:32', '2023-04-13 09:13:32', 1, '01:00:00', 2, 4),
(2, 'Seres vivos', 'Taxonomia de seres vivos', 'Aprenderas la taxonomia', '2023-04-13 09:21:49', '2023-04-13 09:21:49', 1, '01:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_departamento`) VALUES
(1, 'San Salvador'),
(2, 'La Libertad'),
(3, 'Chalatenango'),
(4, 'Cuscatlán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estudiante` int(11) NOT NULL,
  `nie` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(30) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `estado_estudiante` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `grado_id` int(11) NOT NULL,
  `institucion_id` int(11) NOT NULL,
  `munici_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `nie`, `fecha_nacimiento`, `genero`, `foto`, `telefono`, `estado_estudiante`, `usuario_id`, `grado_id`, `institucion_id`, `munici_id`) VALUES
(1, 'ce5020', '2000-01-10', 'femenino', 'link', '7129-1452', 1, 1, 5, 2, 19),
(2, 'cb5674', '1997-05-02', 'femenino', '', '7777-7777', 0, 2, 5, 2, 18),
(3, 'ir8742', '1998-04-16', 'femenino', '', '8888-8888', 1, 5, 5, 1, 15),
(4, '1234561', '1999-06-29', 'masculino', 'link', '7029-4567', 1, 6, 5, 1, 3),
(5, '2222222', '2001-11-25', 'masculino', 'link', '7029-3492', 1, 7, 5, 4, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `id_grado` int(11) NOT NULL,
  `grado_academico` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`id_grado`, `grado_academico`) VALUES
(1, 'séptimo'),
(2, 'octavo'),
(3, 'noveno'),
(4, 'primer año'),
(5, 'segundo año');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado_materia`
--

CREATE TABLE `grado_materia` (
  `id_grado_materia` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grado_materia`
--

INSERT INTO `grado_materia` (`id_grado_materia`, `grade_id`, `materia_id`) VALUES
(1, 1, 4),
(2, 2, 4),
(3, 3, 4),
(4, 4, 2),
(5, 5, 3),
(6, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insignia`
--

CREATE TABLE `insignia` (
  `id_insignia` int(11) NOT NULL,
  `nombre_insignia` text NOT NULL,
  `imagen_insignia` varchar(300) NOT NULL,
  `puntaje_max` float NOT NULL,
  `puntaje_min` float NOT NULL,
  `estado_insignia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `insignia`
--

INSERT INTO `insignia` (`id_insignia`, `nombre_insignia`, `imagen_insignia`, `puntaje_max`, `puntaje_min`, `estado_insignia`) VALUES
(1, 'Sin clasificación', 'url', 6000, 5001, 1),
(2, 'Bronce I', '', 251, 1000, 1),
(3, 'Bronce II', '', 1001, 2500, 1),
(4, 'Bronce III', '', 2501, 5000, 1),
(5, 'Plata I', 'url', 6000, 5001, 1),
(6, 'Plata II', 'url', 7000, 6001, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `id_institucion` int(11) NOT NULL,
  `nombre_institucion` varchar(250) NOT NULL,
  `tipo_institucion` varchar(50) NOT NULL,
  `estado_institucion` int(11) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `municipio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`id_institucion`, `nombre_institucion`, `tipo_institucion`, `estado_institucion`, `logo`, `municipio_id`) VALUES
(1, 'Colegio Angloamericano', 'privada', 1, '', 15),
(2, 'Centro Escolar Ciudad Credisa', 'pública', 1, '', 18),
(3, 'Colegio Luz de Israel', 'privada', 0, 'link', 15),
(4, 'Colegio Liceo Cristiano Revdo. Juan Bueno Métropolis', 'privada', 1, 'urlurl', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(300) NOT NULL,
  `estado_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `nombre_materia`, `estado_materia`) VALUES
(1, 'Biología', 1),
(2, 'Química', 1),
(3, 'Física', 1),
(4, 'Ciencias', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL,
  `nombre_municipio` varchar(100) NOT NULL,
  `departamento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `nombre_municipio`, `departamento_id`) VALUES
(1, 'Aguilares', 1),
(2, 'Apopa', 1),
(3, 'Ayutuxtepeque', 1),
(4, 'Cuscatancingo', 1),
(5, 'Ciudad Delgado', 1),
(6, 'El Paisanal', 1),
(7, 'Guazapa', 1),
(8, 'Ilopango', 1),
(9, 'Mejicanos', 1),
(10, 'Nejapa', 1),
(11, 'Panchimalco', 1),
(12, 'Rosario de Mora', 1),
(13, 'San Marcos', 1),
(14, 'San Martín', 1),
(15, 'San Salvador', 1),
(16, 'Santiago Texacuangos', 1),
(17, 'Santo Tómas', 1),
(18, 'Soyapango', 1),
(19, 'Tonacatepeque', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id_pregunta` int(11) NOT NULL,
  `pregunta` text NOT NULL,
  `puntaje_pregunta` float NOT NULL,
  `estado_pregunta` int(11) NOT NULL,
  `cuestionario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id_pregunta`, `pregunta`, `puntaje_pregunta`, `estado_pregunta`, `cuestionario_id`) VALUES
(1, 'Categoría taxonómica es cada uno de los grupos establecidospor la taxonomía, en donde se clasifican a los seres vivos. Estasse pueden llamar también\r\n\r\n ', 10, 1, 2),
(2, 'Una clave taxonómica es una guía que facilita a uninvestigador determinar la especie de un organismo o ejemplarque estudia. Por lo general estas son claves ', 10, 1, 2),
(3, 'El oxígeno gaseoso que se encuentra en el aire participa como reactivo de:', 20, 1, 1),
(4, '¿Durante las reacciones químicas la masa de los reactivos es la misma que la de los productos?', 20, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuacion`
--

CREATE TABLE `puntuacion` (
  `id_puntuacion` int(11) NOT NULL,
  `inicio_cuestionario` datetime NOT NULL,
  `final_cuestionario` datetime NOT NULL,
  `repuesta_id` int(11) NOT NULL,
  `puntaje_total` float NOT NULL,
  `cuestiona_id` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `insignia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `puntuacion`
--

INSERT INTO `puntuacion` (`id_puntuacion`, `inicio_cuestionario`, `final_cuestionario`, `repuesta_id`, `puntaje_total`, `cuestiona_id`, `estudiante_id`, `insignia_id`) VALUES
(1, '2023-04-13 09:56:24', '2023-04-13 09:56:24', 1, 0, 2, 1, 1),
(2, '2023-04-13 10:02:50', '2023-04-13 10:02:50', 2, 0, 2, 1, 1),
(3, '2023-04-13 10:05:16', '2023-04-13 10:05:16', 3, 0, 1, 2, 1),
(4, '2023-04-13 10:10:07', '2023-04-13 10:10:07', 4, 0, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resena`
--

CREATE TABLE `resena` (
  `id_resena` int(11) NOT NULL,
  `puntuacion` float NOT NULL,
  `comentario` text NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `estado_resena` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `resena`
--

INSERT INTO `resena` (`id_resena`, `puntuacion`, `comentario`, `fecha_registro`, `estado_resena`, `estudiante_id`) VALUES
(1, 4, 'Buena app', '2023-04-13 08:58:02', 1, 1),
(2, 3, 'Puede mejorar', '2023-04-13 08:58:02', 1, 2),
(3, 1, 'No es muy interactiva', '2023-04-13 08:59:29', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id_respuesta` int(11) NOT NULL,
  `opciones` text NOT NULL,
  `respuesta_correcta` text NOT NULL,
  `estado_respuesta` int(11) NOT NULL,
  `pregunta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id_respuesta`, `opciones`, `respuesta_correcta`, `estado_respuesta`, `pregunta_id`) VALUES
(1, 'A)Dominios,B)Reinos,C)Arboles filogenéticos,D)Taxones', 'B)Reinos', 1, 1),
(2, 'A)Dicotómicas,B)Monoatómicos,C)Monofónicas,D)Diatónicas', 'A)Dicotómicas', 1, 2),
(3, 'a)Dióxido de carbono,b)Hidrógeno,c) Reacción de combustión,d)Reacción de descomposición', 'a)Dióxido de carbono', 1, 3),
(4, 'a)No porque se combinan y tiene más peso,b)Si porque se juntan y se forma el producto,c)No porque son elementos del mismo peso,d)Si pesa lo mismo solo cambia el volumen', 'a)No porque se combinan y tiene más peso', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `tipo_rol` varchar(50) NOT NULL,
  `estado_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `tipo_rol`, `estado_rol`) VALUES
(1, 'administrador', 0),
(2, 'facilitador', 0),
(3, 'estudiante', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id_unidad` int(11) NOT NULL,
  `numero_unidad` int(11) NOT NULL,
  `nombre_unidad` text NOT NULL,
  `estado_unidad` int(11) NOT NULL,
  `mate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id_unidad`, `numero_unidad`, `nombre_unidad`, `estado_unidad`, `mate_id`) VALUES
(1, 1, 'Ciencia y Tecnología', 1, 4),
(2, 1, 'Reacciones quimicas', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `apellido` varchar(300) NOT NULL,
  `correo` varchar(300) NOT NULL,
  `password` varchar(280) NOT NULL,
  `estado_usuario` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `inicio_sesion` datetime NOT NULL,
  `ultimo_acceso` datetime NOT NULL,
  `tiempo_uso` time NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `correo`, `password`, `estado_usuario`, `fecha_registro`, `fecha_actualizacion`, `inicio_sesion`, `ultimo_acceso`, `tiempo_uso`, `rol_id`) VALUES
(1, 'Stephy ', 'Cabezas', 'astephyce@gmail.com', '12345', 1, '2023-04-13 08:16:34', '2023-04-13 08:16:34', '2023-04-13 08:16:34', '2023-04-13 08:16:34', '02:00:00', 3),
(2, 'Xenia', 'Barrera', 'xeniabarrera@gmail.com', 'barrera14', 1, '2023-04-13 08:18:47', '2023-04-13 08:18:47', '2023-04-13 08:18:47', '2023-04-13 08:18:47', '01:18:47', 3),
(3, 'Nancy', 'Ramirez', 'nancy@gmail.com', 'nancy154', 1, '2023-04-13 08:20:14', '2023-04-13 08:20:14', '2023-04-13 08:20:14', '2023-04-13 08:20:14', '03:20:14', 1),
(4, 'Elena', 'Umanzor', 'elena@gmail.com', '12345elena', 1, '2023-04-13 08:21:23', '2023-04-13 08:21:23', '2023-04-13 08:21:23', '2023-04-13 08:21:23', '02:21:24', 2),
(5, 'Mariana', 'Iraheta', 'mariana@gmail.com', 'mariana123', 1, '2023-04-13 08:22:33', '2023-04-13 08:22:33', '2023-04-13 08:22:33', '2023-04-13 08:22:33', '01:22:33', 3),
(6, 'Juan Carlos', 'Flores Escobar', 'juan.escobar@gmail.com', '123holi', 1, '2023-04-17 02:08:22', '2023-04-17 02:08:22', '2023-04-17 02:08:22', '2023-04-17 02:08:22', '02:00:00', 3),
(7, 'William Jafet', 'Amaya Campos', 'william@gmail.com', 'willi23', 1, '2023-04-17 08:23:50', '2023-04-17 08:23:50', '2023-04-17 08:23:50', '2023-04-17 08:23:50', '03:23:50', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD PRIMARY KEY (`id_cuestionario`),
  ADD KEY `unidad_id` (`unidad_id`),
  ADD KEY `grado_materia_id` (`grado_materia_id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD KEY `munici_id` (`munici_id`),
  ADD KEY `institucion_id` (`institucion_id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `grado_id` (`grado_id`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`id_grado`);

--
-- Indices de la tabla `grado_materia`
--
ALTER TABLE `grado_materia`
  ADD PRIMARY KEY (`id_grado_materia`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `materia_id` (`materia_id`);

--
-- Indices de la tabla `insignia`
--
ALTER TABLE `insignia`
  ADD PRIMARY KEY (`id_insignia`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`id_institucion`),
  ADD KEY `municipio_id` (`municipio_id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `departamento_id` (`departamento_id`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `cuestionario_id` (`cuestionario_id`);

--
-- Indices de la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
  ADD PRIMARY KEY (`id_puntuacion`),
  ADD KEY `repuesta_id` (`repuesta_id`),
  ADD KEY `cuestiona_id` (`cuestiona_id`),
  ADD KEY `estudiante_id` (`estudiante_id`),
  ADD KEY `insignia_id` (`insignia_id`);

--
-- Indices de la tabla `resena`
--
ALTER TABLE `resena`
  ADD PRIMARY KEY (`id_resena`),
  ADD KEY `estudiante_id` (`estudiante_id`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `pregunta_id` (`pregunta_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id_unidad`),
  ADD KEY `mate_id` (`mate_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  MODIFY `id_cuestionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `grado_materia`
--
ALTER TABLE `grado_materia`
  MODIFY `id_grado_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `insignia`
--
ALTER TABLE `insignia`
  MODIFY `id_insignia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `id_institucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  MODIFY `id_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
  MODIFY `id_puntuacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `resena`
--
ALTER TABLE `resena`
  MODIFY `id_resena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id_unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD CONSTRAINT `cuestionario_ibfk_1` FOREIGN KEY (`unidad_id`) REFERENCES `unidad` (`id_unidad`),
  ADD CONSTRAINT `cuestionario_ibfk_2` FOREIGN KEY (`grado_materia_id`) REFERENCES `grado_materia` (`id_grado_materia`);

--
-- Filtros para la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD CONSTRAINT `estudiante_ibfk_1` FOREIGN KEY (`munici_id`) REFERENCES `municipio` (`id_municipio`),
  ADD CONSTRAINT `estudiante_ibfk_2` FOREIGN KEY (`institucion_id`) REFERENCES `institucion` (`id_institucion`),
  ADD CONSTRAINT `estudiante_ibfk_3` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `estudiante_ibfk_4` FOREIGN KEY (`grado_id`) REFERENCES `grado` (`id_grado`);

--
-- Filtros para la tabla `grado_materia`
--
ALTER TABLE `grado_materia`
  ADD CONSTRAINT `grado_materia_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grado` (`id_grado`),
  ADD CONSTRAINT `grado_materia_ibfk_2` FOREIGN KEY (`materia_id`) REFERENCES `materia` (`id_materia`);

--
-- Filtros para la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD CONSTRAINT `institucion_ibfk_1` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id_municipio`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`id_departamento`);

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`cuestionario_id`) REFERENCES `cuestionario` (`id_cuestionario`);

--
-- Filtros para la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
  ADD CONSTRAINT `puntuacion_ibfk_1` FOREIGN KEY (`repuesta_id`) REFERENCES `respuesta` (`id_respuesta`),
  ADD CONSTRAINT `puntuacion_ibfk_2` FOREIGN KEY (`cuestiona_id`) REFERENCES `cuestionario` (`id_cuestionario`),
  ADD CONSTRAINT `puntuacion_ibfk_3` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiante` (`id_estudiante`),
  ADD CONSTRAINT `puntuacion_ibfk_4` FOREIGN KEY (`insignia_id`) REFERENCES `insignia` (`id_insignia`);

--
-- Filtros para la tabla `resena`
--
ALTER TABLE `resena`
  ADD CONSTRAINT `resena_ibfk_1` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiante` (`id_estudiante`);

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`pregunta_id`) REFERENCES `pregunta` (`id_pregunta`);

--
-- Filtros para la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD CONSTRAINT `unidad_ibfk_1` FOREIGN KEY (`mate_id`) REFERENCES `materia` (`id_materia`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
