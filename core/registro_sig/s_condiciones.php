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

	$tb10_1_piso = (isset($_POST['tb10_1_piso'])) ? $_POST['tb10_1_piso']: '';
	$tb10_1_paredes = (isset($_POST['tb10_1_paredes'])) ? $_POST['tb10_1_paredes']: '';
	$tb10_1_techo = (isset($_POST['tb10_1_techo'])) ? $_POST['tb10_1_techo']: '';
	$tb10_1_2_num_habitaciones = (isset($_POST['tb10_1_2_num_habitaciones'])) ? $_POST['tb10_1_2_num_habitaciones']: '';
	$tb10_1_2_ventilacion_adecuada = (isset($_POST['tb10_1_2_ventilacion_adecuada'])) ? $_POST['tb10_1_2_ventilacion_adecuada']: '';
	$tb10_1_2_cocina_con = (isset($_POST['tb10_1_2_cocina_con'])) ? $_POST['tb10_1_2_cocina_con']: '';
	$tb10_1_2_ubicacion_cocina = (isset($_POST['tb10_1_2_ubicacion_cocina'])) ? $_POST['tb10_1_2_ubicacion_cocina']: '';


	$sql = "INSERT into caracteristicas values(Null,'$tb10_1_piso','$tb10_1_paredes','$tb10_1_techo','$tb10_1_2_num_habitaciones','$tb10_1_2_ventilacion_adecuada','$tb10_1_2_cocina_con','$tb10_1_2_ubicacion_cocina',$id_visita,'$id_familia')";
	echo $sql;
	$query = $bd->query($sql); 
	if (!$query) echo $bd->error;

	$tb10_2_sin_tratamiento = (isset($_POST['tb10_2_sin_tratamiento'])) ? $_POST['tb10_2_sin_tratamiento']: '';
	$tb10_2_con_filtrada = (isset($_POST['tb10_2_con_filtrada'])) ? $_POST['tb10_2_con_filtrada']: '';
	$tb10_2_con_hervida = (isset($_POST['tb10_2_con_hervida'])) ? $_POST['tb10_2_con_hervida']: '';
	$tb10_2_con_clorada = (isset($_POST['tb10_2_con_clorada'])) ? $_POST['tb10_2_con_clorada']: '';
	$tb10_2_con_otro = (isset($_POST['tb10_2_con_otro'])) ? $_POST['tb10_2_con_otro']: '';


	$sql = "INSERT into tratamiento_agua values(Null,'$tb10_2_sin_tratamiento','$tb10_2_con_filtrada','$tb10_2_con_hervida','$tb10_2_con_clorada','$tb10_2_con_otro',$id_visita,'$id_familia')";
	echo $sql;
	$query = $bd->query($sql); 
	if (!$query) echo $bd->error;

	$arr_animals = ['Tipo Animales','Cerdos','Perros','Gatos','Aves','Caballos','Otros'];
	// var_dump($arr_animals);

	$cont = 1;
	while (isset($_POST['tb10_3_animal_numero_vacunado_'.$cont.''])) {

	$tb10_3_animal_no = (isset($_POST['tb10_3_animal_no_'.$cont.''])) ? $_POST['tb10_3_animal_no_'.$cont.'']: 'si';
	$tb10_3_animal_vacunado_si = (isset($_POST['tb10_3_animal_vacunado_si_'.$cont.''])) ? $_POST['tb10_3_animal_vacunado_si_'.$cont.'']: '';
	var_dump((int) $_POST['tb10_3_animal_numero_vacunado_'.$cont.'']);
	$tb10_3_animal_numero_vacunado = ($_POST['tb10_3_animal_numero_vacunado_'.$cont.''] != Null) ? $_POST['tb10_3_animal_numero_vacunado_'.$cont.'']: 0;
	$tb10_3_animal_vacunado_no = (isset($_POST['tb10_3_animal_vacunado_no_'.$cont.''])) ? $_POST['tb10_3_animal_vacunado_no_'.$cont.'']: '';
	$tb10_3_animal_numero_vacunado_no = ($_POST['tb10_3_animal_numero_vacunado_no_'.$cont.''] != Null) ? $_POST['tb10_3_animal_numero_vacunado_no_'.$cont.'']: 0;


	$sql = "INSERT into Animales values(Null,'$arr_animals[$cont]','$tb10_3_animal_no','$tb10_3_animal_numero_vacunado','$tb10_3_animal_numero_vacunado_no',$id_visita,'$id_familia')";
	echo $sql;
	$query = $bd->query($sql); 
	if (!$query) echo $bd->error;
	$cont++;
	}

	// ---------------------------------------------------------
	// ---------------------------------------------------------
	// ---------------------------------------------------------
	$arr_tablas = ['Tablas','Presencia de Vectores','Alumbrado de la Vivienda','Abastecimiento de Agua','Manejo de la Basura','Deposicion final de la basura'];
	$arr_elementos_1= ['Elementos','Moscas','Zancudos','Pitos','Ratas','Otros'];
	$arr_elementos_2= ['Elementos','Vela','Lampara Petroleo','Energia Solar','Energia_electrica','Interconexion','Planta','Otro 5'];
	$arr_elementos_3= ['Elementos','Acueducto','Agua Lluvia','Rio quebrada 6','Pozo','Chorro','Aljibe','Comprada','Otro 6'];
	$arr_elementos_4= ['Elementos','Caneca con Tapa','Caneca sin Tapa','Balde y/o Tarro','Carton','Bolsa Plastica','Caja Madera 7_1','Otro 7_1','Botadero Publico','Rio Quebrada 7','Solar','Caja Madera 7_2','Usada Abono','Otro 7_2'];
	$arr_elementos_5= ['Elementos','Alcantarillado','Taza Sanitaria / Pozo Septico','Letrina','Quebrada','Campo Abierto'];

	
	$cont = 1;
	$cont_p = 4;
	$cont_t = 1;
	$flag = false;
	$post = $_POST['tb10_4_elemento_1'];
	var_dump($post);
	while (isset($_POST['tb10_'.$cont_p.'_elemento_1'])) {
		while (isset($_POST['tb10_'.$cont_p.'_elemento_'.$cont.''])) {
			if ($_POST['tb10_'.$cont_p.'_elemento_'.$cont.''] == 'si') {
				$tb10_4_elemento = $_POST['tb10_'.$cont_p.'_elemento_'.$cont.''];

				// $values = ${'arr_elementos_'.$cont};
				// var_dump($values);
				switch ($cont_p) {
					case '4':
						$arr_elemento = $arr_elementos_1;
						break;
					case '5':
						$arr_elemento = $arr_elementos_2;
						break;
					case '6':
						$arr_elemento = $arr_elementos_3;
						break;
					case '7':
						$arr_elemento = $arr_elementos_4;
						break;
					case '8':
						$arr_elemento = $arr_elementos_5;
						break;

					default:
						break;
				}
				$sql = "INSERT into condiciones values(Null,'$arr_tablas[$cont_t]','$arr_elemento[$cont]',$id_visita,'$id_familia')";
				echo $sql;
				$query = $bd->query($sql); 
				if (!$query) echo $bd->error;
				$flag = true;
			}
			$cont++;
			echo '<br>Hijo: '.$cont;

		}
		$cont = 1;
		$cont_p++;
		$cont_t++;
		echo '<br>Padre: '.$cont_p;
	}

	if ($flag == false) {
		$sql = "INSERT into condiciones values(Null,'indefinido','indefinido',$id_visita,'$id_familia')";
		echo $sql;
		$query = $bd->query($sql); 
		if (!$query) echo $bd->error;
	}

	header("location: /instituto/views/registrar_sig/observaciones.php");

$bd->close();
 ?>
