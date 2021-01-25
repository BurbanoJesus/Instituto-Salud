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
	
	// echo $_POST['tb2_nombres_1'];
	// echo $_POST['tb2_nombres_2'];
	// if (isset($_POST['tb2_nombres_4']) !== '') {
	//	(isset($_POST['tb2_nombres_1'])) ? $tb2_personal_social = $_POST['tb2_nombres_1']: false;
	//	echo($tb2_personal_social);
	// }
	// echo $_POST['tb2_nombres_3'];

	$cont = 1;
	while (isset($_POST['tb2_nombres_'.$cont.''])) {

		$tb2_edad = $_POST['tb2_edad_'.$cont.''];
		$tb2_control_crecimiento = $_POST['tb2_control_crecimiento_'.$cont.''];
		$tb2_lactancia = $_POST['tb2_lactancia_'.$cont.''];
		$tb2_peso = $_POST['tb2_peso_'.$cont.''];
		$tb2_talla = $_POST['tb2_talla_'.$cont.''];
		$tb2_imc = $_POST['tb2_imc_'.$cont.''];
		$tb2_peso_al_nacer = ($_POST['tb2_peso_al_nacer_'.$cont.'']) != '' ? $_POST['tb2_peso_al_nacer_'.$cont.'']: '3000';
		(isset($_POST['tb2_estado_nutricional_'.$cont.''])) ? $tb2_estado_nutricional = $_POST['tb2_estado_nutricional_'.$cont.'']:$tb2_estado_nutricional = '';
		(isset($_POST['tb2_motricidad_gruesa_'.$cont.''])) ? $tb2_motricidad_gruesa = $_POST['tb2_motricidad_gruesa_'.$cont.'']: $tb2_motricidad_gruesa = '';
		(isset($_POST['tb2_motricidad_fina_'.$cont.''])) ? $tb2_motricidad_fina = $_POST['tb2_motricidad_fina_'.$cont.'']: $tb2_motricidad_fina = '';
		(isset($_POST['tb2_audicion_lenguaje_'.$cont.''])) ? $tb2_audicion_lenguaje = $_POST['tb2_audicion_lenguaje_'.$cont.'']: $tb2_audicion_lenguaje = '';
		(isset($_POST['tb2_personal_social_'.$cont.''])) ? $tb2_personal_social = $_POST['tb2_personal_social_'.$cont.'']: $tb2_personal_social = '';


		(isset($_POST['tb2_maltrato_fisico_'.$cont.''])) ? $tb2_maltrato_fisico = $_POST['tb2_maltrato_fisico_'.$cont.'']: $tb2_maltrato_fisico = '';
		(isset($_POST['tb2_maltrato_psicologico_'.$cont.''])) ? $tb2_maltrato_psicologico = $_POST['tb2_maltrato_psicologico_'.$cont.'']: $tb2_maltrato_psicologico = '';
		// $tb2_maltrato = $_POST['tb2_maltrato_'.$cont.''];
		(isset($_POST['tb2_problema_visual_'.$cont.''])) ? $tb2_problema_visual = $_POST['tb2_problema_visual_'.$cont.'']: $tb2_problema_visual = '';
		(isset($_POST['tb2_problema_auditivo_'.$cont.''])) ? $tb2_problema_auditivo = $_POST['tb2_problema_auditivo_'.$cont.'']: $tb2_problema_auditivo = '';
		(isset($_POST['tb2_carnet_'.$cont.''])) ? $tb2_carnet = $_POST['tb2_carnet_'.$cont.'']: $tb2_carnet = '';
		(isset($_POST['tb2_bcg_'.$cont.''])) ? $tb2_bcg = $_POST['tb2_bcg_'.$cont.'']: $tb2_bcg = '';
		(isset($_POST['tb2_polio1_'.$cont.''])) ? $tb2_polio1 = $_POST['tb2_polio1_'.$cont.'']: $tb2_polio1 = '';
		(isset($_POST['tb2_polio2_'.$cont.''])) ? $tb2_polio2 = $_POST['tb2_polio2_'.$cont.'']: $tb2_polio2 = '';
		(isset($_POST['tb2_polio3_'.$cont.''])) ? $tb2_polio3 = $_POST['tb2_polio3_'.$cont.'']: $tb2_polio3 = '';
		(isset($_POST['tb2_dpt1_'.$cont.''])) ? $tb2_dpt1 = $_POST['tb2_dpt1_'.$cont.'']: $tb2_dpt1 = '';
		(isset($_POST['tb2_dpt2_'.$cont.''])) ? $tb2_dpt2 = $_POST['tb2_dpt2_'.$cont.'']: $tb2_dpt2 = '';
		(isset($_POST['tb2_dpt3_'.$cont.''])) ? $tb2_dpt3 = $_POST['tb2_dpt3_'.$cont.'']: $tb2_dpt3 = '';
		(isset($_POST['tb2_rn_'.$cont.''])) ? $tb2_rn = $_POST['tb2_rn_'.$cont.'']: $tb2_rn = '';
		(isset($_POST['tb2_hepatitisb1_'.$cont.''])) ? $tb2_hepatitisb1 = $_POST['tb2_hepatitisb1_'.$cont.'']: $tb2_hepatitisb1 = '';
		(isset($_POST['tb2_hepatitisb2_'.$cont.''])) ? $tb2_hepatitisb2 = $_POST['tb2_hepatitisb2_'.$cont.'']: $tb2_hepatitisb2 = '';
		(isset($_POST['tb2_hepatitisb3_'.$cont.''])) ? $tb2_hepatitisb3 = $_POST['tb2_hepatitisb3_'.$cont.'']: $tb2_hepatitisb3 = '';
		(isset($_POST['tb2_hib1_'.$cont.''])) ? $tb2_hib1 = $_POST['tb2_hib1_'.$cont.'']: $tb2_hib1 = '';
		(isset($_POST['tb2_hib2_'.$cont.''])) ? $tb2_hib2 = $_POST['tb2_hib2_'.$cont.'']: $tb2_hib2 = '';
		(isset($_POST['tb2_hib3_'.$cont.''])) ? $tb2_hib3 = $_POST['tb2_hib3_'.$cont.'']: $tb2_hib3 = '';
		(isset($_POST['tb2_influenza1_'.$cont.''])) ? $tb2_influenza1 = $_POST['tb2_influenza1_'.$cont.'']: $tb2_influenza1 = '';
		(isset($_POST['tb2_influenza2_'.$cont.''])) ? $tb2_influenza2 = $_POST['tb2_influenza2_'.$cont.'']: $tb2_influenza2 = '';
		(isset($_POST['tb2_rotavirus1_'.$cont.''])) ? $tb2_rotavirus1 = $_POST['tb2_rotavirus1_'.$cont.'']: $tb2_rotavirus1 = '';
		(isset($_POST['tb2_rotavirus2_'.$cont.''])) ? $tb2_rotavirus2 = $_POST['tb2_rotavirus2_'.$cont.'']: $tb2_rotavirus2 = '';
		(isset($_POST['tb2_neumococo1_'.$cont.''])) ? $tb2_neumococo1 = $_POST['tb2_neumococo1_'.$cont.'']: $tb2_neumococo1 = '';
		(isset($_POST['tb2_neumococo2_'.$cont.''])) ? $tb2_neumococo2 = $_POST['tb2_neumococo2_'.$cont.'']: $tb2_neumococo2 = '';
		(isset($_POST['tb2_neumococo3_'.$cont.''])) ? $tb2_neumococo3 = $_POST['tb2_neumococo3_'.$cont.'']: $tb2_neumococo3 = '';
		(isset($_POST['tb2_consume_medica_'.$cont.''])) ? $tb2_consume_medica = $_POST['tb2_consume_medica_'.$cont.'']: $tb2_consume_medica = '';
		(isset($_POST['tb2_consume_medica_txt_'.$cont.''])) ? $tb2_consume_medica_txt = $_POST['tb2_consume_medica_txt_'.$cont.'']: $tb2_consume_medica_txt = '';
		(isset($_POST['tb2_canalizado_'.$cont.''])) ? $tb2_canalizado = $_POST['tb2_canalizado_'.$cont.'']: $tb2_canalizado = '';
		$tb2_remitido = ($_POST['tb2_remitido_'.$cont.''] != '') ? $_POST['tb2_remitido_'.$cont.'']: 'Null';
		// $tb2_remitido = 'Null';
		(isset($_POST['tb2_otra_remision'])) ? $tb2_otra_remision = $_POST['tb2_otra_remision']: $tb2_otra_remision = '';
		(isset($_POST['tb2_valorado_'.$cont.''])) ? $tb2_valorado = $_POST['tb2_valorado_'.$cont.'']: $tb2_valorado = '';

		$tb2_observaciones = $_POST['tb2_observaciones_'.$cont.''];
		$id_integrante = $_POST['id_integrante_'.$cont.''];


		$sql = "INSERT into menores_a_1 values(Null,'$tb2_control_crecimiento','$tb2_lactancia',$tb2_peso,$tb2_talla,$tb2_imc,$tb2_peso_al_nacer,'$tb2_estado_nutricional','$tb2_motricidad_gruesa','$tb2_motricidad_fina','$tb2_audicion_lenguaje','$tb2_personal_social','$tb2_maltrato_fisico','$tb2_maltrato_psicologico','$tb2_problema_visual','$tb2_problema_auditivo','$tb2_carnet','$tb2_bcg','$tb2_polio1','$tb2_polio2','$tb2_polio3','$tb2_dpt1','$tb2_dpt2','$tb2_dpt3','$tb2_rn','$tb2_hepatitisb1','$tb2_hepatitisb2','$tb2_hepatitisb3','$tb2_hib1','$tb2_hib2','$tb2_hib3','$tb2_influenza1','$tb2_influenza2','$tb2_rotavirus1','$tb2_rotavirus2','$tb2_neumococo1','$tb2_neumococo2','$tb2_neumococo3','$tb2_consume_medica','$tb2_consume_medica_txt','$tb2_canalizado',$tb2_remitido,'$tb2_otra_remision','$tb2_valorado','$tb2_observaciones','$id_integrante',$id_visita)";
		echo $sql;
		echo '<br>';
		echo $tb2_remitido;
		echo '<br>';
		$query = $bd->query($sql); 
		if (!$query) echo $bd->error;
		$cont += 1; 
	}


	header("location: /instituto/views/registrar/niños_1_a_5.php");

$bd->close();
 ?>
