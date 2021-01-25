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
	<?php 
		require "../application/verificar_sesion.php";
		if (verificar() == True) {
			$usuario = $_SESSION['usuario']->nick_name;
		}
		else{
			return False;
			// exit();
		}	 
	?>
	<div id="loader"></div>
	<main>
		<form id="form1" action="/instituto/core/inicio.php" method="POST">
			<div>
			<h1 class="index">Sistema de Información de Base Comunitaria para Atención Primaria en Salud - SIBCAPS</h1>
				<h2>Departamento de Nariño</h2>
				<div>
					<div class="menu">
					   <button type="button" class="button bg_azul non_mg opcion">Registrar</button>
					   <button onclick="window.location = '/instituto/core/inicio.php?opcion=2'" type="button" class="button bg_azul non_mg opcion">Consultar</button>
					   <button onclick="window.location = '/instituto/core/inicio.php?opcion=3'" type="button" class="button bg_azul non_mg opcion">Estadisticas</button>
					</div>
					<div class="block" onclick="window.location = '../index.php'">
							<div type="button" id="return_index" class="return"><img src="/instituto/static/img/varios/return.png" alt="">Volver Atras</div>
				   </div>
				
					<h3>Tarjeta Familiar</h3>
					<div class="inicio">
					   <div class="input">
						   <label> Casa No. </label>
						   <input class="custom" type="number" name="casa_numero" min=0 max=10000 value="" required />
						</div>
						<div class="input">
							<label> Familia No. </label>
							<input class="custom" type="number" name="familia_numero" min=0 max=10000 value="" required />
						</div>
						<input id="opcion" type="hidden" name="opcion" value="">
					   <button type="submit" class="button next">
						   Iniciar
					   </button>
					   <div class="block">
							<div type="button" id="return_menu" class="return"><img src="/instituto/static/img/varios/return.png" alt="">Volver Atras</div>
					   </div>
					</div>
				</div>
			</div>
		</form>
	</main>
	<script src="http://localhost/instituto/static/js/jquery-3.3.1.js"></script>
	<script src="http://localhost/instituto/static/js/bootstrap.js"></script>
	<script src="http://localhost/instituto/static/js/funciones.js"></script>
</body>
</html>