<?php 
	require $_SERVER['DOCUMENT_ROOT']."/instituto/application/database/conexion.php";
	// sleep(1);
	session_start();
	$id_familia = $_SESSION['id_familia'];
	$visita_d = $_SESSION['v_actual_d'];
	$visita_m = $_SESSION['v_actual_m'];
	$visita_a = $_SESSION['v_actual_a'];
	$id_visita = $_SESSION['id_visita'];
	$flag = false;
	var_dump($id_familia);

	$bd = conectar();
	
	$arr_tablas = ['Antecedentes','Consumo de Sustancias','Transtornos Mentales','Violencia Intrafamiliar','Violencia sexual','Sintomatologia Asociada a Violencia Social y Politica'];
	$arr_elementos_1 = ['Elementos','Cigarrillo','Alcohol','Marihuana','Bazuco','Heroina','Cocaina','Otros'];
	$arr_elementos_2 = ['Elementos','Intento de Suicidio','Suicidio','Transtornos del afecto','Transtornos del pensamiento','Transtornos del desarrollo','Transtornos organicos','Sintomas de ansiedad','Tristeza generalizada','Stress','Otro Cual(es)?'];
	$arr_elementos_3 = ['Elementos','Maltrato Infantil','Violencia conyugal','Violencia Parental'];
	$arr_elementos_4 = ['Elementos','Acoso sexual','Abuso sexual','Maltrato sexual','Prostitucion / Pornografia'];
	$arr_elementos_5 = ['Elementos','Duelos no resueltos','Ansiedad generalizada','Ataques de panico','Transtornos del sueño','Transtornos de alimentacion','Transtornos psicosomaticos'];


	$cont = 1;
	while (isset($_POST['tb8_1_elemento_'.$cont.''])) {

		$tb8_1_elemento = $_POST['tb8_1_elemento_'.$cont.''];
		if ($tb8_1_elemento == 'si') {

			$tb8_1_edad_inicio = $_POST['tb8_1_edad_inicio_'.$cont.''];
			($_POST['tb8_1_frecuencia_consumo_'.$cont.''] !== '') ? $tb8_1_frecuencia_consumo = $_POST['tb8_1_frecuencia_consumo_'.$cont.'']: $tb8_1_frecuencia_consumo = 'Null';
			$tb8_1_observaciones = $_POST['tb8_1_observaciones_'.$cont.''];
			$tb8_1_quienes = $_POST['tb8_1_quienes_'.$cont.''];
			$arr_pers = explode(',', $tb8_1_quienes);
			$arr_edad = explode(',', $tb8_1_edad_inicio);
			$arr_frec = explode(',', $tb8_1_frecuencia_consumo);
			$arr_obse = explode(',', $tb8_1_observaciones);
			var_dump($arr_frec);
			foreach ($arr_pers as $key => $value) {
				echo $tb8_1_frecuencia_consumo.' Frecuencia ---';
				var_dump($tb8_1_frecuencia_consumo);
				$sql = "SELECT id_integrante FROM integrantes WHERE cod_integrante = '$value'  AND id_familia = '$id_familia'";
				$query = $bd->query($sql); 
				$id_integrante = $query->fetch_row();
				$id_integrante = $id_integrante[0];
				$arr_obse[$key] = (isset($arr_obse[$key])) ? $arr_obse[$key] : 'Null' ;
				$sql = "INSERT into antecedentes values(Null,'$arr_tablas[1]','$arr_elementos_1[$cont]',$arr_edad[$key],$arr_frec[$key],'$arr_obse[$key]','$id_integrante')";
				echo $sql;
				$query = $bd->query($sql); 
				if (!$query) echo $bd->error;
				$flag = true;
			}
		}
		$cont += 1; 
	}

	$cont = 1;
	while (isset($_POST['tb8_2_elemento_'.$cont.''])) {

		$tb8_2_elemento = $_POST['tb8_2_elemento_'.$cont.''];
		if ($tb8_2_elemento == 'si') {

			$tb8_2_edad_inicio = $_POST['tb8_2_edad_inicio_'.$cont.''];
			$tb8_2_observaciones = $_POST['tb8_2_observaciones_'.$cont.''];
			$tb8_2_quienes = $_POST['tb8_2_quienes_'.$cont.''];
			$arr_pers = explode(',', $tb8_2_quienes);
			$arr_edad = explode(',', $tb8_2_edad_inicio);
			$arr_obse = explode(',', $tb8_2_observaciones);
			var_dump($arr_frec);
			foreach ($arr_pers as $key => $value) {
				
				$sql = "SELECT id_integrante FROM integrantes WHERE cod_integrante = '$value'  AND id_familia = '$id_familia'";
				$query = $bd->query($sql); 
				$id_integrante = $query->fetch_row();
				$id_integrante = $id_integrante[0];
				$arr_obse[$key] = (isset($arr_obse[$key])) ? $arr_obse[$key] : 'Null' ;
				$sql = "INSERT into antecedentes values(Null,'$arr_tablas[2]','$arr_elementos_2[$cont]',$arr_edad[$key],Null,'$arr_obse[$key]','$id_integrante')";
				echo $sql;
				$query = $bd->query($sql); 
				if (!$query) echo $bd->error;
				$flag = true;
			}
		}
		$cont += 1; 
	}

	$cont = 1;
	while (isset($_POST['tb8_3_elemento_'.$cont.''])) {

		$tb8_3_elemento = $_POST['tb8_3_elemento_'.$cont.''];
		if ($tb8_3_elemento == 'si') {

			$tb8_3_edad_inicio = $_POST['tb8_3_edad_inicio_'.$cont.''];
			($_POST['tb8_3_frecuencia_consumo_'.$cont.''] !== '') ? $tb8_3_frecuencia_consumo = $_POST['tb8_3_frecuencia_consumo_'.$cont.'']: $tb8_3_frecuencia_consumo = 'Null';
			$tb8_3_observaciones = $_POST['tb8_3_observaciones_'.$cont.''];
			$tb8_3_quienes = $_POST['tb8_3_quienes_'.$cont.''];
			$arr_pers = explode(',', $tb8_3_quienes);
			$arr_edad = explode(',', $tb8_3_edad_inicio);
			$arr_frec = explode(',', $tb8_3_frecuencia_consumo);
			$arr_obse = explode(',', $tb8_3_observaciones);
			var_dump($arr_frec);
			foreach ($arr_pers as $key => $value) {
				echo $tb8_3_frecuencia_consumo.' Frecuencia ---';
				var_dump($tb8_3_frecuencia_consumo);
				$sql = "SELECT id_integrante FROM integrantes WHERE cod_integrante = '$value'  AND id_familia = '$id_familia'";
				$query = $bd->query($sql); 
				$id_integrante = $query->fetch_row();
				$id_integrante = $id_integrante[0];
				$arr_obse[$key] = (isset($arr_obse[$key])) ? $arr_obse[$key] : 'Null' ;
				$sql = "INSERT into antecedentes values(Null,'$arr_tablas[3]','$arr_elementos_3[$cont]',$arr_edad[$key],$arr_frec[$key],'$arr_obse[$key]','$id_integrante')";
				echo $sql;
				$query = $bd->query($sql); 
				if (!$query) echo $bd->error;
				$flag = true;
			}
		}
		$cont += 1; 
	}

	$cont = 1;
	while (isset($_POST['tb8_4_elemento_'.$cont.''])) {

		$tb8_4_elemento = $_POST['tb8_4_elemento_'.$cont.''];
		if ($tb8_4_elemento == 'si') {

			$tb8_4_edad_inicio = $_POST['tb8_4_edad_inicio_'.$cont.''];
			($_POST['tb8_4_frecuencia_consumo_'.$cont.''] !== '') ? $tb8_4_frecuencia_consumo = $_POST['tb8_4_frecuencia_consumo_'.$cont.'']: $tb8_4_frecuencia_consumo = 'Null';
			$tb8_4_observaciones = $_POST['tb8_4_observaciones_'.$cont.''];
			$tb8_4_quienes = $_POST['tb8_4_quienes_'.$cont.''];
			$arr_pers = explode(',', $tb8_4_quienes);
			$arr_edad = explode(',', $tb8_4_edad_inicio);
			$arr_frec = explode(',', $tb8_4_frecuencia_consumo);
			$arr_obse = explode(',', $tb8_4_observaciones);
			var_dump($arr_frec);
			foreach ($arr_pers as $key => $value) {
				echo $tb8_4_frecuencia_consumo.' Frecuencia ---';
				var_dump($tb8_4_frecuencia_consumo);
				$sql = "SELECT id_integrante FROM integrantes WHERE cod_integrante = '$value'  AND id_familia = '$id_familia'";
				$query = $bd->query($sql); 
				$id_integrante = $query->fetch_row();
				$id_integrante = $id_integrante[0];
				$arr_obse[$key] = (isset($arr_obse[$key])) ? $arr_obse[$key] : 'Null' ;
				$sql = "INSERT into antecedentes values(Null,'$arr_tablas[4]','$arr_elementos_4[$cont]',$arr_edad[$key],$arr_frec[$key],'$arr_obse[$key]','$id_integrante')";
				echo $sql;
				$query = $bd->query($sql); 
				if (!$query) echo $bd->error;
				$flag = true;
			}
		}
		$cont += 1; 
	}

	$cont = 1;
	while (isset($_POST['tb8_5_elemento_'.$cont.''])) {

		$tb8_5_elemento = $_POST['tb8_5_elemento_'.$cont.''];
		if ($tb8_5_elemento == 'si') {

			$tb8_5_edad_inicio = $_POST['tb8_5_edad_inicio_'.$cont.''];
			$tb8_5_observaciones = $_POST['tb8_5_observaciones_'.$cont.''];
			$tb8_5_quienes = $_POST['tb8_5_quienes_'.$cont.''];
			$arr_pers = explode(',', $tb8_5_quienes);
			$arr_edad = explode(',', $tb8_5_edad_inicio);
			$arr_obse = explode(',', $tb8_5_observaciones);
			var_dump($arr_edad);
			echo "<br>";
			echo "<br>";
			echo "<br>";
			foreach ($arr_pers as $key => $value) {
				
				$sql = "SELECT id_integrante FROM integrantes WHERE cod_integrante = '$value' AND id_familia = '$id_familia'";
				$query = $bd->query($sql); 
				$id_integrante = $query->fetch_row();
				$id_integrante = $id_integrante[0];
				// $arr_edad[$key] = (isset($arr_edad[$key])) ? $arr_edad[$key] : 'Null' ;
				$arr_obse[$key] = (isset($arr_obse[$key])) ? $arr_obse[$key] : 'Null' ;
				$sql = "INSERT into antecedentes values(Null,'$arr_tablas[5]','$arr_elementos_5[$cont]',$arr_edad[$key],Null,'$arr_obse[$key]','$id_integrante')";
				echo $sql;
				$query = $bd->query($sql); 
				if (!$query) echo $bd->error;
				$flag = true;
			}
		}
		$cont += 1; 
	}
	if ($flag == false) {
		$sql = "SELECT id_integrante FROM integrantes WHERE cod_integrante = '1' AND id_familia = '$id_familia'";
		$query = $bd->query($sql); 
		$id_integrante = $query->fetch_row();
		$id_integrante = $id_integrante[0];
		$sql = "INSERT into antecedentes values(Null,'indefinido','indefinido',Null,Null,Null,'$id_integrante')";
		$query = $bd->query($sql); 
		if (!$query) echo $bd->error;
	}
	
	header("location: /instituto/views/registrar/estadisticas.php");

$bd->close();
 ?>
