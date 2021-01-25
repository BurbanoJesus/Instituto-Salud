<?php 
	require $_SERVER['DOCUMENT_ROOT']."/instituto/application/database/conexion.php";
	// sleep(1);
	session_start();
	$bd = conectar();
	

	if($_POST['lat_lng'] != ''){
		$lat_lng = $_POST['lat_lng'];
		$lat_lng = explode(',',$lat_lng);
		$latitud = $lat_lng[0];
		$longitud = $lat_lng[1];
		var_dump($latitud);
	}
	else{
		$latitud = '';
		$longitud = '';
	}

	$numero_vivienda = $_POST['numero_vivienda'];
	$numero_familiasxvivienda = $_POST['numero_familiasxvivienda'];
	$sisben = $_POST['sisben'];
	$departamento = $_POST['departamento'];
	$municipio = $_POST['municipio'];
	$resguardo = $_POST['resguardo'];
	$comunidad = $_POST['comunidad'];
	$vereda = $_POST['vereda'];
	$barrio = $_POST['barrio'];
	$ubi_map = $_POST['ubi_map'];
	$zona_inundable = $_POST['zona_inundable'];
	$margen_rios = $_POST['margen_rios'];
	$zona_ladera = $_POST['zona_ladera'];
	$falda_montaña = $_POST['falda_montaña'];
	$relleno = $_POST['relleno']; 
	$otro_riesgo = $_POST['otro_riesgo'];
	$otro_riesgo_txt = $_POST['otro_riesgo_txt'];

	$id_familia = $_SESSION['id_familia'];


	$sql = "INSERT into identificacion_ubicacion values($numero_vivienda,$numero_familiasxvivienda,'$sisben','$departamento','$municipio','$resguardo','$comunidad','$vereda','$barrio','$latitud','$longitud','$ubi_map','$id_familia')";
	$query = $bd->query($sql); 
	echo $sql;
	if (!$query) echo $bd->error;


	$sql = "INSERT into riesgos_ubicacion values('$zona_inundable','$margen_rios','$zona_ladera','$falda_montaña','$relleno','$otro_riesgo','$otro_riesgo_txt','$id_familia')";
	$query = $bd->query($sql); 
	echo $sql;
	if (!$query) echo $bd->error;


	header("location: /instituto/views/registrar/integrantes.php");


$bd->close();
 ?>
 <script></script>