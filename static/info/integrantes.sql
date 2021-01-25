-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2019 a las 23:21:49
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_instituto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `integrantes`
--

CREATE TABLE `integrantes` (
  `id_integrante` varchar(15) NOT NULL,
  `cod_integrante` int(11) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `fecha_nac_dia` int(2) NOT NULL,
  `fecha_nac_mes` int(2) NOT NULL,
  `fecha_nac_ano` int(2) NOT NULL,
  `edad_anos` int(3) NOT NULL,
  `edad_meses` int(2) NOT NULL,
  `edad_dias` int(2) NOT NULL,
  `edad_actual_d` int(2) NOT NULL,
  `edad_actual_m` int(2) NOT NULL,
  `edad_actual_a` int(4) NOT NULL,
  `sexo` char(9) NOT NULL,
  `parentesco_familiar` int(2) NOT NULL,
  `tipo_doc_identificacion` char(3) NOT NULL,
  `numero_doc_identificacion` varchar(15) NOT NULL,
  `escolaridad` int(1) NOT NULL,
  `ocupacion` int(2) NOT NULL,
  `tipo_vinculacion_sgsss` int(1) NOT NULL,
  `nombre_eps` varchar(30) DEFAULT NULL,
  `grupo_etnico` varchar(2) DEFAULT NULL,
  `desplazado` char(2) DEFAULT NULL,
  `discapacidad` char(2) DEFAULT NULL,
  `cual_discapacidad` varchar(20) DEFAULT NULL,
  `id_familia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=REDUNDANT;

--
-- Volcado de datos para la tabla `integrantes`
--

INSERT INTO `integrantes` (`id_integrante`, `cod_integrante`, `nombres`, `fecha_nac_dia`, `fecha_nac_mes`, `fecha_nac_ano`, `edad_anos`, `edad_meses`, `edad_dias`, `edad_actual_d`, `edad_actual_m`, `edad_actual_a`, `sexo`, `parentesco_familiar`, `tipo_doc_identificacion`, `numero_doc_identificacion`, `escolaridad`, `ocupacion`, `tipo_vinculacion_sgsss`, `nombre_eps`, `grupo_etnico`, `desplazado`, `discapacidad`, `cual_discapacidad`, `id_familia`) VALUES
('CC_0100', 1, 'Andres Benavides Molina ', 1, 1, 2019, 0, 3, 5, 28, 2, 0, 'M', 2, 'CC', '0100', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '5_11'),
('CC_0200', 2, 'Andrea Benavides Molina ', 1, 1, 2019, 0, 3, 5, 28, 2, 0, 'F', 2, 'CC', '0200', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '5_11'),
('CC_0300', 3, 'Carlos Benavides Molina ', 1, 5, 2017, 2, 10, 9, 28, 10, 1, 'M', 2, 'CC', '0300', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '5_11'),
('CC_0344', 4, 'Jesus B', 20, 1, 1993, 26, 2, 0, 9, 2, 26, 'M', 3, 'CC', '0344', 2, 3, 2, 'dasdas', '1', 'si', 'no', '', '5_11'),
('CC_0400', 5, 'Carolina Benavides Molina ', 1, 1, 2016, 3, 3, 5, 28, 2, 3, 'F', 2, 'CC', '0400', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '5_11'),
('CC_0500', 6, 'Pedro Benavides Molina ', 1, 1, 2012, 7, 3, 5, 28, 2, 7, 'M', 2, 'CC', '0500', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '5_11'),
('CC_0600', 7, 'Jennifer Benavides Molina ', 1, 1, 2012, 7, 3, 5, 28, 2, 7, 'F', 2, 'CC', '0600', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '5_11'),
('CC_0900', 8, 'Gabriel Benavides Molina ', 1, 1, 1950, 60, 3, 5, 28, 2, 69, 'M', 4, 'CC', '0900', 4, 4, 2, 'Emsanar', '1A', 'si', 'si', '2', '5_11'),
('CC_0910', 9, 'Natalia Benavides Molina ', 1, 1, 1946, 65, 3, 5, 28, 2, 73, 'F', 4, 'CC', '0910', 4, 4, 2, 'Emsanar', '1A', 'si', 'si', '2', '5_11'),
('CC_0911', 10, 'Juan Valdez', 3, 10, 1997, 21, 3, 7, 26, 5, 21, 'M', 2, 'CC', '0911', 2, 3, 1, 'ej', '1', 'si', 'si', '4', '5_11'),
('CC_1084551234', 11, 'Ana Camila Erazo', 20, 5, 1993, 24, 0, 5, 9, 10, 25, 'F', 2, 'CC', '1084551234', 9, 10, 1, 'nueva eps', '1', 'no', 'no', '', '5_11'),
('CC_2000', 1, 'Jesus', 1, 2, 2019, 0, 1, 28, 0, 0, 0, 'M', 1, 'CC', '2000', 1, 1, 1, '1', '', 'si', 'no', '1', '1_1'),
('CC_2085', 1, 'Camilo Benavides Mora', 2, 3, 1990, 29, 0, 6, 0, 0, 0, 'M', 1, '3', '2085', 2, 2, 2, 'Emsanar', '1', 'si', 'no', '', '1_1'),
('CC_2100', 2, 'Andres Benavides Molina ', 1, 1, 2019, 0, 3, 5, 0, 0, 0, 'M', 2, '1', '2100', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '1_1'),
('CC_2200', 3, 'Andrea Benavides Molina ', 1, 1, 2019, 0, 3, 5, 0, 0, 0, 'F', 2, '1', '2200', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '1_1'),
('CC_2300', 4, 'Carlos Benavides Molina ', 1, 1, 2017, 2, 3, 5, 0, 0, 0, 'M', 2, '1', '2300', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '1_1'),
('CC_2400', 5, 'Carolina Benavides Molina ', 1, 1, 2016, 2, 3, 5, 0, 0, 0, 'F', 2, '1', '2400', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '1_1'),
('CC_2500', 6, 'Pedro Benavides Molina ', 1, 1, 2012, 2, 3, 5, 0, 0, 0, 'M', 2, '1', '2500', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '1_1'),
('CC_2600', 7, 'Jennifer Benavides Molina ', 1, 1, 2012, 2, 3, 5, 0, 0, 0, 'F', 2, '1', '2600', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '1_1'),
('CC_2700', 8, 'Juan Benavides Molina ', 1, 1, 1990, 2, 3, 5, 0, 0, 0, 'M', 4, '1', '2700', 4, 4, 2, 'Emsanar', '1A', 'si', 'si', '2', '1_1'),
('CC_2800', 9, 'Lina Benavides Molina ', 1, 1, 1992, 2, 3, 5, 0, 0, 0, 'F', 4, '1', '2800', 4, 4, 2, 'Emsanar', '1A', 'si', 'si', '2', '1_1'),
('CC_2810', 12, 'Leidy Benavides Molina ', 1, 1, 1992, 2, 3, 5, 0, 0, 0, 'F', 4, '1', '2810', 4, 4, 2, 'Emsanar', '1A', 'si', 'si', '2', '1_1'),
('CC_2900', 10, 'Gabriel Benavides Molina ', 1, 1, 1950, 2, 3, 5, 0, 0, 0, 'M', 4, '1', '2900', 4, 4, 2, 'Emsanar', '1A', 'si', 'si', '2', '1_1'),
('CC_2910', 11, 'Natalia Benavides Molina ', 1, 1, 1946, 2, 3, 5, 0, 0, 0, 'F', 4, '1', '2910', 4, 4, 2, 'Emsanar', '1A', 'si', 'si', '2', '1_1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD PRIMARY KEY (`id_integrante`),
  ADD UNIQUE KEY `tipo_doc_identificacion` (`tipo_doc_identificacion`,`numero_doc_identificacion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
