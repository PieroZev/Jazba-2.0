-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-10-2020 a las 00:31:02
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

DROP TABLE IF EXISTS `confirmation_token`;
CREATE TABLE IF NOT EXISTS `confirmation_token` (
  `tokenid` int(11) NOT NULL,
  `confirmation_token` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  `DNI` int(8) NOT NULL,
  PRIMARY KEY (`tokenid`),
  KEY `DNI` (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_especialidad`
--

DROP TABLE IF EXISTS `tbl_especialidad`;
CREATE TABLE IF NOT EXISTS `tbl_especialidad` (
  `id_especialidad` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id_especialidad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_especialidad`
--

INSERT INTO `tbl_especialidad` (`id_especialidad`, `Descripcion`) VALUES
(1, 'Software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_institucion`
--

DROP TABLE IF EXISTS `tbl_institucion`;
CREATE TABLE IF NOT EXISTS `tbl_institucion` (
  `id_institucion` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_institucion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_institucion`
--

INSERT INTO `tbl_institucion` (`id_institucion`, `Nombre`) VALUES
(1, 'Isil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_repoproyectos`
--

DROP TABLE IF EXISTS `tbl_repoproyectos`;
CREATE TABLE IF NOT EXISTS `tbl_repoproyectos` (
  `id_repositorio` int(11) NOT NULL AUTO_INCREMENT,
  `DNI` int(8) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `upload_repo` longblob NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  PRIMARY KEY (`id_repositorio`),
  KEY `DNI` (`DNI`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_repoproyectos`
--

INSERT INTO `tbl_repoproyectos` (`id_repositorio`, `DNI`, `filename`, `upload_repo`, `Descripcion`) VALUES
(1, 22222222, 'post1', 0x89504e470d0a1a0a0000000d49484452000000a60000003408060000000026433f000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000045649444154785eed9d4b6e134110863993df4ee2bcb62c39031bd87004368857a25c25b904a0e402b0487281acbcc8c252d4740dd38feaae1eb7e56828c3dfd2a7c2e39a677ff38f8592f8c5e9e9a93939393154df2d16e6763834bf2c5401e803e7db9be9d4cce7f386464cc78ff1385b0980bef83e1a99bdbdbd20a64b4ca919803e618909318116bc9824a5436a04a04f48cad96c16121362020d7831919840131013a88489797c7c0c31810a484a2426500713138909b440524ea753880974912526213502d027484ca0122fa64b4b2426d00049c9121362020d7831919840131013a804620295909493c90462025d30318f8e8e748b797e6d9e0c1fab2ba1afd06bee2ff3beabbbf64d1a776619bdf770b36c97db11adbbbc6f974963796d1edc36fc312ccde379d8eeedf0d2ac9ae5d1fed871a4831f57437c7ed27959d8f127e3e9e6425c470b24e56e2466c7c4651779934966bdb14017e6319ed7adc4b4235ebea19892445c3a41dcac271fc59b5a013b92986e22f9c50c173e9e98d0cb27b4b03c11c2bf9726ae20e6da894db611f62b88c9886e0a26b423acbfea3816777d32b1dd39179256032c31d58a59bc903481c963b2eba27b5184a4bab7934cd589d02e5fd9e5cd780631c37ebbc5946fb888f81c3bcef79f1093a474488d7f1377816b1e3dc5c9687049248979d90af7e73dff6f6112bb1ee56cbf4e4c2bfbd2c9d66ca7434cb73f3b4ae7cb6f8cf2b682e0d2483ff7ea82a41c8fc72131358b29cbc6d946cc7003b4934de9f94c623e7881a2eda73245095b3ed77c5d2e6aa028a6f8f140175e4ccd89597ef4fc118d4d48b1d7d2f928b7fd5ea465531b393ac45c9be04c4cfbda6dabdd3e1773dde7ca16b70d6924eba537691055775a12bb21264b9bb05cbed0a197a74e58cea465e2453d7634fb7a4e312d3c6df3d4cb529411c92b0e2e5c2a26e1f7a33c3599988787874ac5ec782cd9913df6ba52259df844bc4c900e31e5116d5f1093cbef7af90d918f563829f15bdc31c5d74212b37ce3ea82a4dc81c46cf113134631b5845e96948e54bc75af2ddb8919df649b89e9d7eb3a8f685fb29851afe2473a13931293901a01e8934c4cd58909fe1bbc982e2d9198400324e56834c2a31ce8c28b89c4049a2029212650074bccc5620131810a5862424ca0854c4c426a04a04f48caa1ad1013a8c28be9a4849840031013a884897970700031810a484a8809d4918949488d00f4094939180c909840173e315d5a223181067c62c662d2b79f4acd00f4c1370b13737f7fbf11f3ed7cde34e0fbca419ffc6ceb6b2b244999252609facaf2613a3567b399398b6b055f37a82293497dade04b47ad623c2ed70a3e6f5045ec13acba56f0a9a35661e5d9868f5638a9beb7f5a5c5499925665c25e84bce6b6b0df4f56ca55a03fd21f952ad81fe80536d95a05f35955e4bb506fa91af52ad81fe73ba546ba0c7686d9520a16aeb3a36123385242ad51a48a252ad81a429d51a489ada5a034954aa359044a55a034953aa8ef4750c49535b6b20c14ab59b81f90d9d1ebc41a2055bd00000000049454e44ae426082, 'post de ejemplo 1'),
(2, 33333333, 'post 2', 0x89504e470d0a1a0a0000000d49484452000000a60000003408060000000026433f000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000045649444154785eed9d4b6e134110863993df4ee2bcb62c39031bd87004368857a25c25b904a0e402b0487281acbcc8c252d4740dd38feaae1eb7e56828c3dfd2a7c2e39a677ff38f8592f8c5e9e9a93939393154df2d16e6763834bf2c5401e803e7db9be9d4cce7f386464cc78ff1385b0980bef83e1a99bdbdbd20a64b4ca919803e618909318116bc9824a5436a04a04f48cad96c16121362020d7831919840131013a88489797c7c0c31810a484a2426500713138909b440524ea753880974912526213502d027484ca0122fa64b4b2426d00049c9121362020d7831919840131013a804620295909493c90462025d30318f8e8e748b797e6d9e0c1fab2ba1afd06bee2ff3beabbbf64d1a776619bdf770b36c97db11adbbbc6f974963796d1edc36fc312ccde379d8eeedf0d2ac9ae5d1fed871a4831f57437c7ed27959d8f127e3e9e6425c470b24e56e2466c7c4651779934966bdb14017e6319ed7adc4b4235ebea19892445c3a41dcac271fc59b5a013b92986e22f9c50c173e9e98d0cb27b4b03c11c2bf9726ae20e6da894db611f62b88c9886e0a26b423acbfea3816777d32b1dd39179256032c31d58a59bc903481c963b2eba27b5184a4bab7934cd589d02e5fd9e5cd780631c37ebbc5946fb888f81c3bcef79f1093a474488d7f1377816b1e3dc5c9687049248979d90af7e73dff6f6112bb1ee56cbf4e4c2bfbd2c9d66ca7434cb73f3b4ae7cb6f8cf2b682e0d2483ff7ea82a41c8fc72131358b29cbc6d946cc7003b4934de9f94c623e7881a2eda73245095b3ed77c5d2e6aa028a6f8f140175e4ccd89597ef4fc118d4d48b1d7d2f928b7fd5ea465531b393ac45c9be04c4cfbda6dabdd3e1773dde7ca16b70d6924eba537691055775a12bb21264b9bb05cbed0a197a74e58cea465e2453d7634fb7a4e312d3c6df3d4cb529411c92b0e2e5c2a26e1f7a33c3599988787874ac5ec782cd9913df6ba52259df844bc4c900e31e5116d5f1093cbef7af90d918f563829f15bdc31c5d74212b37ce3ea82a4dc81c46cf113134631b5845e96948e54bc75af2ddb8919df649b89e9d7eb3a8f685fb29851afe2473a13931293901a01e8934c4cd58909fe1bbc982e2d9198400324e56834c2a31ce8c28b89c4049a2029212650074bccc5620131810a5862424ca0854c4c426a04a04f48caa1ad1013a8c28be9a4849840031013a884897970700031810a484a8809d4918949488d00f4094939180c909840173e315d5a223181067c62c662d2b79f4acd00f4c1370b13737f7fbf11f3ed7cde34e0fbca419ffc6ceb6b2b244999252609facaf2613a3567b399398b6b055f37a82293497dade04b47ad623c2ed70a3e6f5045ec13acba56f0a9a35661e5d9868f5638a9beb7f5a5c5499925665c25e84bce6b6b0df4f56ca55a03fd21f952ad81fe80536d95a05f35955e4bb506fa91af52ad81fe73ba546ba0c7686d9520a16aeb3a36123385242ad51a48a252ad81a429d51a489ada5a034954aa359044a55a034953aa8ef4750c49535b6b20c14ab59b81f90d9d1ebc41a2055bd00000000049454e44ae426082, 'post de ejemplo 2'),
(3, 44444444, 'post 3', 0x89504e470d0a1a0a0000000d49484452000000a60000003408060000000026433f000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000045649444154785eed9d4b6e134110863993df4ee2bcb62c39031bd87004368857a25c25b904a0e402b0487281acbcc8c252d4740dd38feaae1eb7e56828c3dfd2a7c2e39a677ff38f8592f8c5e9e9a93939393154df2d16e6763834bf2c5401e803e7db9be9d4cce7f386464cc78ff1385b0980bef83e1a99bdbdbd20a64b4ca919803e618909318116bc9824a5436a04a04f48cad96c16121362020d7831919840131013a88489797c7c0c31810a484a2426500713138909b440524ea753880974912526213502d027484ca0122fa64b4b2426d00049c9121362020d7831919840131013a804620295909493c90462025d30318f8e8e748b797e6d9e0c1fab2ba1afd06bee2ff3beabbbf64d1a776619bdf770b36c97db11adbbbc6f974963796d1edc36fc312ccde379d8eeedf0d2ac9ae5d1fed871a4831f57437c7ed27959d8f127e3e9e6425c470b24e56e2466c7c4651779934966bdb14017e6319ed7adc4b4235ebea19892445c3a41dcac271fc59b5a013b92986e22f9c50c173e9e98d0cb27b4b03c11c2bf9726ae20e6da894db611f62b88c9886e0a26b423acbfea3816777d32b1dd39179256032c31d58a59bc903481c963b2eba27b5184a4bab7934cd589d02e5fd9e5cd780631c37ebbc5946fb888f81c3bcef79f1093a474488d7f1377816b1e3dc5c9687049248979d90af7e73dff6f6112bb1ee56cbf4e4c2bfbd2c9d66ca7434cb73f3b4ae7cb6f8cf2b682e0d2483ff7ea82a41c8fc72131358b29cbc6d946cc7003b4934de9f94c623e7881a2eda73245095b3ed77c5d2e6aa028a6f8f140175e4ccd89597ef4fc118d4d48b1d7d2f928b7fd5ea465531b393ac45c9be04c4cfbda6dabdd3e1773dde7ca16b70d6924eba537691055775a12bb21264b9bb05cbed0a197a74e58cea465e2453d7634fb7a4e312d3c6df3d4cb529411c92b0e2e5c2a26e1f7a33c3599988787874ac5ec782cd9913df6ba52259df844bc4c900e31e5116d5f1093cbef7af90d918f563829f15bdc31c5d74212b37ce3ea82a4dc81c46cf113134631b5845e96948e54bc75af2ddb8919df649b89e9d7eb3a8f685fb29851afe2473a13931293901a01e8934c4cd58909fe1bbc982e2d9198400324e56834c2a31ce8c28b89c4049a2029212650074bccc5620131810a5862424ca0854c4c426a04a04f48caa1ad1013a8c28be9a4849840031013a884897970700031810a484a8809d4918949488d00f4094939180c909840173e315d5a223181067c62c662d2b79f4acd00f4c1370b13737f7fbf11f3ed7cde34e0fbca419ffc6ceb6b2b244999252609facaf2613a3567b399398b6b055f37a82293497dade04b47ad623c2ed70a3e6f5045ec13acba56f0a9a35661e5d9868f5638a9beb7f5a5c5499925665c25e84bce6b6b0df4f56ca55a03fd21f952ad81fe80536d95a05f35955e4bb506fa91af52ad81fe73ba546ba0c7686d9520a16aeb3a36123385242ad51a48a252ad81a429d51a489ada5a034954aa359044a55a034953aa8ef4750c49535b6b20c14ab59b81f90d9d1ebc41a2055bd00000000049454e44ae426082, 'post de ejemplo 3'),
(4, 55555555, 'post 4', 0x89504e470d0a1a0a0000000d49484452000000a60000003408060000000026433f000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000045649444154785eed9d4b6e134110863993df4ee2bcb62c39031bd87004368857a25c25b904a0e402b0487281acbcc8c252d4740dd38feaae1eb7e56828c3dfd2a7c2e39a677ff38f8592f8c5e9e9a93939393154df2d16e6763834bf2c5401e803e7db9be9d4cce7f386464cc78ff1385b0980bef83e1a99bdbdbd20a64b4ca919803e618909318116bc9824a5436a04a04f48cad96c16121362020d7831919840131013a88489797c7c0c31810a484a2426500713138909b440524ea753880974912526213502d027484ca0122fa64b4b2426d00049c9121362020d7831919840131013a804620295909493c90462025d30318f8e8e748b797e6d9e0c1fab2ba1afd06bee2ff3beabbbf64d1a776619bdf770b36c97db11adbbbc6f974963796d1edc36fc312ccde379d8eeedf0d2ac9ae5d1fed871a4831f57437c7ed27959d8f127e3e9e6425c470b24e56e2466c7c4651779934966bdb14017e6319ed7adc4b4235ebea19892445c3a41dcac271fc59b5a013b92986e22f9c50c173e9e98d0cb27b4b03c11c2bf9726ae20e6da894db611f62b88c9886e0a26b423acbfea3816777d32b1dd39179256032c31d58a59bc903481c963b2eba27b5184a4bab7934cd589d02e5fd9e5cd780631c37ebbc5946fb888f81c3bcef79f1093a474488d7f1377816b1e3dc5c9687049248979d90af7e73dff6f6112bb1ee56cbf4e4c2bfbd2c9d66ca7434cb73f3b4ae7cb6f8cf2b682e0d2483ff7ea82a41c8fc72131358b29cbc6d946cc7003b4934de9f94c623e7881a2eda73245095b3ed77c5d2e6aa028a6f8f140175e4ccd89597ef4fc118d4d48b1d7d2f928b7fd5ea465531b393ac45c9be04c4cfbda6dabdd3e1773dde7ca16b70d6924eba537691055775a12bb21264b9bb05cbed0a197a74e58cea465e2453d7634fb7a4e312d3c6df3d4cb529411c92b0e2e5c2a26e1f7a33c3599988787874ac5ec782cd9913df6ba52259df844bc4c900e31e5116d5f1093cbef7af90d918f563829f15bdc31c5d74212b37ce3ea82a4dc81c46cf113134631b5845e96948e54bc75af2ddb8919df649b89e9d7eb3a8f685fb29851afe2473a13931293901a01e8934c4cd58909fe1bbc982e2d9198400324e56834c2a31ce8c28b89c4049a2029212650074bccc5620131810a5862424ca0854c4c426a04a04f48caa1ad1013a8c28be9a4849840031013a884897970700031810a484a8809d4918949488d00f4094939180c909840173e315d5a223181067c62c662d2b79f4acd00f4c1370b13737f7fbf11f3ed7cde34e0fbca419ffc6ceb6b2b244999252609facaf2613a3567b399398b6b055f37a82293497dade04b47ad623c2ed70a3e6f5045ec13acba56f0a9a35661e5d9868f5638a9beb7f5a5c5499925665c25e84bce6b6b0df4f56ca55a03fd21f952ad81fe80536d95a05f35955e4bb506fa91af52ad81fe73ba546ba0c7686d9520a16aeb3a36123385242ad51a48a252ad81a429d51a489ada5a034954aa359044a55a034953aa8ef4750c49535b6b20c14ab59b81f90d9d1ebc41a2055bd00000000049454e44ae426082, 'post de ejemplo 4'),
(5, 77777777, 'post 5', 0x89504e470d0a1a0a0000000d49484452000000a60000003408060000000026433f000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000045649444154785eed9d4b6e134110863993df4ee2bcb62c39031bd87004368857a25c25b904a0e402b0487281acbcc8c252d4740dd38feaae1eb7e56828c3dfd2a7c2e39a677ff38f8592f8c5e9e9a93939393154df2d16e6763834bf2c5401e803e7db9be9d4cce7f386464cc78ff1385b0980bef83e1a99bdbdbd20a64b4ca919803e618909318116bc9824a5436a04a04f48cad96c16121362020d7831919840131013a88489797c7c0c31810a484a2426500713138909b440524ea753880974912526213502d027484ca0122fa64b4b2426d00049c9121362020d7831919840131013a804620295909493c90462025d30318f8e8e748b797e6d9e0c1fab2ba1afd06bee2ff3beabbbf64d1a776619bdf770b36c97db11adbbbc6f974963796d1edc36fc312ccde379d8eeedf0d2ac9ae5d1fed871a4831f57437c7ed27959d8f127e3e9e6425c470b24e56e2466c7c4651779934966bdb14017e6319ed7adc4b4235ebea19892445c3a41dcac271fc59b5a013b92986e22f9c50c173e9e98d0cb27b4b03c11c2bf9726ae20e6da894db611f62b88c9886e0a26b423acbfea3816777d32b1dd39179256032c31d58a59bc903481c963b2eba27b5184a4bab7934cd589d02e5fd9e5cd780631c37ebbc5946fb888f81c3bcef79f1093a474488d7f1377816b1e3dc5c9687049248979d90af7e73dff6f6112bb1ee56cbf4e4c2bfbd2c9d66ca7434cb73f3b4ae7cb6f8cf2b682e0d2483ff7ea82a41c8fc72131358b29cbc6d946cc7003b4934de9f94c623e7881a2eda73245095b3ed77c5d2e6aa028a6f8f140175e4ccd89597ef4fc118d4d48b1d7d2f928b7fd5ea465531b393ac45c9be04c4cfbda6dabdd3e1773dde7ca16b70d6924eba537691055775a12bb21264b9bb05cbed0a197a74e58cea465e2453d7634fb7a4e312d3c6df3d4cb529411c92b0e2e5c2a26e1f7a33c3599988787874ac5ec782cd9913df6ba52259df844bc4c900e31e5116d5f1093cbef7af90d918f563829f15bdc31c5d74212b37ce3ea82a4dc81c46cf113134631b5845e96948e54bc75af2ddb8919df649b89e9d7eb3a8f685fb29851afe2473a13931293901a01e8934c4cd58909fe1bbc982e2d9198400324e56834c2a31ce8c28b89c4049a2029212650074bccc5620131810a5862424ca0854c4c426a04a04f48caa1ad1013a8c28be9a4849840031013a884897970700031810a484a8809d4918949488d00f4094939180c909840173e315d5a223181067c62c662d2b79f4acd00f4c1370b13737f7fbf11f3ed7cde34e0fbca419ffc6ceb6b2b244999252609facaf2613a3567b399398b6b055f37a82293497dade04b47ad623c2ed70a3e6f5045ec13acba56f0a9a35661e5d9868f5638a9beb7f5a5c5499925665c25e84bce6b6b0df4f56ca55a03fd21f952ad81fe80536d95a05f35955e4bb506fa91af52ad81fe73ba546ba0c7686d9520a16aeb3a36123385242ad51a48a252ad81a429d51a489ada5a034954aa359044a55a034953aa8ef4750c49535b6b20c14ab59b81f90d9d1ebc41a2055bd00000000049454e44ae426082, 'post de ejemplo 5'),
(6, 88888888, 'post 6', 0x89504e470d0a1a0a0000000d49484452000000a60000003408060000000026433f000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000045649444154785eed9d4b6e134110863993df4ee2bcb62c39031bd87004368857a25c25b904a0e402b0487281acbcc8c252d4740dd38feaae1eb7e56828c3dfd2a7c2e39a677ff38f8592f8c5e9e9a93939393154df2d16e6763834bf2c5401e803e7db9be9d4cce7f386464cc78ff1385b0980bef83e1a99bdbdbd20a64b4ca919803e618909318116bc9824a5436a04a04f48cad96c16121362020d7831919840131013a88489797c7c0c31810a484a2426500713138909b440524ea753880974912526213502d027484ca0122fa64b4b2426d00049c9121362020d7831919840131013a804620295909493c90462025d30318f8e8e748b797e6d9e0c1fab2ba1afd06bee2ff3beabbbf64d1a776619bdf770b36c97db11adbbbc6f974963796d1edc36fc312ccde379d8eeedf0d2ac9ae5d1fed871a4831f57437c7ed27959d8f127e3e9e6425c470b24e56e2466c7c4651779934966bdb14017e6319ed7adc4b4235ebea19892445c3a41dcac271fc59b5a013b92986e22f9c50c173e9e98d0cb27b4b03c11c2bf9726ae20e6da894db611f62b88c9886e0a26b423acbfea3816777d32b1dd39179256032c31d58a59bc903481c963b2eba27b5184a4bab7934cd589d02e5fd9e5cd780631c37ebbc5946fb888f81c3bcef79f1093a474488d7f1377816b1e3dc5c9687049248979d90af7e73dff6f6112bb1ee56cbf4e4c2bfbd2c9d66ca7434cb73f3b4ae7cb6f8cf2b682e0d2483ff7ea82a41c8fc72131358b29cbc6d946cc7003b4934de9f94c623e7881a2eda73245095b3ed77c5d2e6aa028a6f8f140175e4ccd89597ef4fc118d4d48b1d7d2f928b7fd5ea465531b393ac45c9be04c4cfbda6dabdd3e1773dde7ca16b70d6924eba537691055775a12bb21264b9bb05cbed0a197a74e58cea465e2453d7634fb7a4e312d3c6df3d4cb529411c92b0e2e5c2a26e1f7a33c3599988787874ac5ec782cd9913df6ba52259df844bc4c900e31e5116d5f1093cbef7af90d918f563829f15bdc31c5d74212b37ce3ea82a4dc81c46cf113134631b5845e96948e54bc75af2ddb8919df649b89e9d7eb3a8f685fb29851afe2473a13931293901a01e8934c4cd58909fe1bbc982e2d9198400324e56834c2a31ce8c28b89c4049a2029212650074bccc5620131810a5862424ca0854c4c426a04a04f48caa1ad1013a8c28be9a4849840031013a884897970700031810a484a8809d4918949488d00f4094939180c909840173e315d5a223181067c62c662d2b79f4acd00f4c1370b13737f7fbf11f3ed7cde34e0fbca419ffc6ceb6b2b244999252609facaf2613a3567b399398b6b055f37a82293497dade04b47ad623c2ed70a3e6f5045ec13acba56f0a9a35661e5d9868f5638a9beb7f5a5c5499925665c25e84bce6b6b0df4f56ca55a03fd21f952ad81fe80536d95a05f35955e4bb506fa91af52ad81fe73ba546ba0c7686d9520a16aeb3a36123385242ad51a48a252ad81a429d51a489ada5a034954aa359044a55a034953aa8ef4750c49535b6b20c14ab59b81f90d9d1ebc41a2055bd00000000049454e44ae426082, 'post de ejemplo 6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_repoproyectosdetalles`
--

DROP TABLE IF EXISTS `tbl_repoproyectosdetalles`;
CREATE TABLE IF NOT EXISTS `tbl_repoproyectosdetalles` (
  `id_detalles` int(11) NOT NULL AUTO_INCREMENT,
  `id_repositorio` int(11) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `fechahora_comentario` datetime NOT NULL,
  `num_likes` int(11) NOT NULL,
  PRIMARY KEY (`id_detalles`),
  KEY `id_repositorio` (`id_repositorio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_role`
--

DROP TABLE IF EXISTS `tbl_role`;
CREATE TABLE IF NOT EXISTS `tbl_role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_role`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_role`
--

INSERT INTO `tbl_role` (`id_role`, `name`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `DNI` int(8) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(50) NOT NULL,
  `file` longblob NOT NULL,
  `token` varchar(255) NULL,
  `is_enabled` varchar(50) NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `last_name_father` varchar(255) NOT NULL,
  `last_name_mother` varchar(255) NOT NULL,
  PRIMARY KEY (`DNI`),
  KEY `id_institucion` (`id_institucion`),
  KEY `id_especialidad` (`id_especialidad`),
  KEY `id_role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_user`
--

INSERT INTO `tbl_user` (`DNI`, `password`, `username`, `email`, `phone`, `file`, `is_enabled`, `id_institucion`, `id_role`, `id_especialidad`, `last_name_father`, `last_name_mother`) VALUES
(22222222, '123456', 'Saul', 'saul@gmail.com', 999999995, '', '1', 1, 1, 1, 'Asparrin', 'Juarez'),
(33333333, '123456', 'Carlos', 'carlos@gmail.com', 999999994, '', '1', 1, 1, 1, 'Villalba', 'Castillo'),
(44444444, '123456', 'Milton', 'milton@gmail.com', 999999993, '', '1', 1, 1, 1, 'Hernandez', 'Rivera'),
(55555555, '123456', 'Jean', 'jean@gmail.com', 999999992, '', '1', 1, 1, 1, 'De la Gala', 'Gutierrez'),
(77777777, '123456', 'piero', 'piero@gmail.com', 999999999, '', '1', 1, 1, 1, 'Alvarez', 'Salas'),
(88888888, '123456', 'dayvid', 'dayvid@gmail.com', 999999991, '', '1', 1, 1, 1, 'Sanchez', 'Navarro');
(72658562, '123456', 'Brayan', 'brayansanchezheavens@gmail.com', 999999991, '', '1', 1, 1, 1, 'Sanchez', 'Navarro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user_roles`
--

DROP TABLE IF EXISTS `tbl_user_roles`;
CREATE TABLE IF NOT EXISTS `tbl_user_roles` (
  `users_dni` int(8) NOT NULL,
  `roles_id` int(11) NOT NULL,
  KEY `users_dni` (`users_dni`),
  KEY `roles_id` (`roles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
