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

	$cont = 1;

	$observaciones_finales_visita = (isset($_POST['observaciones_finales_visita'])) ? $_POST['observaciones_finales_visita']: '';
	$nombres_visitador_vis = (isset($_POST['nombres_visitador_vis'])) ? $_POST['nombres_visitador_vis']: '';
	$observaciones_finales_general = (isset($_POST['observaciones_finales_visita'])) ? $_POST['observaciones_finales_visita']: '';
	$nombres_visitador_gen = (isset($_POST['nombres_visitador_gen'])) ? $_POST['nombres_visitador_gen']: '';
	

	$sql = "INSERT into observaciones values(Null,'$observaciones_finales_general','$nombres_visitador_gen','$observaciones_finales_visita','$nombres_visitador_vis',$id_visita,'$id_familia')";
	echo $sql;
	$query = $bd->query($sql); 
	if (!$query) echo $bd->error;


	
	echo "Registro Exitoso";
	sleep(1);
	header("location: /instituto/views/inicio.php");

$bd->close();
 ?>
