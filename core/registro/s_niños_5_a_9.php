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
	while (isset($_POST['tb4_nombres_'.$cont.''])) {

		$tb4_edad = $_POST['tb4_edad_'.$cont.''];
		$tb4_control_crecimiento = $_POST['tb4_control_crecimiento_'.$cont.''];
		$tb4_lactancia = $_POST['tb4_lactancia_'.$cont.''];
		$tb4_peso = $_POST['tb4_peso_'.$cont.''];
		$tb4_talla = $_POST['tb4_talla_'.$cont.''];
		$tb4_imc = $_POST['tb4_imc_'.$cont.''];
		(isset($_POST['tb4_estado_nutricional_'.$cont.''])) ? $tb4_estado_nutricional = $_POST['tb4_estado_nutricional_'.$cont.'']:$tb4_estado_nutricional = '';
		(isset($_POST['tb4_motricidad_gruesa_'.$cont.''])) ? $tb4_motricidad_gruesa = $_POST['tb4_motricidad_gruesa_'.$cont.'']: $tb4_motricidad_gruesa = '';
		(isset($_POST['tb4_motricidad_fina_'.$cont.''])) ? $tb4_motricidad_fina = $_POST['tb4_motricidad_fina_'.$cont.'']: $tb4_motricidad_fina = '';
		(isset($_POST['tb4_audicion_lenguaje_'.$cont.''])) ? $tb4_audicion_lenguaje = $_POST['tb4_audicion_lenguaje_'.$cont.'']: $tb4_audicion_lenguaje = '';
		(isset($_POST['tb4_personal_social_'.$cont.''])) ? $tb4_personal_social = $_POST['tb4_personal_social_'.$cont.'']: $tb4_personal_social = '';


		(isset($_POST['tb4_maltrato_fisico_'.$cont.''])) ? $tb4_maltrato_fisico = $_POST['tb4_maltrato_fisico_'.$cont.'']: $tb4_maltrato_fisico = '';
		(isset($_POST['tb4_maltrato_psicologico_'.$cont.''])) ? $tb4_maltrato_psicologico = $_POST['tb4_maltrato_psicologico_'.$cont.'']: $tb4_maltrato_psicologico = '';
		// $tb4_maltrato = $_POST['tb4_maltrato_'.$cont.''];
		
		(isset($_POST['tb4_dpt_'.$cont.''])) ? $tb4_dpt = $_POST['tb4_dpt_'.$cont.'']: $tb4_dpt = '';
		(isset($_POST['tb4_vop_'.$cont.''])) ? $tb4_vop = $_POST['tb4_vop_'.$cont.'']: $tb4_vop = '';
		(isset($_POST['tb4_srp_'.$cont.''])) ? $tb4_srp = $_POST['tb4_srp_'.$cont.'']: $tb4_srp = '';
		(isset($_POST['tb4_caries_'.$cont.''])) ? $tb4_caries = $_POST['tb4_caries_'.$cont.'']: $tb4_caries = '';
		(isset($_POST['tb4_aplica_fluor_'.$cont.''])) ? $tb4_aplica_fluor = $_POST['tb4_aplica_fluor_'.$cont.'']: $tb4_aplica_fluor = '';
		(isset($_POST['tb4_aplica_sellantes_'.$cont.''])) ? $tb4_aplica_sellantes = $_POST['tb4_aplica_sellantes_'.$cont.'']: $tb4_aplica_sellantes = '';
		(isset($_POST['tb4_seda_dental_'.$cont.''])) ? $tb4_seda_dental = $_POST['tb4_seda_dental_'.$cont.'']: $tb4_seda_dental = '';


		(isset($_POST['tb4_numero_cepilladas_'.$cont.''])) ? $tb4_numero_cepilladas = $_POST['tb4_numero_cepilladas_'.$cont.'']: $tb4_numero_cepilladas = '';
		($_POST['tb4_desparasitado_d_'.$cont.''] != '') ? $tb4_desparasitado_d = $_POST['tb4_desparasitado_d_'.$cont.'']: $tb4_desparasitado_d = '';
		($_POST['tb4_desparasitado_m_'.$cont.''] != '') ? $tb4_desparasitado_m = $_POST['tb4_desparasitado_m_'.$cont.'']: $tb4_desparasitado_m = '';
		($_POST['tb4_desparasitado_a_'.$cont.''] != '') ? $tb4_desparasitado_a = $_POST['tb4_desparasitado_a_'.$cont.'']: $tb4_desparasitado_a = '';
		(isset($_POST['tb4_desparasitado_no_'.$cont.''])) ? $tb4_desparasitado_no = $_POST['tb4_desparasitado_no_'.$cont.'']: $tb4_desparasitado_no = '';


		(isset($_POST['tb4_consume_medica_'.$cont.''])) ? $tb4_consume_medica = $_POST['tb4_consume_medica_'.$cont.'']: $tb4_consume_medica = '';
		(isset($_POST['tb4_consume_medica_txt_'.$cont.''])) ? $tb4_consume_medica_txt = $_POST['tb4_consume_medica_txt_'.$cont.'']: $tb4_consume_medica_txt = '';
		(isset($_POST['tb4_canalizado_'.$cont.''])) ? $tb4_canalizado = $_POST['tb4_canalizado_'.$cont.'']: $tb4_canalizado = '';
		$tb4_remitido = ($_POST['tb4_remitido_'.$cont.''] != '') ? $_POST['tb4_remitido_'.$cont.'']: '';
		(isset($_POST['tb4_otra_remision'])) ? $tb4_otra_remision = $_POST['tb4_otra_remision']: $tb4_otra_remision = '';
		(isset($_POST['tb4_valorado_'.$cont.''])) ? $tb4_valorado = $_POST['tb4_valorado_'.$cont.'']: $tb4_valorado = '';

		$tb4_observaciones = $_POST['tb4_observaciones_'.$cont.''];
		$id_integrante = $_POST['id_integrante_'.$cont.''];

		$sql = "INSERT into de_5_a_9 values(null,'$tb4_edad','$tb4_control_crecimiento','$tb4_lactancia','$tb4_peso','$tb4_talla','$tb4_imc','$tb4_estado_nutricional','$tb4_motricidad_gruesa','$tb4_motricidad_fina','$tb4_audicion_lenguaje','$tb4_personal_social','$tb4_maltrato_fisico','$tb4_maltrato_psicologico','$tb4_dpt','$tb4_vop','$tb4_srp','$tb4_caries','$tb4_aplica_fluor','$tb4_aplica_sellantes','$tb4_seda_dental','$tb4_numero_cepilladas','$tb4_desparasitado_no','$tb4_desparasitado_d','$tb4_desparasitado_m','$tb4_desparasitado_a','$tb4_consume_medica','$tb4_consume_medica_txt','$tb4_canalizado','$tb4_remitido','$tb4_otra_remision','$tb4_valorado','$tb4_observaciones','$id_integrante',$id_visita)";

		echo $sql;
		$query = $bd->query($sql); 
		if (!$query) echo $bd->error;
		$cont += 1; 
	}

	header("location: /instituto/views/registrar/hom_muj_10_a_59.php");

$bd->close();
 ?>
