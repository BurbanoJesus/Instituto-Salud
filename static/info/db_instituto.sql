-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'familias'
-- 
-- ---

DROP TABLE IF EXISTS `familias`;
		
CREATE TABLE `familias` (
  `id_familia` VARCHAR(30) NOT NULL,
  `casa_numero` INTEGER(11) NOT NULL,
  `familia_numero` INTEGER(11) NOT NULL,
  PRIMARY KEY (`id_familia`)
);

-- ---
-- Table 'identificacion_ubicacion'
-- 
-- ---

DROP TABLE IF EXISTS `identificacion_ubicacion`;
		
CREATE TABLE `identificacion_ubicacion` (
  `numero_vivienda` INTEGER NOT NULL,
  `numero_familias_por_vivenda` INTEGER NOT NULL,
  `sisben` CHAR(2) NOT NULL,
  `departamento` VARCHAR(30) NOT NULL,
  `municipio` VARCHAR(50) NOT NULL,
  `resguardo` VARCHAR(30) NULL,
  `comunidad` VARCHAR(30) NULL,
  `vereda` VARCHAR(50) NULL,
  `barrio` VARCHAR(50) NULL,
  `ubicacion_ref` MEDIUMTEXT NOT NULL,
  `id_familia` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id_familia`)
);

-- ---
-- Table 'riesgos_ubicacion'
-- 
-- ---

DROP TABLE IF EXISTS `riesgos_ubicacion`;
		
CREATE TABLE `riesgos_ubicacion` (
  `zona_inundable` CHAR(2) NOT NULL,
  `margen_rios` CHAR(2) NOT NULL,
  `zona_ladera` CHAR(2) NOT NULL,
  `falda_montana` CHAR(2) NOT NULL,
  `relleno` CHAR(2) NOT NULL,
  `otro_riesgo` CHAR(2) NOT NULL,
  `cual_otro_riesgo` MEDIUMTEXT NOT NULL,
  `id_familia` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id_familia`)
);

-- ---
-- Table 'visitas'
-- 
-- ---

DROP TABLE IF EXISTS `visitas`;
		
CREATE TABLE `visitas` (
  `id_visita` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `id_familia` VARCHAR(30) NOT NULL,
  `fecha_visita` DATE NOT NULL,
  PRIMARY KEY (`id_visita`)
);

-- ---
-- Table 'integrantes'
-- 
-- ---

DROP TABLE IF EXISTS `integrantes`;
		
CREATE TABLE `integrantes` (
  `id_integrante` VARCHAR(15) NOT NULL,
  `cod_integrante` VARCHAR(2) NOT NULL,
  `nombres` VARCHAR(80) NOT NULL,
  `fecha_nac_dia` INTEGER(2) NOT NULL,
  `fecha_nac_mes` INTEGER(2) NOT NULL,
  `fecha_nac_ano` INTEGER(2) NOT NULL,
  `edad_dias` INTEGER(2) NOT NULL,
  `edad_meses` INTEGER(2) NOT NULL,
  `edad_anos` INT(3) NOT NULL,
  `sexo` CHAR(9) NOT NULL,
  `parentesco_familiar` INTEGER(2) NOT NULL,
  `tipo_doc_identificacion` CHAR(3) NOT NULL,
  `numero_doc_identificacion` VARCHAR(15) NOT NULL,
  `escolaridad` INTEGER(1) NOT NULL,
  `ocupacion` INTEGER(2) NOT NULL,
  `ocupacion_otro` VARCHAR(30) NULL,
  `tipo_vinculacion_sgsss` INTEGER(1) NOT NULL,
  `nombre_eps` VARCHAR(30) NULL,
  `grupo_etnico` VARCHAR(2) NOT NULL,
  `ge_indigenas_a` CHAR(30) NULL,
  `ge_indigenas_b` VARCHAR(30) NULL,
  `ge_indigenas_c` VARCHAR(30) NULL,
  `ge_indigenas_d` VARCHAR(30) NULL,
  `ge_indigenas_e` VARCHAR(30) NULL,
  `ge_indigenas_f` VARCHAR(30) NULL,
  `grupo_etnico_otro` VARCHAR(30) NULL,
  `desplazado` CHAR(2) NULL,
  `discapacidad` CHAR(2) NULL,
  `discapacidad_otro` VARCHAR(15) NULL,
  `cual_discapacidad` VARCHAR(20) NULL,
  `id_familia` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id_integrante`)
);

-- ---
-- Table 'menores_a_1'
-- 
-- ---

DROP TABLE IF EXISTS `menores_a_1`;
		
CREATE TABLE `menores_a_1` (
  `id_menor_a_1` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `control_crec_desa` CHAR(2) NOT NULL,
  `lactancia_exclusiva` CHAR(2) NOT NULL,
  `peso_al_nacer` DECIMAL(3) NOT NULL,
  `peso` DECIMAL(4) NOT NULL,
  `talla` INTEGER(3) NOT NULL,
  `imc` DECIMAL(4) NOT NULL,
  `estado_nutricional` CHAR(6) NOT NULL,
  `motricidad` CHAR(6) NOT NULL,
  `audicion_lenguaje` CHAR(6) NOT NULL,
  `personal_social` CHAR(6) NOT NULL,
  `senales_maltrato` INTEGER(1) NOT NULL,
  `problemas_visuales` CHAR(2) NOT NULL,
  `problemas_auditivos` CHAR(2) NOT NULL,
  `carnet` CHAR(2) NOT NULL,
  `bcg` CHAR(2) NOT NULL,
  `polio_1` CHAR(2) NOT NULL,
  `polio_2` CHAR(2) NOT NULL,
  `polio_3` CHAR(2) NOT NULL,
  `hepatitisb_rn` CHAR(2) NOT NULL,
  `hepatitisb_1` CHAR(2) NOT NULL,
  `hepatitisb_2` CHAR NOT NULL,
  `hepatitisb_3` CHAR(2) NOT NULL,
  `hib_1` CHAR(2) NOT NULL,
  `hib_2` CHAR(2) NOT NULL,
  `hib_3` CHAR(2) NOT NULL,
  `influenza_antigripal_1` CHAR(2) NOT NULL,
  `influenza_antigripal_2` CHAR(2) NOT NULL,
  `rotavirus_1` CHAR(2) NOT NULL,
  `rotavirus_2` CHAR(2) NOT NULL,
  `neumococo_1` CHAR(2) NOT NULL,
  `neumococo_2` CHAR(2) NOT NULL,
  `neumococo_3` CHAR(2) NOT NULL,
  `consume_medicamento` CHAR(2) NOT NULL,
  `cual_medicamento` VARCHAR(30) NOT NULL,
  `canalizado` CHAR(2) NOT NULL,
  `remitido` INTEGER(2) NULL,
  `remitido_otro` VARCHAR(20) NOT NULL,
  `valorado` CHAR(2) NOT NULL,
  `observaciones` MEDIUMTEXT NULL,
  `id_integrante` VARCHAR(15) NOT NULL,
  `id_visita` INTEGER(11) NOT NULL,
  PRIMARY KEY (`id_menor_a_1`)
);

-- ---
-- Table 'de_5_a_9'
-- 
-- ---

DROP TABLE IF EXISTS `de_5_a_9`;
		
CREATE TABLE `de_5_a_9` (
  `id_de_5_a_9` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `control_crec_desa` CHAR(2) NOT NULL,
  `lactancia_exclusiva` CHAR(2) NOT NULL,
  `peso` DECIMAL(4) NOT NULL,
  `talla` INTEGER(3) NOT NULL,
  `imc` DECIMAL(3) NOT NULL,
  `estado_nutricional` CHAR(6) NOT NULL,
  `motricidad` CHAR(6) NOT NULL,
  `audicion_lenguaje` CHAR(6) NOT NULL,
  `personal_social` CHAR(6) NOT NULL,
  `senales_maltrato` INTEGER(1) NOT NULL,
  `dtp` CHAR(2) NOT NULL,
  `vop` CHAR(2) NOT NULL,
  `srp` CHAR(2) NOT NULL,
  `caries` CHAR(2) NOT NULL,
  `aplicacion_fluor` CHAR(2) NOT NULL,
  `aplicacion_sellantes` CHAR(2) NOT NULL,
  `seda_dental` CHAR(2) NOT NULL,
  `num_cepilladas` CHAR(2) NOT NULL,
  `desparasitado` CHAR(2) NOT NULL,
  `desparasitado_d` INTEGER(2) NOT NULL,
  `desparasitado_m` INTEGER(2) NOT NULL,
  `desparasitado_a` INTEGER(2) NOT NULL,
  `consume_medicamento` CHAR(2) NOT NULL,
  `cual_medicamento` VARCHAR(30) NOT NULL,
  `canalizado` CHAR(2) NOT NULL,
  `remitido` INTEGER(2) NULL,
  `remitido_otro` VARCHAR(20) NOT NULL,
  `valorado` CHAR(2) NOT NULL,
  `observaciones` MEDIUMTEXT NULL,
  `id_integrante` VARCHAR(15) NOT NULL,
  `id_visita` INTEGER(11) NOT NULL,
  PRIMARY KEY (`id_de_5_a_9`)
);

-- ---
-- Table 'de_1_a_5'
-- 
-- ---

DROP TABLE IF EXISTS `de_1_a_5`;
		
CREATE TABLE `de_1_a_5` (
  `id_de_1_a_5` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `control_crec_desa` CHAR(2) NOT NULL,
  `lactancia_exclusiva` CHAR(2) NOT NULL,
  `peso_al_nacer` DECIMAL(3) NOT NULL,
  `peso` DECIMAL(4) NOT NULL,
  `talla` INTEGER(3) NOT NULL,
  `imc` DECIMAL(3) NOT NULL,
  `estado_nutricional` CHAR(6) NOT NULL,
  `motricidad` CHAR(6) NOT NULL,
  `audicion_lenguaje` CHAR(6) NOT NULL,
  `personal_social` CHAR(6) NOT NULL,
  `senales_maltrato` INTEGER(1) NOT NULL,
  `problemas_visuales` CHAR(2) NOT NULL,
  `problemas_auditivos` CHAR(2) NOT NULL,
  `carnet` CHAR(2) NOT NULL,
  `bcg` CHAR(2) NOT NULL,
  `polio_1` CHAR(2) NOT NULL,
  `polio_2` CHAR(2) NOT NULL,
  `polio_3` CHAR(2) NOT NULL,
  `polio_r1` CHAR(2) NOT NULL,
  `polio_r2` CHAR(2) NOT NULL,
  `dpt_1` CHAR(2) NOT NULL,
  `dpt_2` CHAR(2) NOT NULL,
  `dpt_3` CHAR(2) NOT NULL,
  `dpt_r1` CHAR(2) NOT NULL,
  `dpt_r2` CHAR(2) NOT NULL,
  `hepatitisb_1` CHAR(2) NOT NULL,
  `hepatitisb_2` CHAR NOT NULL,
  `hepatitisb_3` CHAR(2) NOT NULL,
  `hib_1` CHAR(2) NOT NULL,
  `hib_2` CHAR(2) NOT NULL,
  `hib_3` CHAR(2) NOT NULL,
  `srp_1` CHAR(2) NOT NULL,
  `srp_r1` CHAR(2) NOT NULL,
  `influenza_antigripal_1` CHAR(2) NOT NULL,
  `influenza_antigripal_2` CHAR(2) NOT NULL,
  `fiebre_amarilla` CHAR(2) NOT NULL,
  `num_cepilladas` INTEGER(2) NOT NULL,
  `desparasitado` CHAR(2) NOT NULL,
  `desparasitado_d` INTEGER(2) NOT NULL,
  `desparasitado_m` INTEGER(2) NOT NULL,
  `desparasitado_a` INTEGER(4) NOT NULL,
  `consume_medicamento` CHAR(2) NOT NULL,
  `cual_medicamento` VARCHAR(30) NOT NULL,
  `canalizado` CHAR(2) NOT NULL,
  `remitido` INTEGER(2) NULL,
  `remitido_otro` VARCHAR(20) NOT NULL,
  `valorado` CHAR(2) NOT NULL,
  `observaciones` MEDIUMTEXT NULL,
  `id_integrante` VARCHAR(15) NOT NULL,
  `id_visita` INTEGER(11) NOT NULL,
  PRIMARY KEY (`id_de_1_a_5`)
);

-- ---
-- Table 'de_10_a_59'
-- 
-- ---

DROP TABLE IF EXISTS `de_10_a_59`;
		
CREATE TABLE `de_10_a_59` (
  `id_de_10_a_59` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `metodo_planificacion` INTEGER(2) NULL DEFAULT NULL,
  `tiempo_con_metodo` INTEGER(3) NOT NULL,
  `controles_ult_ano_planifi` INTEGER(2) NULL DEFAULT NULL,
  `motivo_no_planifi` INTEGER NULL DEFAULT NULL,
  `citologia` CHAR(8) NOT NULL,
  `citologia_d` INTEGER(2) NULL DEFAULT NULL,
  `citologia_m` INTEGER(2) NULL DEFAULT NULL,
  `citologia_a` INTEGER(2) NULL DEFAULT NULL,
  `autoexamen_seno` CHAR(8) NOT NULL,
  `autoexamen_seno_d` INTEGER(2) NULL DEFAULT NULL,
  `autoexamen_seno_m` INTEGER(2) NULL DEFAULT NULL,
  `autoexamen_seno_a` INTEGER(2) NULL DEFAULT NULL,
  `violencia_contra_mujer` CHAR(2) NULL DEFAULT NULL,
  `v_contra_mujer_valorado` CHAR(2) NULL DEFAULT NULL,
  `carnet` CHAR(2) NOT NULL,
  `td_tt_10a18_1` CHAR(2) NOT NULL,
  `td_tt_10a18_2` CHAR(2) NOT NULL,
  `td_tt_10a18_3` CHAR NOT NULL,
  `td_tt_10a18_4` CHAR(2) NOT NULL,
  `td_tt_10a18_5` CHAR(2) NOT NULL,
  `td_tt_19a49_1` CHAR(2) NOT NULL,
  `td_tt_19a49_2` CHAR(2) NOT NULL,
  `td_tt_19a49_3` CHAR(2) NOT NULL,
  `td_tt_19a49_4` CHAR(2) NOT NULL,
  `td_tt_19a49_5` CHAR(2) NOT NULL,
  `fiebre_amararilla_m` CHAR(2) NULL,
  `examen_prostata` CHAR(8) NOT NULL,
  `fiebre_amarilla_h` CHAR NOT NULL,
  `seda_dental` CHAR(2) NOT NULL,
  `numero_cepilladas` INTEGER(2) NOT NULL,
  `probremas_visuales` CHAR(2) NOT NULL,
  `valor_glicemia` INTEGER(3) NOT NULL,
  `estado_glicemia` VARCHAR(30) NULL DEFAULT NULL,
  `peso` DECIMAL(4) NOT NULL,
  `talla` DECIMAL(4) NULL DEFAULT NULL,
  `imc` DECIMAL(3) NULL DEFAULT NULL,
  `estado_nutricional` CHAR(9) NOT NULL,
  `pulso_minuto` INTEGER(3) NOT NULL,
  `presion_arterial` CHAR(8) NULL DEFAULT NULL,
  `estado_presion_arterial` VARCHAR(20) NULL DEFAULT NULL,
  `consume_medicamento` CHAR(2) NOT NULL,
  `cual_medicamento` VARCHAR(30) NOT NULL,
  `canalizado` CHAR(2) NOT NULL,
  `remitido` INTEGER(2) NULL,
  `remitido_otro` VARCHAR(20) NOT NULL,
  `valorado` CHAR(2) NOT NULL,
  `observaciones` MEDIUMTEXT NULL,
  `id_integrante` VARCHAR(15) NOT NULL,
  `id_visita` INTEGER(11) NOT NULL,
  PRIMARY KEY (`id_de_10_a_59`)
);

-- ---
-- Table 'de_60_mas'
-- 
-- ---

DROP TABLE IF EXISTS `de_60_mas`;
		
CREATE TABLE `de_60_mas` (
  `id_de_60_mas` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `peso` DECIMAL(4) NULL DEFAULT NULL,
  `talla` INTEGER(3) NULL DEFAULT NULL,
  `imc` DECIMAL(3) NOT NULL,
  `citologia_ult_5` CHAR(8) NULL DEFAULT NULL,
  `citologia_ult_4` CHAR(8) NULL DEFAULT NULL,
  `citologia_ult_1` CHAR(8) NULL DEFAULT NULL,
  `autoexamen_seno` CHAR(8) NULL DEFAULT NULL,
  `examen_prostata` CHAR(2) NOT NULL,
  `examen_prostata_res` CHAR(8) NULL DEFAULT NULL,
  `seda_dental` CHAR(2) NULL DEFAULT NULL,
  `num_cepilladas` INTEGER(2) NOT NULL,
  `piedra_piezas_dentales` CHAR(2) NULL DEFAULT NULL,
  `uso_protesis_dentales` CHAR(2) NULL DEFAULT NULL,
  `valor_glicemia` INTEGER(3) NOT NULL,
  `estado_glicemia` CHAR(8) NULL DEFAULT NULL,
  `pulso_minuto` INTEGER(3) NULL DEFAULT NULL,
  `presion_sistolica` INTEGER(3) NULL DEFAULT NULL,
  `presion_diastolica` INTEGER(3) NULL DEFAULT NULL,
  `pam` DECIMAL(4) NULL DEFAULT NULL,
  `estado_presion` VARCHAR(15) NULL DEFAULT NULL,
  `actividad_fisica` CHAR(2) NULL DEFAULT NULL,
  `problemas_visuales` CHAR(2) NULL DEFAULT NULL,
  `vacu_tipo_biologico` INTEGER(2) NULL DEFAULT NULL,
  `vacu_num_dosis` INTEGER(2) NULL DEFAULT NULL,
  `vacu_d` INTEGER(2) NULL DEFAULT NULL,
  `vacu_m` INTEGER(2) NULL DEFAULT NULL,
  `vacu_a` INTEGER(4) NULL DEFAULT NULL,
  `consume_medicamento` CHAR(2) NULL DEFAULT NULL,
  `cual_medicamento` VARCHAR(20) NULL DEFAULT NULL,
  `canalizado` CHAR(2) NULL DEFAULT NULL,
  `remitido` INTEGER(2) NULL,
  `remitido_otro` VARCHAR(20) NULL DEFAULT NULL,
  `valorado` CHAR(2) NULL DEFAULT NULL,
  `observaciones` MEDIUMTEXT NULL,
  `id_integrante` VARCHAR(15) NOT NULL,
  `id_visita` INTEGER(11) NOT NULL,
  PRIMARY KEY (`id_de_60_mas`)
);

-- ---
-- Table 'gestacion'
-- 
-- ---

DROP TABLE IF EXISTS `gestacion`;
		
CREATE TABLE `gestacion` (
  `id_gestacion` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `embarazada` CHAR(2) NULL DEFAULT NULL,
  `control_prenatal` INTEGER(2) NULL DEFAULT NULL,
  `control_prenatal_quien` INTEGER(2) NULL DEFAULT NULL,
  `control_prenatal_d` INTEGER(2) NULL DEFAULT NULL,
  `control_prenatal_m` INTEGER(2) NULL DEFAULT NULL,
  `control_prenatal_a` INTEGER(4) NULL DEFAULT NULL,
  `ante_gestaciones` INTEGER(2) NULL DEFAULT NULL,
  `ante_partos` INTEGER(2) NULL DEFAULT NULL,
  `ante_abortos` INTEGER(2) NULL DEFAULT NULL,
  `ante_cesareas` INTEGER NULL DEFAULT NULL,
  `ante_num_hijos_vivos` INTEGER(2) NULL DEFAULT NULL,
  `ultimo_parto_d` INTEGER(2) NULL DEFAULT NULL,
  `ultimo_parto_m` INTEGER(2) NULL DEFAULT NULL,
  `ultimo_parto_a` INTEGER(4) NULL DEFAULT NULL,
  `califi_riesgo_materno` CHAR(4) NULL DEFAULT NULL,
  `ultimo_regla_d` INTEGER(2) NULL DEFAULT NULL,
  `ultimo_regla_m` INTEGER(2) NULL DEFAULT NULL,
  `ultimo_regla_a` INTEGER(4) NULL DEFAULT NULL,
  `fecha_prob_parto_d` INTEGER(2) NULL DEFAULT NULL,
  `fecha_prob_parto_m` INTEGER(2) NULL DEFAULT NULL,
  `fecha_prob_parto_a` INTEGER(4) NULL DEFAULT NULL,
  `gestacion` CHAR(2) NULL DEFAULT NULL,
  `serologia` CHAR(8) NULL DEFAULT NULL,
  `vih` CHAR(8) NULL DEFAULT NULL,
  `odontologia` CHAR(2) NULL DEFAULT NULL,
  `td_tt_10a18_1` CHAR(2) NULL DEFAULT NULL,
  `td_tt_10a18_2` CHAR(2) NULL DEFAULT NULL,
  `td_tt_10a18_3` CHAR(2) NULL DEFAULT NULL,
  `td_tt_19a49_1` CHAR(2) NULL DEFAULT NULL,
  `td_tt_19a49_2` CHAR(2) NULL DEFAULT NULL,
  `td_tt_19a49_3` CHAR(2) NULL DEFAULT NULL,
  `suplementacion` CHAR(2) NULL DEFAULT NULL,
  `sedentarismo` CHAR(2) NULL DEFAULT NULL,
  `fuma` CHAR(2) NULL DEFAULT NULL,
  `consume_alcohol` CHAR(2) NULL DEFAULT NULL,
  `tipo_parto` VARCHAR(15) NULL DEFAULT NULL,
  `atencion_parto` VARCHAR(15) NULL DEFAULT NULL,
  `atencion_institucional` CHAR(2) NULL DEFAULT NULL,
  `planificacion` INTEGER(2) NULL DEFAULT NULL,
  `consume_medicamento` CHAR(2) NULL DEFAULT NULL,
  `cual_medicamento` VARCHAR(20) NULL DEFAULT NULL,
  `canalizado` CHAR(2) NULL DEFAULT NULL,
  `remitido` INTEGER(2) NULL,
  `remitido_otro` VARCHAR(15) NULL DEFAULT NULL,
  `valorado` CHAR(2) NULL DEFAULT NULL,
  `observaciones` MEDIUMTEXT NULL,
  `id_integrante` VARCHAR(15) NOT NULL,
  `id_visita` INTEGER(11) NOT NULL,
  PRIMARY KEY (`id_gestacion`)
);

-- ---
-- Table 'antecedentes'
-- 
-- ---

DROP TABLE IF EXISTS `antecedentes`;
		
CREATE TABLE `antecedentes` (
  `id_ante_elemento` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nombre_tabla` VARCHAR(30) NOT NULL,
  `nombre_elemento` VARCHAR(12) NOT NULL,
  `estado` VARCHAR(2) NOT NULL,
  `edad_inicio` INTEGER(2) NULL DEFAULT NULL,
  `frecuencia` INTEGER(1) NOT NULL,
  `observaciones` VARCHAR(30) NULL,
  `id_integrante` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id_ante_elemento`)
);

-- ---
-- Table 'esta_nacidos'
-- 
-- ---

DROP TABLE IF EXISTS `esta_nacidos`;
		
CREATE TABLE `esta_nacidos` (
  `id_esta_nacidos` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(30) NOT NULL,
  `sexo` CHAR(9) NOT NULL,
  `edad` INTEGER(2) NOT NULL,
  `registrado` CHAR(2) NOT NULL,
  `parto_atendido_por` INTEGER(2) NOT NULL,
  `parto_atendido_otro` VARCHAR(20) NOT NULL,
  `parto_fecha_d` INTEGER(2) NOT NULL,
  `parto_fecha_m` INTEGER(2) NOT NULL,
  `parto_fecha_a` INTEGER(4) NOT NULL,
  `id_familia` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id_esta_nacidos`)
);

-- ---
-- Table 'esta_mortalidad'
-- 
-- ---

DROP TABLE IF EXISTS `esta_mortalidad`;
		
CREATE TABLE `esta_mortalidad` (
  `id_esta_mortalidad` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(30) NOT NULL,
  `sexo` CHAR(9) NOT NULL,
  `edad` INTEGER(2) NOT NULL,
  `causa` VARCHAR(30) NOT NULL,
  `codigo_cie10` CHAR(5) NOT NULL,
  `parto_fecha_d` INTEGER(2) NOT NULL,
  `parto_fecha_m` INTEGER(2) NOT NULL,
  `parto_fecha_a` INTEGER(4) NOT NULL,
  `id_familia` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id_esta_mortalidad`)
);

-- ---
-- Table 'esta_morbilidad'
-- 
-- ---

DROP TABLE IF EXISTS `esta_morbilidad`;
		
CREATE TABLE `esta_morbilidad` (
  `id_esta_morbilidad` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(30) NOT NULL,
  `sexo` CHAR(9) NOT NULL,
  `edad` INTEGER(2) NOT NULL,
  `causa` VARCHAR(30) NOT NULL,
  `codigo_cie10` CHAR(5) NOT NULL,
  `id_familia` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id_esta_morbilidad`)
);

-- ---
-- Table 'caracteristicas'
-- 
-- ---

DROP TABLE IF EXISTS `caracteristicas`;
		
CREATE TABLE `caracteristicas` (
  `id_caracteristicas` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `piso` VARCHAR(20) NOT NULL,
  `paredes` VARCHAR(20) NOT NULL,
  `techo` VARCHAR(20) NOT NULL,
  `num_habitaciones` INTEGER(2) NOT NULL,
  `ventilacion_adecuada` CHAR(2) NOT NULL,
  `cocina_con` VARCHAR(15) NOT NULL,
  `ubicacion_cocina` CHAR(6) NOT NULL,
  `id_visita` INTEGER(11) NOT NULL,
  PRIMARY KEY (`id_caracteristicas`)
);

-- ---
-- Table 'tratamiento_agua'
-- 
-- ---

DROP TABLE IF EXISTS `tratamiento_agua`;
		
CREATE TABLE `tratamiento_agua` (
  `id_tratamiento_agua` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `sin_tratamiento` CHAR(2) NOT NULL,
  `filtrada` CHAR(2) NOT NULL,
  `hervida` CHAR(2) NOT NULL,
  `clorada` CHAR(2) NOT NULL,
  `otro` CHAR(2) NOT NULL,
  `id_visita` INTEGER(11) NOT NULL,
  PRIMARY KEY (`id_tratamiento_agua`)
);

-- ---
-- Table 'animales'
-- 
-- ---

DROP TABLE IF EXISTS `animales`;
		
CREATE TABLE `animales` (
  `id_animales` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `tipo_animal` CHAR(9) NOT NULL,
  `tiene_animal` CHAR(2) NOT NULL,
  `num_vacunados` INTEGER(2) NULL DEFAULT NULL,
  `num_no_vacunados` INTEGER(2) NOT NULL,
  `id_visita` INTEGER(11) NOT NULL,
  PRIMARY KEY (`id_animales`)
);

-- ---
-- Table 'condi_elementos'
-- 
-- ---

DROP TABLE IF EXISTS `condi_elementos`;
		
CREATE TABLE `condi_elementos` (
  `id_condi_elemento` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nombre_tabla` VARCHAR(40) NOT NULL,
  `nombre_elemento` VARCHAR(30) NOT NULL,
  `existe_elemento` CHAR(2) NOT NULL,
  `id_visita` INTEGER(11) NOT NULL,
  PRIMARY KEY (`id_condi_elemento`)
);

-- ---
-- Table 'observaciones'
-- 
-- ---

DROP TABLE IF EXISTS `observaciones`;
		
CREATE TABLE `observaciones` (
  `id_observacion` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `observaciones_gen` MEDIUMTEXT NULL,
  `observaciones_visita` MEDIUMTEXT NULL,
  `nombres_visitador` VARCHAR(50) NOT NULL,
  `id_visita` INTEGER(11) NULL,
  PRIMARY KEY (`id_observacion`)
);

-- ---
-- Table 'usuarios'
-- 
-- ---

DROP TABLE IF EXISTS `usuarios`;
		
CREATE TABLE `usuarios` (
  `id_usu` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `nick_name` VARCHAR(80) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_usu`)
);

-- ---
-- Foreign Keys 
-- ---


-- ---
-- Table Properties
-- ---

-- ALTER TABLE `familias` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `identificacion_ubicacion` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `riesgos_ubicacion` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `visitas` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `integrantes` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `menores_a_1` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `de_5_a_9` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `de_1_a_5` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `de_10_a_59` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `de_60_mas` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `gestacion` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `antecedentes` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `esta_nacidos` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `esta_mortalidad` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `esta_morbilidad` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `caracteristicas` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `tratamiento_agua` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `animales` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `condi_elementos` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `observaciones` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `usuarios` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `familias` (`id_familia`,`casa_numero`,`familia_numero`) VALUES
-- ('','','');
-- INSERT INTO `identificacion_ubicacion` (`numero_vivienda`,`numero_familias_por_vivenda`,`sisben`,`departamento`,`municipio`,`resguardo`,`comunidad`,`vereda`,`barrio`,`ubicacion_ref`,`id_familia`) VALUES
-- ('','','','','','','','','','','');
-- INSERT INTO `riesgos_ubicacion` (`zona_inundable`,`margen_rios`,`zona_ladera`,`falda_montana`,`relleno`,`otro_riesgo`,`cual_otro_riesgo`,`id_familia`) VALUES
-- ('','','','','','','','');
-- INSERT INTO `visitas` (`id_visita`,`id_familia`,`fecha_visita`) VALUES
-- ('','','');
-- INSERT INTO `integrantes` (`id_integrante`,`cod_integrante`,`nombres`,`fecha_nac_dia`,`fecha_nac_mes`,`fecha_nac_ano`,`edad_dias`,`edad_meses`,`edad_anos`,`sexo`,`parentesco_familiar`,`tipo_doc_identificacion`,`numero_doc_identificacion`,`escolaridad`,`ocupacion`,`ocupacion_otro`,`tipo_vinculacion_sgsss`,`nombre_eps`,`grupo_etnico`,`ge_indigenas_a`,`ge_indigenas_b`,`ge_indigenas_c`,`ge_indigenas_d`,`ge_indigenas_e`,`ge_indigenas_f`,`grupo_etnico_otro`,`desplazado`,`discapacidad`,`discapacidad_otro`,`cual_discapacidad`,`id_familia`) VALUES
-- ('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
-- INSERT INTO `menores_a_1` (`id_menor_a_1`,`control_crec_desa`,`lactancia_exclusiva`,`peso_al_nacer`,`peso`,`talla`,`imc`,`estado_nutricional`,`motricidad`,`audicion_lenguaje`,`personal_social`,`senales_maltrato`,`problemas_visuales`,`problemas_auditivos`,`carnet`,`bcg`,`polio_1`,`polio_2`,`polio_3`,`hepatitisb_rn`,`hepatitisb_1`,`hepatitisb_2`,`hepatitisb_3`,`hib_1`,`hib_2`,`hib_3`,`influenza_antigripal_1`,`influenza_antigripal_2`,`rotavirus_1`,`rotavirus_2`,`neumococo_1`,`neumococo_2`,`neumococo_3`,`consume_medicamento`,`cual_medicamento`,`canalizado`,`remitido`,`remitido_otro`,`valorado`,`observaciones`,`id_integrante`,`id_visita`) VALUES
-- ('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
-- INSERT INTO `de_5_a_9` (`id_de_5_a_9`,`control_crec_desa`,`lactancia_exclusiva`,`peso`,`talla`,`imc`,`estado_nutricional`,`motricidad`,`audicion_lenguaje`,`personal_social`,`senales_maltrato`,`dtp`,`vop`,`srp`,`caries`,`aplicacion_fluor`,`aplicacion_sellantes`,`seda_dental`,`num_cepilladas`,`desparasitado`,`desparasitado_d`,`desparasitado_m`,`desparasitado_a`,`consume_medicamento`,`cual_medicamento`,`canalizado`,`remitido`,`remitido_otro`,`valorado`,`observaciones`,`id_integrante`,`id_visita`) VALUES
-- ('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
-- INSERT INTO `de_1_a_5` (`id_de_1_a_5`,`control_crec_desa`,`lactancia_exclusiva`,`peso_al_nacer`,`peso`,`talla`,`imc`,`estado_nutricional`,`motricidad`,`audicion_lenguaje`,`personal_social`,`senales_maltrato`,`problemas_visuales`,`problemas_auditivos`,`carnet`,`bcg`,`polio_1`,`polio_2`,`polio_3`,`polio_r1`,`polio_r2`,`dpt_1`,`dpt_2`,`dpt_3`,`dpt_r1`,`dpt_r2`,`hepatitisb_1`,`hepatitisb_2`,`hepatitisb_3`,`hib_1`,`hib_2`,`hib_3`,`srp_1`,`srp_r1`,`influenza_antigripal_1`,`influenza_antigripal_2`,`fiebre_amarilla`,`num_cepilladas`,`desparasitado`,`desparasitado_d`,`desparasitado_m`,`desparasitado_a`,`consume_medicamento`,`cual_medicamento`,`canalizado`,`remitido`,`remitido_otro`,`valorado`,`observaciones`,`id_integrante`,`id_visita`) VALUES
-- ('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
-- INSERT INTO `de_10_a_59` (`id_de_10_a_59`,`metodo_planificacion`,`tiempo_con_metodo`,`controles_ult_ano_planifi`,`motivo_no_planifi`,`citologia`,`citologia_d`,`citologia_m`,`citologia_a`,`autoexamen_seno`,`autoexamen_seno_d`,`autoexamen_seno_m`,`autoexamen_seno_a`,`violencia_contra_mujer`,`v_contra_mujer_valorado`,`carnet`,`td_tt_10a18_1`,`td_tt_10a18_2`,`td_tt_10a18_3`,`td_tt_10a18_4`,`td_tt_10a18_5`,`td_tt_19a49_1`,`td_tt_19a49_2`,`td_tt_19a49_3`,`td_tt_19a49_4`,`td_tt_19a49_5`,`fiebre_amararilla_m`,`examen_prostata`,`fiebre_amarilla_h`,`seda_dental`,`numero_cepilladas`,`probremas_visuales`,`valor_glicemia`,`estado_glicemia`,`peso`,`talla`,`imc`,`estado_nutricional`,`pulso_minuto`,`presion_arterial`,`estado_presion_arterial`,`consume_medicamento`,`cual_medicamento`,`canalizado`,`remitido`,`remitido_otro`,`valorado`,`observaciones`,`id_integrante`,`id_visita`) VALUES
-- ('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
-- INSERT INTO `de_60_mas` (`id_de_60_mas`,`peso`,`talla`,`imc`,`citologia_ult_5`,`citologia_ult_4`,`citologia_ult_1`,`autoexamen_seno`,`examen_prostata`,`examen_prostata_res`,`seda_dental`,`num_cepilladas`,`piedra_piezas_dentales`,`uso_protesis_dentales`,`valor_glicemia`,`estado_glicemia`,`pulso_minuto`,`presion_sistolica`,`presion_diastolica`,`pam`,`estado_presion`,`actividad_fisica`,`problemas_visuales`,`vacu_tipo_biologico`,`vacu_num_dosis`,`vacu_d`,`vacu_m`,`vacu_a`,`consume_medicamento`,`cual_medicamento`,`canalizado`,`remitido`,`remitido_otro`,`valorado`,`observaciones`,`id_integrante`,`id_visita`) VALUES
-- ('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
-- INSERT INTO `gestacion` (`id_gestacion`,`embarazada`,`control_prenatal`,`control_prenatal_quien`,`control_prenatal_d`,`control_prenatal_m`,`control_prenatal_a`,`ante_gestaciones`,`ante_partos`,`ante_abortos`,`ante_cesareas`,`ante_num_hijos_vivos`,`ultimo_parto_d`,`ultimo_parto_m`,`ultimo_parto_a`,`califi_riesgo_materno`,`ultimo_regla_d`,`ultimo_regla_m`,`ultimo_regla_a`,`fecha_prob_parto_d`,`fecha_prob_parto_m`,`fecha_prob_parto_a`,`gestacion`,`serologia`,`vih`,`odontologia`,`td_tt_10a18_1`,`td_tt_10a18_2`,`td_tt_10a18_3`,`td_tt_19a49_1`,`td_tt_19a49_2`,`td_tt_19a49_3`,`suplementacion`,`sedentarismo`,`fuma`,`consume_alcohol`,`tipo_parto`,`atencion_parto`,`atencion_institucional`,`planificacion`,`consume_medicamento`,`cual_medicamento`,`canalizado`,`remitido`,`remitido_otro`,`valorado`,`observaciones`,`id_integrante`,`id_visita`) VALUES
-- ('','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','');
-- INSERT INTO `antecedentes` (`id_ante_elemento`,`nombre_tabla`,`nombre_elemento`,`estado`,`edad_inicio`,`frecuencia`,`observaciones`,`id_integrante`) VALUES
-- ('','','','','','','','');
-- INSERT INTO `esta_nacidos` (`id_esta_nacidos`,`nombres`,`sexo`,`edad`,`registrado`,`parto_atendido_por`,`parto_atendido_otro`,`parto_fecha_d`,`parto_fecha_m`,`parto_fecha_a`,`id_familia`) VALUES
-- ('','','','','','','','','','','');
-- INSERT INTO `esta_mortalidad` (`id_esta_mortalidad`,`nombres`,`sexo`,`edad`,`causa`,`codigo_cie10`,`parto_fecha_d`,`parto_fecha_m`,`parto_fecha_a`,`id_familia`) VALUES
-- ('','','','','','','','','','');
-- INSERT INTO `esta_morbilidad` (`id_esta_morbilidad`,`nombres`,`sexo`,`edad`,`causa`,`codigo_cie10`,`id_familia`) VALUES
-- ('','','','','','','');
-- INSERT INTO `caracteristicas` (`id_caracteristicas`,`piso`,`paredes`,`techo`,`num_habitaciones`,`ventilacion_adecuada`,`cocina_con`,`ubicacion_cocina`,`id_visita`) VALUES
-- ('','','','','','','','','');
-- INSERT INTO `tratamiento_agua` (`id_tratamiento_agua`,`sin_tratamiento`,`filtrada`,`hervida`,`clorada`,`otro`,`id_visita`) VALUES
-- ('','','','','','','');
-- INSERT INTO `animales` (`id_animales`,`tipo_animal`,`tiene_animal`,`num_vacunados`,`num_no_vacunados`,`id_visita`) VALUES
-- ('','','','','','');
-- INSERT INTO `condi_elementos` (`id_condi_elemento`,`nombre_tabla`,`nombre_elemento`,`existe_elemento`,`id_visita`) VALUES
-- ('','','','','');
-- INSERT INTO `observaciones` (`id_observacion`,`observaciones_gen`,`observaciones_visita`,`nombres_visitador`,`id_visita`) VALUES
-- ('','','','','');
-- INSERT INTO `usuarios` (`id_usu`,`nick_name`,`password`) VALUES
-- ('','','');