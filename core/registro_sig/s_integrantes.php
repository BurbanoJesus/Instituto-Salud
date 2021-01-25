<?php 
	require $_SERVER['DOCUMENT_ROOT']."/instituto/application/database/conexion.php";
	// sleep(1);
	session_start();
	$id_familia = $_SESSION['id_familia'];
	$bd = conectar();



	$cont = 1;
	while (isset($_POST['tb1_nombres_'.$cont.''])) {

		$tb1_nombres = $_POST['tb1_nombres_'.$cont.''];
		$tb1_dia = $_POST['tb1_dia_'.$cont.''];
		$tb1_mes = $_POST['tb1_mes_'.$cont.''];
		$tb1_año = $_POST['tb1_año_'.$cont.''];
		$tb1_edad_a = $_POST['tb1_edad_a_'.$cont.''];
		$tb1_edad_m = $_POST['tb1_edad_m_'.$cont.''];
		$tb1_edad_d = $_POST['tb1_edad_d_'.$cont.''];
		$tb1_sexo = $_POST['tb1_sexo_'.$cont.''];
		$tb1_parentesco = $_POST['tb1_parentesco_'.$cont.''];
		$tb1_tipo_identi = strtoupper($_POST['tb1_tipo_identi_'.$cont.'']);
		$tb1_numero_identi = $_POST['tb1_numero_identi_'.$cont.''];
		$tb1_escolaridad = $_POST['tb1_escolaridad_'.$cont.''];
		$tb1_ocupacion = $_POST['tb1_ocupacion_'.$cont.''];
		$tb1_tipo_vincula = $_POST['tb1_tipo_vincula_'.$cont.''];
		$tb1_eps = $_POST['tb1_eps_'.$cont.''];
		$tb1_grupo_etnico = $_POST['tb1_grupo_etnico_'.$cont.''];
		(isset($_POST['tb1_desplazado_'.$cont.''])) ? $tb1_desplazado = $_POST['tb1_desplazado_'.$cont.''] : $tb1_desplazado  = 'no';
		(isset($_POST['tb1_discapacidad_'.$cont.''])) ? $tb1_discapacidad = $_POST['tb1_discapacidad_'.$cont.''] : $tb1_discapacidad  = 'no';
		$tb1_cual = $_POST['tb1_cual_'.$cont.''];

		$id_integrante = $tb1_tipo_identi.'_'.$tb1_numero_identi;

		$query = $bd->query("SELECT id_integrante FROM integrantes WHERE id_integrante = '$id_integrante'"); 
		if ($query->num_rows > 0) {
			$sql = "UPDATE IGNORE integrantes SET nombres = '$tb1_nombres', fecha_nac_dia =  $tb1_dia, fecha_nac_mes = $tb1_mes, fecha_nac_ano = $tb1_año, edad_actual_d = $tb1_edad_d, edad_actual_m = $tb1_edad_m, edad_actual_a = $tb1_edad_a, sexo = '$tb1_sexo', parentesco_familiar = $tb1_parentesco, tipo_doc_identificacion = '$tb1_tipo_identi', numero_doc_identificacion = '$tb1_numero_identi', escolaridad = $tb1_escolaridad, ocupacion = $tb1_ocupacion, tipo_vinculacion_sgsss = $tb1_tipo_vincula, nombre_eps = '$tb1_eps', grupo_etnico = '$tb1_grupo_etnico', desplazado = '$tb1_desplazado', discapacidad = '$tb1_discapacidad', cual_discapacidad = '$tb1_cual', id_familia = '$id_familia' WHERE id_integrante = '$id_integrante'";

		} else {
			$sql = "INSERT INTO integrantes VALUES('$id_integrante',$cont,'$tb1_nombres',$tb1_dia,$tb1_mes,$tb1_año,$tb1_edad_a,$tb1_edad_m,$tb1_edad_d,' $tb1_edad_d',' $tb1_edad_m',' $tb1_edad_a','$tb1_sexo',$tb1_parentesco,'$tb1_tipo_identi','$tb1_numero_identi',$tb1_escolaridad,$tb1_ocupacion,$tb1_tipo_vincula,'$tb1_eps','$tb1_grupo_etnico','$tb1_desplazado','$tb1_discapacidad','$tb1_cual','$id_familia')";
		}
		
		$query = $bd->query($sql); 
		if (!$query) echo $bd->error;

		$cont += 1; 
	}

	(isset($_POST['tb1_otra_ocupacion'])) ? $tb1_otra_ocupacion = $_POST['tb1_otra_ocupacion'] : $tb1_otra_ocupacion = '';
	(isset($_POST['tb1_otro_g_a'])) ? $tb1_otro_g_a = $_POST['tb1_otro_g_a'] : $tb1_otro_g_a = '';
	(isset($_POST['tb1_otro_g_b'])) ? $tb1_otro_g_b = $_POST['tb1_otro_g_b'] : $tb1_otro_g_b = '';
	(isset($_POST['tb1_otro_g_c'])) ? $tb1_otro_g_c = $_POST['tb1_otro_g_c'] : $tb1_otro_g_c = '';
	(isset($_POST['tb1_otro_g_d'])) ? $tb1_otro_g_d = $_POST['tb1_otro_g_d'] : $tb1_otro_g_d = '';
	(isset($_POST['tb1_otro_g_e'])) ? $tb1_otro_g_e = $_POST['tb1_otro_g_e'] : $tb1_otro_g_e = '';
	(isset($_POST['tb1_otro_g_f'])) ? $tb1_otro_g_f = $_POST['tb1_otro_g_f'] : $tb1_otro_g_f = '';
	(isset($_POST['tb1_otro_grupo_etn'])) ? $tb1_otro_grupo_etn = $_POST['tb1_otro_grupo_etn'] : $tb1_otro_grupo_etn = '';
	(isset($_POST['tb1_otra_discap'])) ? $tb1_otra_discap = $_POST['tb1_otra_discap'] : $tb1_otra_discap = '';
	(isset($_POST['tb1_telefono_jefe'])) ? $telefono_jefe = $_POST['tb1_telefono_jefe'] : $telefono_jefe = '';


	$sql = "UPDATE otros_tb_integrantes SET tb1_otra_ocupacion = '$tb1_otra_ocupacion', tb1_otro_g_a = '$tb1_otro_g_a', tb1_otro_g_b = '$tb1_otro_g_b', tb1_otro_g_c = '$tb1_otro_g_c', tb1_otro_g_d = '$tb1_otro_g_d', tb1_otro_g_e = '$tb1_otro_g_e', tb1_otro_g_f = '$tb1_otro_g_f', tb1_otro_grupo_etn = '$tb1_otro_grupo_etn', tb1_otra_discap = '$tb1_otra_discap', telefono_jefe = '$telefono_jefe' WHERE  id_familia = '$id_familia'";
	$query = $bd->query($sql); 
	// $query = $bd->query("ALTER TABLE integrantes AUTO_INCREMENT = 1"); 
	echo $sql;
	if (!$query) echo $bd->error;

	

	$query = $bd->query("SELECT MAX(id_visita), fecha_visita_d, fecha_visita_m, fecha_visita_a FROM visitas WHERE id_familia='$id_familia'");
	$row = $query->fetch_row();
	$id_max_visita = (int) $row[0];
	
	$check = $bd->query("SELECT * FROM  observaciones WHERE id_visita='$id_max_visita' AND id_familia='$id_familia'");
	
	if ($check->num_rows > 0) {
		$tb1_v_actual_d = $_POST['tb1_v_actual_d'];
		$tb1_v_actual_m = $_POST['tb1_v_actual_m'];
		$tb1_v_actual_a = $_POST['tb1_v_actual_a'];
		$sql = "SELECT MAX(id_visita) FROM visitas WHERE id_familia = '$id_familia'";
		$query = $bd->query($sql); 
		if ($bd->query($sql) !== False) {
			$id_visita = $query->fetch_row();
			$id_visita = (int) $id_visita[0] + 1;
		} else {
			$id_visita = 1;	
		}

		
		$sql = "INSERT into visitas values($id_visita,'$id_familia',$tb1_v_actual_d,$tb1_v_actual_m,$tb1_v_actual_a)";
		$query = $bd->query($sql); 
		if (!$query) echo $bd->error;


		$tb1_v_proxima_d = ($_POST['tb1_v_proxima_d'] != '') ? $_POST['tb1_v_proxima_d'] : 0;
		$tb1_v_proxima_m = $_POST['tb1_v_proxima_m'];
		$tb1_v_proxima_a = ($_POST['tb1_v_proxima_a'] != '') ? $_POST['tb1_v_proxima_a'] : 0;
		$sql = "SELECT MAX(id_visita_prox) FROM visitas_proximas WHERE id_familia = '$id_familia'";
		$query = $bd->query($sql);
		if ($query !== False) {
			$id_visita = $query->fetch_row();
			$id_visita = (int) $id_visita[0] + 1;

		} else {
			$id_visita = 1;	
		}
		
		
		$sql = "INSERT into visitas_proximas values($id_visita,'$id_familia',$tb1_v_proxima_d,$tb1_v_proxima_m,$tb1_v_proxima_a)";
		$query = $bd->query($sql); 
		if (!$query) echo $bd->error;
		echo $sql;

		$_SESSION['id_visita'] = $id_visita;
		$_SESSION['v_actual_d'] = $tb1_v_actual_d;
		$_SESSION['v_actual_m'] = $tb1_v_actual_m;
		$_SESSION['v_actual_a'] = $tb1_v_actual_a;

	}
	else{
		$_SESSION['id_visita'] = $id_max_visita;
		$_SESSION['v_actual_d'] = (int) $row[1];
		$_SESSION['v_actual_m'] = (int) $row[2];
		$_SESSION['v_actual_a'] = (int) $row[3];
	}

	
	header("location: /instituto/views/registrar_sig/menores_a_1.php");

$bd->close();
 ?>
 <script></script>