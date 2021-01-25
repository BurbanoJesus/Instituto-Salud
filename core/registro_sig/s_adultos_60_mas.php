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
	while (isset($_POST['tb6_nombres_'.$cont.''])) {

		$tb6_edad = $_POST['tb6_edad_'.$cont.''];
		$tb6_peso = $_POST['tb6_peso_'.$cont.''];
		$tb6_talla = $_POST['tb6_talla_'.$cont.''];
		$tb6_imc = $_POST['tb6_imc_'.$cont.''];
		(isset($_POST['tb6_estado_nutricional_'.$cont.''])) ? $tb6_estado_nutricional = $_POST['tb6_estado_nutricional_'.$cont.'']:$tb6_estado_nutricional = '';
		(isset($_POST['tb6_citologia5_'.$cont.''])) ? $tb6_citologia5 = $_POST['tb6_citologia5_'.$cont.'']: $tb6_citologia5 = '';
		(isset($_POST['tb6_citologia4_'.$cont.''])) ? $tb6_citologia4 = $_POST['tb6_citologia4_'.$cont.'']: $tb6_citologia4 = "Null";
		(isset($_POST['tb6_citologia1_'.$cont.''])) ? $tb6_citologia1 = $_POST['tb6_citologia1_'.$cont.'']: $tb6_citologia1 = "Null";
		(isset($_POST['tb6_autoexamen_seno_'.$cont.''])) ? $tb6_autoexamen_seno = $_POST['tb6_autoexamen_seno_'.$cont.'']: $tb6_autoexamen_seno = '';
		(isset($_POST['tb6_examen_prostata_5años_'.$cont.''])) ? $tb6_examen_prostata_5años = $_POST['tb6_examen_prostata_5años_'.$cont.'']: $tb6_examen_prostata_5años = '';
		
		(isset($_POST['tb6_examen_prostata_resultado_'.$cont.''])) ? $tb6_examen_prostata_resultado = $_POST['tb6_examen_prostata_resultado_'.$cont.'']: $tb6_examen_prostata_resultado = '';
		(isset($_POST['tb6_seda_dental_'.$cont.''])) ? $tb6_seda_dental = $_POST['tb6_seda_dental_'.$cont.'']: $tb6_seda_dental = '';
		$tb6_cepilladas = $_POST['tb6_cepilladas_'.$cont.''];
		(isset($_POST['tb6_piezas_dentales_'.$cont.''])) ? $tb6_piezas_dentales = $_POST['tb6_piezas_dentales_'.$cont.'']: $tb6_piezas_dentales = "Null";
		(isset($_POST['tb6_protesis_dentales_'.$cont.''])) ? $tb6_protesis_dentales = $_POST['tb6_protesis_dentales_'.$cont.'']: $tb6_protesis_dentales = "Null";


		$tb6_glicemia = $_POST['tb6_glicemia_'.$cont.''];
		$tb6_glicemia_estado = $_POST['tb6_glicemia_estado_'.$cont.''];
		$tb6_pulso = $_POST['tb6_pulso_'.$cont.''];
		$tb6_sistolica = $_POST['tb6_sistolica_'.$cont.''];
		$tb6_diastolica = $_POST['tb6_diastolica_'.$cont.''];
		$tb6_pam = $_POST['tb6_pam_'.$cont.''];
		$tb6_estado_tension = $_POST['tb6_estado_tension_'.$cont.''];
		(isset($_POST['tb6_actividad_fisica_'.$cont.''])) ? $tb6_actividad_fisica = $_POST['tb6_actividad_fisica_'.$cont.'']: $tb6_actividad_fisica = '';
		(isset($_POST['tb6_problemas_visuales_'.$cont.''])) ? $tb6_problemas_visuales = $_POST['tb6_problemas_visuales_'.$cont.'']: $tb6_problemas_visuales = '';
		$tb6_vacunacion_tipo_biologico = $_POST['tb6_vacunacion_tipo_biologico_'.$cont.''];
		$tb6_vacunacion_numero_dosis = $_POST['tb6_vacunacion_numero_dosis_'.$cont.''];
		$tb6_fecha_vacunacion_d = $_POST['tb6_fecha_vacunacion_d_'.$cont.''];
		$tb6_fecha_vacunacion_m = $_POST['tb6_fecha_vacunacion_m_'.$cont.''];
		$tb6_fecha_vacunacion_a = $_POST['tb6_fecha_vacunacion_a_'.$cont.''];
		
		(isset($_POST['tb6_consume_medica_'.$cont.''])) ? $tb6_consume_medica = $_POST['tb6_consume_medica_'.$cont.'']: $tb6_consume_medica = '';
		(isset($_POST['tb6_consume_medica_txt_'.$cont.''])) ? $tb6_consume_medica_txt = $_POST['tb6_consume_medica_txt_'.$cont.'']: $tb6_consume_medica_txt = '';
		(isset($_POST['tb6_canalizado_'.$cont.''])) ? $tb6_canalizado = $_POST['tb6_canalizado_'.$cont.'']: $tb6_canalizado = '';
		$tb6_remitido = ($_POST['tb6_remitido_'.$cont.''] != '') ? $_POST['tb6_remitido_'.$cont.'']: 'Null';
		(isset($_POST['tb6_otra_remision'])) ? $tb6_otra_remision = $_POST['tb6_otra_remision']: $tb6_otra_remision = '';
		(isset($_POST['tb6_valorado_'.$cont.''])) ? $tb6_valorado = $_POST['tb6_valorado_'.$cont.'']: $tb6_valorado = '';

		$tb6_observaciones = $_POST['tb6_observaciones_'.$cont.''];
		$id_integrante = $_POST['id_integrante_'.$cont.''];
		

		$sql = "INSERT into de_60_mas values(Null,'$tb6_edad','$tb6_peso','$tb6_talla','$tb6_imc','$tb6_estado_nutricional','$tb6_citologia5','$tb6_citologia4','$tb6_citologia1','$tb6_autoexamen_seno','$tb6_examen_prostata_5años','$tb6_examen_prostata_resultado','$tb6_seda_dental','$tb6_cepilladas','$tb6_piezas_dentales','$tb6_protesis_dentales','$tb6_glicemia','$tb6_glicemia_estado','$tb6_pulso','$tb6_sistolica','$tb6_diastolica','$tb6_pam','$tb6_estado_tension','$tb6_actividad_fisica','$tb6_problemas_visuales','$tb6_vacunacion_tipo_biologico','$tb6_vacunacion_numero_dosis','$tb6_fecha_vacunacion_d','$tb6_fecha_vacunacion_m','$tb6_fecha_vacunacion_a','$tb6_consume_medica','$tb6_consume_medica_txt','$tb6_canalizado',$tb6_remitido,'$tb6_otra_remision','$tb6_valorado','$tb6_observaciones','$id_integrante',$id_visita)";

		echo $sql;
		$query = $bd->query($sql); 
		if (!$query) echo $bd->error;
		$cont += 1; 
	}

	
	header("location: /instituto/views/registrar_sig/gestacion_parto.php");

$bd->close();
 ?>
