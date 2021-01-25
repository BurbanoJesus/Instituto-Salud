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


	$sql = "UPDATE identificacion_ubicacion SET numero_vivienda = $numero_vivienda, numero_familias_por_vivienda = $numero_familiasxvivienda, sisben ='$sisben', departamento = '$departamento', municipio = '$municipio', resguardo = '$resguardo', comunidad ='$comunidad', vereda ='$vereda', barrio = '$barrio', latitud= $latitud, longitud = $longitud, ubicacion_ref = '$ubi_map' WHERE id_familia = '$id_familia'";
	$query = $bd->query($sql); 
	echo $sql;
	if (!$query) echo $bd->error;


	$sql = "UPDATE riesgos_ubicacion SET zona_inundable = '$zona_inundable', margen_rios = '$margen_rios', zona_ladera = '$zona_ladera', falda_montana ='$falda_montaña', relleno = '$relleno', otro_riesgo = '$otro_riesgo', cual_otro_riesgo = '$otro_riesgo_txt' WHERE id_familia = '$id_familia'";
	$query = $bd->query($sql); 
	echo $sql;
	if (!$query) echo $bd->error;


	header("location: /instituto/views/registrar_sig/integrantes.php");

$bd->close();
 ?>
 <script></script>