<?php 
	require $_SERVER['DOCUMENT_ROOT']."/instituto/application/database/conexion.php";
	// sleep(1);
	$bd = conectar();
	$bd->set_charset('utf8');
	// if ($_POST['vereda'] !== '') {
	//	$vereda = $_POST['vereda'];
	//	$query = $bd->query("SELECT * FROM veredas JOIN corregimientos USING(id_corregi) WHERE id_vereda = $vereda");
	//	$res = $query->fetch_object();
	//	echo json_encode($res);
	// } else if ($_POST['barrio'] !== ''){
	//	$barrio = $_POST['barrio'];
	//	$query = $bd->query("SELECT * FROM veredas JOIN corregimientos USING(id_corregi) WHERE id_vereda = $barrio");
	//	$res = $query->fetch_object();
	//	echo json_encode($res);
	// }

	if (isset($_POST['vereda'])) {
		$vereda = $_POST['vereda'];
		$query = $bd->query("SELECT * FROM veredas JOIN corregimientos USING(id_corregi) WHERE id_vereda = $vereda");
		$res = $query->fetch_object();
		echo json_encode($res);
	} else if (isset($_POST['barrio'])){
		$barrio = $_POST['barrio'];
		$query = $bd->query("SELECT * FROM veredas JOIN corregimientos USING(id_corregi) WHERE id_vereda = $barrio");
		$res = $query->fetch_object();
		echo json_encode($res);
	}
	
	// $query = $bd->query("SELECT * FROM veredas JOIN corregimientos USING(id_corregi) WHERE id_vereda = 2");
	//	$res = $query->fetch_object();
	//	echo json_encode($res);
?>