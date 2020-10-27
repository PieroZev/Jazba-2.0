-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2020 a las 06:04:03
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_jazba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `confirmation_token`
--

CREATE TABLE `confirmation_token` (
  `tokenid` int(11) NOT NULL,
  `confirmation_token` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  `DNI` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_especialidad`
--

CREATE TABLE `tbl_especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `Descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_institucion`
--

CREATE TABLE `tbl_institucion` (
  `id_institucion` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_repoproyectos`
--

CREATE TABLE `tbl_repoproyectos` (
  `id_repositorio` int(11) NOT NULL,
  `DNI` int(8) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `upload_repo` longblob NOT NULL,
  `Descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_repoproyectosdetalles`
--

CREATE TABLE `tbl_repoproyectosdetalles` (
  `id_detalles` int(11) NOT NULL,
  `id_repositorio` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `fechahora_comentario` datetime NOT NULL,
  `num_likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id_role` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user`
--

CREATE TABLE `tbl_user` (
  `DNI` int(8) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `lastNameFather` varchar(255) NOT NULL,
  `lastNameMother` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(50) NOT NULL,
  `file` longblob NOT NULL,
  `is_enabled` varchar(50) NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user_roles`
--

CREATE TABLE `tbl_user_roles` (
  `users_dni` int(8) NOT NULL,
  `roles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `confirmation_token`
--
ALTER TABLE `confirmation_token`
  ADD PRIMARY KEY (`tokenid`),
  ADD KEY `DNI` (`DNI`);

--
-- Indices de la tabla `tbl_especialidad`
--
ALTER TABLE `tbl_especialidad`
  ADD PRIMARY KEY (`id_especialidad`);

--
-- Indices de la tabla `tbl_institucion`
--
ALTER TABLE `tbl_institucion`
  ADD PRIMARY KEY (`id_institucion`);

--
-- Indices de la tabla `tbl_repoproyectos`
--
ALTER TABLE `tbl_repoproyectos`
  ADD PRIMARY KEY (`id_repositorio`),
  ADD KEY `DNI` (`DNI`);

--
-- Indices de la tabla `tbl_repoproyectosdetalles`
--
ALTER TABLE `tbl_repoproyectosdetalles`
  ADD PRIMARY KEY (`id_detalles`),
  ADD KEY `id_repositorio` (`id_repositorio`);

--
-- Indices de la tabla `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id_role`) USING BTREE;

--
-- Indices de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`DNI`),
  ADD KEY `id_institucion` (`id_institucion`),
  ADD KEY `id_especialidad` (`id_especialidad`),
  ADD KEY `id_role` (`id_role`);

--
-- Indices de la tabla `tbl_user_roles`
--
ALTER TABLE `tbl_user_roles`
  ADD KEY `users_dni` (`users_dni`),
  ADD KEY `roles_id` (`roles_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_especialidad`
--
ALTER TABLE `tbl_especialidad`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_institucion`
--
ALTER TABLE `tbl_institucion`
  MODIFY `id_institucion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_repoproyectos`
--
ALTER TABLE `tbl_repoproyectos`
  MODIFY `id_repositorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_repoproyectosdetalles`
--
ALTER TABLE `tbl_repoproyectosdetalles`
  MODIFY `id_detalles` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `confirmation_token`
--
ALTER TABLE `confirmation_token`
  ADD CONSTRAINT `confirmation_token_ibfk_1` FOREIGN KEY (`DNI`) REFERENCES `tbl_user` (`DNI`);

--
-- Filtros para la tabla `tbl_repoproyectos`
--
ALTER TABLE `tbl_repoproyectos`
  ADD CONSTRAINT `tbl_repoproyectos_ibfk_1` FOREIGN KEY (`DNI`) REFERENCES `tbl_user` (`DNI`);

--
-- Filtros para la tabla `tbl_repoproyectosdetalles`
--
ALTER TABLE `tbl_repoproyectosdetalles`
  ADD CONSTRAINT `tbl_repoproyectosdetalles_ibfk_1` FOREIGN KEY (`id_repositorio`) REFERENCES `tbl_repoproyectos` (`id_repositorio`);

--
-- Filtros para la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_institucion`) REFERENCES `tbl_institucion` (`id_institucion`),
  ADD CONSTRAINT `tbl_user_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `tbl_role` (`id_role`),
  ADD CONSTRAINT `tbl_user_ibfk_3` FOREIGN KEY (`id_especialidad`) REFERENCES `tbl_especialidad` (`id_especialidad`);

--
-- Filtros para la tabla `tbl_user_roles`
--
ALTER TABLE `tbl_user_roles`
  ADD CONSTRAINT `tbl_user_roles_ibfk_1` FOREIGN KEY (`users_dni`) REFERENCES `tbl_user` (`DNI`),
  ADD CONSTRAINT `tbl_user_roles_ibfk_2` FOREIGN KEY (`roles_id`) REFERENCES `tbl_role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
