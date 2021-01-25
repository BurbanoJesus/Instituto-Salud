<!DOCTYPE html>
<html lang="en">
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
	require $_SERVER['DOCUMENT_ROOT']."/instituto/application/verificar_sesion.php";
	if (verificar() == True) {
		$usuario = $_SESSION['usuario']->nick_name;
	}
	else{
		return False;
		// exit();
	}
	?>
	<main>
		<form id="form13" action="/instituto/core/registro_sig/s_observaciones.php" method="POST">
			<div class="divh1">
				<h1 class="bg_celeste br_celeste">Observaciones</h1>
				<div class="divimg">
					<img src="/instituto/static/img/varios/menu_3.png">
				</div>
				<div class="divmenu">
					<ul>
						<li onclick="window.location='/instituto/views/inicio.php'">Inicio</li>
						<li onclick="window.location='/instituto/index.php'">Salir</li>
					</ul>
				</div>
			</div>
			<div class="div_center">
				<?php 
					require $_SERVER['DOCUMENT_ROOT']."/instituto/application/database/conexion.php";
					$bd = conectar();
					$id_familia = $_SESSION['id_familia'];
					$id_visita = $_SESSION['id_visita'];
					$sql = "SELECT * FROM observaciones WHERE id_familia = '$id_familia' ORDER BY id_visita DESC LIMIT 1";
					$query = $bd->query($sql);
					$row = $query->fetch_object();
				 ?>
				<div class="observaciones_finales">
					<div class="observaciones_visita">
						<span class="bg_purple br_purple">OBSERVACIONES VISITA</span>
						<textarea name="observaciones_finales_visita" cols="30" rows="15"><?php echo $row->observaciones_vis?></textarea>
						<div class="flex">
							<span class="bg_celeste br_celeste">Nombres y Apellidos Visitador(a)</span>
							<input class="br_celeste" type="text" name="nombres_visitador_vis" value="<?php echo $row->nombres_visitador_vis?>" required/>
						</div>
					</div>
					<div class="observaciones_visita">
						<span class="bg_morado br_morado">OBSERVACIONES GENERALES</span>
						<textarea name="observaciones_finales_general" cols="30" rows="20"><?php echo $row->observaciones_gen?></textarea>
						<div class="flex">
							<span class="bg_celeste br_celeste">Nombres y Apellidos Visitador(a)</span>
							<input class="br_celeste" type="text" name="nombres_visitador_gen" value="<?php echo $row->nombres_visitador_gen?>" required/>
						</div>
					</div>
				</div>
				<div class="block">
						<button type="submit" class="button next">Finalizar</button>
					</div>
			</div>
		</form>
	</main>
	<script src="http://localhost/instituto/static/js/jquery-3.3.1.js"></script>
	<script src="http://localhost/instituto/static/js/bootstrap.js"></script>
	<script src="http://localhost/instituto/static/js/funciones.js"></script>
</body>
</html>