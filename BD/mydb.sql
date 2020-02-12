-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2020 a las 22:45:49
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `idChat` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `contenido` varchar(200) DEFAULT NULL,
  `remitente` varchar(45) DEFAULT NULL,
  `grupo_idgrupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`idChat`, `Fecha`, `contenido`, `remitente`, `grupo_idgrupo`) VALUES
(1, '2020-02-12', 'holaa', 'pruebna', 100),
(12, '2020-02-12', 'sdasdasasssssssssssssssssssssssssssss \\n sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 'jose', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `NombreCliente` varchar(50) DEFAULT NULL,
  `ApellidoCliente` varchar(45) DEFAULT NULL,
  `CedulaCliente` varchar(8) DEFAULT NULL,
  `TelefonoCliente` varchar(8) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  `CorreoCliente` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `NombreCliente`, `ApellidoCliente`, `CedulaCliente`, `TelefonoCliente`, `Foto`, `CorreoCliente`) VALUES
(1234, 'admin', 'admin', '12345678', '12345678', NULL, ''),
(1236, 'Miler', 'Rojas', '44324234', '6482560', 'images/fotos_perfil/perfil.jpg', 'milerrojassiles@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `idgrupo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`idgrupo`, `nombre`) VALUES
(2, 'jose'),
(100, 'amigos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_has_usuarios`
--

CREATE TABLE `grupo_has_usuarios` (
  `grupo_idgrupo` int(11) NOT NULL,
  `usuarios_idUsuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo_has_usuarios`
--

INSERT INTO `grupo_has_usuarios` (`grupo_idgrupo`, `usuarios_idUsuarios`) VALUES
(100, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `idMensaje` int(11) NOT NULL,
  `para` varchar(45) DEFAULT NULL,
  `Remitente` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `Mensaje` varchar(500) DEFAULT NULL,
  `FechaEnvio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `NombreUsuario` varchar(50) DEFAULT NULL,
  `PassUsuario` varchar(150) DEFAULT NULL,
  `NivelUsuario` int(11) DEFAULT NULL,
  `Codigo` int(11) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `NombreUsuario`, `PassUsuario`, `NivelUsuario`, `Codigo`, `Foto`) VALUES
(2, 'admin', '1234', 1, 1234, 'images/fotos_perfil/perfil.jpg'),
(10, 'Miler', '1234', 2, 1236, 'images/fotos_perfil/perfil.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`idChat`),
  ADD KEY `fk_mensajes_grupo_idx` (`grupo_idgrupo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`idgrupo`);

--
-- Indices de la tabla `grupo_has_usuarios`
--
ALTER TABLE `grupo_has_usuarios`
  ADD PRIMARY KEY (`grupo_idgrupo`,`usuarios_idUsuarios`),
  ADD KEY `fk_grupo_has_usuarios_usuarios1_idx` (`usuarios_idUsuarios`),
  ADD KEY `fk_grupo_has_usuarios_grupo1_idx` (`grupo_idgrupo`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`idMensaje`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `idChat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1237;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `idMensaje` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `fk_mensajes_grupo` FOREIGN KEY (`grupo_idgrupo`) REFERENCES `grupo` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grupo_has_usuarios`
--
ALTER TABLE `grupo_has_usuarios`
  ADD CONSTRAINT `fk_grupo_has_usuarios_grupo1` FOREIGN KEY (`grupo_idgrupo`) REFERENCES `grupo` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_grupo_has_usuarios_usuarios1` FOREIGN KEY (`usuarios_idUsuarios`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
