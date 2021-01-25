<?php 
	require $_SERVER['DOCUMENT_ROOT']."/instituto/application/database/conexion.php";
	// sleep(1);
	$bd = conectar();
	// $bd->set_charset('utf8');
	$usuario = $_POST['usuario'];
	$pass = $_POST['password'];

$query = $bd->query("SELECT * FROM usuarios WHERE nick_name = BINARY '$usuario' AND password = BINARY '$pass'");
// echo "SELECT * FROM usuarios WHERE nick_name = $usuario AND password = $pass";
// var_dump($query);
if($query->num_rows > 0){
	$datos =$query->fetch_object();
	session_start();
	$_SESSION['usuario'] = $datos;
	// var_dump($_SESSION['usuario']);
	echo json_encode(array('error' => false));
	}
else{
	echo json_encode(array('error' => true));
	}

$bd->close();
 ?>