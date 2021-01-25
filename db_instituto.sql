-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2019 a las 20:24:30
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
-- Estructura de tabla para la tabla `animales`
--

CREATE TABLE `animales` (
  `id_animales` int(11) NOT NULL,
  `tipo_animal` char(9) NOT NULL,
  `tiene_animal` char(2) NOT NULL,
  `num_vacunados` int(2) DEFAULT NULL,
  `num_no_vacunados` int(2) DEFAULT NULL,
  `id_visita` int(11) NOT NULL,
  `id_familia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `animales`
--

INSERT INTO `animales` (`id_animales`, `tipo_animal`, `tiene_animal`, `num_vacunados`, `num_no_vacunados`, `id_visita`, `id_familia`) VALUES
(1, 'Cerdos', 'si', 0, 3, 1, '5_11'),
(2, 'Perros', 'no', 0, 0, 1, '5_11'),
(3, 'Gatos', 'no', 0, 0, 1, '5_11'),
(4, 'Aves', 'no', 0, 0, 1, '5_11'),
(5, 'Caballos', 'si', 2, 3, 1, '5_11'),
(6, 'Otros', 'no', 0, 0, 1, '5_11'),
(7, 'Cerdos', 'si', 2, 3, 2, '5_11'),
(8, 'Perros', 'no', 0, 0, 2, '5_11'),
(9, 'Gatos', 'no', 0, 0, 2, '5_11'),
(10, 'Aves', 'si', 5, 0, 2, '5_11'),
(11, 'Caballos', 'si', 2, 3, 2, '5_11'),
(12, 'Otros', 'no', 0, 0, 2, '5_11'),
(13, 'Cerdos', 'no', 0, 0, 1, '1_1'),
(14, 'Perros', 'no', 0, 0, 1, '1_1'),
(15, 'Gatos', 'no', 0, 0, 1, '1_1'),
(16, 'Aves', 'no', 0, 0, 1, '1_1'),
(17, 'Caballos', 'no', 0, 0, 1, '1_1'),
(18, 'Otros', 'no', 0, 0, 1, '1_1'),
(19, 'Cerdos', 'no', 0, 0, 1, '1_2'),
(20, 'Perros', 'no', 0, 0, 1, '1_2'),
(21, 'Gatos', 'no', 0, 0, 1, '1_2'),
(22, 'Aves', 'no', 0, 0, 1, '1_2'),
(23, 'Caballos', 'no', 0, 0, 1, '1_2'),
(24, 'Otros', 'no', 0, 0, 1, '1_2'),
(25, 'Cerdos', 'no', 0, 0, 1, '1_3'),
(26, 'Perros', 'no', 0, 0, 1, '1_3'),
(27, 'Gatos', 'no', 0, 0, 1, '1_3'),
(28, 'Aves', 'no', 0, 0, 1, '1_3'),
(29, 'Caballos', 'no', 0, 0, 1, '1_3'),
(30, 'Otros', 'no', 0, 0, 1, '1_3'),
(31, 'Cerdos', 'no', 0, 0, 2, '1_3'),
(32, 'Perros', 'no', 0, 0, 2, '1_3'),
(33, 'Gatos', 'no', 0, 0, 2, '1_3'),
(34, 'Aves', 'no', 0, 0, 2, '1_3'),
(35, 'Caballos', 'no', 0, 0, 2, '1_3'),
(36, 'Otros', 'no', 0, 0, 2, '1_3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antecedentes`
--

CREATE TABLE `antecedentes` (
  `id_ante_elemento` int(11) NOT NULL,
  `nombre_tabla` varchar(70) NOT NULL,
  `nombre_elemento` varchar(40) NOT NULL,
  `edad_inicio` int(2) DEFAULT NULL,
  `frecuencia` int(1) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `id_integrante` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `antecedentes`
--

INSERT INTO `antecedentes` (`id_ante_elemento`, `nombre_tabla`, `nombre_elemento`, `edad_inicio`, `frecuencia`, `observaciones`, `id_integrante`) VALUES
(140, 'Consumo de Sustancias', 'Cigarrillo', 2, 4, '2', 'CC_0100'),
(141, 'Consumo de Sustancias', 'Otros', 9, 9, '8', 'CC_0200'),
(142, 'Violencia sexual', 'Acoso sexual', 2, 2, '2', 'CC_0200'),
(143, 'Sintomatologia Asociada a Violencia Social y Politica', 'Ansiedad generalizada', 2, NULL, '3', 'CC_0100'),
(147, 'indefinido', 'indefinido', NULL, NULL, NULL, 'CC_2000'),
(148, 'Consumo de Sustancias', 'Cigarrillo', 3, 3, 'das', 'CC_2200'),
(149, 'indefinido', 'indefinido', NULL, NULL, NULL, 'CC_2200'),
(155, 'Sintomatologia Asociada a Violencia Social y Politica', 'Ansiedad generalizada', 12, NULL, '', 'CC_2000'),
(159, 'indefinido', 'indefinido', NULL, NULL, NULL, 'CC_4000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas`
--

CREATE TABLE `caracteristicas` (
  `id_caracteristicas` int(11) NOT NULL,
  `piso` varchar(20) NOT NULL,
  `paredes` varchar(20) NOT NULL,
  `techo` varchar(20) NOT NULL,
  `num_habitaciones` int(2) NOT NULL,
  `ventilacion_adecuada` char(2) NOT NULL,
  `cocina_con` varchar(15) NOT NULL,
  `ubicacion_cocina` char(6) NOT NULL,
  `id_visita` int(11) NOT NULL,
  `id_familia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `caracteristicas`
--

INSERT INTO `caracteristicas` (`id_caracteristicas`, `piso`, `paredes`, `techo`, `num_habitaciones`, `ventilacion_adecuada`, `cocina_con`, `ubicacion_cocina`, `id_visita`, `id_familia`) VALUES
(2, '1', '2', '4', 0, 'no', '4', 'no', 1, '5_11'),
(3, '1', '2', '4', 0, 'no', '4', 'no', 2, '5_11'),
(4, '2', '4', '7', 0, 'no', '3', 'no', 1, '1_1'),
(5, '2', '5', '5', 0, 'no', '4', 'no', 1, '1_2'),
(6, '3', '5', '8', 0, 'no', '3', 'no', 1, '1_3'),
(7, '3', '5', '8', 0, 'no', '3', 'no', 2, '1_3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidades`
--

CREATE TABLE `comunidades` (
  `id_comunidad` int(11) NOT NULL,
  `nom_comunidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comunidades`
--

INSERT INTO `comunidades` (`id_comunidad`, `nom_comunidad`) VALUES
(1, 'Pueblos y comunidades indígenas'),
(2, 'Comunidades negras o afrocolombianas'),
(3, 'Comunidad raizal'),
(4, 'Pueblo Rom o Gitano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condiciones`
--

CREATE TABLE `condiciones` (
  `id_condi_elemento` int(11) NOT NULL,
  `nombre_tabla` varchar(40) NOT NULL,
  `nombre_elemento` varchar(30) NOT NULL,
  `id_visita` int(11) NOT NULL,
  `id_familia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `condiciones`
--

INSERT INTO `condiciones` (`id_condi_elemento`, `nombre_tabla`, `nombre_elemento`, `id_visita`, `id_familia`) VALUES
(7, 'Abastecimiento de Agua', 'Aljibe', 2, '5_11'),
(6, 'Alumbrado de la Vivienda', 'Energia Solar', 2, '5_11'),
(11, 'Deposicion final de la basura', 'Letrina', 1, '1_2'),
(12, 'Deposicion final de la basura', 'Campo Abierto', 1, '1_3'),
(9, 'Deposicion final de la basura', 'Taza Sanitaria / Pozo Septico', 2, '5_11'),
(13, 'indefinido', 'indefinido', 2, '1_3'),
(8, 'Manejo de la Basura', 'Bolsa Plastica', 2, '5_11'),
(10, 'Presencia', 'ninguno', 1, '1_1'),
(1, 'Presencia de Vectores', 'Moscas', 1, '5_11'),
(3, 'Presencia de Vectores', 'Otros', 1, '5_11'),
(4, 'Presencia de Vectores', 'Moscas', 2, '5_11'),
(5, 'Presencia de Vectores', 'Otros', 2, '5_11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `de_1_a_5`
--

CREATE TABLE `de_1_a_5` (
  `id_de_1_a_5` int(11) NOT NULL,
  `edad_meses_vis` int(3) NOT NULL,
  `control_crec_desa` char(2) NOT NULL,
  `lactancia_exclusiva` char(2) NOT NULL,
  `peso` float NOT NULL,
  `talla` int(3) NOT NULL,
  `imc` float NOT NULL,
  `peso_al_nacer` float NOT NULL,
  `estado_nutricional` char(8) NOT NULL,
  `motricidad_gruesa` char(8) NOT NULL,
  `motricidad_fina` char(8) NOT NULL,
  `audicion_lenguaje` char(8) NOT NULL,
  `personal_social` char(8) NOT NULL,
  `maltrato_fisico` char(2) NOT NULL,
  `maltrato_psico` char(2) NOT NULL,
  `problemas_visuales` char(2) NOT NULL,
  `problemas_auditivos` char(2) NOT NULL,
  `carnet` char(2) NOT NULL,
  `bcg` char(2) NOT NULL,
  `polio_1` char(2) NOT NULL,
  `polio_2` char(2) NOT NULL,
  `polio_3` char(2) NOT NULL,
  `polio_r1` char(2) NOT NULL,
  `polio_r2` char(2) NOT NULL,
  `dpt_1` char(2) NOT NULL,
  `dpt_2` char(2) NOT NULL,
  `dpt_3` char(2) NOT NULL,
  `dpt_r1` char(2) NOT NULL,
  `dpt_r2` char(2) NOT NULL,
  `hepatitisb_1` char(2) NOT NULL,
  `hepatitisb_2` char(2) NOT NULL,
  `hepatitisb_3` char(2) NOT NULL,
  `hib_1` char(2) NOT NULL,
  `hib_2` char(2) NOT NULL,
  `hib_3` char(2) NOT NULL,
  `srp_1` char(2) NOT NULL,
  `srp_r1` char(2) NOT NULL,
  `influenza_antigripal_1` char(2) NOT NULL,
  `influenza_antigripal_2` char(2) NOT NULL,
  `fiebre_amarilla` char(2) NOT NULL,
  `num_cepilladas` int(2) NOT NULL,
  `desparasitado` char(2) NOT NULL,
  `desparasitado_d` int(2) NOT NULL,
  `desparasitado_m` int(2) NOT NULL,
  `desparasitado_a` int(4) NOT NULL,
  `consume_medicamento` char(2) NOT NULL,
  `cual_medicamento` varchar(30) NOT NULL,
  `canalizado` char(2) NOT NULL,
  `remitido` int(2) DEFAULT NULL,
  `remitido_otro` varchar(20) NOT NULL,
  `valorado` char(2) NOT NULL,
  `observaciones` mediumtext,
  `id_integrante` varchar(15) NOT NULL,
  `id_visita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `de_1_a_5`
--

INSERT INTO `de_1_a_5` (`id_de_1_a_5`, `edad_meses_vis`, `control_crec_desa`, `lactancia_exclusiva`, `peso`, `talla`, `imc`, `peso_al_nacer`, `estado_nutricional`, `motricidad_gruesa`, `motricidad_fina`, `audicion_lenguaje`, `personal_social`, `maltrato_fisico`, `maltrato_psico`, `problemas_visuales`, `problemas_auditivos`, `carnet`, `bcg`, `polio_1`, `polio_2`, `polio_3`, `polio_r1`, `polio_r2`, `dpt_1`, `dpt_2`, `dpt_3`, `dpt_r1`, `dpt_r2`, `hepatitisb_1`, `hepatitisb_2`, `hepatitisb_3`, `hib_1`, `hib_2`, `hib_3`, `srp_1`, `srp_r1`, `influenza_antigripal_1`, `influenza_antigripal_2`, `fiebre_amarilla`, `num_cepilladas`, `desparasitado`, `desparasitado_d`, `desparasitado_m`, `desparasitado_a`, `consume_medicamento`, `cual_medicamento`, `canalizado`, `remitido`, `remitido_otro`, `valorado`, `observaciones`, `id_integrante`, `id_visita`) VALUES
(6, 34, 'no', 'no', 3, 33, 27.5, 3000, 'normal', 'normal', 'normal', 'normal', 'normal', '', 'si', 'no', 'no', 'si', '', 'si', '', 'si', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 'si', 4, 4, 2012, 'no', 'sads', 'no', 4, 'nep', 'no', 'SADFASD', 'CC_0300', 1),
(7, 39, 'no', 'no', 3, 33, 27.5, 3000, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', 'no', 'no', 'si', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'no', 0, 0, 0, 'no', '', 'no', 0, '', 'no', 'ADSASDDSA', 'CC_0400', 1),
(10, 22, 'no', 'no', 3, 33, 27.5, 3000, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', 'no', 'no', 'si', '', 'si', '', 'si', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '', 4, 4, 2012, 'no', '', 'no', 4, 'nep', 'no', 'asdsda1', 'CC_0300', 2),
(11, 38, 'no', 'no', 3, 33, 27.5, 3000, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', 'no', 'no', 'si', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'no', 0, 0, 0, 'no', '', 'no', 0, 'nep', 'no', 'asfa2', 'CC_0400', 2),
(12, 27, 'no', 'no', 3, 33, 27.5, 2333, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', 'no', 'no', 'si', 'si', '', '', '', '', '', '', '', '', '', '', '', 's', '', '', '', '', '', '', '', '', '', 0, 'no', 0, 0, 0, 'no', '', 'no', 0, 'asd 9', 'no', '', 'CC_2300', 1),
(13, 27, 'no', 'no', 15, 90, 18.5, 3000, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', 'no', 'no', 'si', '', 'si', '', '', '', '', '', '', '', '', '', '', '', 'si', '', '', '', '', '', '', '', '', 0, '', 2, 2, 2000, 'si', 'asd', 'no', 9, 'asd 9', 'no', '', 'CC_2400', 1),
(15, 26, 'no', 'no', 17, 80, 26.6, 2333, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', 'no', 'no', 'si', 'si', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'no', 0, 0, 0, 'no', '', 'no', 0, 'asd 9', 'no', '', 'CC_2300', 2),
(16, 38, 'no', 'no', 16, 78, 26.3, 3000, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', 'no', 'no', 'si', '', 'si', '', '', '', '', '', '', '', '', '', '', '', 'si', '', '', '', '', '', '', '', '', 0, '', 2, 2, 2000, 'si', 'asd', 'no', 9, 'asd 9', 'no', '', 'CC_2400', 2),
(17, 48, 'no', 'no', 15, 99, 15.3, 3000, 'normal', 'normal', 'normal', 'normal', 'normal', '', 'si', 'no', 'no', 'si', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'no', 0, 0, 0, 'si', 'asd', 'no', 5, '', 'no', '', 'CC_2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `de_5_a_9`
--

CREATE TABLE `de_5_a_9` (
  `id_de_5_a_9` int(11) NOT NULL,
  `edad_meses_vis` int(3) NOT NULL,
  `control_crec_desa` char(2) NOT NULL,
  `lactancia_exclusiva` char(2) NOT NULL,
  `peso` float NOT NULL,
  `talla` int(3) NOT NULL,
  `imc` float NOT NULL,
  `estado_nutricional` char(8) NOT NULL,
  `motricidad_gruesa` char(8) NOT NULL,
  `motricidad_fina` char(8) NOT NULL,
  `audicion_lenguaje` char(8) NOT NULL,
  `personal_social` char(8) NOT NULL,
  `maltrato_fisico` char(2) NOT NULL,
  `maltrato_psico` char(2) NOT NULL,
  `dpt` char(2) NOT NULL,
  `vop` char(2) NOT NULL,
  `srp` char(2) NOT NULL,
  `caries` char(2) NOT NULL,
  `aplicacion_fluor` char(2) NOT NULL,
  `aplicacion_sellantes` char(2) NOT NULL,
  `seda_dental` char(2) NOT NULL,
  `num_cepilladas` char(2) NOT NULL,
  `desparasitado` char(2) NOT NULL,
  `desparasitado_d` int(2) NOT NULL,
  `desparasitado_m` int(2) NOT NULL,
  `desparasitado_a` int(2) NOT NULL,
  `consume_medicamento` char(2) NOT NULL,
  `cual_medicamento` varchar(30) NOT NULL,
  `canalizado` char(2) NOT NULL,
  `remitido` int(2) DEFAULT NULL,
  `remitido_otro` varchar(20) NOT NULL,
  `valorado` char(2) NOT NULL,
  `observaciones` mediumtext,
  `id_integrante` varchar(15) NOT NULL,
  `id_visita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `de_5_a_9`
--

INSERT INTO `de_5_a_9` (`id_de_5_a_9`, `edad_meses_vis`, `control_crec_desa`, `lactancia_exclusiva`, `peso`, `talla`, `imc`, `estado_nutricional`, `motricidad_gruesa`, `motricidad_fina`, `audicion_lenguaje`, `personal_social`, `maltrato_fisico`, `maltrato_psico`, `dpt`, `vop`, `srp`, `caries`, `aplicacion_fluor`, `aplicacion_sellantes`, `seda_dental`, `num_cepilladas`, `desparasitado`, `desparasitado_d`, `desparasitado_m`, `desparasitado_a`, `consume_medicamento`, `cual_medicamento`, `canalizado`, `remitido`, `remitido_otro`, `valorado`, `observaciones`, `id_integrante`, `id_visita`) VALUES
(7, 87, 'no', 'no', 60, 100, 60, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', '', '', '', 'no', 'no', 'no', 'no', '0', 'no', 0, 0, 0, 'no', '', 'no', 0, '', 'no', 'ga', 'CC_0500', 1),
(8, 87, 'no', 'no', 3, 33, 27.5, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', '', '', '', 'no', 'no', 'no', 'no', '0', 'no', 0, 0, 0, 'no', '', 'no', 0, '', 'no', 'y', 'CC_0600', 1),
(9, 86, 'no', 'no', 3, 33, 27.5, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', '', '', '', 'no', 'no', 'no', 'no', '0', 'no', 0, 0, 0, 'no', '', 'no', 0, '', 'no', '', 'CC_0500', 2),
(10, 86, 'no', 'no', 3, 33, 27.5, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', '', '', '', 'no', 'no', 'no', 'no', '0', 'no', 0, 0, 0, 'no', '', 'no', 0, '', 'no', '', 'CC_0600', 2),
(11, 87, 'no', 'no', 4, 44, 20.7, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', 'si', '', '', 'no', 'no', 'no', 'no', '0', 'no', 0, 0, 0, 'no', '', 'no', 0, 'sdf 7', 'no', '', 'CC_2500', 1),
(12, 87, 'no', 'no', 5, 50, 20, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', '', 'si', '', 'no', 'no', 'no', 'no', '', 'no', 0, 0, 0, 'si', 'sdfds', 'no', 7, 'sdf 7', 'no', '', 'CC_2600', 1),
(13, 86, 'no', 'no', 5, 55, 16.5, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', 'si', '', '', 'no', 'no', 'no', 'no', '0', 'no', 0, 0, 0, 'no', '', 'no', 0, 'sdf 7', 'no', '', 'CC_2500', 2),
(14, 86, 'no', 'no', 5, 55, 16.5, 'normal', 'normal', 'normal', 'normal', 'normal', '', 'si', '', 'si', '', 'no', 'no', 'no', 'no', '0', 'no', 0, 0, 0, 'si', 'sdfds', 'no', 7, 'sdf 7', 'no', '', 'CC_2600', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `de_10_a_59`
--

CREATE TABLE `de_10_a_59` (
  `id_de_10_a_59` int(11) NOT NULL,
  `edad` int(3) NOT NULL,
  `metodo_planificacion` int(2) DEFAULT NULL,
  `tiempo_con_metodo` int(3) NOT NULL,
  `controles_ult_ano_planifi` int(2) DEFAULT NULL,
  `motivo_no_planifi` int(11) DEFAULT NULL,
  `citologia` char(8) NOT NULL,
  `citologia_d` int(2) DEFAULT NULL,
  `citologia_m` int(2) DEFAULT NULL,
  `citologia_a` int(4) DEFAULT NULL,
  `autoexamen_seno` char(8) NOT NULL,
  `violencia_contra_mujer` char(2) DEFAULT NULL,
  `v_contra_mujer_valorado` char(2) DEFAULT NULL,
  `carnet` char(2) NOT NULL,
  `td_tt_10a18_1` char(2) NOT NULL,
  `td_tt_10a18_2` char(2) NOT NULL,
  `td_tt_10a18_3` char(2) NOT NULL,
  `td_tt_10a18_4` char(2) NOT NULL,
  `td_tt_10a18_5` char(2) NOT NULL,
  `td_tt_19a49_1` char(2) NOT NULL,
  `td_tt_19a49_2` char(2) NOT NULL,
  `td_tt_19a49_3` char(2) NOT NULL,
  `td_tt_19a49_4` char(2) NOT NULL,
  `td_tt_19a49_5` char(2) NOT NULL,
  `fiebre_amarilla_m` char(2) DEFAULT NULL,
  `sr_m` char(2) NOT NULL,
  `examen_prostata` char(8) NOT NULL,
  `examem_pros_d` int(2) NOT NULL,
  `examem_pros_m` int(2) NOT NULL,
  `examem_pros_a` int(4) NOT NULL,
  `fiebre_amarilla_h` char(2) NOT NULL,
  `seda_dental` char(2) NOT NULL,
  `numero_cepilladas` int(2) NOT NULL,
  `problemas_visuales` char(2) NOT NULL,
  `valor_glicemia` int(3) NOT NULL,
  `estado_glicemia` varchar(30) DEFAULT NULL,
  `peso` float NOT NULL,
  `talla` int(3) DEFAULT NULL,
  `imc` float DEFAULT NULL,
  `estado_nutricional` char(9) NOT NULL,
  `pulso_minuto` int(3) NOT NULL,
  `presion_arterial` char(8) DEFAULT NULL,
  `estado_presion_arterial` varchar(20) DEFAULT NULL,
  `consume_medicamento` char(2) NOT NULL,
  `cual_medicamento` varchar(30) NOT NULL,
  `canalizado` char(2) NOT NULL,
  `remitido` int(2) DEFAULT NULL,
  `remitido_otro` varchar(20) NOT NULL,
  `valorado` char(2) NOT NULL,
  `observaciones` mediumtext,
  `id_integrante` varchar(15) NOT NULL,
  `id_visita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `de_10_a_59`
--

INSERT INTO `de_10_a_59` (`id_de_10_a_59`, `edad`, `metodo_planificacion`, `tiempo_con_metodo`, `controles_ult_ano_planifi`, `motivo_no_planifi`, `citologia`, `citologia_d`, `citologia_m`, `citologia_a`, `autoexamen_seno`, `violencia_contra_mujer`, `v_contra_mujer_valorado`, `carnet`, `td_tt_10a18_1`, `td_tt_10a18_2`, `td_tt_10a18_3`, `td_tt_10a18_4`, `td_tt_10a18_5`, `td_tt_19a49_1`, `td_tt_19a49_2`, `td_tt_19a49_3`, `td_tt_19a49_4`, `td_tt_19a49_5`, `fiebre_amarilla_m`, `sr_m`, `examen_prostata`, `examem_pros_d`, `examem_pros_m`, `examem_pros_a`, `fiebre_amarilla_h`, `seda_dental`, `numero_cepilladas`, `problemas_visuales`, `valor_glicemia`, `estado_glicemia`, `peso`, `talla`, `imc`, `estado_nutricional`, `pulso_minuto`, `presion_arterial`, `estado_presion_arterial`, `consume_medicamento`, `cual_medicamento`, `canalizado`, `remitido`, `remitido_otro`, `valorado`, `observaciones`, `id_integrante`, `id_visita`) VALUES
(7, 24, 3, 0, 0, 2, 'normal', 0, 0, 0, 'normal', '', 'no', 'si', '', '', '', '', '', '', '', '', '', '', '', '', 'no', 0, 0, 0, '', 'no', 0, 'no', 70, 'Normal', 2, 33, 18.4, 'Bajo Peso', 60, '120/80', 'Normal', '', '', 'no', 2, '', 'no', '', 'CC_1084551234', 1),
(8, 21, 0, 0, 0, 0, 'no', 0, 0, 0, 'normal', '', 'no', 'si', '', '', '', '', '', '', '', '', '', '', '', '', 'no', 0, 0, 0, '', 'no', 0, 'no', 70, 'Normal', 2, 25, 32, 'Obesidad', 60, '120/80', 'Normal', '', '', 'no', 0, '', 'no', '', 'CC_0911', 1),
(9, 21, 0, 0, 0, 0, 'normal', 0, 0, 0, 'normal', '', 'no', 'si', '', '', '', '', '', '', '', '', '', '', '', '', 'no', 0, 0, 0, '', 'no', 0, 'no', 70, 'Normal', 2, 25, 32, 'Obesidad', 60, '120/80', 'Normal', '', '', 'no', 0, '', 'no', '', 'CC_0911', 2),
(10, 25, 3, 0, 0, 0, 'normal', 0, 0, 0, 'normal', '', 'no', 'si', '', '', '', '', '', '', '', '', '', '', '', '', 'no', 0, 0, 0, '', 'no', 0, 'no', 70, 'Normal', 2, 33, 18.4, 'Bajo Peso', 60, '120/80', 'Normal', '', '', 'no', 2, '', 'no', '', 'CC_1084551234', 2),
(13, 34, 3, 3, 3, 0, 'normal', 2, 2, 2000, 'normal', '', 'no', 'si', '', 'si', '', '', '', '', '', '', 'si', '', '', '', 'no', 0, 0, 0, '', 'no', 0, 'no', 44, 'Anormal', 44, 140, 22.4, 'Peso Norm', 3, '2', 'Hipotension', '', '', 'no', 5, '', 'no', '', 'CC_2700', 1),
(14, 36, 0, 0, 0, 0, 'normal', 0, 0, 0, 'normal', '', 'no', 'si', '', '', '', '', '', '', '', '', '', '', '', '', 'no', 0, 0, 0, '', 'no', 0, 'no', 34, 'Anormal', 4, 22, 82.6, 'Obesidad', 4, '3', 'Hipotension', '', '', 'no', 0, '', 'no', '', 'CC_2810', 1),
(15, 29, 3, 3, 3, 0, 'normal', 2, 2, 2000, 'normal', '', 'no', 'si', '', 'si', '', '', '', '', '', '', '', '', '', '', 'no', 0, 0, 0, '', 'no', 0, 'no', 44, 'Anormal', 44, 140, 22.4, 'Peso Norm', 3, '2', 'Hipotension', '', '', 'no', 5, '', 'no', '', 'CC_2700', 2),
(16, 27, 0, 0, 0, 0, 'normal', 0, 0, 0, 'no', '', 'no', 'si', '', '', '', '', '', '', '', '', '', '', '', '', 'no', 0, 0, 0, '', 'no', 0, 'no', 34, 'Anormal', 4, 22, 82.6, 'Obesidad', 4, '3', 'Hipotension', '', '', 'no', 0, '', 'no', '', 'CC_2810', 2),
(17, 29, 0, 0, 0, 0, 'normal', 0, 0, 0, 'normal', '', 'si', 'si', 'si', 'si', '', '', 'si', '', '', '', '', '', '', '', 'no', 0, 0, 0, '', 'no', 0, 'no', 80, 'Normal', 48, 140, 24.5, 'Peso Norm', 130, '120/80', 'Normal', '', '', 'no', 0, '', 'no', '', 'CC_4000', 1),
(18, 29, 0, 0, 0, 0, 'no', 0, 0, 0, 'normal', '5', 'si', 'si', 'si', 'si', '', '', 'si', '', '', '', '', '', '', '', 'no', 0, 0, 0, 'si', 'no', 0, 'no', 80, 'Normal', 48, 140, 24.5, 'Peso Norm', 130, '120/80', 'Normal', '', '', 'no', 0, '', 'no', '', 'CC_4000', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `de_60_mas`
--

CREATE TABLE `de_60_mas` (
  `id_de_60_mas` int(11) NOT NULL,
  `edad` int(2) NOT NULL,
  `peso` float DEFAULT NULL,
  `talla` int(3) DEFAULT NULL,
  `imc` float DEFAULT NULL,
  `estado_nutricional` varchar(50) DEFAULT NULL,
  `citologia_ult_5` char(8) DEFAULT NULL,
  `citologia_ult_4` char(8) DEFAULT NULL,
  `citologia_ult_1` char(8) DEFAULT NULL,
  `autoexamen_seno` char(8) DEFAULT NULL,
  `examen_prostata` char(2) NOT NULL,
  `examen_prostata_res` char(8) DEFAULT NULL,
  `seda_dental` char(2) DEFAULT NULL,
  `num_cepilladas` int(2) NOT NULL,
  `piedra_piezas_dentales` char(2) DEFAULT NULL,
  `uso_protesis_dentales` char(2) DEFAULT NULL,
  `valor_glicemia` int(3) NOT NULL,
  `estado_glicemia` char(8) DEFAULT NULL,
  `pulso_minuto` int(3) DEFAULT NULL,
  `presion_sistolica` int(3) DEFAULT NULL,
  `presion_diastolica` int(3) DEFAULT NULL,
  `pam` decimal(4,0) DEFAULT NULL,
  `estado_presion` varchar(15) DEFAULT NULL,
  `actividad_fisica` char(2) DEFAULT NULL,
  `problemas_visuales` char(2) DEFAULT NULL,
  `vacu_tipo_biologico` int(2) DEFAULT NULL,
  `vacu_num_dosis` int(2) DEFAULT NULL,
  `vacu_d` int(2) DEFAULT NULL,
  `vacu_m` int(2) DEFAULT NULL,
  `vacu_a` int(4) DEFAULT NULL,
  `consume_medicamento` char(2) DEFAULT NULL,
  `cual_medicamento` varchar(20) DEFAULT NULL,
  `canalizado` char(2) DEFAULT NULL,
  `remitido` int(2) DEFAULT NULL,
  `remitido_otro` varchar(20) DEFAULT NULL,
  `valorado` char(2) DEFAULT NULL,
  `observaciones` mediumtext,
  `id_integrante` varchar(15) NOT NULL,
  `id_visita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `de_60_mas`
--

INSERT INTO `de_60_mas` (`id_de_60_mas`, `edad`, `peso`, `talla`, `imc`, `estado_nutricional`, `citologia_ult_5`, `citologia_ult_4`, `citologia_ult_1`, `autoexamen_seno`, `examen_prostata`, `examen_prostata_res`, `seda_dental`, `num_cepilladas`, `piedra_piezas_dentales`, `uso_protesis_dentales`, `valor_glicemia`, `estado_glicemia`, `pulso_minuto`, `presion_sistolica`, `presion_diastolica`, `pam`, `estado_presion`, `actividad_fisica`, `problemas_visuales`, `vacu_tipo_biologico`, `vacu_num_dosis`, `vacu_d`, `vacu_m`, `vacu_a`, `consume_medicamento`, `cual_medicamento`, `canalizado`, `remitido`, `remitido_otro`, `valorado`, `observaciones`, `id_integrante`, `id_visita`) VALUES
(2, 60, 3, 33, 27.5, 'Sobrepeso', 'normal', 'normal', 'normal', 'no', 'si', 'normal', 'no', 0, 'no', 'si', 70, 'Normal', 78, 120, 80, '93', 'Normal', 'si', 'si', 0, 0, 0, 0, 0, '', '', 'no', NULL, '', 'no', '', 'CC_0900', 1),
(3, 65, 3, 33, 27.5, 'Sobrepeso', 'normal', 'normal', 'normal', 'no', 'si', 'normal', 'no', 0, 'no', 'si', 70, 'Normal', 78, 120, 80, '93', 'Normal', 'si', 'si', 0, 0, 0, 0, 0, '', '', 'no', NULL, '', 'no', '', 'CC_0910', 1),
(4, 69, 3, 33, 27.5, 'Sobrepeso', 'normal', 'normal', 'normal', 'no', 'si', 'anormal', 'no', 0, 'no', 'si', 70, 'Normal', 78, 120, 80, '93', 'Normal', 'si', 'si', 0, 0, 0, 0, 0, '', '', 'no', NULL, '', 'no', '', 'CC_0900', 2),
(5, 73, 3, 33, 27.5, 'Sobrepeso', 'normal', 'normal', 'normal', 'no', 'si', 'anormal', 'no', 0, 'no', 'si', 70, 'Normal', 78, 120, 80, '93', 'Normal', 'si', 'si', 0, 0, 0, 0, 0, '', '', 'no', NULL, '', 'no', '', 'CC_0910', 2),
(8, 60, 3, 33, 27.5, 'Sobrepeso', 'normal', 'normal', 'normal', 'no', 'si', 'normal', 'no', 0, 'no', 'si', 3, 'Anormal', 3, 33, 3, '13', 'Hipotension', 'si', 'si', 0, 0, 0, 0, 0, '', '', 'no', 4, '8', 'no', '', 'CC_2900', 1),
(9, 67, 3, 33, 27.5, 'Sobrepeso', 'normal', 'normal', 'normal', 'no', 'si', 'normal', 'no', 0, 'no', 'si', 3, '3', 3, 33, 33, '33', 'Hipotension', 'si', 'si', 0, 0, 0, 0, 0, '', '', 'no', NULL, '8', 'no', '', 'CC_2910', 1),
(10, 69, 3, 33, 27.5, 'Sobrepeso', 'normal', 'normal', 'normal', 'no', 'si', 'anormal', 'no', 0, 'no', 'si', 3, 'Anormal', 3, 33, 3, '13', 'Hipotension', 'si', 'si', 0, 0, 0, 0, 0, '', '', 'no', 4, '8', 'no', '', 'CC_2900', 2),
(11, 73, 3, 33, 27.5, 'Sobrepeso', 'normal', 'normal', 'normal', 'no', 'si', 'anormal', 'no', 0, 'no', 'si', 3, '3', 3, 33, 33, '33', 'Hipotension', 'si', 'si', 0, 0, 0, 0, 0, '', '', 'no', NULL, '8', 'no', '', 'CC_2910', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadis_morbilidad`
--

CREATE TABLE `estadis_morbilidad` (
  `id_esta_morbilidad` int(11) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `sexo` char(9) NOT NULL,
  `edad` int(2) NOT NULL,
  `causa` varchar(30) NOT NULL,
  `codigo_cie10` varchar(40) NOT NULL,
  `id_familia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadis_morbilidad`
--

INSERT INTO `estadis_morbilidad` (`id_esta_morbilidad`, `nombres`, `sexo`, `edad`, `causa`, `codigo_cie10`, `id_familia`) VALUES
(44, 'jhaja', 'M', 2, '23', '3', '5_11'),
(45, 'jhaja', 'M', 2, '23', '3', '5_11'),
(46, 'jhaja', 'M', 2, '23', '3', '5_11'),
(47, 'jhaja', 'M', 2, '23', '3', '5_11'),
(48, 'jhaja', 'M', 2, '23', '3', '5_11'),
(49, 'jhaja', 'M', 2, '23', '3', '5_11'),
(50, 'jhaja', 'M', 2, '23', '3', '5_11'),
(51, 'saasd', 'M', 23, 'acas', 'asd', '1_3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadis_mortalidad`
--

CREATE TABLE `estadis_mortalidad` (
  `id_esta_mortalidad` int(11) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `sexo` char(9) NOT NULL,
  `edad` int(2) NOT NULL,
  `causa` varchar(30) NOT NULL,
  `codigo_cie10` varchar(40) NOT NULL,
  `parto_fecha_d` int(2) NOT NULL,
  `parto_fecha_m` int(2) NOT NULL,
  `parto_fecha_a` int(4) NOT NULL,
  `id_familia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadis_mortalidad`
--

INSERT INTO `estadis_mortalidad` (`id_esta_mortalidad`, `nombres`, `sexo`, `edad`, `causa`, `codigo_cie10`, `parto_fecha_d`, `parto_fecha_m`, `parto_fecha_a`, `id_familia`) VALUES
(25, 'asfs', 'M', 2, '2', '2', 2, 2, 2, '5_11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadis_nacidos`
--

CREATE TABLE `estadis_nacidos` (
  `id_esta_nacidos` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `sexo` char(9) NOT NULL,
  `edad` int(2) NOT NULL,
  `registrado` char(2) NOT NULL,
  `parto_atendido_por` int(2) NOT NULL,
  `parto_atendido_otro` varchar(20) NOT NULL,
  `parto_fecha_d` int(2) NOT NULL,
  `parto_fecha_m` int(2) NOT NULL,
  `parto_fecha_a` int(4) NOT NULL,
  `id_familia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadis_nacidos`
--

INSERT INTO `estadis_nacidos` (`id_esta_nacidos`, `nombres`, `sexo`, `edad`, `registrado`, `parto_atendido_por`, `parto_atendido_otro`, `parto_fecha_d`, `parto_fecha_m`, `parto_fecha_a`, `id_familia`) VALUES
(59, 'jes', 'M', 2, 'si', 1, 'benedict', 2, 2, 2, '5_11'),
(60, 'js', 'F', 2, 'si', 2, 'benedict', 2, 2, 2, '5_11'),
(61, 'asdsad', 'M', 24, 'si', 10, '', 2, 3, 3, '1_2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE `familias` (
  `id_familia` varchar(30) NOT NULL,
  `casa_numero` int(11) NOT NULL,
  `familia_numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `familias`
--

INSERT INTO `familias` (`id_familia`, `casa_numero`, `familia_numero`) VALUES
('1_1', 1, 1),
('1_2', 1, 2),
('1_3', 1, 3),
('5_11', 5, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestacion`
--

CREATE TABLE `gestacion` (
  `id_gestacion` int(11) NOT NULL,
  `embarazada` char(2) DEFAULT NULL,
  `control_prenatal` int(2) DEFAULT NULL,
  `control_prenatal_quien` int(2) DEFAULT NULL,
  `control_prenatal_d` int(2) DEFAULT NULL,
  `control_prenatal_m` int(2) DEFAULT NULL,
  `control_prenatal_a` int(4) DEFAULT NULL,
  `ante_gestaciones` int(2) DEFAULT NULL,
  `ante_partos` int(2) DEFAULT NULL,
  `ante_abortos` int(2) DEFAULT NULL,
  `ante_cesareas` int(11) DEFAULT NULL,
  `ante_num_hijos_vivos` int(2) DEFAULT NULL,
  `ultimo_parto_d` int(2) DEFAULT NULL,
  `ultimo_parto_m` int(2) DEFAULT NULL,
  `ultimo_parto_a` int(4) DEFAULT NULL,
  `califi_riesgo_materno` char(8) DEFAULT NULL,
  `ultimo_regla_d` int(2) DEFAULT NULL,
  `ultimo_regla_m` int(2) DEFAULT NULL,
  `ultimo_regla_a` int(4) DEFAULT NULL,
  `fecha_prob_parto_d` int(2) DEFAULT NULL,
  `fecha_prob_parto_m` int(2) DEFAULT NULL,
  `fecha_prob_parto_a` int(4) DEFAULT NULL,
  `peso` int(4) NOT NULL,
  `gestacion` int(2) DEFAULT NULL,
  `serologia` char(8) DEFAULT NULL,
  `vih` char(8) DEFAULT NULL,
  `odontologia` char(2) DEFAULT NULL,
  `td_tt_10a18_1` char(2) DEFAULT NULL,
  `td_tt_10a18_2` char(2) DEFAULT NULL,
  `td_tt_10a18_3` char(2) DEFAULT NULL,
  `td_tt_19a49_1` char(2) DEFAULT NULL,
  `td_tt_19a49_2` char(2) DEFAULT NULL,
  `td_tt_19a49_3` char(2) DEFAULT NULL,
  `suplementacion` char(2) DEFAULT NULL,
  `sedentarismo` char(2) DEFAULT NULL,
  `fuma` char(2) DEFAULT NULL,
  `consume_alcohol` char(2) DEFAULT NULL,
  `tipo_parto` varchar(15) DEFAULT NULL,
  `atencion_parto_i` int(2) DEFAULT NULL,
  `atencion_parto_d` int(2) DEFAULT NULL,
  `atencion_institucional` char(2) DEFAULT NULL,
  `planificacion` int(2) DEFAULT NULL,
  `consume_medicamento` char(2) DEFAULT NULL,
  `cual_medicamento` varchar(20) DEFAULT NULL,
  `canalizado` char(2) DEFAULT NULL,
  `remitido` int(2) DEFAULT NULL,
  `remitido_otro` varchar(15) DEFAULT NULL,
  `valorado` char(2) DEFAULT NULL,
  `observaciones` mediumtext,
  `id_integrante` varchar(15) NOT NULL,
  `id_visita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `gestacion`
--

INSERT INTO `gestacion` (`id_gestacion`, `embarazada`, `control_prenatal`, `control_prenatal_quien`, `control_prenatal_d`, `control_prenatal_m`, `control_prenatal_a`, `ante_gestaciones`, `ante_partos`, `ante_abortos`, `ante_cesareas`, `ante_num_hijos_vivos`, `ultimo_parto_d`, `ultimo_parto_m`, `ultimo_parto_a`, `califi_riesgo_materno`, `ultimo_regla_d`, `ultimo_regla_m`, `ultimo_regla_a`, `fecha_prob_parto_d`, `fecha_prob_parto_m`, `fecha_prob_parto_a`, `peso`, `gestacion`, `serologia`, `vih`, `odontologia`, `td_tt_10a18_1`, `td_tt_10a18_2`, `td_tt_10a18_3`, `td_tt_19a49_1`, `td_tt_19a49_2`, `td_tt_19a49_3`, `suplementacion`, `sedentarismo`, `fuma`, `consume_alcohol`, `tipo_parto`, `atencion_parto_i`, `atencion_parto_d`, `atencion_institucional`, `planificacion`, `consume_medicamento`, `cual_medicamento`, `canalizado`, `remitido`, `remitido_otro`, `valorado`, `observaciones`, `id_integrante`, `id_visita`) VALUES
(1, 'no', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'alto', 0, 0, 0, 0, 0, 0, 0, 0, 'negativo', 'negativo', 'si', '', '', '', '', '', '', 'no', 'no', 'no', 'no', 'normal', 0, 0, 'si', 0, '', '', 'no', 0, '', 'no', '', 'CC_0910', 1),
(2, 'no', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'alto', 0, 0, 0, 0, 0, 0, 0, 0, 'negativo', 'negativo', 'si', '', '', '', '', '', '', 'no', 'no', 'no', 'no', 'normal', 0, 0, 'si', 0, '', '', 'no', 0, '', 'no', '', 'CC_1084551234', 1),
(3, 'no', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'alto', 0, 0, 0, 0, 0, 0, 0, 0, 'negativo', 'negativo', 'si', '', '', '', '', '', '', 'no', 'no', 'no', 'no', 'normal', 0, 0, 'si', 0, '', '', 'no', 0, '', 'no', '', 'CC_0910', 2),
(4, 'no', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'alto', 0, 0, 0, 0, 0, 0, 0, 0, 'negativo', 'negativo', 'si', '', '', '', '', '', '', 'no', 'no', 'no', 'no', 'normal', 0, 0, 'si', 0, '', '', 'no', 0, '', 'no', '', 'CC_1084551234', 2),
(9, 'no', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'alto', 0, 0, 0, 0, 0, 0, 0, 0, 'negativo', 'negativo', 'si', '', '', '', '', '', '', 'no', 'no', 'no', 'no', 'normal', 0, 0, 'si', 0, '', '', 'no', 0, '', 'no', '', 'CC_2810', 1),
(10, 'no', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'alto', 0, 0, 0, 0, 0, 0, 0, 0, 'negativo', 'negativo', 'si', '', '', '', '', '', '', 'no', 'no', 'no', 'no', 'normal', 0, 0, 'si', 0, '', '', 'no', 9, '', 'no', '', 'CC_2910', 1),
(11, 'no', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'alto', 0, 0, 0, 0, 0, 0, 0, 0, 'negativo', 'negativo', 'si', '', '', '', '', '', '', 'no', 'no', 'no', 'no', 'normal', 0, 0, 'si', 0, '', '', 'no', 0, '', 'no', '', 'CC_2810', 2),
(12, 'no', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'alto', 0, 0, 0, 0, 0, 0, 0, 0, 'negativo', 'negativo', 'si', '', '', '', '', '', '', 'no', 'no', 'no', 'no', 'normal', 0, 0, 'si', 0, '', '', 'no', 9, '', 'no', '', 'CC_2910', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `identificacion_ubicacion`
--

CREATE TABLE `identificacion_ubicacion` (
  `numero_vivienda` int(11) NOT NULL,
  `numero_familias_por_vivienda` int(11) NOT NULL,
  `sisben` char(2) NOT NULL,
  `departamento` varchar(30) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `resguardo` varchar(30) DEFAULT NULL,
  `comunidad` varchar(30) DEFAULT NULL,
  `vereda` varchar(50) DEFAULT NULL,
  `barrio` varchar(50) DEFAULT NULL,
  `latitud` double DEFAULT NULL,
  `longitud` double DEFAULT NULL,
  `ubicacion_ref` mediumtext,
  `id_familia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `identificacion_ubicacion`
--

INSERT INTO `identificacion_ubicacion` (`numero_vivienda`, `numero_familias_por_vivienda`, `sisben`, `departamento`, `municipio`, `resguardo`, `comunidad`, `vereda`, `barrio`, `latitud`, `longitud`, `ubicacion_ref`, `id_familia`) VALUES
(2, 2, 'si', 'Nariño', '3', '2', '1', 'waa', '', 1.601833057765487, -76.97194160321044, '', '1_1'),
(2, 12, 'si', 'Nariño', '3', '1', '1', 'gea', '', 1.0906359473710607, -77.61689873768375, '', '1_2'),
(4, 4, 'si', 'Nariño', '2', '1', '', 'llano', '', 1.597114209215096, -77.01434196331786, 'Algo', '1_3'),
(10, 111, 'si', 'Nariño', '5', '1', '3', 'wsda', 'dsa', 1.4717949084251858, -77.5808529606071, 'asAS', '5_11');

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
('CC_0100', 1, 'Andres Benavides Molina ', 1, 1, 2019, 0, 3, 5, 0, 3, 0, 'M', 2, 'CC', '0100', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '5_11'),
('CC_0200', 2, 'Andrea Benavides Molina ', 1, 1, 2019, 0, 3, 5, 0, 3, 0, 'F', 2, 'CC', '0200', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '5_11'),
('CC_0300', 3, 'Carlos Benavides Molina ', 1, 5, 2017, 2, 10, 9, 0, 11, 1, 'M', 2, 'CC', '0300', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '5_11'),
('CC_0344', 4, 'Jesus B', 20, 1, 1993, 26, 2, 0, 12, 2, 26, 'M', 3, 'CC', '0344', 9, 3, 2, 'dasdas', '1', 'si', 'no', '', '5_11'),
('CC_0400', 5, 'Carolina Benavides Molina ', 1, 1, 2016, 3, 3, 5, 0, 3, 3, 'F', 2, 'CC', '0400', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '5_11'),
('CC_0500', 6, 'Pedro Benavides Molina ', 1, 1, 2012, 7, 3, 5, 0, 3, 7, 'M', 2, 'CC', '0500', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '5_11'),
('CC_0600', 7, 'Jennifer Benavides Molina ', 1, 1, 2012, 7, 3, 5, 0, 3, 7, 'F', 2, 'CC', '0600', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '5_11'),
('CC_0900', 8, 'Gabriel Benavides Molina ', 1, 1, 1950, 60, 3, 5, 0, 3, 69, 'M', 1, 'CC', '0900', 4, 4, 2, 'Emsanar', '1A', 'si', 'si', '2', '5_11'),
('CC_0910', 9, 'Natalia Benavides Molina ', 1, 1, 1946, 65, 3, 5, 0, 3, 73, 'F', 4, 'CC', '0910', 4, 4, 2, 'Emsanar', '1A', 'si', 'si', '2', '5_11'),
('CC_0911', 10, 'Juan Valdez', 3, 10, 1997, 21, 3, 7, 29, 5, 21, 'M', 2, 'CC', '0911', 2, 3, 1, 'ej', '1', 'si', 'si', '4', '5_11'),
('CC_1084551234', 11, 'Ana Camila Erazo', 20, 5, 1993, 24, 0, 5, 12, 10, 25, 'F', 2, 'CC', '1084551234', 9, 10, 1, 'nueva eps', '1', 'no', 'no', '', '5_11'),
('CC_2', 1, 'Juan valdes', 2, 3, 2015, 4, 0, 29, 0, 0, 0, 'M', 1, 'CC', '2', 3, 4, 1, 'fas', '', 'si', 'si', '4', '1_2'),
('CC_2000', 1, 'Jesus', 1, 2, 2019, 0, 1, 28, 29, 1, 0, 'M', 1, 'CC', '2000', 1, 1, 1, 'Saludcoop', '5', 'si', 'no', '', '1_1'),
('CC_2100', 2, 'Andres Benavides Molina ', 1, 1, 2019, 0, 3, 5, 29, 2, 0, 'M', 2, 'CC', '2100', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '1_1'),
('CC_2200', 3, 'Andrea Benavides Molina ', 1, 1, 2019, 0, 3, 5, 29, 2, 0, 'F', 2, 'CC', '2200', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '1_1'),
('CC_2300', 4, 'Carlos Benavides Molina ', 1, 1, 2017, 2, 3, 5, 29, 2, 2, 'M', 2, 'CC', '2300', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '1_1'),
('CC_2400', 5, 'Carolina Benavides Molina ', 1, 1, 2016, 2, 3, 5, 29, 2, 3, 'F', 2, 'CC', '2400', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '1_1'),
('CC_2500', 6, 'Pedro Benavides Molina ', 1, 1, 2012, 7, 3, 5, 29, 2, 7, 'M', 2, 'CC', '2500', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '1_1'),
('CC_2600', 7, 'Jennifer Benavides Molina ', 1, 1, 2012, 7, 3, 5, 29, 2, 7, 'F', 2, 'CC', '2600', 1, 1, 2, 'Emsanar', '1', 'si', 'no', '', '1_1'),
('CC_2700', 8, 'Juan Benavides Molina ', 1, 1, 1990, 34, 3, 5, 29, 2, 29, 'M', 4, 'CC', '2700', 4, 4, 2, 'Emsanar', '1A', 'si', 'si', '2', '1_1'),
('CC_2800', 9, 'Lina Benavides Molina ', 25, 1, 1992, 28, 3, 5, 5, 2, 27, 'F', 4, 'CC', '2800', 4, 4, 2, 'Emsanar', '1A', 'si', 'si', '2', '1_1'),
('CC_2810', 12, 'Leidy Benavides Molina ', 1, 1, 1992, 36, 3, 5, 29, 2, 27, 'F', 4, 'CC', '2810', 4, 4, 2, 'Emsanar', '1A', 'si', 'si', '2', '1_1'),
('CC_2900', 10, 'Gabriel Benavides Molina ', 1, 1, 1950, 60, 3, 5, 29, 2, 69, 'M', 4, 'CC', '2900', 4, 4, 2, 'Emsanar', '1A', 'si', 'si', '2', '1_1'),
('CC_2910', 11, 'Natalia Benavides Molina ', 1, 1, 1946, 67, 3, 5, 29, 2, 73, 'F', 4, 'CC', '2910', 4, 4, 2, 'Emsanar', '1A', 'si', 'si', '2', '1_1'),
('CC_4000', 1, 'Jessica', 2, 3, 1990, 29, 0, 30, 30, 0, 29, 'F', 2, 'CC', '4000', 1, 1, 1, 'asd', '1', 'si', 'si', '4', '1_3'),
('CC_4001', 2, 'Andres', 2, 1, 2016, 3, 2, 30, 30, 2, 3, 'M', 1, 'CC', '4001', 1, 2, 1, '', '', 'no', 'no', '', '1_3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menores_a_1`
--

CREATE TABLE `menores_a_1` (
  `id_menor_a_1` int(11) NOT NULL,
  `edad_meses_vis` int(2) NOT NULL,
  `control_crec_desa` char(2) NOT NULL,
  `lactancia_exclusiva` char(2) NOT NULL,
  `peso` float NOT NULL,
  `talla` int(3) NOT NULL,
  `imc` float NOT NULL,
  `peso_al_nacer` float NOT NULL,
  `estado_nutricional` char(8) NOT NULL,
  `motricidad_gruesa` char(8) NOT NULL,
  `motricidad_fina` varchar(8) NOT NULL,
  `audicion_lenguaje` char(8) NOT NULL,
  `personal_social` char(8) NOT NULL,
  `maltrato_fisico` char(2) NOT NULL,
  `maltrato_psico` char(2) NOT NULL,
  `problemas_visuales` char(2) NOT NULL,
  `problemas_auditivos` char(2) NOT NULL,
  `carnet` char(2) NOT NULL,
  `bcg` char(2) NOT NULL,
  `polio_1` char(2) NOT NULL,
  `polio_2` char(2) NOT NULL,
  `polio_3` char(2) NOT NULL,
  `dpt_1` char(2) NOT NULL,
  `dpt_2` char(2) NOT NULL,
  `dpt_3` char(2) NOT NULL,
  `hepatitisb_rn` char(2) NOT NULL,
  `hepatitisb_1` char(2) NOT NULL,
  `hepatitisb_2` char(2) NOT NULL,
  `hepatitisb_3` char(2) NOT NULL,
  `hib_1` char(2) NOT NULL,
  `hib_2` char(2) NOT NULL,
  `hib_3` char(2) NOT NULL,
  `influenza_antigripal_1` char(2) NOT NULL,
  `influenza_antigripal_2` char(2) NOT NULL,
  `rotavirus_1` char(2) NOT NULL,
  `rotavirus_2` char(2) NOT NULL,
  `neumococo_1` char(2) NOT NULL,
  `neumococo_2` char(2) NOT NULL,
  `neumococo_3` char(2) NOT NULL,
  `consume_medicamento` char(2) NOT NULL,
  `cual_medicamento` varchar(30) NOT NULL,
  `canalizado` char(2) NOT NULL,
  `remitido` int(2) DEFAULT NULL,
  `remitido_otro` varchar(20) NOT NULL,
  `valorado` char(2) NOT NULL,
  `observaciones` mediumtext,
  `id_integrante` varchar(15) NOT NULL,
  `id_visita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menores_a_1`
--

INSERT INTO `menores_a_1` (`id_menor_a_1`, `edad_meses_vis`, `control_crec_desa`, `lactancia_exclusiva`, `peso`, `talla`, `imc`, `peso_al_nacer`, `estado_nutricional`, `motricidad_gruesa`, `motricidad_fina`, `audicion_lenguaje`, `personal_social`, `maltrato_fisico`, `maltrato_psico`, `problemas_visuales`, `problemas_auditivos`, `carnet`, `bcg`, `polio_1`, `polio_2`, `polio_3`, `dpt_1`, `dpt_2`, `dpt_3`, `hepatitisb_rn`, `hepatitisb_1`, `hepatitisb_2`, `hepatitisb_3`, `hib_1`, `hib_2`, `hib_3`, `influenza_antigripal_1`, `influenza_antigripal_2`, `rotavirus_1`, `rotavirus_2`, `neumococo_1`, `neumococo_2`, `neumococo_3`, `consume_medicamento`, `cual_medicamento`, `canalizado`, `remitido`, `remitido_otro`, `valorado`, `observaciones`, `id_integrante`, `id_visita`) VALUES
(7, 3, 'no', 'no', 6, 50, 24, 5000, 'normal', 'normal', 'normal', 'normal', 'normal', '', 'si', 'no', 'no', 'si', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', 'no', 3, 'neo', 'no', '', 'CC_0100', 1),
(8, 3, 'no', 'no', 7, 55, 23.1, 3500, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', 'no', 'no', 'si', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', 'no', 0, '', 'no', '', 'CC_0200', 1),
(11, 4, 'no', 'no', 7, 50, 24, 3400, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', 'no', 'no', 'si', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', 'no', 3, 'neo', 'no', '', 'CC_0100', 2),
(12, 4, 'no', 'no', 10, 55, 23.1, 3400, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', 'no', 'no', 'si', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'no', '', 'no', 0, 'neo', 'no', '', 'CC_0200', 2),
(18, 1, 'no', 'no', 40, 159, 1.2, 3000, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', 'no', 'no', 'si', 'si', '', '', '', '', '', '', '', '', 'si', '', '', '', '', '', '', '', '', '', 'si', '', 'no', '', 'no', 0, '', 'no', '', 'CC_2000', 1),
(19, 3, 'no', 'no', 3, 155, 1.2, 3000, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', 'no', 'no', 'si', '', 'si', '', '', '', '', '', '', '', '', 'si', '', '', '', '', '', '', '', 'si', '', '', 'no', '', 'no', 6, '', 'no', '', 'CC_2100', 1),
(20, 3, 'no', 'no', 3, 30, 33.3, 3000, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', 'no', 'no', 'si', '', '', 'si', '', '', '', '', '', '', '', '', 'si', '', '', '', '', '', 'si', '', '', '', 'no', '', 'no', 0, '', 'no', '', 'CC_2200', 1),
(21, 2, 'no', 'no', 40, 159, 1.2, 3000, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', 'no', 'no', 'si', 'si', '', '', '', '', '', '', '', '', 'si', '', '', '', '', '', '', '', '', '', 'si', '', 'no', '', 'no', 0, '', 'no', '', 'CC_2000', 2),
(22, 2, 'no', 'no', 3, 155, 1.2, 3000, 'normal', 'normal', 'normal', 'normal', 'normal', '', '', 'no', 'no', 'si', '', 'si', '', '', '', '', '', '', '', '', 'si', '', '', '', '', '', '', '', 'si', '', '', 'no', '', 'no', 6, '', 'no', '', 'CC_2100', 2),
(23, 2, 'no', 'no', 3, 30, 33.3, 3000, 'normal', 'normal', 'normal', 'normal', 'normal', '', 'si', 'no', 'no', 'si', '', '', 'si', '', '', '', '', '', '', '', '', 'si', '', '', '', '', '', 'si', '', '', '', 'no', '', 'no', 0, '', 'no', '', 'CC_2200', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id_municipio` int(11) NOT NULL,
  `nom_municipio` varchar(50) NOT NULL,
  `nom_departamento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id_municipio`, `nom_municipio`, `nom_departamento`) VALUES
(1, 'La Union', 'Nariño'),
(2, 'Arboleda', 'Nariño'),
(3, 'Colon Genova', 'Nariño'),
(4, 'La Cruz', 'Nariño'),
(5, 'Buesaco', 'Nariño'),
(6, 'Sandona', 'Nariño'),
(7, 'Samaniego', 'Nariño'),
(8, 'Ipiales', 'Nariño'),
(9, 'Cuaspud Carlosama', 'Nariño'),
(10, 'Gualmatan', 'Nariño'),
(11, 'Guatarilla', 'Nariño'),
(12, 'El Rosario', 'Nariño'),
(13, 'Ancuya', 'Nariño'),
(14, 'Funes', 'Nariño'),
(15, 'Tumaco', 'Nariño'),
(16, 'Potosi', 'Nariño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `id_observacion` int(11) NOT NULL,
  `observaciones_gen` mediumtext,
  `nombres_visitador_gen` varchar(80) NOT NULL,
  `observaciones_vis` mediumtext,
  `nombres_visitador_vis` varchar(80) NOT NULL,
  `id_visita` int(11) DEFAULT NULL,
  `id_familia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `observaciones`
--

INSERT INTO `observaciones` (`id_observacion`, `observaciones_gen`, `nombres_visitador_gen`, `observaciones_vis`, `nombres_visitador_vis`, `id_visita`, `id_familia`) VALUES
(1, 'sadsd', '12asd', 'dfg1', 'asdas1', 1, '5_11'),
(2, 'dfg1', '12asd', 'dfg1', 'asdas2', 2, '5_11'),
(3, 'sadad', 'dafsaf gen', 'sadad', 'sadad1', 1, '1_1'),
(4, '', 'Valdews', '', 'Juan', 1, '1_2'),
(5, '', 'gj', '', 'gh', 1, '1_3'),
(6, '', 'gj', '', 'gh5', 2, '1_3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros_tb_gestacion`
--

CREATE TABLE `otros_tb_gestacion` (
  `otro_control_prenatal` varchar(50) NOT NULL,
  `otro_atencion_parto` varchar(50) NOT NULL,
  `otro_metodo` varchar(50) NOT NULL,
  `id_visita` int(11) NOT NULL,
  `id_familia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `otros_tb_gestacion`
--

INSERT INTO `otros_tb_gestacion` (`otro_control_prenatal`, `otro_atencion_parto`, `otro_metodo`, `id_visita`, `id_familia`) VALUES
('3', '4', '5', 1, '1_1'),
('asd', 'asd4', 'asde', 1, '5_11'),
('3', '4', '5', 2, '1_1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros_tb_hom_muj`
--

CREATE TABLE `otros_tb_hom_muj` (
  `otro_metodo` varchar(50) NOT NULL,
  `otro_motivo` varchar(50) NOT NULL,
  `id_visita` int(11) NOT NULL,
  `id_familia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `otros_tb_hom_muj`
--

INSERT INTO `otros_tb_hom_muj` (`otro_metodo`, `otro_motivo`, `id_visita`, `id_familia`) VALUES
('4', '5', 1, '1_1'),
('', '', 1, '1_3'),
('1', '2', 1, '5_11'),
('4', '5', 2, '1_1'),
('4', '5', 2, '1_3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros_tb_integrantes`
--

CREATE TABLE `otros_tb_integrantes` (
  `tb1_otra_ocupacion` varchar(50) DEFAULT NULL,
  `tb1_otro_g_a` varchar(50) DEFAULT NULL,
  `tb1_otro_g_b` varchar(50) DEFAULT NULL,
  `tb1_otro_g_c` varchar(50) DEFAULT NULL,
  `tb1_otro_g_d` varchar(50) DEFAULT NULL,
  `tb1_otro_g_e` varchar(50) DEFAULT NULL,
  `tb1_otro_g_f` varchar(50) DEFAULT NULL,
  `tb1_otro_grupo_etn` varchar(50) DEFAULT NULL,
  `tb1_otra_discap` varchar(50) DEFAULT NULL,
  `telefono_jefe` varchar(18) NOT NULL,
  `id_familia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `otros_tb_integrantes`
--

INSERT INTO `otros_tb_integrantes` (`tb1_otra_ocupacion`, `tb1_otro_g_a`, `tb1_otro_g_b`, `tb1_otro_g_c`, `tb1_otro_g_d`, `tb1_otro_g_e`, `tb1_otro_g_f`, `tb1_otro_grupo_etn`, `tb1_otra_discap`, `telefono_jefe`, `id_familia`) VALUES
('', '', '', '', '', '', '', '', '', '318849', '1_1'),
('', '', '', '', '', '', '', '', '', '2341122', '1_2'),
('', '', '', '', '', '', '', '', '', '231232', '1_3'),
('', '', '', '', '', '', '', '', '', '12345', '2_6'),
('', '', '', '', '', '', '', '', '', '12345', '3_600'),
('', '', '', '', '', '', '', '', '', '12345', '4_10'),
('1_1', 'saddas2', 'asdasd3', 'dsassd4', '', '', '', '', '6', '123456', '5_11'),
('', '', '', '', '', '', '', '', '', '12345', '7_56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resguardos`
--

CREATE TABLE `resguardos` (
  `id_resguardo` int(11) NOT NULL,
  `nom_resguardo` varchar(30) NOT NULL,
  `id_municipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `resguardos`
--

INSERT INTO `resguardos` (`id_resguardo`, `nom_resguardo`, `id_municipio`) VALUES
(1, 'Si', 1),
(2, 'No', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `riesgos_ubicacion`
--

CREATE TABLE `riesgos_ubicacion` (
  `zona_inundable` char(2) NOT NULL,
  `margen_rios` char(2) NOT NULL,
  `zona_ladera` char(2) NOT NULL,
  `falda_montana` char(2) NOT NULL,
  `relleno` char(2) NOT NULL,
  `otro_riesgo` char(2) NOT NULL,
  `cual_otro_riesgo` mediumtext NOT NULL,
  `id_familia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `riesgos_ubicacion`
--

INSERT INTO `riesgos_ubicacion` (`zona_inundable`, `margen_rios`, `zona_ladera`, `falda_montana`, `relleno`, `otro_riesgo`, `cual_otro_riesgo`, `id_familia`) VALUES
('no', 'no', 'no', 'no', 'no', 'no', '', '1_1'),
('no', 'no', 'no', 'no', 'no', 'si', 'dsfsfd', '1_2'),
('no', 'no', 'no', 'no', 'no', 'si', 'jes', '1_3'),
('no', 'no', 'no', 'no', 'no', 'no', '', '5_11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento_agua`
--

CREATE TABLE `tratamiento_agua` (
  `id_tratamiento_agua` int(11) NOT NULL,
  `sin_tratamiento` char(2) NOT NULL,
  `filtrada` char(2) NOT NULL,
  `hervida` char(2) NOT NULL,
  `clorada` char(2) NOT NULL,
  `otro` char(2) NOT NULL,
  `id_visita` int(11) NOT NULL,
  `id_familia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tratamiento_agua`
--

INSERT INTO `tratamiento_agua` (`id_tratamiento_agua`, `sin_tratamiento`, `filtrada`, `hervida`, `clorada`, `otro`, `id_visita`, `id_familia`) VALUES
(2, '', '', 'si', '', '', 1, '5_11'),
(3, '', '', '', '', '', 2, '5_11'),
(4, '', '', '', 'si', '', 1, '1_1'),
(5, 'si', 'si', '', '', '', 1, '1_2'),
(6, '', '', '', '', '', 1, '1_3'),
(7, '', '', '', '', '', 2, '1_3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `nick_name` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `nick_name`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'jesus', 'jesus'),
(3, 'La Union', 'launion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id_visita` int(11) NOT NULL,
  `id_familia` varchar(30) NOT NULL,
  `fecha_visita_d` int(2) NOT NULL,
  `fecha_visita_m` int(2) NOT NULL,
  `fecha_visita_a` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`id_visita`, `id_familia`, `fecha_visita_d`, `fecha_visita_m`, `fecha_visita_a`) VALUES
(1, '1_1', 29, 3, 2019),
(1, '1_2', 31, 3, 2019),
(1, '1_3', 1, 4, 2019),
(1, '5_11', 18, 3, 2019),
(2, '1_1', 30, 9, 2019),
(2, '1_3', 1, 4, 2019),
(2, '5_11', 20, 3, 2019),
(3, '5_11', 26, 3, 2019);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas_proximas`
--

CREATE TABLE `visitas_proximas` (
  `id_visita_prox` int(2) NOT NULL,
  `id_familia` varchar(30) NOT NULL,
  `fecha_visitaprox_d` int(2) NOT NULL,
  `fecha_visitaprox_m` int(2) NOT NULL,
  `fecha_visitaprox_a` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `visitas_proximas`
--

INSERT INTO `visitas_proximas` (`id_visita_prox`, `id_familia`, `fecha_visitaprox_d`, `fecha_visitaprox_m`, `fecha_visitaprox_a`) VALUES
(1, '1_1', 0, 1, 0),
(1, '1_2', 0, 1, 0),
(1, '1_3', 0, 1, 0),
(1, '5_11', 0, 1, 0),
(2, '1_1', 0, 1, 0),
(2, '1_3', 0, 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `animales`
--
ALTER TABLE `animales`
  ADD PRIMARY KEY (`id_animales`),
  ADD UNIQUE KEY `tipo_animal` (`tipo_animal`,`id_visita`,`id_familia`);

--
-- Indices de la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  ADD PRIMARY KEY (`id_ante_elemento`),
  ADD UNIQUE KEY `id_integrante` (`id_integrante`,`nombre_elemento`,`nombre_tabla`);

--
-- Indices de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD PRIMARY KEY (`id_caracteristicas`),
  ADD UNIQUE KEY `id_visita` (`id_visita`,`id_familia`);

--
-- Indices de la tabla `comunidades`
--
ALTER TABLE `comunidades`
  ADD PRIMARY KEY (`id_comunidad`);

--
-- Indices de la tabla `condiciones`
--
ALTER TABLE `condiciones`
  ADD PRIMARY KEY (`id_condi_elemento`),
  ADD UNIQUE KEY `nombre_tabla` (`nombre_tabla`,`id_visita`,`id_familia`,`nombre_elemento`) USING BTREE;

--
-- Indices de la tabla `de_1_a_5`
--
ALTER TABLE `de_1_a_5`
  ADD PRIMARY KEY (`id_de_1_a_5`),
  ADD UNIQUE KEY `id_integrante` (`id_integrante`,`id_visita`);

--
-- Indices de la tabla `de_5_a_9`
--
ALTER TABLE `de_5_a_9`
  ADD PRIMARY KEY (`id_de_5_a_9`),
  ADD UNIQUE KEY `id_integrante` (`id_integrante`,`id_visita`);

--
-- Indices de la tabla `de_10_a_59`
--
ALTER TABLE `de_10_a_59`
  ADD PRIMARY KEY (`id_de_10_a_59`),
  ADD UNIQUE KEY `id_integrante` (`id_integrante`,`id_visita`);

--
-- Indices de la tabla `de_60_mas`
--
ALTER TABLE `de_60_mas`
  ADD PRIMARY KEY (`id_de_60_mas`),
  ADD UNIQUE KEY `id_integrante` (`id_integrante`,`id_visita`);

--
-- Indices de la tabla `estadis_morbilidad`
--
ALTER TABLE `estadis_morbilidad`
  ADD PRIMARY KEY (`id_esta_morbilidad`);

--
-- Indices de la tabla `estadis_mortalidad`
--
ALTER TABLE `estadis_mortalidad`
  ADD PRIMARY KEY (`id_esta_mortalidad`);

--
-- Indices de la tabla `estadis_nacidos`
--
ALTER TABLE `estadis_nacidos`
  ADD PRIMARY KEY (`id_esta_nacidos`);

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id_familia`);

--
-- Indices de la tabla `gestacion`
--
ALTER TABLE `gestacion`
  ADD PRIMARY KEY (`id_gestacion`),
  ADD UNIQUE KEY `id_integrante` (`id_integrante`,`id_visita`);

--
-- Indices de la tabla `identificacion_ubicacion`
--
ALTER TABLE `identificacion_ubicacion`
  ADD PRIMARY KEY (`id_familia`);

--
-- Indices de la tabla `integrantes`
--
ALTER TABLE `integrantes`
  ADD PRIMARY KEY (`id_integrante`),
  ADD UNIQUE KEY `tipo_doc_identificacion` (`tipo_doc_identificacion`,`numero_doc_identificacion`),
  ADD UNIQUE KEY `cod_integrante` (`cod_integrante`,`id_familia`);

--
-- Indices de la tabla `menores_a_1`
--
ALTER TABLE `menores_a_1`
  ADD PRIMARY KEY (`id_menor_a_1`),
  ADD UNIQUE KEY `id_integrante` (`id_integrante`,`id_visita`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id_municipio`);

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`id_observacion`),
  ADD UNIQUE KEY `id_visita` (`id_visita`,`id_familia`);

--
-- Indices de la tabla `otros_tb_gestacion`
--
ALTER TABLE `otros_tb_gestacion`
  ADD UNIQUE KEY `id_visita` (`id_visita`,`id_familia`);

--
-- Indices de la tabla `otros_tb_hom_muj`
--
ALTER TABLE `otros_tb_hom_muj`
  ADD UNIQUE KEY `id_visita` (`id_visita`,`id_familia`);

--
-- Indices de la tabla `otros_tb_integrantes`
--
ALTER TABLE `otros_tb_integrantes`
  ADD UNIQUE KEY `id_familia` (`id_familia`);

--
-- Indices de la tabla `resguardos`
--
ALTER TABLE `resguardos`
  ADD PRIMARY KEY (`id_resguardo`);

--
-- Indices de la tabla `riesgos_ubicacion`
--
ALTER TABLE `riesgos_ubicacion`
  ADD PRIMARY KEY (`id_familia`);

--
-- Indices de la tabla `tratamiento_agua`
--
ALTER TABLE `tratamiento_agua`
  ADD PRIMARY KEY (`id_tratamiento_agua`),
  ADD UNIQUE KEY `id_visita` (`id_visita`,`id_familia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id_visita`,`id_familia`) USING BTREE;

--
-- Indices de la tabla `visitas_proximas`
--
ALTER TABLE `visitas_proximas`
  ADD PRIMARY KEY (`id_visita_prox`,`id_familia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `animales`
--
ALTER TABLE `animales`
  MODIFY `id_animales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `antecedentes`
--
ALTER TABLE `antecedentes`
  MODIFY `id_ante_elemento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  MODIFY `id_caracteristicas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `condiciones`
--
ALTER TABLE `condiciones`
  MODIFY `id_condi_elemento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `de_1_a_5`
--
ALTER TABLE `de_1_a_5`
  MODIFY `id_de_1_a_5` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `de_5_a_9`
--
ALTER TABLE `de_5_a_9`
  MODIFY `id_de_5_a_9` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `de_10_a_59`
--
ALTER TABLE `de_10_a_59`
  MODIFY `id_de_10_a_59` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `de_60_mas`
--
ALTER TABLE `de_60_mas`
  MODIFY `id_de_60_mas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `estadis_morbilidad`
--
ALTER TABLE `estadis_morbilidad`
  MODIFY `id_esta_morbilidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `estadis_mortalidad`
--
ALTER TABLE `estadis_mortalidad`
  MODIFY `id_esta_mortalidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `estadis_nacidos`
--
ALTER TABLE `estadis_nacidos`
  MODIFY `id_esta_nacidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `gestacion`
--
ALTER TABLE `gestacion`
  MODIFY `id_gestacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `menores_a_1`
--
ALTER TABLE `menores_a_1`
  MODIFY `id_menor_a_1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `id_observacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tratamiento_agua`
--
ALTER TABLE `tratamiento_agua`
  MODIFY `id_tratamiento_agua` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
