<!DOCTYPE html>
<html lang="es">
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
		<form id="form14" action="/instituto/core/s_estadisticas.php" method="POST">
			
			<?php
				require $_SERVER['DOCUMENT_ROOT']."/instituto/application/verificar_sesion.php";
				if (verificar() == True) {
					$usuario = $_SESSION['usuario']->nick_name;
				}
				else{
					return False;
					// exit();
				}
				
				require $_SERVER['DOCUMENT_ROOT']."/instituto/application/database/conexion.php";
				$bd = conectar();
				$sql = "SELECT COUNT(*) AS numero FROM familias";
				$query = $bd->query($sql); 
				if (!$query) echo $bd->error;
				$row = $query->fetch_object();
			 ?>
			<div class="divh1">
				<h1>Estadisticas Totales</h1>
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

			<div class="table">
				<table id="tb_estadisticas_globales">
					<tbody>
						<tr>
							<td class="td_estadis_g">Numero Total de Familias Registradas</td>
							<td><?php echo $row->numero?></td>
						</tr>
						<tr>
							<td colspan="2" class="none_estadis_g"></td>
						</tr>
						<?php 
							$sql = "SELECT COUNT(*) AS numero FROM integrantes";
							$query = $bd->query($sql); 
							if (!$query) echo $bd->error;
							$row = $query->fetch_object();
						?>
						<tr>
							<td class="td_estadis_g">Numero Total de Personas Registradas</td>
							<td><?php echo $row->numero?></td>
						</tr>
						<tr>
							<td colspan="2" class="none_estadis_g"></td>
						</tr>
						<?php 
							$sql = "SELECT COUNT(*) AS numero FROM menores_a_1 WHERE id_visita = 1";
							$query = $bd->query($sql); 
							if (!$query) echo $bd->error;
							$row = $query->fetch_object();
						?>
						<tr>
							<td class="td_estadis_g">Numero Total de Menores a 1 año Registrados</td>
							<td><?php echo $row->numero?></td>
						</tr>
						<tr>
							<td colspan="2" class="none_estadis_g"></td>
						</tr>
						<?php 
							$sql = "SELECT COUNT(*) AS numero FROM de_1_a_5 WHERE id_visita = 1";
							$query = $bd->query($sql); 
							if (!$query) echo $bd->error;
							$row = $query->fetch_object();
						?>
						<tr>
							<td class="td_estadis_g">Numero Total de Niños de 1 a 5 años Registrados</td>
							<td><?php echo $row->numero?></td>
						</tr>
						<tr>
							<td colspan="2" class="none_estadis_g"></td>
						</tr>
						<?php 
							$sql = "SELECT COUNT(*) AS numero FROM de_5_a_9 WHERE id_visita = 1";
							$query = $bd->query($sql); 
							if (!$query) echo $bd->error;
							$row = $query->fetch_object();
						?>
						<tr>
							<td class="td_estadis_g">Numero Total de Niños de 5 a 9 años Registrados</td>
							<td><?php echo $row->numero?></td>
						</tr>
						<tr>
							<td colspan="2" class="none_estadis_g"></td>
						</tr>
						<?php 
							$sql = "SELECT COUNT(*) AS numero FROM de_10_a_59 WHERE id_visita = 1";
							$query = $bd->query($sql); 
							if (!$query) echo $bd->error;
							$row = $query->fetch_object();
						?>
						<tr>
							<td class="td_estadis_g">Numero Total de Hombres y Mujeres de 10 a 59 años Registrados</td>
							<td><?php echo $row->numero?></td>
						</tr>
						<tr>
							<td colspan="2" class="none_estadis_g"></td>
						</tr>
						<?php 
							$sql = "SELECT COUNT(*) AS numero FROM de_60_mas WHERE id_visita = 1";
							$query = $bd->query($sql); 
							if (!$query) echo $bd->error;
							$row = $query->fetch_object();
						?>
						<tr>
							<td class="td_estadis_g">Numero Total de Adultos Mayores a 60 Registrados</td>
							<td><?php echo $row->numero?></td>
						</tr>
						<tr>
							<td colspan="2" class="none_estadis_g"></td>
						</tr>
						<?php 
							$sql = "SELECT COUNT(*) AS numero FROM gestacion WHERE id_visita = 1";
							$query = $bd->query($sql); 
							if (!$query) echo $bd->error;
							$row = $query->fetch_object();
						?>
						<tr>
							<td class="td_estadis_g">Numero Total de Mujeres en Gestacion Registradas</td>
							<td><?php echo $row->numero?></td>
						</tr>
						<tr>
							<td colspan="2" class="none_estadis_g"></td>
						</tr>
						<?php 
							$sql = "SELECT COUNT(*) AS numero FROM estadis_nacidos";
							$query = $bd->query($sql); 
							if (!$query) echo $bd->error;
							$row = $query->fetch_object();
						?>
						<tr>
							<td class="td_estadis_g">Numero Total de Nacimientos Registrados</td>
							<td><?php echo $row->numero?></td>
						</tr>
						<tr>
							<td colspan="2" class="none_estadis_g"></td>
						</tr>
						<?php 
							$sql = "SELECT COUNT(*) AS numero FROM estadis_mortalidad";
							$query = $bd->query($sql); 
							if (!$query) echo $bd->error;
							$row = $query->fetch_object();
						?>
						<tr>
							<td class="td_estadis_g">Numero Total de Fallecimientos Registrados</td>
							<td><?php echo $row->numero?></td>
						</tr>
						<tr>
							<td colspan="2" class="none_estadis_g"></td>
						</tr>
						<?php 
							$sql = "SELECT COUNT(*) AS numero FROM estadis_morbilidad";
							$query = $bd->query($sql); 
							if (!$query) echo $bd->error;
							$row = $query->fetch_object();
						?>
						<tr>
							<td class="td_estadis_g">Numero Total de Enfermos Registrados</td>
							<td><?php echo $row->numero?></td>
						</tr>
						<tr>
							<td colspan="2" class="none_estadis_g"></td>
						</tr>
						
					</tbody>
				</table>
				<div class="block">
					<div type="button" class="return" onclick="window.location='/instituto/views/inicio.php'"><img src="/instituto/static/img/varios/return.png" alt="">Volver Atras</div>
			   </div>
				<!-- <button type="button" class="button next">Volver</button> -->
			</div>
		</form>
	</main>
	<script src="http://localhost/instituto/static/js/jquery-3.3.1.js"></script>
	<script src="http://localhost/instituto/static/js/bootstrap.js"></script>
	<script src="http://localhost/instituto/static/js/funciones.js"></script>
</body>
</html>