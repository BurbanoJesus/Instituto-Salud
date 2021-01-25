<?php 
	require $_SERVER['DOCUMENT_ROOT']."/instituto/application/database/conexion.php";
	// sleep(1);
	session_start();
	$id_familia = $_SESSION['id_familia'];
	$visita_d = $_SESSION['v_actual_d'];
	$visita_m = $_SESSION['v_actual_m'];
	$visita_a = $_SESSION['v_actual_a'];
	$id_visita = $_SESSION['id_visita'];
	// $id_integrante = '2_435';

	$bd = conectar();
	$error = False;

	$sql = "DELETE FROM estadis_nacidos WHERE id_familia = '$id_familia'";
	$query = $bd->query($sql);
	if (!$query) echo $bd->error; 

	$sql = "DELETE FROM estadis_mortalidad WHERE id_familia = '$id_familia'";
	$query = $bd->query($sql);
	if (!$query) echo $bd->error;

	$sql = "DELETE FROM estadis_morbilidad WHERE id_familia = '$id_familia'";
	echo $sql;
	$query = $bd->query($sql);
	if (!$query) echo $bd->error; 

	$cont = 1;
	while (isset($_POST['tb9_1_nombres_'.$cont.'']) && $_POST['tb9_1_nombres_'.$cont.''] != '') {
		// var_dump(isset($_POST['tb9_1_nombres_'.$cont.'']));

		$tb9_1_nombres = $_POST['tb9_1_nombres_'.$cont.''];
		(isset($_POST['tb9_1_sexo_'.$cont.''])) ? $tb9_1_sexo = $_POST['tb9_1_sexo_'.$cont.'']: $tb9_1_sexo = '';
		$tb9_1_edad = $_POST['tb9_1_edad_'.$cont.''];
		(isset($_POST['tb9_1_registrado_'.$cont.''])) ? $tb9_1_registrado = $_POST['tb9_1_registrado_'.$cont.'']: $tb9_1_registrado = '';
		$tb9_1_parto_atendido_por = $_POST['tb9_1_parto_atendido_por_'.$cont.''];
		$tb9_1_otra_persona = $_POST['tb9_1_otra_persona'];
		$tb9_1_dia = $_POST['tb9_1_dia_'.$cont.''];
		$tb9_1_mes = $_POST['tb9_1_mes_'.$cont.''];
		$tb9_1_año = $_POST['tb9_1_año_'.$cont.''];
		$sql = "INSERT into estadis_nacidos values(Null,'$tb9_1_nombres','$tb9_1_sexo','$tb9_1_edad','$tb9_1_registrado','$tb9_1_parto_atendido_por','$tb9_1_otra_persona','$tb9_1_dia','$tb9_1_mes','$tb9_1_año','$id_familia')";
		echo $sql;
		$query = $bd->query($sql); 
		if (!$query){ 
			echo $bd->error;
			$error = True;
		}
		$cont++;
	}
	

	$cont = 1;
	while (isset($_POST['tb9_2_nombres_'.$cont.'']) && $_POST['tb9_2_nombres_'.$cont.''] != '') {
		// var_dump(isset($_POST['tb9_2_nombres_'.$cont.'']));

		$tb9_2_nombres = $_POST['tb9_2_nombres_'.$cont.''];
		(isset($_POST['tb9_2_sexo_'.$cont.''])) ? $tb9_2_sexo = $_POST['tb9_2_sexo_'.$cont.'']: $tb9_2_sexo = '';
		$tb9_2_edad = $_POST['tb9_2_edad_'.$cont.''];
		$tb9_2_causa = $_POST['tb9_2_causa_'.$cont.''];
		(isset($_POST['tb9_2_codigo_cie_'.$cont.''])) ? $tb9_2_codigo_cie = $_POST['tb9_2_codigo_cie_'.$cont.'']: $tb9_2_codigo_cie = '';
		$tb9_2_dia = $_POST['tb9_2_dia_'.$cont.''];
		$tb9_2_mes = $_POST['tb9_2_mes_'.$cont.''];
		$tb9_2_año = $_POST['tb9_2_año_'.$cont.''];
		$sql = "INSERT into estadis_mortalidad values(Null,'$tb9_2_nombres','$tb9_2_sexo','$tb9_2_edad','$tb9_2_causa','$tb9_2_codigo_cie','$tb9_2_dia','$tb9_2_mes','$tb9_2_año','$id_familia')";
		echo $sql;
		$query = $bd->query($sql); 
		if (!$query){ echo $bd->error;$error = True;}
		$cont++;
	}

	$cont = 1;
	while (isset($_POST['tb9_3_nombres_'.$cont.'']) && $_POST['tb9_3_nombres_'.$cont.''] != '') {
		// var_dump(isset($_POST['tb9_3_nombres_'.$cont.'']));

		$tb9_3_nombres = $_POST['tb9_3_nombres_'.$cont.''];
		(isset($_POST['tb9_3_sexo_'.$cont.''])) ? $tb9_3_sexo = $_POST['tb9_3_sexo_'.$cont.'']: $tb9_3_sexo = '';
		$tb9_3_edad = $_POST['tb9_3_edad_'.$cont.''];
		$tb9_3_causa = $_POST['tb9_3_causa_'.$cont.''];
		$tb9_3_codigo_cie = $_POST['tb9_3_codigo_cie_'.$cont.''];

		$sql = "INSERT into estadis_morbilidad values(Null,'$tb9_3_nombres','$tb9_3_sexo','$tb9_3_edad','$tb9_3_causa','$tb9_3_codigo_cie','$id_familia')";
		echo $sql;
		$query = $bd->query($sql); 
		if (!$query){ echo $bd->error;$error = True;}
		$cont++;
	}
	echo "<br>";
	var_dump($error);
	if ($error == True) {
		header("location: /instituto/views/registrar_sig/estadisticas.php");
	} else {
		header("location: /instituto/views/registrar_sig/condiciones_sanitarias.php");
	}
	

$bd->close();
 ?>
