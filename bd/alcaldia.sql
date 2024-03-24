-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-10-2022 a las 03:59:12
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alcaldia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alcalde`
--

CREATE TABLE `alcalde` (
  `id` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `subtitulo` varchar(300) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `etiqueta1` varchar(200) NOT NULL,
  `etiqueta2` varchar(200) NOT NULL,
  `ruta` text NOT NULL,
  `descripcion_ruta` varchar(300) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `ruta` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_conociendo_carirubana`
--

CREATE TABLE `categoria_conociendo_carirubana` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `icono` varchar(200) NOT NULL,
  `unico` varchar(50) NOT NULL,
  `ruta` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_eventos`
--

CREATE TABLE `categoria_eventos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_noticias`
--

CREATE TABLE `categoria_noticias` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conociendo_carirubana_imagenes`
--

CREATE TABLE `conociendo_carirubana_imagenes` (
  `id` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `id_conociendo_carirubana` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_usuario`
--

CREATE TABLE `detalle_usuario` (
  `id` int(11) NOT NULL,
  `documento` varchar(20) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `fecha_nac` date NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `direccion` text NOT NULL,
  `nacionalidad` varchar(2) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_usuario`
--

INSERT INTO `detalle_usuario` (`id`, `documento`, `nombre`, `apellido`, `fecha_nac`, `telefono`, `correo`, `direccion`, `nacionalidad`, `id_usuario`) VALUES
(1, '222', 'Super', 'Usuario', '2022-10-18', '0000000', 'hola@gmail.com', 'La puerta', 'V', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `efemerides`
--

CREATE TABLE `efemerides` (
  `id` int(11) NOT NULL,
  `titulo` varchar(70) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `url` varchar(300) NOT NULL,
  `ruta` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entes`
--

CREATE TABLE `entes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(80) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `icono` varchar(100) NOT NULL,
  `nombre_cordinador` varchar(70) NOT NULL,
  `telefono_cordinador` varchar(70) NOT NULL,
  `correo_cordinador` varchar(90) NOT NULL,
  `pagina_web` varchar(150) NOT NULL,
  `direccion_fisica` varchar(150) NOT NULL,
  `horario_administrativo` varchar(150) NOT NULL,
  `horario_publico` varchar(150) NOT NULL,
  `numero_emergencia` varchar(100) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `ruta` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entes_descentralizados_documentos`
--

CREATE TABLE `entes_descentralizados_documentos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `ruta` text NOT NULL,
  `id_entes_descentralizados` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `descripcion` varchar(800) NOT NULL,
  `id_categoria` varchar(100) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(50) NOT NULL,
  `telefono_organizador` varchar(100) NOT NULL,
  `correo_organizador` varchar(100) NOT NULL,
  `nombre_organizador` varchar(100) NOT NULL,
  `latitud` varchar(100) NOT NULL,
  `longitud` varchar(100) NOT NULL,
  `ruta` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `documento` text NOT NULL,
  `ruta` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `periodista` varchar(70) NOT NULL,
  `fotografo` varchar(100) NOT NULL,
  `ruta` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias_principales_imagenes`
--

CREATE TABLE `noticias_principales_imagenes` (
  `id` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `id_noticias` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nuevos_pedidos`
--

CREATE TABLE `nuevos_pedidos` (
  `id` int(11) NOT NULL,
  `columna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenanzas`
--

CREATE TABLE `ordenanzas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `ruta` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisologia`
--

CREATE TABLE `permisologia` (
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permisologia`
--

INSERT INTO `permisologia` (`id`, `descripcion`, `status`) VALUES
(1, 'banner', 1),
(2, 'alcalde', 1),
(3, 'tramites', 1),
(4, 'noticias', 1),
(5, 'turismo', 1),
(6, 'eventos', 1),
(7, 'entes', 1),
(8, 'ordenanzas', 1),
(9, 'semanario', 1),
(10, 'libros', 1),
(11, 'efemerides', 1),
(12, 'categorias', 1),
(13, 'configuracion', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_permisologia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `id_rol`, `id_permisologia`) VALUES
(1, 1, 1),
(2, 1, 2),
(15, 1, 3),
(16, 1, 4),
(17, 1, 5),
(18, 1, 6),
(19, 1, 7),
(20, 1, 8),
(21, 1, 9),
(22, 1, 10),
(23, 1, 11),
(24, 1, 12),
(25, 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `descripcion`, `status`) VALUES
(1, 'superusuario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semanario`
--

CREATE TABLE `semanario` (
  `id` int(11) NOT NULL,
  `titulo` varchar(300) NOT NULL,
  `ruta` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites`
--

CREATE TABLE `tramites` (
  `id` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `descripcion` mediumtext NOT NULL,
  `categoria` varchar(250) NOT NULL,
  `icono` varchar(100) NOT NULL,
  `nombre_cordinador` varchar(100) NOT NULL,
  `telefono_cordinador` varchar(70) NOT NULL,
  `correo_cordinador` varchar(90) NOT NULL,
  `pagina_web` varchar(150) NOT NULL,
  `direccion_fisica` varchar(150) NOT NULL,
  `horario_administrativo` varchar(150) NOT NULL,
  `horario_publico` varchar(150) NOT NULL,
  `numero_emergencia` varchar(60) NOT NULL,
  `twitter` varchar(70) NOT NULL,
  `facebook` varchar(70) NOT NULL,
  `instagram` varchar(70) NOT NULL,
  `ruta` text NOT NULL,
  `ruta_detalle` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites_y_servicios_documentos`
--

CREATE TABLE `tramites_y_servicios_documentos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `ruta` text NOT NULL,
  `id_tramites_y_servicios` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turismo`
--

CREATE TABLE `turismo` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `id_categoria` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `horario` varchar(50) NOT NULL,
  `entrada` varchar(50) NOT NULL,
  `ruta` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `registro` date NOT NULL,
  `id_rol` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `clave`, `registro`, `id_rol`, `status`) VALUES
(1, 'superusuario', '123456', '2022-10-18', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alcalde`
--
ALTER TABLE `alcalde`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_conociendo_carirubana`
--
ALTER TABLE `categoria_conociendo_carirubana`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_eventos`
--
ALTER TABLE `categoria_eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria_noticias`
--
ALTER TABLE `categoria_noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `conociendo_carirubana_imagenes`
--
ALTER TABLE `conociendo_carirubana_imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_usuario`
--
ALTER TABLE `detalle_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `efemerides`
--
ALTER TABLE `efemerides`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entes`
--
ALTER TABLE `entes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entes_descentralizados_documentos`
--
ALTER TABLE `entes_descentralizados_documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `noticias_principales_imagenes`
--
ALTER TABLE `noticias_principales_imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenanzas`
--
ALTER TABLE `ordenanzas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisologia`
--
ALTER TABLE `permisologia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_permisologia` (`id_permisologia`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `semanario`
--
ALTER TABLE `semanario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tramites`
--
ALTER TABLE `tramites`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tramites_y_servicios_documentos`
--
ALTER TABLE `tramites_y_servicios_documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turismo`
--
ALTER TABLE `turismo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alcalde`
--
ALTER TABLE `alcalde`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `categoria_conociendo_carirubana`
--
ALTER TABLE `categoria_conociendo_carirubana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categoria_eventos`
--
ALTER TABLE `categoria_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categoria_noticias`
--
ALTER TABLE `categoria_noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `conociendo_carirubana_imagenes`
--
ALTER TABLE `conociendo_carirubana_imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_usuario`
--
ALTER TABLE `detalle_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `efemerides`
--
ALTER TABLE `efemerides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `entes`
--
ALTER TABLE `entes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `entes_descentralizados_documentos`
--
ALTER TABLE `entes_descentralizados_documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `noticias_principales_imagenes`
--
ALTER TABLE `noticias_principales_imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `ordenanzas`
--
ALTER TABLE `ordenanzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permisologia`
--
ALTER TABLE `permisologia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `semanario`
--
ALTER TABLE `semanario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tramites`
--
ALTER TABLE `tramites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tramites_y_servicios_documentos`
--
ALTER TABLE `tramites_y_servicios_documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `turismo`
--
ALTER TABLE `turismo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_usuario`
--
ALTER TABLE `detalle_usuario`
  ADD CONSTRAINT `detalle_usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`id_permisologia`) REFERENCES `permisologia` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
