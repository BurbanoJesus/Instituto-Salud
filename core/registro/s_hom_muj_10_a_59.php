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
	while (isset($_POST['tb5_nombres_'.$cont.''])) {

		$tb5_edad = $_POST['tb5_edad_'.$cont.''];
		$tb5_metodo = $_POST['tb5_metodo_'.$cont.''];
		$tb5_tiempo_metodo = $_POST['tb5_tiempo_metodo_'.$cont.''];
		(isset($_POST['tb5_cuantos_controles_'.$cont.''])) ? $tb5_cuantos_controles = $_POST['tb5_cuantos_controles_'.$cont.'']: $tb5_cuantos_controles = '';
		(isset($_POST['tb5_planifica_controles_ultimo_año_no_'.$cont.''])) ? $tb5_planifica_controles_ultimo_año_no = $_POST['tb5_planifica_controles_ultimo_año_no_'.$cont.'']: $tb5_planifica_controles_ultimo_año_no = '';
		$tb5_motivo = $_POST['tb5_motivo_'.$cont.''];
		
		(isset($_POST['tb5_citologia_'.$cont.''])) ? $tb5_citologia = $_POST['tb5_citologia_'.$cont.'']: $tb5_citologia = '';
		(isset($_POST['tb5_citologia_d_'.$cont.''])) ? $tb5_citologia_d = $_POST['tb5_citologia_d_'.$cont.'']: $tb5_citologia_d = '';
		(isset($_POST['tb5_citologia_m_'.$cont.''])) ? $tb5_citologia_m = $_POST['tb5_citologia_m_'.$cont.'']: $tb5_citologia_m = '';
		(isset($_POST['tb5_citologia_a_'.$cont.''])) ? $tb5_citologia_a = $_POST['tb5_citologia_a_'.$cont.'']: $tb5_citologia_a = '';
		(isset($_POST['tb5_autoexamen_seno_'.$cont.''])) ? $tb5_autoexamen_seno = $_POST['tb5_autoexamen_seno_'.$cont.'']: $tb5_autoexamen_seno = '';
		(isset($_POST['tb5_violenciacontramujer_'.$cont.''])) ? $tb5_violenciacontramujer = $_POST['tb5_violenciacontramujer_'.$cont.'']: $tb5_violenciacontramujer = '';
		(isset($_POST['tb5_violenciacontramujer_no_'.$cont.''])) ? $tb5_violenciacontramujer_no = $_POST['tb5_violenciacontramujer_no_'.$cont.'']: $tb5_violenciacontramujer_no = '';
		(isset($_POST['tb5_violencia_mujer_valorado_'.$cont.''])) ? $tb5_violencia_mujer_valorado = $_POST['tb5_violencia_mujer_valorado_'.$cont.'']: $tb5_violencia_mujer_valorado = '';
		(isset($_POST['tb5_carnet_'.$cont.''])) ? $tb5_carnet = $_POST['tb5_carnet_'.$cont.'']: $tb5_carnet = '';
		(isset($_POST['tb5_td_tt1_10a18_'.$cont.''])) ? $tb5_td_tt1_10a18 = $_POST['tb5_td_tt1_10a18_'.$cont.'']: $tb5_td_tt1_10a18 = '';
		(isset($_POST['tb5_td_tt2_10a18_'.$cont.''])) ? $tb5_td_tt2_10a18 = $_POST['tb5_td_tt2_10a18_'.$cont.'']: $tb5_td_tt2_10a18 = '';
		(isset($_POST['tb5_td_tt3_10a18_'.$cont.''])) ? $tb5_td_tt3_10a18 = $_POST['tb5_td_tt3_10a18_'.$cont.'']: $tb5_td_tt3_10a18 = '';
		(isset($_POST['tb5_td_tt4_10a18_'.$cont.''])) ? $tb5_td_tt4_10a18 = $_POST['tb5_td_tt4_10a18_'.$cont.'']: $tb5_td_tt4_10a18 = '';
		(isset($_POST['tb5_td_tt5_10a18_'.$cont.''])) ? $tb5_td_tt5_10a18 = $_POST['tb5_td_tt5_10a18_'.$cont.'']: $tb5_td_tt5_10a18 = '';
		(isset($_POST['tb5_td_tt1_18a49_'.$cont.''])) ? $tb5_td_tt1_18a49 = $_POST['tb5_td_tt1_18a49_'.$cont.'']: $tb5_td_tt1_18a49 = '';
		(isset($_POST['tb5_td_tt2_18a49_'.$cont.''])) ? $tb5_td_tt2_18a49 = $_POST['tb5_td_tt2_18a49_'.$cont.'']: $tb5_td_tt2_18a49 = '';
		(isset($_POST['tb5_td_tt3_18a49_'.$cont.''])) ? $tb5_td_tt3_18a49 = $_POST['tb5_td_tt3_18a49_'.$cont.'']: $tb5_td_tt3_18a49 = '';
		(isset($_POST['tb5_td_tt4_18a49_'.$cont.''])) ? $tb5_td_tt4_18a49 = $_POST['tb5_td_tt4_18a49_'.$cont.'']: $tb5_td_tt4_18a49 = '';
		(isset($_POST['tb5_td_tt5_18a49_'.$cont.''])) ? $tb5_td_tt5_18a49 = $_POST['tb5_td_tt5_18a49_'.$cont.'']: $tb5_td_tt5_18a49 = '';


		(isset($_POST['tb5_fiebre_a_mujer_r1_'.$cont.''])) ? $tb5_fiebre_a_mujer_r1 = $_POST['tb5_fiebre_a_mujer_r1_'.$cont.'']: $tb5_fiebre_a_mujer_r1 = '';
		(isset($_POST['tb5_sr_'.$cont.''])) ? $tb5_sr = $_POST['tb5_sr_'.$cont.'']: $tb5_sr = '';
		(isset($_POST['tb5_examen_prostata_5años_'.$cont.''])) ? $tb5_examen_prostata_5años = $_POST['tb5_examen_prostata_5años_'.$cont.'']: $tb5_examen_prostata_5años = '';
		(isset($_POST['tb5_examen_prostat_fecha_d_'.$cont.''])) ? $tb5_examen_prostat_fecha_d = $_POST['tb5_examen_prostat_fecha_d_'.$cont.'']: $tb5_examen_prostat_fecha_d = '';
		(isset($_POST['tb5_examen_prostat_fecha_m_'.$cont.''])) ? $tb5_examen_prostat_fecha_m = $_POST['tb5_examen_prostat_fecha_m_'.$cont.'']: $tb5_examen_prostat_fecha_m = '';
		(isset($_POST['tb5_examen_prostat_fecha_a_'.$cont.''])) ? $tb5_examen_prostat_fecha_a = $_POST['tb5_examen_prostat_fecha_a_'.$cont.'']: $tb5_examen_prostat_fecha_a = '';
		(isset($_POST['tb5_fiebre_a_hombre_r1_'.$cont.''])) ? $tb5_fiebre_a_hombre_r1 = $_POST['tb5_fiebre_a_hombre_r1_'.$cont.'']: $tb5_fiebre_a_hombre_r1 = '';
		(isset($_POST['tb5_seda_dental_'.$cont.''])) ? $tb5_seda_dental = $_POST['tb5_seda_dental_'.$cont.'']: $tb5_seda_dental = '';
		(isset($_POST['tb5_problemas_visuales_'.$cont.''])) ? $tb5_problemas_visuales = $_POST['tb5_problemas_visuales_'.$cont.'']: $tb5_problemas_visuales = '';

		(isset($_POST['tb5_seda_dental_'.$cont.''])) ? $tb5_seda_dental = $_POST['tb5_seda_dental_'.$cont.'']: $tb5_seda_dental = '';
		(isset($_POST['tb5_numero_cepilladas_'.$cont.''])) ? $tb5_numero_cepilladas = $_POST['tb5_numero_cepilladas_'.$cont.'']: $tb5_numero_cepilladas = 0;

		$tb5_glicemia = $_POST['tb5_glicemia_'.$cont.''];
		$tb5_glicemia_estado = $_POST['tb5_glicemia_estado_'.$cont.''];
		$tb5_peso = $_POST['tb5_peso_'.$cont.''];
		$tb5_talla = $_POST['tb5_talla_'.$cont.''];
		$tb5_imc = $_POST['tb5_imc_'.$cont.''];
		(isset($_POST['tb5_estado_nutricional_'.$cont.''])) ? $tb5_estado_nutricional = $_POST['tb5_estado_nutricional_'.$cont.'']:$tb5_estado_nutricional = '';
		$tb5_pulso = $_POST['tb5_pulso_'.$cont.''];
		$tb5_valor_tension = $_POST['tb5_valor_tension_'.$cont.''];
		$tb5_estado_tension = $_POST['tb5_estado_tension_'.$cont.''];
		
		(isset($_POST['tb5_consume_medica_'.$cont.''])) ? $tb5_consume_medica = $_POST['tb5_consume_medica_'.$cont.'']: $tb5_consume_medica = '';
		(isset($_POST['tb5_consume_medica_txt_'.$cont.''])) ? $tb5_consume_medica_txt = $_POST['tb5_consume_medica_txt_'.$cont.'']: $tb5_consume_medica_txt = '';
		(isset($_POST['tb5_canalizado_'.$cont.''])) ? $tb5_canalizado = $_POST['tb5_canalizado_'.$cont.'']: $tb5_canalizado = '';
		$tb5_remitido = ($_POST['tb5_remitido_'.$cont.''] != '') ? $_POST['tb5_remitido_'.$cont.'']: '';
		(isset($_POST['tb5_otra_remision'])) ? $tb5_otra_remision = $_POST['tb5_otra_remision']: $tb5_otra_remision = '';
		(isset($_POST['tb5_valorado_'.$cont.''])) ? $tb5_valorado = $_POST['tb5_valorado_'.$cont.'']: $tb5_valorado = '';

		$tb5_observaciones = $_POST['tb5_observaciones_'.$cont.''];
		$id_integrante = $_POST['id_integrante_'.$cont.''];
		
		

		$sql = "INSERT into de_10_a_59 values(Null,'$tb5_edad','$tb5_metodo','$tb5_tiempo_metodo','$tb5_cuantos_controles','$tb5_motivo','$tb5_citologia','$tb5_citologia_d','$tb5_citologia_m','$tb5_citologia_a','$tb5_autoexamen_seno','$tb5_violenciacontramujer','$tb5_violencia_mujer_valorado','$tb5_carnet','$tb5_td_tt1_10a18','$tb5_td_tt2_10a18','$tb5_td_tt3_10a18','$tb5_td_tt4_10a18','$tb5_td_tt5_10a18','$tb5_td_tt1_18a49','$tb5_td_tt2_18a49','$tb5_td_tt3_18a49','$tb5_td_tt4_18a49','$tb5_td_tt5_18a49','$tb5_fiebre_a_mujer_r1','$tb5_sr','$tb5_examen_prostata_5años','$tb5_examen_prostat_fecha_d','$tb5_examen_prostat_fecha_m','$tb5_examen_prostat_fecha_a','$tb5_fiebre_a_hombre_r1','$tb5_seda_dental','$tb5_numero_cepilladas','$tb5_problemas_visuales','$tb5_glicemia','$tb5_glicemia_estado',$tb5_peso,$tb5_talla,$tb5_imc,'$tb5_estado_nutricional','$tb5_pulso','$tb5_valor_tension','$tb5_estado_tension','$tb5_consume_medica','$tb5_consume_medica_txt','$tb5_canalizado','$tb5_remitido','$tb5_otra_remision','$tb5_valorado','$tb5_observaciones','$id_integrante',$id_visita)";

		echo $sql;
		$query = $bd->query($sql); 
		if (!$query) echo $bd->error;
		$cont += 1; 
	}

	$tb5_otro_metodo = $_POST['tb5_otro_metodo'];
	$tb5_otro_motivo = $_POST['tb5_otro_motivo'];
	$sql = "INSERT into otros_tb_hom_muj values('$tb5_otro_metodo','$tb5_otro_motivo','$id_visita','$id_familia')";
	$query = $bd->query($sql); 
	if (!$query) echo $bd->error;

	header("location: /instituto/views/registrar/adultos_60_mas.php");

$bd->close();
 ?>
