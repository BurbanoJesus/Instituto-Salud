<?php 
	require $_SERVER['DOCUMENT_ROOT']."/instituto/application/database/conexion.php";
	// sleep(1);
	$bd = conectar();
	// $bd->set_charset('utf8');
	if (isset($_GET['opcion'])) {
		$opcion = $_GET['opcion'];
	}else{
		$opcion = $_POST['opcion'];
	}

	if ($_POST['casa_numero'] != '') {
		$casa_numero = $_POST['casa_numero'];
		$familia_numero = $_POST['familia_numero'];
		$id_familia = $casa_numero.'_'.$familia_numero;
		$query = $bd->query("SELECT * FROM familias WHERE casa_numero = '$casa_numero' AND familia_numero = '$familia_numero'");
		session_start();
		$_SESSION['id_familia'] = $id_familia;
		echo "string 145";
	}

	echo "<br>";
	echo $query->num_rows;

if ($opcion == 1) {
	if ($query->num_rows == 0){
		$insert = $bd->query("INSERT into familias values('$id_familia',$casa_numero,$familia_numero)");
		header("location: /instituto/views/registrar/identificacion.php");

	} 
	else{
		$query = $bd->query("SELECT MAX(id_visita), fecha_visita_d, fecha_visita_m, fecha_visita_a FROM visitas WHERE id_familia='$id_familia'");
		$row = $query->fetch_row();
		$id_max_visita = (int) $row[0];
		if ($id_max_visita == '') {
			$id_max_visita = 1;
			var_dump($id_max_visita);
		}
		$check = $bd->query("SELECT * FROM  observaciones WHERE id_visita='$id_max_visita' AND id_familia='$id_familia'");
		$_SESSION['id_visita'] = $id_max_visita;
		$_SESSION['v_actual_d'] = (int) $row[1];
		$_SESSION['v_actual_m'] = (int) $row[2];
		$_SESSION['v_actual_a'] = (int) $row[3];

		if ($id_max_visita == 1) {
			if ($check->num_rows == 0) {
				echo "<br>";
				echo $check->num_rows;
				header("location: /instituto/views/registrar/identificacion.php");
			}
			else{
				echo "<br>";
				echo $check->num_rows;
				$url = "/instituto/views/registrar/identificacion.php";
				header("location: /instituto/views/registrar_sig/identificacion.php");
				// echo "<script language='javascript'>window.location= '".$url."';</script>";
			}
		}
		if ($id_max_visita > 1) {
			$url = "/instituto/views/registrar/identificacion.php";
			header("location: /instituto/views/registrar_sig/identificacion.php");
		}
	} 

} 
else if ($opcion == 2){
	header("location: /instituto/views/consultar/listar_familias.php");
}
else if ($opcion == 3){
	header("location: /instituto/views/estadisticas/estadisticas.php");
}

$bd->close();
 ?>