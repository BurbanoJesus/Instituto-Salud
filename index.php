<!DOCTYPE html>
<html lang="e">
<head>
	<meta charset="UTF-8">
	<title>Instituto</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon"> -->
	<!-- <link rel="icon" href="img/favicon.png" type="image/x-icon"> -->
	<!-- <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'> -->
	<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
	<link rel="stylesheet" href="http://localhost/instituto/static/css/estilos.css">
</head>
<body>
	<main>
		<form id="form0" action="" method="POST">
			<div>
			<h1 class="index">Sistema de Información de Base Comunitaria para Atención Primaria en Salud - SIBCAPS</h1>
				<h2>Departamento de Nariño</h2>
				<?php  
				include './application/database/conexion.php';
				session_start();
				if (isset($_SESSION['usuario'])){
					$_SESSION["usuario"]= "";
	    			session_destroy();
				}
				$bd = conectar();
				if (!$bd) echo "string";
				$query = $bd->query("SELECT * from usuarios");
				$query = $query->fetch_object();
				if (!$query){
				// echo "<h3>Error</h3>";
				//     echo mysqli_error($bd);
				// }
				// else{
				//     echo "<h3>Información</h3>";
				//     echo "<p>$query->nick_name</p>";
				}
				?>
				<h2>Inciar Sesion</h2>
				<div class="sesion">
				    <input class="sesion_input" type="text" name="usuario">
				    <label>Usuario</label>
					<input class="sesion_input" type="password" name="password">
					<label>Contraseña</label>
					<button type="submit" class="button next">Iniciar Sesion</button>
					<div class="error"></div>
				</div>
			</div>
		</form>
	</main>
	<script src="http://localhost/instituto/static/js/jquery-3.3.1.js"></script>
	<script src="http://localhost/instituto/static/js/bootstrap.js"></script>
	<script src="http://localhost/instituto/static/js/funciones.js"></script>
	<script src="http://localhost/instituto/static/js/login.js"></script>
</body>
</html>