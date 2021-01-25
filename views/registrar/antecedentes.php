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
	<main>

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
		$id_familia = $_SESSION['id_familia'];
		$sql = "SELECT * FROM integrantes WHERE id_familia = '$id_familia' ORDER BY	cod_integrante";
		$query = $bd->query($sql);
		$query_2 = $query; 

		$sql_s = "SELECT * FROM antecedentes JOIN integrantes USING(id_integrante) WHERE  id_familia = '$id_familia'";
		$query_s = $bd->query($sql_s);

		if (!$query) echo $bd->error;
		if ($query->num_rows == 0 or $query_s->num_rows > 0) {
			echo 'No hay registros';
			header("location: /instituto/views/registrar/estadisticas.php");
			return False;
		}
		
		$id_familia = $_SESSION['id_familia'];
		$id_visita = $_SESSION['id_visita'];
		$cont = 1;
			
		?>
		<form id="form10" action="/instituto/core/registro/s_antecedentes.php" method="POST">
			<div class="divh1">
				<h1>Antecedentes en Salud Mental:</h1>
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
			<div>
				 <div class="table">
					 <table id="tb8_identificacion">
						 <thead>
							<tr>
								<th colspan="3" class="bg_naranja">*Identique qué miembro esta afectado</th>
							</tr>
							<tr>
								 <th>Cod</th>
								 <th>Nombres y Apellidos</th>
								 <th>Edad</th>
							</tr>
						 </thead>
						 <tbody>
								<?php $cont = 1;
								while ( $row = $query->fetch_object()) { 
								if ($cont < 6) {
								 	$class = '';
								}	
								else{
									$class = 'ante_id';
								}
								?>
								 <tr class="<?php echo $class?>">
									 <td><?php echo $cont ?></td>
									 <td>
										<?php echo $row->nombres?>
									 </td>
									 <td><?php echo $row->edad_anos?></td>
								 </tr>
							<?php 
								$cont++;
								} ?>
						 </tbody>
					 </table>
					 <?php if ($cont > 5) { ?>
					 <button type="button" class="button_add">Ver Mas</button>
					<?php } ?>
				</div>
				<div class="table">
					<table id="tb8_1_consumo_sustancias">
						<thead>
							<tr>
								<th colspan="7" class="bg_naranja br_naranja">1. Consumo de Sustancias</th>
							</tr>
							 <tr>
								<th colspan="1">Sustancias</th>
								<th colspan="1">Si</th>
								<th colspan="1">No</th>
								<th colspan="1">Quien/es*</th>
								<th colspan="1">Edad Inicio</th>
								<th colspan="1" class="table_info">
									<div class="ico">i</div>
									Frecuencia consumo
									<div class="info">
										<label><div class="ico">i</div></label><span>Frecuencia</span>
										<label>1</label><span>Diario</span>
										<label>2</label><span>Semanal</span>
										<label>3</label><span>Mensual</span>
										<label>4</label><span>Anual</span>
										<label>5</label><span>Ocasional</span>
									</div>
								</th>
								<th colspan="1">Observaciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Cigarrillo</td>
								 <td>
									<input class="antecedentes" id="tb8_1_elemento_si_1" type="radio"  name="tb8_1_elemento_1" value="si">
									<label class="radio" for="tb8_1_elemento_si_1" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_no_1" type="radio"  name="tb8_1_elemento_1" value="no" checked>
									<label class="radio" for="tb8_1_elemento_no_1" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_1_quienes_1" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_1_edad_inicio_1" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_1_frecuencia_consumo_1" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_1_observaciones_1" value=""></td>
							</tr>
							 <tr>
								<td>Alcohol</td>
								 <td>
									<input class="antecedentes" id="tb8_1_elemento_si_2" type="radio"  name="tb8_1_elemento_2" value="si">
									<label class="radio" for="tb8_1_elemento_si_2" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_no_2" type="radio"  name="tb8_1_elemento_2" value="no" checked>
									<label class="radio" for="tb8_1_elemento_no_2" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_1_quienes_2" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_1_edad_inicio_2" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_1_frecuencia_consumo_2" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_1_observaciones_2" value=""></td>
							</tr>
							 <tr>
								<td>Marihuana</td>
								 <td>
									<input class="antecedentes" id="tb8_1_elemento_si_3" type="radio"  name="tb8_1_elemento_3" value="si">
									<label class="radio" for="tb8_1_elemento_si_3" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_no_3" type="radio"  name="tb8_1_elemento_3" value="no" checked>
									<label class="radio" for="tb8_1_elemento_no_3" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_1_quienes_3" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_1_edad_inicio_3" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_1_frecuencia_consumo_3" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_1_observaciones_3" value=""></td>
							</tr>
							 <tr>
								<td>Bazuco</td>
								 <td>
									<input class="antecedentes" id="tb8_1_elemento_si_4" type="radio"  name="tb8_1_elemento_4" value="si" >
									<label class="radio" for="tb8_1_elemento_si_4" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_no_4" type="radio"  name="tb8_1_elemento_4" value="no" checked>
									<label class="radio" for="tb8_1_elemento_no_4" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_1_quienes_4" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_1_edad_inicio_4" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_1_frecuencia_consumo_4" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_1_observaciones_4" value=""></td>
							</tr>
							 <tr>
								<td>Heroina</td>
								 <td>
									<input class="antecedentes" id="tb8_1_elemento_si_5" type="radio"  name="tb8_1_elemento_5" value="si">
									<label class="radio" for="tb8_1_elemento_si_5" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_no_5" type="radio"  name="tb8_1_elemento_5" value="no" checked>
									<label class="radio" for="tb8_1_elemento_no_5" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_1_quienes_5" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_1_edad_inicio_5" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_1_frecuencia_consumo_5" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_1_observaciones_5" value=""></td>
							</tr>
							<tr>
								<td>Cocaina</td>
								 <td>
									<input class="antecedentes" id="tb8_1_elemento_si_6" type="radio"  name="tb8_1_elemento_6" value="si">
									<label class="radio" for="tb8_1_elemento_si_6" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_no_6" type="radio"  name="tb8_1_elemento_6" value="no" checked>
									<label class="radio" for="tb8_1_elemento_no_6" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_1_quienes_6" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_1_edad_inicio_6" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_1_frecuencia_consumo_6" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_1_observaciones_6" value=""></td>
							</tr>
							 <tr>
								<td>Otros</td>
								 <td>
									<input class="antecedentes" id="tb8_1_elemento_si_7" type="radio"  name="tb8_1_elemento_7" value="si">
									<label class="radio" for="tb8_1_elemento_si_7" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_no_7" type="radio"  name="tb8_1_elemento_7" value="no" checked>
									<label class="radio" for="tb8_1_elemento_no_7" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_1_quienes_7" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_1_edad_inicio_7" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_1_frecuencia_consumo_7" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_1_observaciones_7" value=""></td>
							</tr>
						</tbody>
					</table>

					 <table id="tb8_2_sintomas_transtornos">
						<thead>
							<tr>
								<th colspan="7" class="bg_naranja br_naranja">2. Sintomatologia Asociada a transtornos mentales</th>
							</tr>
							 <tr>
								<th colspan="1">Tipo</th>
								<th colspan="1">Si</th>
								<th colspan="1">No</th>
								<th colspan="1">Quien/es*</th>
								<th colspan="1">Edad</th>
								<th colspan="1">Observaciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Intento de Suicidio</td>
								 <td>
									<input class="antecedentes" id="tb8_2_elemento_si_1" type="radio"  name="tb8_2_elemento_1" value="si">
									<label class="radio" for="tb8_2_elemento_si_1" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_1" type="radio"  name="tb8_2_elemento_1" value="no" checked>
									<label class="radio" for="tb8_2_elemento_no_1" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_1" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_1" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_1" value=""></td>
							</tr>
							 <tr>
								<td>Suicidio</td>
								 <td>
									<input class="antecedentes" id="tb8_2_elemento_si_2" type="radio"  name="tb8_2_elemento_2" value="si">
									<label class="radio" for="tb8_2_elemento_si_2" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_2" type="radio"  name="tb8_2_elemento_2" value="no" checked>
									<label class="radio" for="tb8_2_elemento_no_2" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_2" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_2" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_2" value=""></td>
							</tr>
							 <tr>
								<td>Transtornos del afecto</td>
								 <td>
									<input class="antecedentes" id="tb8_2_elemento_si_3" type="radio"  name="tb8_2_elemento_3" value="si">
									<label class="radio" for="tb8_2_elemento_si_3" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_3" type="radio"  name="tb8_2_elemento_3" value="no" checked>
									<label class="radio" for="tb8_2_elemento_no_3" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_3" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_3" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_3" value=""></td>
							</tr>
							 <tr>
								<td>Transtornos del pensamiento</td>
								 <td>
									<input class="antecedentes" id="tb8_2_elemento_si_4" type="radio"  name="tb8_2_elemento_4" value="si">
									<label class="radio" for="tb8_2_elemento_si_4" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_4" type="radio"  name="tb8_2_elemento_4" value="no" checked>
									<label class="radio" for="tb8_2_elemento_no_4" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_4" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_4" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_4" value=""></td>
							</tr>
							 <tr>
								<td>Transtornos del desarrollo</td>
								 <td>
									<input class="antecedentes" id="tb8_2_elemento_si_5" type="radio"  name="tb8_2_elemento_5" value="si">
									<label class="radio" for="tb8_2_elemento_si_5" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_5" type="radio"  name="tb8_2_elemento_5" value="no" checked>
									<label class="radio" for="tb8_2_elemento_no_5" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_5" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_5" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_5" value=""></td>
							</tr>
							 <tr>
								<td>Transtornos organicos</td>
								 <td>
									<input class="antecedentes" id="tb8_2_elemento_si_6" type="radio"  name="tb8_2_elemento_6" value="si">
									<label class="radio" for="tb8_2_elemento_si_6" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_6" type="radio"  name="tb8_2_elemento_6" value="no" checked>
									<label class="radio" for="tb8_2_elemento_no_6" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_6" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_6" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_6" value=""></td>
							</tr>
							<tr>
								<td>Sintomas de ansiedad</td>
								 <td>
									<input class="antecedentes" id="tb8_2_elemento_si_7" type="radio"  name="tb8_2_elemento_7" value="si">
									<label class="radio" for="tb8_2_elemento_si_7" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_7" type="radio"  name="tb8_2_elemento_7" value="no" checked>
									<label class="radio" for="tb8_2_elemento_no_7" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_7" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_7" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_7" value=""></td>
							</tr>
							<tr>
								<td>Tristeza generalizada</td>
								 <td>
									<input class="antecedentes" id="tb8_2_elemento_si_8" type="radio"  name="tb8_2_elemento_8" value="si">
									<label class="radio" for="tb8_2_elemento_si_8" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_8" type="radio"  name="tb8_2_elemento_8" value="no" checked>
									<label class="radio" for="tb8_2_elemento_no_8" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_8" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_8" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_8" value=""></td>
							</tr>
							<tr>
								<td>Stress</td>
								 <td>
									<input class="antecedentes" id="tb8_2_elemento_si_9" type="radio"  name="tb8_2_elemento_9" value="si">
									<label class="radio" for="tb8_2_elemento_si_9" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_9" type="radio"  name="tb8_2_elemento_9" value="no" checked>
									<label class="radio" for="tb8_2_elemento_no_9" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_9" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_9" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_9" value=""></td>
							</tr>
							<tr>
								<td>Otro Cual(es)?</td>
								 <td>
									<input class="antecedentes" id="tb8_2_elemento_si_10" type="radio"  name="tb8_2_elemento_10" value="si">
									<label class="radio" for="tb8_2_elemento_si_10" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_10" type="radio"  name="tb8_2_elemento_10" value="no" checked>
									<label class="radio" for="tb8_2_elemento_no_10" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_10" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_10" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_10" value=""></td>
							</tr>
						</tbody>
					</table>
					<table id="tb8_3_violencia_intrafamiliar">
						<thead>
							<tr>
								<th colspan="7" class="bg_naranja br_naranja">3. Violencia Intrafamiliar</th>
							</tr>
							 <tr>
								<th colspan="1">Tipo</th>
								<th colspan="1">Si</th>
								<th colspan="1">No</th>
								<th colspan="1">Quien/es*</th>
								<th colspan="1">Edad</th>
								<th colspan="1" class="table_info">
									<div class="ico">i</div>
									Frecuencia
									<div class="info">
										<label><div class="ico">i</div></label><span>Frecuencia</span>
										<label>1</label><span>Diario</span>
										<label>2</label><span>Semanal</span>
										<label>3</label><span>Mensual</span>
										<label>4</label><span>Anual</span>
										<label>5</label><span>Ocasional</span>
									</div>
								</th>
								<th colspan="1">Observaciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Maltrato Infantil</td>
								 <td>
									<input class="antecedentes" id="tb8_3_elemento_si_1" type="radio"  name="tb8_3_elemento_1" value="si">
									<label class="radio" for="tb8_3_elemento_si_1" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_3_elemento_no_1" type="radio"  name="tb8_3_elemento_1" value="no" checked>
									<label class="radio" for="tb8_3_elemento_no_1" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_3_quienes_1" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_3_edad_inicio_1" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_3_frecuencia_consumo_1" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_3_observaciones_1" value=""></td>
							</tr>
							 <tr>
								<td>Violencia conyugal</td>
								 <td>
									<input class="antecedentes" id="tb8_3_elemento_si_2" type="radio"  name="tb8_3_elemento_2" value="si">
									<label class="radio" for="tb8_3_elemento_si_2" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_3_elemento_no_2" type="radio"  name="tb8_3_elemento_2" value="no" checked>
									<label class="radio" for="tb8_3_elemento_no_2" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_3_quienes_2" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_3_edad_inicio_2" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_3_frecuencia_consumo_2" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_3_observaciones_2" value=""></td>
							</tr>
							 <tr>
								<td>Violencia Parental</td>
								 <td>
									<input class="antecedentes" id="tb8_3_elemento_si_3" type="radio"  name="tb8_3_elemento_3" value="si">
									<label class="radio" for="tb8_3_elemento_si_3" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_3_elemento_no_3" type="radio"  name="tb8_3_elemento_3" value="no" checked>
									<label class="radio" for="tb8_3_elemento_no_3" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_3_quienes_3" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_3_edad_inicio_3" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_3_frecuencia_consumo_3" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_3_observaciones_3" value=""></td>
							</tr>
		   
						</tbody>
					</table>
					 <table id="tb8_4_violencia_sexual">
						<thead>
							<tr>
								<th colspan="7" class="bg_naranja br_naranja">4. Violencia sexual</th>
							</tr>
							 <tr>
								<th colspan="1">Tipo</th>
								<th colspan="1">Si</th>
								<th colspan="1">No</th>
								<th colspan="1">Quien/es*</th>
								<th colspan="1">Edad</th>
								<th colspan="1" class="table_info">
									<div class="ico">i</div>
									Frecuencia
									<div class="info">
										<label><div class="ico">i</div></label><span>Frecuencia</span>
										<label>1</label><span>Diario</span>
										<label>2</label><span>Semanal</span>
										<label>3</label><span>Mensual</span>
										<label>4</label><span>Anual</span>
										<label>5</label><span>Ocasional</span>
									</div>
								</th>
								<th colspan="1">Observaciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Acoso sexual</td>
								 <td>
									<input class="antecedentes" id="tb8_4_elemento_si_1" type="radio"  name="tb8_4_elemento_1" value="si">
									<label class="radio" for="tb8_4_elemento_si_1" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_4_elemento_no_1" type="radio"  name="tb8_4_elemento_1" value="no" checked>
									<label class="radio" for="tb8_4_elemento_no_1" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_4_quienes_1" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_4_edad_inicio_1" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_4_frecuencia_consumo_1" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_4_observaciones_1" value=""></td>
							</tr>
							 <tr>
								<td>Abuso sexual</td>
								 <td>
									<input class="antecedentes" id="tb8_4_elemento_si_2" type="radio"  name="tb8_4_elemento_2" value="si">
									<label class="radio" for="tb8_4_elemento_si_2" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_4_elemento_no_2" type="radio"  name="tb8_4_elemento_2" value="no" checked>
									<label class="radio" for="tb8_4_elemento_no_2" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_4_quienes_2" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_4_edad_inicio_2" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_4_frecuencia_consumo_2" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_4_observaciones_2" value=""></td>
							</tr>
							 <tr>
								<td>Maltrato sexual</td>
								 <td>
									<input class="antecedentes" id="tb8_4_elemento_si_3" type="radio"  name="tb8_4_elemento_3" value="si">
									<label class="radio" for="tb8_4_elemento_si_3" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_4_elemento_no_3" type="radio"  name="tb8_4_elemento_3" value="no" checked>
									<label class="radio" for="tb8_4_elemento_no_3" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_4_quienes_3" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_4_edad_inicio_3" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_4_frecuencia_consumo_3" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_4_observaciones_3" value=""></td>
							</tr>
							 <tr>
								<td>Prostitucion / Pornografia</td>
								 <td>
									<input class="antecedentes" id="tb8_4_elemento_si_4" type="radio"  name="tb8_4_elemento_4" value="si">
									<label class="radio" for="tb8_4_elemento_si_4" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_4_elemento_no_4" type="radio"  name="tb8_4_elemento_4" value="no" checked>
									<label class="radio" for="tb8_4_elemento_no_4" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_4_quienes_4" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_4_edad_inicio_4" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_4_frecuencia_consumo_4" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_4_observaciones_4" value=""></td>
							</tr>
						 </tbody>
					</table>
					 <table id="tb8_5_sintomas_violencia_social">
						<thead>
							<tr>
								<th colspan="7" class="bg_naranja br_naranja">5. Sintomatologia Asociada a Violencia Social y Politica</th>
							</tr>
							 <tr>
								<th colspan="1">Tipo</th>
								<th colspan="1">Si</th>
								<th colspan="1">No</th>
								<th colspan="1">Quien/es*</th>
								<th colspan="1">Edad</th>
								
								<th colspan="1">Observaciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Duelos no resueltos</td>
								 <td>
									<input class="antecedentes" id="tb8_5_elemento_si_1" type="radio"  name="tb8_5_elemento_1" value="si">
									<label class="radio" for="tb8_5_elemento_si_1" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_5_elemento_no_1" type="radio"  name="tb8_5_elemento_1" value="no" checked>
									<label class="radio" for="tb8_5_elemento_no_1" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_5_quienes_1" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_5_edad_inicio_1" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_5_observaciones_1" value=""></td>
							</tr>
							 <tr>
								<td>Ansiedad generalizada</td>
								 <td>
									<input class="antecedentes" id="tb8_5_elemento_si_2" type="radio"  name="tb8_5_elemento_2" value="si">
									<label class="radio" for="tb8_5_elemento_si_2" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_5_elemento_no_2" type="radio"  name="tb8_5_elemento_2" value="no" checked>
									<label class="radio" for="tb8_5_elemento_no_2" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_5_quienes_2" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_5_edad_inicio_2" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_5_observaciones_2" value=""></td>
							</tr>
							 <tr>
								<td>Ataques de panico</td>
								 <td>
									<input class="antecedentes" id="tb8_5_elemento_si_3" type="radio"  name="tb8_5_elemento_3" value="si">
									<label class="radio" for="tb8_5_elemento_si_3" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_5_elemento_no_3" type="radio"  name="tb8_5_elemento_3" value="no" checked>
									<label class="radio" for="tb8_5_elemento_no_3" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_5_quienes_3" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_5_edad_inicio_3" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_5_observaciones_3" value=""></td>
							</tr>
							 <tr>
								<td>Transtornos del sueño</td>
								 <td>
									<input class="antecedentes" id="tb8_5_elemento_si_4" type="radio"  name="tb8_5_elemento_4" value="si">
									<label class="radio" for="tb8_5_elemento_si_4" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_5_elemento_no_4" type="radio"  name="tb8_5_elemento_4" value="no" checked>
									<label class="radio" for="tb8_5_elemento_no_4" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_5_quienes_4" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_5_edad_inicio_4" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_5_observaciones_4" value=""></td>
							</tr>
							 <tr>
								<td>Transtornos de alimentacion</td>
								 <td>
									<input class="antecedentes" id="tb8_5_elemento_si_5" type="radio"  name="tb8_5_elemento_5" value="si">
									<label class="radio" for="tb8_5_elemento_si_5" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_5_elemento_no_5" type="radio"  name="tb8_5_elemento_5" value="no" checked>
									<label class="radio" for="tb8_5_elemento_no_5" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_5_quienes_5" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_5_edad_inicio_5" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_5_observaciones_5" value=""></td>
							</tr>
							 <tr>
								<td>Transtornos psicosomaticos</td>
								 <td>
									<input class="antecedentes" id="tb8_5_elemento_si_6" type="radio"  name="tb8_5_elemento_6" value="si">
									<label class="radio" for="tb8_5_elemento_si_6" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_5_elemento_no_6" type="radio"  name="tb8_5_elemento_6" value="no" checked>
									<label class="radio" for="tb8_5_elemento_no_6" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_5_quienes_6" value=""></td>
								<td><input class="antecedentes" type="text" name="tb8_5_edad_inicio_6" value=""></td>
								<td><input class="ante_obser" type="text" name="tb8_5_observaciones_6" value=""></td>
							</tr>
						</tbody>
					</table>
				<input class="error" type="text" id="error" value="Hay un Error" required pattern="true">
				</div>
				<div class="spacey0"></div>
				<div class="">
					<button type="submit" class="button next">Siguiente</button>
				</div>
			</div>
		</form>
	</main>
	<script src="http://localhost/instituto/static/js/jquery-3.3.1.js"></script>
	<script src="http://localhost/instituto/static/js/bootstrap.js"></script>
	<script src="http://localhost/instituto/static/js/funciones.js"></script>
</body>
</html>