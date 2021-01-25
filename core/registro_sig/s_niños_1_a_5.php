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
	while (isset($_POST['tb3_nombres_'.$cont.''])) {

		$tb3_edad = $_POST['tb3_edad_'.$cont.''];
		$tb3_control_crecimiento = $_POST['tb3_control_crecimiento_'.$cont.''];
		$tb3_lactancia = $_POST['tb3_lactancia_'.$cont.''];
		$tb3_peso = $_POST['tb3_peso_'.$cont.''];
		$tb3_talla = $_POST['tb3_talla_'.$cont.''];
		$tb3_imc =  ($_POST['tb3_imc_'.$cont.''] != '') ? $_POST['tb3_imc_'.$cont.''] : '';
		$tb3_peso_al_nacer = ($_POST['tb3_peso_al_nacer_'.$cont.''] != '') ? $_POST['tb3_peso_al_nacer_'.$cont.''] : '3000';
		(isset($_POST['tb3_estado_nutricional_'.$cont.''])) ? $tb3_estado_nutricional = $_POST['tb3_estado_nutricional_'.$cont.'']:$tb3_estado_nutricional = '';
		(isset($_POST['tb3_motricidad_gruesa_'.$cont.''])) ? $tb3_motricidad_gruesa = $_POST['tb3_motricidad_gruesa_'.$cont.'']: $tb3_motricidad_gruesa = '';
		(isset($_POST['tb3_motricidad_fina_'.$cont.''])) ? $tb3_motricidad_fina = $_POST['tb3_motricidad_fina_'.$cont.'']: $tb3_motricidad_fina = '';
		(isset($_POST['tb3_audicion_lenguaje_'.$cont.''])) ? $tb3_audicion_lenguaje = $_POST['tb3_audicion_lenguaje_'.$cont.'']: $tb3_audicion_lenguaje = '';
		(isset($_POST['tb3_personal_social_'.$cont.''])) ? $tb3_personal_social = $_POST['tb3_personal_social_'.$cont.'']: $tb3_personal_social = '';


		(isset($_POST['tb3_maltrato_fisico_'.$cont.''])) ? $tb3_maltrato_fisico = $_POST['tb3_maltrato_fisico_'.$cont.'']: $tb3_maltrato_fisico = '';
		(isset($_POST['tb3_maltrato_psicologico_'.$cont.''])) ? $tb3_maltrato_psicologico = $_POST['tb3_maltrato_psicologico_'.$cont.'']: $tb3_maltrato_psicologico = '';
		// $tb3_maltrato = $_POST['tb3_maltrato_'.$cont.''];
		(isset($_POST['tb3_problema_visual_'.$cont.''])) ? $tb3_problema_visual = $_POST['tb3_problema_visual_'.$cont.'']: $tb3_problema_visual = '';
		(isset($_POST['tb3_problema_auditivo_'.$cont.''])) ? $tb3_problema_auditivo = $_POST['tb3_problema_auditivo_'.$cont.'']: $tb3_problema_auditivo = '';
		(isset($_POST['tb3_carnet_'.$cont.''])) ? $tb3_carnet = $_POST['tb3_carnet_'.$cont.'']: $tb3_carnet = '';
		(isset($_POST['tb3_bcg_'.$cont.''])) ? $tb3_bcg = $_POST['tb3_bcg_'.$cont.'']: $tb3_bcg = '';
		(isset($_POST['tb3_polio1_'.$cont.''])) ? $tb3_polio1 = $_POST['tb3_polio1_'.$cont.'']: $tb3_polio1 = '';
		(isset($_POST['tb3_polio2_'.$cont.''])) ? $tb3_polio2 = $_POST['tb3_polio2_'.$cont.'']: $tb3_polio2 = '';
		(isset($_POST['tb3_polio3_'.$cont.''])) ? $tb3_polio3 = $_POST['tb3_polio3_'.$cont.'']: $tb3_polio3 = '';
		(isset($_POST['tb3_polio_r1_'.$cont.''])) ? $tb3_polio_r1 = $_POST['tb3_polio_r1_'.$cont.'']: $tb3_polio_r1 = '';
		(isset($_POST['tb3_polio_r2_'.$cont.''])) ? $tb3_polio_r2 = $_POST['tb3_polio_r2_'.$cont.'']: $tb3_polio_r2 = '';
		(isset($_POST['tb3_dpt1_'.$cont.''])) ? $tb3_dpt1 = $_POST['tb3_dpt1_'.$cont.'']: $tb3_dpt1 = '';
		(isset($_POST['tb3_dpt2_'.$cont.''])) ? $tb3_dpt2 = $_POST['tb3_dpt2_'.$cont.'']: $tb3_dpt2 = '';
		(isset($_POST['tb3_dpt3_'.$cont.''])) ? $tb3_dpt3 = $_POST['tb3_dpt3_'.$cont.'']: $tb3_dpt3 = '';
		(isset($_POST['tb3_dpt_r1_'.$cont.''])) ? $tb3_dpt_r1 = $_POST['tb3_dpt_r1_'.$cont.'']: $tb3_dpt_r1 = '';
		(isset($_POST['tb3_dpt_r2_'.$cont.''])) ? $tb3_dpt_r2 = $_POST['tb3_dpt_r2_'.$cont.'']: $tb3_dpt_r2 = '';
		(isset($_POST['tb3_hepatitisb1_'.$cont.''])) ? $tb3_hepatitisb1 = $_POST['tb3_hepatitisb1_'.$cont.'']: $tb3_hepatitisb1 = '';
		(isset($_POST['tb3_hepatitisb2_'.$cont.''])) ? $tb3_hepatitisb2 = $_POST['tb3_hepatitisb2_'.$cont.'']: $tb3_hepatitisb2 = '';
		(isset($_POST['tb3_hepatitisb3_'.$cont.''])) ? $tb3_hepatitisb3 = $_POST['tb3_hepatitisb3_'.$cont.'']: $tb3_hepatitisb3 = '';
		(isset($_POST['tb3_hib1_'.$cont.''])) ? $tb3_hib1 = $_POST['tb3_hib1_'.$cont.'']: $tb3_hib1 = '';
		(isset($_POST['tb3_hib2_'.$cont.''])) ? $tb3_hib2 = $_POST['tb3_hib2_'.$cont.'']: $tb3_hib2 = '';
		(isset($_POST['tb3_hib3_'.$cont.''])) ? $tb3_hib3 = $_POST['tb3_hib3_'.$cont.'']: $tb3_hib3 = '';
		(isset($_POST['tb3_srp1_'.$cont.''])) ? $tb3_srp1 = $_POST['tb3_srp1_'.$cont.'']: $tb3_srp1 = '';
		(isset($_POST['tb3_srp_r1_'.$cont.''])) ? $tb3_srp_r1 = $_POST['tb3_srp_r1_'.$cont.'']: $tb3_srp_r1 = '';
		(isset($_POST['tb3_influenza1_'.$cont.''])) ? $tb3_influenza1 = $_POST['tb3_influenza1_'.$cont.'']: $tb3_influenza1 = '';
		(isset($_POST['tb3_influenza2_'.$cont.''])) ? $tb3_influenza2 = $_POST['tb3_influenza2_'.$cont.'']: $tb3_influenza2 = '';
		(isset($_POST['tb3_fiebre_amarilla_'.$cont.''])) ? $tb3_fiebre_amarilla = $_POST['tb3_fiebre_amarilla_'.$cont.'']: $tb3_fiebre_amarilla = '';


		(isset($_POST['tb3_numero_cepilladas_'.$cont.''])) ? $tb3_numero_cepilladas = $_POST['tb3_numero_cepilladas_'.$cont.'']: $tb3_numero_cepilladas = '';
		(isset($_POST['tb3_desparasitado_d_'.$cont.''])) ? $tb3_desparasitado_d = $_POST['tb3_desparasitado_d_'.$cont.'']: $tb3_desparasitado_d = '';
		(isset($_POST['tb3_desparasitado_m_'.$cont.''])) ? $tb3_desparasitado_m = $_POST['tb3_desparasitado_m_'.$cont.'']: $tb3_desparasitado_m = '';
		(isset($_POST['tb3_desparasitado_a_'.$cont.''])) ? $tb3_desparasitado_a = $_POST['tb3_desparasitado_a_'.$cont.'']: $tb3_desparasitado_a = '';
		(isset($_POST['tb3_desparasitado_no_'.$cont.''])) ? $tb3_desparasitado_no = $_POST['tb3_desparasitado_no_'.$cont.'']: $tb3_desparasitado_no = '';


		(isset($_POST['tb3_consume_medica_'.$cont.''])) ? $tb3_consume_medica = $_POST['tb3_consume_medica_'.$cont.'']: $tb3_consume_medica = '';
		(isset($_POST['tb3_consume_medica_txt_'.$cont.''])) ? $tb3_consume_medica_txt = $_POST['tb3_consume_medica_txt_'.$cont.'']: $tb3_consume_medica_txt = '';
		(isset($_POST['tb3_canalizado_'.$cont.''])) ? $tb3_canalizado = $_POST['tb3_canalizado_'.$cont.'']: $tb3_canalizado = '';
		$tb3_remitido = ($_POST['tb3_remitido_'.$cont.''] != '') ? $_POST['tb3_remitido_'.$cont.'']: '';
		(isset($_POST['tb3_otra_remision'])) ? $tb3_otra_remision = $_POST['tb3_otra_remision']: $tb3_otra_remision = '';
		(isset($_POST['tb3_valorado_'.$cont.''])) ? $tb3_valorado = $_POST['tb3_valorado_'.$cont.'']: $tb3_valorado = '';

		$tb3_observaciones = $_POST['tb3_observaciones_'.$cont.''];
		$id_integrante = $_POST['id_integrante_'.$cont.''];
		

		$sql = "INSERT into de_1_a_5 values(null,
		$tb3_edad,
		'$tb3_control_crecimiento',
		'$tb3_lactancia',$tb3_peso,
		$tb3_talla,$tb3_imc,
		'$tb3_peso_al_nacer',
		'$tb3_estado_nutricional',
		'$tb3_motricidad_gruesa',
		'$tb3_motricidad_fina',
		'$tb3_audicion_lenguaje',
		'$tb3_personal_social',
		'$tb3_maltrato_fisico',
		'$tb3_maltrato_psicologico',
		'$tb3_problema_visual',
		'$tb3_problema_auditivo',
		'$tb3_carnet',
		'$tb3_bcg',
		'$tb3_polio1',
		'$tb3_polio2',
		'$tb3_polio3',
		'$tb3_polio_r1',
		'$tb3_polio_r2',
		'$tb3_dpt1',
		'$tb3_dpt2',
		'$tb3_dpt3',
		'$tb3_dpt_r1',
		'$tb3_dpt_r2',
		'$tb3_hepatitisb1',
		'$tb3_hepatitisb2',
		'$tb3_hepatitisb3',
		'$tb3_hib1',
		'$tb3_hib2',
		'$tb3_hib3',
		'$tb3_srp1',
		'$tb3_srp_r1',
		'$tb3_influenza1',
		'$tb3_influenza2',
		'$tb3_fiebre_amarilla',
		'$tb3_numero_cepilladas',
		'$tb3_desparasitado_no',
		'$tb3_desparasitado_d',
		'$tb3_desparasitado_m',
		'$tb3_desparasitado_a',
		'$tb3_consume_medica',
		'$tb3_consume_medica_txt',
		'$tb3_canalizado',
		'$tb3_remitido',
		'$tb3_otra_remision','$tb3_valorado',
		'$tb3_observaciones',
		'$id_integrante',
		$id_visita)";

		echo $sql;
		$query = $bd->query($sql); 
		if (!$query) echo $bd->error;
		$cont += 1; 
	}


	header("location: /instituto/views/registrar_sig/niños_5_a_9.php");

$bd->close();
 ?>
