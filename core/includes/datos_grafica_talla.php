<?php 
	require $_SERVER['DOCUMENT_ROOT']."/instituto/application/database/conexion.php";
	// sleep(1);
	$bd = conectar();
	session_start();

	$id_visita = $_POST['id_visita'];
	if ($_POST['id_integrante'] !== '') {
		$id_integrante = $_POST['id_integrante'];
		$sql = "SELECT id_familia FROM integrantes WHERE id_integrante = '$id_integrante'";
		$query = $bd->query($sql);
		$id_familia = $query->fetch_row()[0];

		$sql = "SELECT menores_a_1.edad_meses_vis,talla,id_visita FROM menores_a_1 JOIN integrantes USING(id_integrante) WHERE id_familia = '$id_familia' AND id_visita <= '$id_visita' AND integrantes.id_integrante = '$id_integrante' ORDER BY id_visita";
		$query = $bd->query($sql);
		// echo $sql;
		// echo '<br>';
		// echo '<br>';
		$arr = [];
		while($row = $query->fetch_object()){

			$x = $row->edad_meses_vis;
			$y = $row->talla;
			$x = ($x > 60 ) ? 60: $x;
			$y = ($y > 125) ? 125: $y;
			$y = ($y < 40) ? 40: $y;
			$obj = new stdClass();
			$obj->x = $x;
			$obj->y = $y;
			array_push($arr, $obj);
		}
	echo json_encode($arr);
	} else{
		// $barrio = $_POST['barrio'];
		// $query = $bd->query("SELECT * FROM veredas JOIN corregimientos USING(id_corregi) WHERE id_vereda = $barrio");
		// $res = $query->fetch_object();
		// echo json_encode($res);
	}

	

?>