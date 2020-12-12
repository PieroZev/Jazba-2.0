-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2020 a las 07:16:39
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
-- Base de datos: `jazbadb`
--
CREATE DATABASE jazbadb character set utf8;

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
-- Estructura de tabla para la tabla `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `name`, `username`, `password`, `id_role`) VALUES
(1, 'Saul', 'Saul', '123abc', 1),
(2, 'Dayvid', 'Dayvid', '123abc', 1),
(3, 'Piero Zevallos', 'Pieroz', '123abc', 1),
(7, 'Piero De La Gala', 'Pierodlg', '123abc', 1),
(8, 'Carlos', 'Carlos', '123abc', 1),
(9, 'Milton', 'Milton', '123abc', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_especialidad`
--

CREATE TABLE `tbl_especialidad` (
  `id_especialidad` int(11) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Dateadd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_especialidad`
--

INSERT INTO `tbl_especialidad` (`id_especialidad`, `Descripcion`, `Dateadd`, `id_admin`) VALUES
(1, 'Ingeniería de Software', '2020-11-13 00:45:25', NULL),
(2, 'Ingeniería de Sistemas', '2020-11-13 06:33:57', NULL),
(3, 'Diseñador tecnológico', '2020-11-14 03:11:10', NULL);

--
-- Disparadores `tbl_especialidad`
--
DELIMITER $$
CREATE TRIGGER `logs_especialidades_A_I` AFTER INSERT ON `tbl_especialidad` FOR EACH ROW BEGIN
    	INSERT INTO tbl_logs_especialidades(id_especialidad, Descripcion)
        VALUES (new.id_especialidad, new.Descripcion);
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_institucion`
--

CREATE TABLE `tbl_institucion` (
  `id_institucion` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Dateadd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_institucion`
--

INSERT INTO `tbl_institucion` (`id_institucion`, `Nombre`, `Dateadd`, `id_admin`) VALUES
(1, 'ISIL', '2020-11-14 07:10:50', NULL),
(2, 'USMP', '2020-11-13 06:34:52', NULL),
(3, 'USIL', '2020-11-13 06:35:01', NULL),
(4, 'CIBERTEC', '2020-11-13 06:35:10', NULL),
(5, 'UTP', '2020-11-13 06:35:16', NULL),
(6, 'PUCP', '2020-11-13 06:35:31', NULL);

--
-- Disparadores `tbl_institucion`
--
DELIMITER $$
CREATE TRIGGER `logs_instituciones_A_I` AFTER INSERT ON `tbl_institucion` FOR EACH ROW BEGIN
    	INSERT INTO tbl_logs_instituciones(id_institucion, Nombre)
        VALUES (new.id_institucion, new.Nombre);
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_logs_especialidades`
--

CREATE TABLE `tbl_logs_especialidades` (
  `id_log` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_logs_instituciones`
--

CREATE TABLE `tbl_logs_instituciones` (
  `id_log` int(11) NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_logs_users`
--

CREATE TABLE `tbl_logs_users` (
  `id_log` int(11) NOT NULL,
  `DNI` int(8) NOT NULL,
  `Usuario` varchar(255) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Telefono` int(50) NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `Apellido_Paterno` varchar(255) NOT NULL,
  `Apellido_Materno` varchar(255) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_repoproyectos`
--

CREATE TABLE `tbl_repoproyectos` (
  `id_repositorio` int(11) NOT NULL,
  `DNI` int(8) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `upload_repo` longblob NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `num_likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_repoproyectos`
--

INSERT INTO `tbl_repoproyectos` (`id_repositorio`, `DNI`, `filename`, `upload_repo`, `Descripcion`, `num_likes`) VALUES
(1, 22222222, 'post 1', 0x89504e470d0a1a0a0000000d49484452000000a60000003408060000000026433f000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000045649444154785eed9d4b6e134110863993df4ee2bcb62c39031bd87004368857a25c25b904a0e402b0487281acbcc8c252d4740dd38feaae1eb7e56828c3dfd2a7c2e39a677ff38f8592f8c5e9e9a93939393154df2d16e6763834bf2c5401e803e7db9be9d4cce7f386464cc78ff1385b0980bef83e1a99bdbdbd20a64b4ca919803e618909318116bc9824a5436a04a04f48cad96c16121362020d7831919840131013a88489797c7c0c31810a484a2426500713138909b440524ea753880974912526213502d027484ca0122fa64b4b2426d00049c9121362020d7831919840131013a804620295909493c90462025d30318f8e8e748b797e6d9e0c1fab2ba1afd06bee2ff3beabbbf64d1a776619bdf770b36c97db11adbbbc6f974963796d1edc36fc312ccde379d8eeedf0d2ac9ae5d1fed871a4831f57437c7ed27959d8f127e3e9e6425c470b24e56e2466c7c4651779934966bdb14017e6319ed7adc4b4235ebea19892445c3a41dcac271fc59b5a013b92986e22f9c50c173e9e98d0cb27b4b03c11c2bf9726ae20e6da894db611f62b88c9886e0a26b423acbfea3816777d32b1dd39179256032c31d58a59bc903481c963b2eba27b5184a4bab7934cd589d02e5fd9e5cd780631c37ebbc5946fb888f81c3bcef79f1093a474488d7f1377816b1e3dc5c9687049248979d90af7e73dff6f6112bb1ee56cbf4e4c2bfbd2c9d66ca7434cb73f3b4ae7cb6f8cf2b682e0d2483ff7ea82a41c8fc72131358b29cbc6d946cc7003b4934de9f94c623e7881a2eda73245095b3ed77c5d2e6aa028a6f8f140175e4ccd89597ef4fc118d4d48b1d7d2f928b7fd5ea465531b393ac45c9be04c4cfbda6dabdd3e1773dde7ca16b70d6924eba537691055775a12bb21264b9bb05cbed0a197a74e58cea465e2453d7634fb7a4e312d3c6df3d4cb529411c92b0e2e5c2a26e1f7a33c3599988787874ac5ec782cd9913df6ba52259df844bc4c900e31e5116d5f1093cbef7af90d918f563829f15bdc31c5d74212b37ce3ea82a4dc81c46cf113134631b5845e96948e54bc75af2ddb8919df649b89e9d7eb3a8f685fb29851afe2473a13931293901a01e8934c4cd58909fe1bbc982e2d9198400324e56834c2a31ce8c28b89c4049a2029212650074bccc5620131810a5862424ca0854c4c426a04a04f48caa1ad1013a8c28be9a4849840031013a884897970700031810a484a8809d4918949488d00f4094939180c909840173e315d5a223181067c62c662d2b79f4acd00f4c1370b13737f7fbf11f3ed7cde34e0fbca419ffc6ceb6b2b244999252609facaf2613a3567b399398b6b055f37a82293497dade04b47ad623c2ed70a3e6f5045ec13acba56f0a9a35661e5d9868f5638a9beb7f5a5c5499925665c25e84bce6b6b0df4f56ca55a03fd21f952ad81fe80536d95a05f35955e4bb506fa91af52ad81fe73ba546ba0c7686d9520a16aeb3a36123385242ad51a48a252ad81a429d51a489ada5a034954aa359044a55a034953aa8ef4750c49535b6b20c14ab59b81f90d9d1ebc41a2055bd00000000049454e44ae426082, 'post de ejemplo 1', 0),
(2, 33333333, 'post 2', 0x89504e470d0a1a0a0000000d49484452000000a60000003408060000000026433f000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000045649444154785eed9d4b6e134110863993df4ee2bcb62c39031bd87004368857a25c25b904a0e402b0487281acbcc8c252d4740dd38feaae1eb7e56828c3dfd2a7c2e39a677ff38f8592f8c5e9e9a93939393154df2d16e6763834bf2c5401e803e7db9be9d4cce7f386464cc78ff1385b0980bef83e1a99bdbdbd20a64b4ca919803e618909318116bc9824a5436a04a04f48cad96c16121362020d7831919840131013a88489797c7c0c31810a484a2426500713138909b440524ea753880974912526213502d027484ca0122fa64b4b2426d00049c9121362020d7831919840131013a804620295909493c90462025d30318f8e8e748b797e6d9e0c1fab2ba1afd06bee2ff3beabbbf64d1a776619bdf770b36c97db11adbbbc6f974963796d1edc36fc312ccde379d8eeedf0d2ac9ae5d1fed871a4831f57437c7ed27959d8f127e3e9e6425c470b24e56e2466c7c4651779934966bdb14017e6319ed7adc4b4235ebea19892445c3a41dcac271fc59b5a013b92986e22f9c50c173e9e98d0cb27b4b03c11c2bf9726ae20e6da894db611f62b88c9886e0a26b423acbfea3816777d32b1dd39179256032c31d58a59bc903481c963b2eba27b5184a4bab7934cd589d02e5fd9e5cd780631c37ebbc5946fb888f81c3bcef79f1093a474488d7f1377816b1e3dc5c9687049248979d90af7e73dff6f6112bb1ee56cbf4e4c2bfbd2c9d66ca7434cb73f3b4ae7cb6f8cf2b682e0d2483ff7ea82a41c8fc72131358b29cbc6d946cc7003b4934de9f94c623e7881a2eda73245095b3ed77c5d2e6aa028a6f8f140175e4ccd89597ef4fc118d4d48b1d7d2f928b7fd5ea465531b393ac45c9be04c4cfbda6dabdd3e1773dde7ca16b70d6924eba537691055775a12bb21264b9bb05cbed0a197a74e58cea465e2453d7634fb7a4e312d3c6df3d4cb529411c92b0e2e5c2a26e1f7a33c3599988787874ac5ec782cd9913df6ba52259df844bc4c900e31e5116d5f1093cbef7af90d918f563829f15bdc31c5d74212b37ce3ea82a4dc81c46cf113134631b5845e96948e54bc75af2ddb8919df649b89e9d7eb3a8f685fb29851afe2473a13931293901a01e8934c4cd58909fe1bbc982e2d9198400324e56834c2a31ce8c28b89c4049a2029212650074bccc5620131810a5862424ca0854c4c426a04a04f48caa1ad1013a8c28be9a4849840031013a884897970700031810a484a8809d4918949488d00f4094939180c909840173e315d5a223181067c62c662d2b79f4acd00f4c1370b13737f7fbf11f3ed7cde34e0fbca419ffc6ceb6b2b244999252609facaf2613a3567b399398b6b055f37a82293497dade04b47ad623c2ed70a3e6f5045ec13acba56f0a9a35661e5d9868f5638a9beb7f5a5c5499925665c25e84bce6b6b0df4f56ca55a03fd21f952ad81fe80536d95a05f35955e4bb506fa91af52ad81fe73ba546ba0c7686d9520a16aeb3a36123385242ad51a48a252ad81a429d51a489ada5a034954aa359044a55a034953aa8ef4750c49535b6b20c14ab59b81f90d9d1ebc41a2055bd00000000049454e44ae426082, 'post de ejemplo 2', 0),
(3, 44444444, 'post 3', 0x89504e470d0a1a0a0000000d49484452000000a60000003408060000000026433f000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000045649444154785eed9d4b6e134110863993df4ee2bcb62c39031bd87004368857a25c25b904a0e402b0487281acbcc8c252d4740dd38feaae1eb7e56828c3dfd2a7c2e39a677ff38f8592f8c5e9e9a93939393154df2d16e6763834bf2c5401e803e7db9be9d4cce7f386464cc78ff1385b0980bef83e1a99bdbdbd20a64b4ca919803e618909318116bc9824a5436a04a04f48cad96c16121362020d7831919840131013a88489797c7c0c31810a484a2426500713138909b440524ea753880974912526213502d027484ca0122fa64b4b2426d00049c9121362020d7831919840131013a804620295909493c90462025d30318f8e8e748b797e6d9e0c1fab2ba1afd06bee2ff3beabbbf64d1a776619bdf770b36c97db11adbbbc6f974963796d1edc36fc312ccde379d8eeedf0d2ac9ae5d1fed871a4831f57437c7ed27959d8f127e3e9e6425c470b24e56e2466c7c4651779934966bdb14017e6319ed7adc4b4235ebea19892445c3a41dcac271fc59b5a013b92986e22f9c50c173e9e98d0cb27b4b03c11c2bf9726ae20e6da894db611f62b88c9886e0a26b423acbfea3816777d32b1dd39179256032c31d58a59bc903481c963b2eba27b5184a4bab7934cd589d02e5fd9e5cd780631c37ebbc5946fb888f81c3bcef79f1093a474488d7f1377816b1e3dc5c9687049248979d90af7e73dff6f6112bb1ee56cbf4e4c2bfbd2c9d66ca7434cb73f3b4ae7cb6f8cf2b682e0d2483ff7ea82a41c8fc72131358b29cbc6d946cc7003b4934de9f94c623e7881a2eda73245095b3ed77c5d2e6aa028a6f8f140175e4ccd89597ef4fc118d4d48b1d7d2f928b7fd5ea465531b393ac45c9be04c4cfbda6dabdd3e1773dde7ca16b70d6924eba537691055775a12bb21264b9bb05cbed0a197a74e58cea465e2453d7634fb7a4e312d3c6df3d4cb529411c92b0e2e5c2a26e1f7a33c3599988787874ac5ec782cd9913df6ba52259df844bc4c900e31e5116d5f1093cbef7af90d918f563829f15bdc31c5d74212b37ce3ea82a4dc81c46cf113134631b5845e96948e54bc75af2ddb8919df649b89e9d7eb3a8f685fb29851afe2473a13931293901a01e8934c4cd58909fe1bbc982e2d9198400324e56834c2a31ce8c28b89c4049a2029212650074bccc5620131810a5862424ca0854c4c426a04a04f48caa1ad1013a8c28be9a4849840031013a884897970700031810a484a8809d4918949488d00f4094939180c909840173e315d5a223181067c62c662d2b79f4acd00f4c1370b13737f7fbf11f3ed7cde34e0fbca419ffc6ceb6b2b244999252609facaf2613a3567b399398b6b055f37a82293497dade04b47ad623c2ed70a3e6f5045ec13acba56f0a9a35661e5d9868f5638a9beb7f5a5c5499925665c25e84bce6b6b0df4f56ca55a03fd21f952ad81fe80536d95a05f35955e4bb506fa91af52ad81fe73ba546ba0c7686d9520a16aeb3a36123385242ad51a48a252ad81a429d51a489ada5a034954aa359044a55a034953aa8ef4750c49535b6b20c14ab59b81f90d9d1ebc41a2055bd00000000049454e44ae426082, 'post de ejemplo 3', 0),
(4, 55555555, 'post 4', 0x89504e470d0a1a0a0000000d49484452000000a60000003408060000000026433f000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000045649444154785eed9d4b6e134110863993df4ee2bcb62c39031bd87004368857a25c25b904a0e402b0487281acbcc8c252d4740dd38feaae1eb7e56828c3dfd2a7c2e39a677ff38f8592f8c5e9e9a93939393154df2d16e6763834bf2c5401e803e7db9be9d4cce7f386464cc78ff1385b0980bef83e1a99bdbdbd20a64b4ca919803e618909318116bc9824a5436a04a04f48cad96c16121362020d7831919840131013a88489797c7c0c31810a484a2426500713138909b440524ea753880974912526213502d027484ca0122fa64b4b2426d00049c9121362020d7831919840131013a804620295909493c90462025d30318f8e8e748b797e6d9e0c1fab2ba1afd06bee2ff3beabbbf64d1a776619bdf770b36c97db11adbbbc6f974963796d1edc36fc312ccde379d8eeedf0d2ac9ae5d1fed871a4831f57437c7ed27959d8f127e3e9e6425c470b24e56e2466c7c4651779934966bdb14017e6319ed7adc4b4235ebea19892445c3a41dcac271fc59b5a013b92986e22f9c50c173e9e98d0cb27b4b03c11c2bf9726ae20e6da894db611f62b88c9886e0a26b423acbfea3816777d32b1dd39179256032c31d58a59bc903481c963b2eba27b5184a4bab7934cd589d02e5fd9e5cd780631c37ebbc5946fb888f81c3bcef79f1093a474488d7f1377816b1e3dc5c9687049248979d90af7e73dff6f6112bb1ee56cbf4e4c2bfbd2c9d66ca7434cb73f3b4ae7cb6f8cf2b682e0d2483ff7ea82a41c8fc72131358b29cbc6d946cc7003b4934de9f94c623e7881a2eda73245095b3ed77c5d2e6aa028a6f8f140175e4ccd89597ef4fc118d4d48b1d7d2f928b7fd5ea465531b393ac45c9be04c4cfbda6dabdd3e1773dde7ca16b70d6924eba537691055775a12bb21264b9bb05cbed0a197a74e58cea465e2453d7634fb7a4e312d3c6df3d4cb529411c92b0e2e5c2a26e1f7a33c3599988787874ac5ec782cd9913df6ba52259df844bc4c900e31e5116d5f1093cbef7af90d918f563829f15bdc31c5d74212b37ce3ea82a4dc81c46cf113134631b5845e96948e54bc75af2ddb8919df649b89e9d7eb3a8f685fb29851afe2473a13931293901a01e8934c4cd58909fe1bbc982e2d9198400324e56834c2a31ce8c28b89c4049a2029212650074bccc5620131810a5862424ca0854c4c426a04a04f48caa1ad1013a8c28be9a4849840031013a884897970700031810a484a8809d4918949488d00f4094939180c909840173e315d5a223181067c62c662d2b79f4acd00f4c1370b13737f7fbf11f3ed7cde34e0fbca419ffc6ceb6b2b244999252609facaf2613a3567b399398b6b055f37a82293497dade04b47ad623c2ed70a3e6f5045ec13acba56f0a9a35661e5d9868f5638a9beb7f5a5c5499925665c25e84bce6b6b0df4f56ca55a03fd21f952ad81fe80536d95a05f35955e4bb506fa91af52ad81fe73ba546ba0c7686d9520a16aeb3a36123385242ad51a48a252ad81a429d51a489ada5a034954aa359044a55a034953aa8ef4750c49535b6b20c14ab59b81f90d9d1ebc41a2055bd00000000049454e44ae426082, 'post de ejemplo 4', 0),
(5, 77777777, 'post 5', 0x89504e470d0a1a0a0000000d49484452000000a60000003408060000000026433f000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000045649444154785eed9d4b6e134110863993df4ee2bcb62c39031bd87004368857a25c25b904a0e402b0487281acbcc8c252d4740dd38feaae1eb7e56828c3dfd2a7c2e39a677ff38f8592f8c5e9e9a93939393154df2d16e6763834bf2c5401e803e7db9be9d4cce7f386464cc78ff1385b0980bef83e1a99bdbdbd20a64b4ca919803e618909318116bc9824a5436a04a04f48cad96c16121362020d7831919840131013a88489797c7c0c31810a484a2426500713138909b440524ea753880974912526213502d027484ca0122fa64b4b2426d00049c9121362020d7831919840131013a804620295909493c90462025d30318f8e8e748b797e6d9e0c1fab2ba1afd06bee2ff3beabbbf64d1a776619bdf770b36c97db11adbbbc6f974963796d1edc36fc312ccde379d8eeedf0d2ac9ae5d1fed871a4831f57437c7ed27959d8f127e3e9e6425c470b24e56e2466c7c4651779934966bdb14017e6319ed7adc4b4235ebea19892445c3a41dcac271fc59b5a013b92986e22f9c50c173e9e98d0cb27b4b03c11c2bf9726ae20e6da894db611f62b88c9886e0a26b423acbfea3816777d32b1dd39179256032c31d58a59bc903481c963b2eba27b5184a4bab7934cd589d02e5fd9e5cd780631c37ebbc5946fb888f81c3bcef79f1093a474488d7f1377816b1e3dc5c9687049248979d90af7e73dff6f6112bb1ee56cbf4e4c2bfbd2c9d66ca7434cb73f3b4ae7cb6f8cf2b682e0d2483ff7ea82a41c8fc72131358b29cbc6d946cc7003b4934de9f94c623e7881a2eda73245095b3ed77c5d2e6aa028a6f8f140175e4ccd89597ef4fc118d4d48b1d7d2f928b7fd5ea465531b393ac45c9be04c4cfbda6dabdd3e1773dde7ca16b70d6924eba537691055775a12bb21264b9bb05cbed0a197a74e58cea465e2453d7634fb7a4e312d3c6df3d4cb529411c92b0e2e5c2a26e1f7a33c3599988787874ac5ec782cd9913df6ba52259df844bc4c900e31e5116d5f1093cbef7af90d918f563829f15bdc31c5d74212b37ce3ea82a4dc81c46cf113134631b5845e96948e54bc75af2ddb8919df649b89e9d7eb3a8f685fb29851afe2473a13931293901a01e8934c4cd58909fe1bbc982e2d9198400324e56834c2a31ce8c28b89c4049a2029212650074bccc5620131810a5862424ca0854c4c426a04a04f48caa1ad1013a8c28be9a4849840031013a884897970700031810a484a8809d4918949488d00f4094939180c909840173e315d5a223181067c62c662d2b79f4acd00f4c1370b13737f7fbf11f3ed7cde34e0fbca419ffc6ceb6b2b244999252609facaf2613a3567b399398b6b055f37a82293497dade04b47ad623c2ed70a3e6f5045ec13acba56f0a9a35661e5d9868f5638a9beb7f5a5c5499925665c25e84bce6b6b0df4f56ca55a03fd21f952ad81fe80536d95a05f35955e4bb506fa91af52ad81fe73ba546ba0c7686d9520a16aeb3a36123385242ad51a48a252ad81a429d51a489ada5a034954aa359044a55a034953aa8ef4750c49535b6b20c14ab59b81f90d9d1ebc41a2055bd00000000049454e44ae426082, 'post de ejemplo 5', 0),
(6, 88888888, 'post 6', 0x89504e470d0a1a0a0000000d49484452000000a60000003408060000000026433f000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000045649444154785eed9d4b6e134110863993df4ee2bcb62c39031bd87004368857a25c25b904a0e402b0487281acbcc8c252d4740dd38feaae1eb7e56828c3dfd2a7c2e39a677ff38f8592f8c5e9e9a93939393154df2d16e6763834bf2c5401e803e7db9be9d4cce7f386464cc78ff1385b0980bef83e1a99bdbdbd20a64b4ca919803e618909318116bc9824a5436a04a04f48cad96c16121362020d7831919840131013a88489797c7c0c31810a484a2426500713138909b440524ea753880974912526213502d027484ca0122fa64b4b2426d00049c9121362020d7831919840131013a804620295909493c90462025d30318f8e8e748b797e6d9e0c1fab2ba1afd06bee2ff3beabbbf64d1a776619bdf770b36c97db11adbbbc6f974963796d1edc36fc312ccde379d8eeedf0d2ac9ae5d1fed871a4831f57437c7ed27959d8f127e3e9e6425c470b24e56e2466c7c4651779934966bdb14017e6319ed7adc4b4235ebea19892445c3a41dcac271fc59b5a013b92986e22f9c50c173e9e98d0cb27b4b03c11c2bf9726ae20e6da894db611f62b88c9886e0a26b423acbfea3816777d32b1dd39179256032c31d58a59bc903481c963b2eba27b5184a4bab7934cd589d02e5fd9e5cd780631c37ebbc5946fb888f81c3bcef79f1093a474488d7f1377816b1e3dc5c9687049248979d90af7e73dff6f6112bb1ee56cbf4e4c2bfbd2c9d66ca7434cb73f3b4ae7cb6f8cf2b682e0d2483ff7ea82a41c8fc72131358b29cbc6d946cc7003b4934de9f94c623e7881a2eda73245095b3ed77c5d2e6aa028a6f8f140175e4ccd89597ef4fc118d4d48b1d7d2f928b7fd5ea465531b393ac45c9be04c4cfbda6dabdd3e1773dde7ca16b70d6924eba537691055775a12bb21264b9bb05cbed0a197a74e58cea465e2453d7634fb7a4e312d3c6df3d4cb529411c92b0e2e5c2a26e1f7a33c3599988787874ac5ec782cd9913df6ba52259df844bc4c900e31e5116d5f1093cbef7af90d918f563829f15bdc31c5d74212b37ce3ea82a4dc81c46cf113134631b5845e96948e54bc75af2ddb8919df649b89e9d7eb3a8f685fb29851afe2473a13931293901a01e8934c4cd58909fe1bbc982e2d9198400324e56834c2a31ce8c28b89c4049a2029212650074bccc5620131810a5862424ca0854c4c426a04a04f48caa1ad1013a8c28be9a4849840031013a884897970700031810a484a8809d4918949488d00f4094939180c909840173e315d5a223181067c62c662d2b79f4acd00f4c1370b13737f7fbf11f3ed7cde34e0fbca419ffc6ceb6b2b244999252609facaf2613a3567b399398b6b055f37a82293497dade04b47ad623c2ed70a3e6f5045ec13acba56f0a9a35661e5d9868f5638a9beb7f5a5c5499925665c25e84bce6b6b0df4f56ca55a03fd21f952ad81fe80536d95a05f35955e4bb506fa91af52ad81fe73ba546ba0c7686d9520a16aeb3a36123385242ad51a48a252ad81a429d51a489ada5a034954aa359044a55a034953aa8ef4750c49535b6b20c14ab59b81f90d9d1ebc41a2055bd00000000049454e44ae426082, 'post de ejemplo 6', 0);

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

--
-- Volcado de datos para la tabla `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `name`) VALUES
(1, 'Administrador'),
(2, 'Profesor'),
(3, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user`
--

CREATE TABLE `tbl_user` (
  `DNI` int(8) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(50) NOT NULL,
  `file` longblob NOT NULL,
  `photo` longblob NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `is_enabled` int(11) NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `last_name_father` varchar(255) NOT NULL,
  `last_name_mother` varchar(255) NOT NULL,
  `code` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'Verifico el correo',
  `signup_date` datetime NOT NULL,
  `dateadd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_user`
--

INSERT INTO `tbl_user` (`DNI`, `password`, `username`, `email`, `phone`, `photo`, `token`, `is_enabled`, `id_institucion`, `id_role`, `id_especialidad`, `last_name_father`, `last_name_mother`, `dateadd`, `id_admin`) VALUES
(22222222, '123456', 'Saul', 'saul@gmail.com', 980776423, '', NULL, 1, 1, 3, 1, 'Michue', 'Asparrín', '2020-11-14 15:55:20', NULL),
(33333333, '123456', 'Carlos', 'carlos@gmail.com', 999999994, '', NULL, 1, 1, 3, 1, 'Villalba', 'Castillo', '2020-11-13 22:29:08', NULL),
(44444444, '123456', 'Milton', 'milton@gmail.com', 999999993, '', NULL, 1, 1, 3, 1, 'Hernandez', 'Rivera', '2020-11-13 22:29:12', NULL),
(55555555, '123456', 'Jean', 'jean@gmail.com', 999999992, '', NULL, 1, 1, 3, 1, 'De la Gala', 'Gutierrez', '2020-11-13 22:29:14', NULL),
(72658562, '123456', 'Brayan', 'brayansanchezheavens@gmail.com', 999999991, '', NULL, 1, 1, 3, 1, 'Sanchez', 'Navarro', '2020-11-13 22:29:16', NULL),
(77777777, '123456', 'piero', 'piero@gmail.com', 999999999, '', NULL, 1, 1, 3, 1, 'Alvarez', 'Salas', '2020-11-13 22:29:20', NULL),
(88888888, '123456', 'dayvid', 'dayvid@gmail.com', 999999991, '', NULL, 1, 1, 3, 1, 'Sanchez', 'Navarro', '2020-11-13 22:29:22', NULL);

--
-- Disparadores `tbl_user`
--
DELIMITER $$
CREATE TRIGGER `logs_users_A_I` AFTER INSERT ON `tbl_user` FOR EACH ROW BEGIN
    	INSERT INTO tbl_logs_users(DNI, Usuario, Correo, Telefono, id_institucion, id_role, id_especialidad, Apellido_Paterno, Apellido_Materno)
        VALUES (new.DNI, new.username, new.email, new.phone, new.id_institucion, new.id_role, new.id_especialidad, new.last_name_father, new.last_name_mother);
    END
$$
DELIMITER ;

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
-- Indices de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_role` (`id_role`);

--
-- Indices de la tabla `tbl_especialidad`
--
ALTER TABLE `tbl_especialidad`
  ADD PRIMARY KEY (`id_especialidad`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indices de la tabla `tbl_institucion`
--
ALTER TABLE `tbl_institucion`
  ADD PRIMARY KEY (`id_institucion`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indices de la tabla `tbl_logs_especialidades`
--
ALTER TABLE `tbl_logs_especialidades`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_especialidad` (`id_especialidad`);

--
-- Indices de la tabla `tbl_logs_instituciones`
--
ALTER TABLE `tbl_logs_instituciones`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_institucion` (`id_institucion`);

--
-- Indices de la tabla `tbl_logs_users`
--
ALTER TABLE `tbl_logs_users`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `DNI` (`DNI`);

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
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_admin` (`id_admin`);

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
-- AUTO_INCREMENT de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_especialidad`
--
ALTER TABLE `tbl_especialidad`
  MODIFY `id_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_institucion`
--
ALTER TABLE `tbl_institucion`
  MODIFY `id_institucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
  
  --
-- AUTO_INCREMENT de la tabla `tbl_logs_especialidades`
--
ALTER TABLE `tbl_logs_especialidades`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_logs_instituciones`
--
ALTER TABLE `tbl_logs_instituciones`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_logs_users`
--
ALTER TABLE `tbl_logs_users`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_repoproyectos`
--
ALTER TABLE `tbl_repoproyectos`
  MODIFY `id_repositorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_repoproyectosdetalles`
--
ALTER TABLE `tbl_repoproyectosdetalles`
  MODIFY `id_detalles` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `confirmation_token`
--
ALTER TABLE `confirmation_token`
  ADD CONSTRAINT `confirmation_token_ibfk_1` FOREIGN KEY (`DNI`) REFERENCES `tbl_user` (`DNI`);

--
-- Filtros para la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `tbl_admin_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tbl_role` (`id_role`);

--
-- Filtros para la tabla `tbl_especialidad`
--
ALTER TABLE `tbl_especialidad`
  ADD CONSTRAINT `tbl_especialidad_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tbl_admin` (`id_admin`);

--
-- Filtros para la tabla `tbl_institucion`
--
ALTER TABLE `tbl_institucion`
  ADD CONSTRAINT `tbl_institucion_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tbl_admin` (`id_admin`);
  
  --
-- Filtros para la tabla `tbl_logs_especialidades`
--
ALTER TABLE `tbl_logs_especialidades`
  ADD CONSTRAINT `tbl_logs_especialidades_ibfk_1` FOREIGN KEY (`id_especialidad`) REFERENCES `tbl_especialidad` (`id_especialidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_logs_instituciones`
--
ALTER TABLE `tbl_logs_instituciones`
  ADD CONSTRAINT `tbl_logs_instituciones_ibfk_1` FOREIGN KEY (`id_institucion`) REFERENCES `tbl_institucion` (`id_institucion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_logs_users`
--
ALTER TABLE `tbl_logs_users`
  ADD CONSTRAINT `tbl_logs_users_ibfk_1` FOREIGN KEY (`DNI`) REFERENCES `tbl_user` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tbl_role` (`id_role`),
  ADD CONSTRAINT `tbl_user_ibfk_2` FOREIGN KEY (`id_especialidad`) REFERENCES `tbl_especialidad` (`id_especialidad`),
  ADD CONSTRAINT `tbl_user_ibfk_3` FOREIGN KEY (`id_institucion`) REFERENCES `tbl_institucion` (`id_institucion`),
  ADD CONSTRAINT `tbl_user_ibfk_4` FOREIGN KEY (`id_admin`) REFERENCES `tbl_admin` (`id_admin`);

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
