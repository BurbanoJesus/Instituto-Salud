<?php 
	require $_SERVER['DOCUMENT_ROOT']."/instituto/application/database/conexion.php";
	// sleep(1);
	session_start();
	$id_familia = $_SESSION['id_familia'];
	$visita_d = $_SESSION['v_actual_d'];
	$visita_m = $_SESSION['v_actual_m'];
	$visita_a = $_SESSION['v_actual_a'];
	$id_visita = $_SESSION['id_visita'];

	$bd = conectar();

	$cont = 1;
	while (isset($_POST['tb7_nombres_'.$cont.''])) {

		$tb7_embarazada = $_POST['tb7_embarazada_'.$cont.''];
		$tb7_control_prenatal_cuantos = $_POST['tb7_control_prenatal_cuantos_'.$cont.''];
		(isset($_POST['tb7_control_prenatal_'.$cont.''])) ? $tb7_control_prenatal = $_POST['tb7_control_prenatal_'.$cont.'']:$tb7_control_prenatal = 0;
		$tb7_control_prenatal_quien = $_POST['tb7_control_prenatal_quien_'.$cont.''];
		(isset($_POST['tb7_control_prenatal_fecha_d_'.$cont.''])) ? $tb7_control_prenatal_fecha_d = $_POST['tb7_control_prenatal_fecha_d_'.$cont.'']:$tb7_control_prenatal_fecha_d = '';
		(isset($_POST['tb7_control_prenatal_fecha_m_'.$cont.''])) ? $tb7_control_prenatal_fecha_m = $_POST['tb7_control_prenatal_fecha_m_'.$cont.'']: $tb7_control_prenatal_fecha_m = '';
		(isset($_POST['tb7_control_prenatal_fecha_a_'.$cont.''])) ? $tb7_control_prenatal_fecha_a = $_POST['tb7_control_prenatal_fecha_a_'.$cont.'']: $tb7_control_prenatal_fecha_a = "";
		(isset($_POST['tb7_ante_obstre_gestacione_'.$cont.''])) ? $tb7_ante_obstre_gestacione = $_POST['tb7_ante_obstre_gestacione_'.$cont.'']: $tb7_ante_obstre_gestacione = "";
		(isset($_POST['tb7_ante_obstre_partos_'.$cont.''])) ? $tb7_ante_obstre_partos = $_POST['tb7_ante_obstre_partos_'.$cont.'']: $tb7_ante_obstre_partos = '';
		(isset($_POST['tb7_ante_obstre_abortos_'.$cont.''])) ? $tb7_ante_obstre_abortos = $_POST['tb7_ante_obstre_abortos_'.$cont.'']: $tb7_ante_obstre_abortos = '';
		
		(isset($_POST['tb7_ante_obstre_cesareas_'.$cont.''])) ? $tb7_ante_obstre_cesareas = $_POST['tb7_ante_obstre_cesareas_'.$cont.'']: $tb7_ante_obstre_cesareas = '';
		(isset($_POST['tb7_ante_obstre_num_hijos_'.$cont.''])) ? $tb7_ante_obstre_num_hijos = $_POST['tb7_ante_obstre_num_hijos_'.$cont.'']: $tb7_ante_obstre_num_hijos = '';
		
		(isset($_POST['tb7_a_f_ult_part_d_'.$cont.''])) ? $tb7_a_f_ult_part_d = $_POST['tb7_a_f_ult_part_d_'.$cont.'']: $tb7_a_f_ult_part_d = "";
		(isset($_POST['tb7_a_f_ult_part_m_'.$cont.''])) ? $tb7_a_f_ult_part_m = $_POST['tb7_a_f_ult_part_m_'.$cont.'']: $tb7_a_f_ult_part_m = "";
		(isset($_POST['tb7_a_f_ult_part_a_'.$cont.''])) ? $tb7_a_f_ult_part_a = $_POST['tb7_a_f_ult_part_a_'.$cont.'']: $tb7_a_f_ult_part_a = "";


		(isset($_POST['tb7_clasi_riesgo_materno_'.$cont.''])) ? $tb7_clasi_riesgo_materno = $_POST['tb7_clasi_riesgo_materno_'.$cont.'']: $tb7_clasi_riesgo_materno= strVal('55');
		$tb7_fecha_ult_regla_d = $_POST['tb7_fecha_ult_regla_d_'.$cont.''];
		$tb7_fecha_ult_regla_m = $_POST['tb7_fecha_ult_regla_m_'.$cont.''];
		$tb7_fecha_ult_regla_a = $_POST['tb7_fecha_ult_regla_a_'.$cont.''];
		$tb7_fecha_prop_parto_d = $_POST['tb7_fecha_prop_parto_d_'.$cont.''];
		$tb7_fecha_prop_parto_m = $_POST['tb7_fecha_prop_parto_m_'.$cont.''];
		$tb7_fecha_prop_parto_a = $_POST['tb7_fecha_prop_parto_a_'.$cont.''];
		$tb7_peso = $_POST['tb7_peso_'.$cont.''];
		$tb7_gestacion_semanas = $_POST['tb7_gestacion_semanas_'.$cont.''];
		(isset($_POST['tb7_serologia_'.$cont.''])) ? $tb7_serologia = $_POST['tb7_serologia_'.$cont.'']: $tb7_serologia = "";
		(isset($_POST['tb7_vih_'.$cont.''])) ? $tb7_vih = $_POST['tb7_vih_'.$cont.'']: $tb7_vih = "";
		(isset($_POST['tb7_odontologico_'.$cont.''])) ? $tb7_odontologico = $_POST['tb7_odontologico_'.$cont.'']: $tb7_odontologico = "";
		(isset($_POST['tb7_td_tt1_10a18_'.$cont.''])) ? $tb7_td_tt1_10a18 = $_POST['tb7_td_tt1_10a18_'.$cont.'']: $tb7_td_tt1_10a18 = '';
		(isset($_POST['tb7_td_tt2_10a18_'.$cont.''])) ? $tb7_td_tt2_10a18 = $_POST['tb7_td_tt2_10a18_'.$cont.'']: $tb7_td_tt2_10a18 = '';
		(isset($_POST['tb7_td_tt3_10a18_'.$cont.''])) ? $tb7_td_tt3_10a18 = $_POST['tb7_td_tt3_10a18_'.$cont.'']: $tb7_td_tt3_10a18 = '';
		(isset($_POST['tb7_td_tt1_19a49_'.$cont.''])) ? $tb7_td_tt1_19a49 = $_POST['tb7_td_tt1_19a49_'.$cont.'']: $tb7_td_tt1_19a49 = '';
		(isset($_POST['tb7_td_tt2_19a49_'.$cont.''])) ? $tb7_td_tt2_19a49 = $_POST['tb7_td_tt2_19a49_'.$cont.'']: $tb7_td_tt2_19a49 = '';
		(isset($_POST['tb7_td_tt3_19a49_'.$cont.''])) ? $tb7_td_tt3_19a49 = $_POST['tb7_td_tt3_19a49_'.$cont.'']: $tb7_td_tt3_19a49 = '';
		(isset($_POST['tb7_suplementacion_'.$cont.''])) ? $tb7_suplementacion = $_POST['tb7_suplementacion_'.$cont.'']: $tb7_suplementacion = '';
		(isset($_POST['tb7_sedentarismo_'.$cont.''])) ? $tb7_sedentarismo = $_POST['tb7_sedentarismo_'.$cont.'']: $tb7_sedentarismo = '';
		(isset($_POST['tb7_fuma_'.$cont.''])) ? $tb7_fuma = $_POST['tb7_fuma_'.$cont.'']: $tb7_fuma = '';
		(isset($_POST['tb7_consume_alcohol_'.$cont.''])) ? $tb7_consume_alcohol = $_POST['tb7_consume_alcohol_'.$cont.'']: $tb7_consume_alcohol = '';
		(isset($_POST['tb7_parto_'.$cont.''])) ? $tb7_parto = $_POST['tb7_parto_'.$cont.'']: $tb7_parto = '';
		$tb7_atencion_parto_institucional = $_POST['tb7_atencion_parto_institucional_'.$cont.''];
		$tb7_atencion_parto_domiciliario = $_POST['tb7_atencion_parto_domiciliario_'.$cont.''];
		(isset($_POST['tb7_postparto_atencion_institu_'.$cont.''])) ? $tb7_postparto_atencion_institu = $_POST['tb7_postparto_atencion_institu_'.$cont.'']: $tb7_postparto_atencion_institu = '';
		(isset($_POST['tb7_postparto_planifica_'.$cont.''])) ? $tb7_postparto_planifica = $_POST['tb7_postparto_planifica_'.$cont.'']: $tb7_postparto_planifica = '';
		
		(isset($_POST['tb7_consume_medica_'.$cont.''])) ? $tb7_consume_medica = $_POST['tb7_consume_medica_'.$cont.'']: $tb7_consume_medica = '';
		(isset($_POST['tb7_consume_medica_txt_'.$cont.''])) ? $tb7_consume_medica_txt = $_POST['tb7_consume_medica_txt_'.$cont.'']: $tb7_consume_medica_txt = '';
		(isset($_POST['tb7_canalizado_'.$cont.''])) ? $tb7_canalizado = $_POST['tb7_canalizado_'.$cont.'']: $tb7_canalizado = '';
		$tb7_remitido = ($_POST['tb7_remitido_'.$cont.''] != '') ? $_POST['tb7_remitido_'.$cont.'']: '';
		(isset($_POST['tb7_otra_remision'])) ? $tb7_otra_remision = $_POST['tb7_otra_remision']: $tb7_otra_remision = '';
		(isset($_POST['tb7_valorado_'.$cont.''])) ? $tb7_valorado = $_POST['tb7_valorado_'.$cont.'']: $tb7_valorado = '';

		$tb7_observaciones = $_POST['tb7_observaciones_'.$cont.''];
		$id_integrante = $_POST['id_integrante_'.$cont.''];
		


		$sql = "INSERT into gestacion values(Null,'$tb7_embarazada','$tb7_control_prenatal_cuantos','$tb7_control_prenatal_quien','$tb7_control_prenatal_fecha_d','$tb7_control_prenatal_fecha_m','$tb7_control_prenatal_fecha_a','$tb7_ante_obstre_gestacione','$tb7_ante_obstre_partos','$tb7_ante_obstre_abortos','$tb7_ante_obstre_cesareas','$tb7_ante_obstre_num_hijos','$tb7_a_f_ult_part_d','$tb7_a_f_ult_part_m','$tb7_a_f_ult_part_a','$tb7_clasi_riesgo_materno','$tb7_fecha_ult_regla_d','$tb7_fecha_ult_regla_m','$tb7_fecha_ult_regla_a','$tb7_fecha_prop_parto_d','$tb7_fecha_prop_parto_m','$tb7_fecha_prop_parto_a','$tb7_peso','$tb7_gestacion_semanas','$tb7_serologia','$tb7_vih','$tb7_odontologico','$tb7_td_tt1_10a18','$tb7_td_tt2_10a18','$tb7_td_tt3_10a18','$tb7_td_tt1_19a49','$tb7_td_tt2_19a49','$tb7_td_tt3_19a49','$tb7_suplementacion','$tb7_sedentarismo','$tb7_fuma','$tb7_consume_alcohol','$tb7_parto','$tb7_atencion_parto_institucional','$tb7_atencion_parto_domiciliario','$tb7_postparto_atencion_institu','$tb7_postparto_planifica','$tb7_consume_medica','$tb7_consume_medica_txt','$tb7_canalizado','$tb7_remitido','$tb7_otra_remision','$tb7_valorado','$tb7_observaciones','$id_integrante',$id_visita)";
		echo $sql;
		$query = $bd->query($sql); 
		if (!$query) echo $bd->error;
		$cont += 1; 
	}
	
	$tb7_otra_persona = $_POST['tb7_otra_persona'];
	$tb7_otra_persona_atencion = $_POST['tb7_otra_persona_atencion_parto'];
	$tb7_otro_metodo = $_POST['tb7_otro_metodo'];
	$sql = "INSERT into otros_tb_gestacion values('$tb7_otra_persona','$tb7_otra_persona_atencion','$tb7_otro_metodo','$id_visita','$id_familia')";
	$query = $bd->query($sql); 
	if (!$query) echo $bd->error;

	header("location: /instituto/views/registrar_sig/antecedentes.php");

$bd->close();
 ?>
