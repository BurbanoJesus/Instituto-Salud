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
		<form id="form13" action="/instituto/core/consultas/s_observaciones.php" method="POST">
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
				<div class="observaciones_finales">
				<?php 
					require $_SERVER['DOCUMENT_ROOT']."/instituto/application/database/conexion.php";
					$bd = conectar();
					$id_familia = $_SESSION['id_familia_consulta'];
					$id_visita = 1;
					$sql = "SELECT * FROM observaciones JOIN visitas USING(id_visita,id_familia) WHERE visitas.id_familia = '$id_familia'";
					$query = $bd->query($sql);
					$cont = 1;
					while($row = $query->fetch_object()){
				 ?>
					<div class="observaciones_visita">
						<span class="bg_purple br_purple">OBSERVACIONES VISITA <?php echo $cont?></span>
						<textarea class="textarea" rows="10" cols="20" name="observaciones_finales_visita_<?php echo $cont?>"><?php echo $row->observaciones_vis?></textarea>
						<div class="flex">
							<span class="bg_celeste br_celeste">Nombres y Apellidos Visitador(a)</span>
							<input class="br_celeste" type="text" name="nombres_visitador_vis_<?php echo $cont?>" value="<?php echo $row->nombres_visitador_vis?>" required>
						</div>
					</div>
					<?php
					$cont++; 
					} 
					?>

					<?php 
					$query->data_seek(0);
					$row = $query->fetch_object();
					 ?>
					<div class="observaciones_visita">
						<span class="bg_morado br_morado">OBSERVACIONES GENERALES</span>
						<textarea class="textarea" rows="10" cols="20" name="observaciones_finales_general"><?php echo $row->observaciones_gen?></textarea><div class="flex">
							<span class="bg_celeste br_celeste">Nombres y Apellidos Visitador(a)</span>
							<input class="br_celeste" type="text" name="nombres_visitador_gen" value="<?php echo $row->nombres_visitador_gen ?>" required>
						</div>
					</div>
				</div>
			</div>
			<button type="button" class="button next" onclick="window.location='../inicio.php'">Ir al Inicio</button>
			<div class="nav_inf">
				<ul>
					<li onclick="window.location='../inicio.php'"><label>Inicio</label></li>
					<li onclick="window.location='identificacion.php'"><label>Identi.. <div class="info_tb">Identificacion y Ubicacion</div></label></li>
					<li onclick="window.location='integrantes.php'"><label>Integra..<div class="info_tb">Personas Integrantes de la Familia</div></label></li>
					<li onclick="window.location='menores_a_1.php'"><label>0 a 1 Años..<div class="info_tb">Registro de Actividades Niños(as) menores a 1 año</div></label></li>
					<li onclick="window.location='niños_1_a_5.php'"><label>1 a 5 Años..<div class="info_tb">Registro de Actividades Niños(as) 1 a 5 años</div></label></li>
					<li onclick="window.location='niños_5_a_9.php'"><label>5 a 9 Años..<div class="info_tb">Registro de Actividades Niños(as) 5 a 9 años</div></label></li>
					<li onclick="window.location='hom_muj_10_a_59.php'"><label>10 a 59 Años..<div class="info_tb">Registro de Actividades Hombres y Mujeres de 10 a 59 años</div></label></li>
					<li onclick="window.location='adultos_60_mas.php'"><label>60 Años o mas..<div class="info_tb">Registro de Actividades Adultos(as) de 60 años y mas</div></label></li>
					<li onclick="window.location='gestacion_parto.php'"><label>Gesta..<div class="info_tb">Registro de Actividades Gestacion, Parto y Postparto</div></label></li>
					<li onclick="window.location='antecedentes.php'"><label>Antece..<div class="info_tb">Antecedentes en Salud Mental</div></label></li>
					<li onclick="window.location='estadisticas.php'"><label>Estadi..<div class="info_tb">Estadisticas Vitales</div></label></li>
					<li onclick="window.location='condiciones_sanitarias.php'"><label>Condici..<div class="info_tb">Condiciones Sanitarias</div></label></li>
					<li class="active" onclick="window.location='observaciones.php'"><label>Observa..<div class="info_tb">Observaciones</div></label></li>
				</ul>
			</div>
		</form>
	</main>
	<script src="http://localhost/instituto/static/js/jquery-3.3.1.js"></script>
	<script src="http://localhost/instituto/static/js/bootstrap.js"></script>
	<script src="http://localhost/instituto/static/js/funciones.js"></script>
</body>
</html>