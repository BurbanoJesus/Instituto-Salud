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
		$checked_si = ''; 
		$checked_no = 'checked'; 
		$quienes = Null;
		$edad_inicio = Null;
		$frecuencia = Null;
		$observaciones = Null;
		$id_visita = 1;
		$cont = 1;
		$id_familia = $_SESSION['id_familia_consulta'];
			
		$bd = conectar();
		$sql = "SELECT id_familia,id_integrante,nombre_tabla,nombre_elemento,edad_inicio,frecuencia,observaciones FROM antecedentes join integrantes USING(id_integrante) WHERE id_familia = '$id_familia'";
		$query = $bd->query($sql);
		while ($row = $query->fetch_object()) {
			$collect[] = $row;
		}

		if (!$query) echo $bd->error;
		if ($query->num_rows == 0) {
			echo "<div class='registro_non'>";
	        echo "<p>No Existen Registros de Estadisticas Vitales en esta Familia</p>";
	        echo "<button type='button' class='button next block' onclick='window.location=\"estadisticas.php\"'>Siguiente</button>";
	        echo "</div>";
		}
		else{
		
			
		?>
		<form id="form10" action="/instituto/core/consultas/s_antecedentes.php" method="POST">
			<div class="divh1">
				<h1>Antecedentes en Salud Mental</h1>
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
						 	<?php 
						 	$sql_e = "SELECT * FROM integrantes WHERE id_familia = '$id_familia' ORDER BY cod_integrante";
							$query_e = $bd->query($sql_e);
							if (!$query) echo $bd->error;
							?>
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
								while ($row_e = $query_e->fetch_object()) { 
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
										<?php echo $row_e->nombres?>
									 </td>
									 <td><?php echo $row_e->edad_anos?></td>
								 </tr>
							<?php 
								$cont++;
								} ?>
						 </tbody>
					 </table>
					 <div id="ident"></div>
					 <button type="button" class="button_add">Ver Mas</button>
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
								<?php

								function buscar_elemento($elemento)
								{	
									global $collect;
									global $bd;
									global $quienes;
									global $edad_inicio;
									global $frecuencia;
									global $observaciones;
									global $checked_si;
									global $checked_no;
									global $flag;
									foreach ($collect as $key => $value){
										if ($value->nombre_elemento == $elemento) {
											$checked_si = 'checked'; 
											$checked_no = ''; 
											$sql = "SELECT cod_integrante FROM integrantes WHERE id_integrante = '$value->id_integrante'";
											$query = $bd->query($sql);
											$cod_integrante = $query->fetch_row();
											$quienes = (array) $quienes;
											$edad_inicio = (array) $edad_inicio;
											$frecuencia = (array) $frecuencia;
											$observaciones = (array) $observaciones;
											$quienes[] = $cod_integrante[0];
											$edad_inicio[] = $value->edad_inicio;
											$frecuencia[] = $value->frecuencia;
											$observaciones[] = $value->observaciones;
											$flag = true;
										} 
									}
									if ($flag == true) {
										$quienes = implode(',', $quienes);
										$edad_inicio = implode(',', $edad_inicio);
										$frecuencia = implode(',', $frecuencia);
										$observaciones = implode(',', $observaciones);
										$flag = false;
									}
									else{
										$quienes = null;
										$edad_inicio = null;
										$frecuencia = null;
										$observaciones = null;
										$checked_si = ''; 
										$checked_no = 'checked'; 
									}
								}
								?>
							<tr>
								<?php  buscar_elemento('Cigarrillo');?>
								<td>Cigarrillo</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_si_1" type="radio"  name="tb8_1_elemento_1" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_1_elemento_si_1" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_no_1" type="radio"  name="tb8_1_elemento_1" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_1_elemento_no_1" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_1_quienes_1" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_1_edad_inicio_1" value="<?php echo $edad_inicio?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_1_frecuencia_consumo_1" value="<?php echo $frecuencia?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_1_observaciones_1" value="<?php echo $observaciones?>"></td>
							</tr>

							<tr>
								<?php buscar_elemento('Alcohol');?>
								<td>Alcohol</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_si_2" type="radio"  name="tb8_1_elemento_2" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_1_elemento_si_2" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_no_2" type="radio"  name="tb8_1_elemento_2" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_1_elemento_no_2" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_1_quienes_2" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_1_edad_inicio_2" value="<?php echo $edad_inicio?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_1_frecuencia_consumo_2" value="<?php echo $frecuencia?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_1_observaciones_2" value="<?php echo $observaciones?>"></td>
							</tr>
							<tr>
								<?php buscar_elemento('Marihuana');?>
								<td>Marihuana</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_si_3" type="radio"  name="tb8_1_elemento_3" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_1_elemento_si_3" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_no_3" type="radio"  name="tb8_1_elemento_3" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_1_elemento_no_3" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_1_quienes_3" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_1_edad_inicio_3" value="<?php echo $edad_inicio?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_1_frecuencia_consumo_3" value="<?php echo $frecuencia?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_1_observaciones_3" value="<?php echo $observaciones?>"></td>
							</tr>
							<tr>
								<?php buscar_elemento('Bazuco');?>
								<td>Bazuco</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_si_4" type="radio"  name="tb8_1_elemento_4" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_1_elemento_si_4" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_no_4" type="radio"  name="tb8_1_elemento_4" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_1_elemento_no_4" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_1_quienes_4" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_1_edad_inicio_4" value="<?php echo $edad_inicio?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_1_frecuencia_consumo_4" value="<?php echo $frecuencia?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_1_observaciones_4" value="<?php echo $observaciones?>"></td>
							</tr>
							 <tr>
							 	<?php buscar_elemento('Heroina');?>
								<td>Heroina</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_si_5" type="radio"  name="tb8_1_elemento_5" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_1_elemento_si_5" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_no_5" type="radio"  name="tb8_1_elemento_5" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_1_elemento_no_5" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_1_quienes_5" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_1_edad_inicio_5" value="<?php echo $edad_inicio?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_1_frecuencia_consumo_5" value="<?php echo $frecuencia?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_1_observaciones_5" value="<?php echo $observaciones?>"></td>
							</tr>
							<tr>
								<?php buscar_elemento('Cocaina');?>
								<td>Cocaina</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_si_6" type="radio"  name="tb8_1_elemento_6" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_1_elemento_si_6" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_no_6" type="radio"  name="tb8_1_elemento_6" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_1_elemento_no_6" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_1_quienes_6" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_1_edad_inicio_6" value="<?php echo $edad_inicio?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_1_frecuencia_consumo_6" value="<?php echo $frecuencia?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_1_observaciones_6" value="<?php echo $observaciones?>"></td>
							</tr>
							 <tr>
							 	<?php buscar_elemento('Otros');?>
								<td>Otros</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_si_7" type="radio"  name="tb8_1_elemento_7" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_1_elemento_si_7" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_1_elemento_no_7" type="radio"  name="tb8_1_elemento_7" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_1_elemento_no_7" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_1_quienes_7" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_1_edad_inicio_7" value="<?php echo $edad_inicio?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_1_frecuencia_consumo_7" value="<?php echo $frecuencia?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_1_observaciones_7" value="<?php echo $observaciones?>"></td>
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
								<?php buscar_elemento('Intento de Suicidio');?>
								<td>Intento de Suicidio</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_si_1" type="radio"  name="tb8_2_elemento_1" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_2_elemento_si_1" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_1" type="radio"  name="tb8_2_elemento_1" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_2_elemento_no_1" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_1" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_1" value="<?php echo $edad_inicio?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_1" value="<?php echo $observaciones?>"></td>
							</tr>
							 <tr>
							 	<?php buscar_elemento('Suicidio');?>
								<td>Suicidio</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_si_2" type="radio"  name="tb8_2_elemento_2" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_2_elemento_si_2" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_2" type="radio"  name="tb8_2_elemento_2" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_2_elemento_no_2" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_2" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_2" value="<?php echo $edad_inicio?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_2" value="<?php echo $observaciones?>"></td>
							</tr>
							 <tr>
							 	<?php buscar_elemento('Transtornos del afecto');?>
								<td>Transtornos del afecto</td>
							<td>
									<input class="antecedentes" id="tb8_2_elemento_si_3" type="radio"  name="tb8_2_elemento_3" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_2_elemento_si_3" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_3" type="radio"  name="tb8_2_elemento_3" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_2_elemento_no_3" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_3" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_3" value="<?php echo $edad_inicio?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_3" value="<?php echo $observaciones?>"></td>
							</tr>
							 <tr>
							 	<?php buscar_elemento('Transtornos del pensamiento');?>
								<td>Transtornos del pensamiento</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_si_4" type="radio"  name="tb8_2_elemento_4" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_2_elemento_si_4" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_4" type="radio"  name="tb8_2_elemento_4" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_2_elemento_no_4" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_4" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_4" value="<?php echo $edad_inicio?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_4" value="<?php echo $observaciones?>"></td>
							</tr>
							 <tr>
							 	<?php buscar_elemento('Transtornos del desarrollo');?>
								<td>Transtornos del desarrollo</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_si_5" type="radio"  name="tb8_2_elemento_5" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_2_elemento_si_5" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_5" type="radio"  name="tb8_2_elemento_5" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_2_elemento_no_5" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_5" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_5" value="<?php echo $edad_inicio?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_5" value="<?php echo $observaciones?>"></td>
							</tr>
							 <tr>
							 	<?php buscar_elemento('Transtornos organicos');?>
								<td>Transtornos organicos</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_si_6" type="radio"  name="tb8_2_elemento_6" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_2_elemento_si_6" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_6" type="radio"  name="tb8_2_elemento_6" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_2_elemento_no_6" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_6" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_6" value="<?php echo $edad_inicio?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_6" value="<?php echo $observaciones?>"></td>
							</tr>
							<tr>
								<?php buscar_elemento('Sintomas de ansiedad');?>
								<td>Sintomas de ansiedad</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_si_7" type="radio"  name="tb8_2_elemento_7" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_2_elemento_si_7" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_7" type="radio"  name="tb8_2_elemento_7" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_2_elemento_no_7" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_7" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_7" value="<?php echo $edad_inicio?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_7" value="<?php echo $observaciones?>"></td>
							</tr>
							<tr>
								<?php buscar_elemento('Tristeza generalizada');?>
								<td>Tristeza generalizada</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_si_8" type="radio"  name="tb8_2_elemento_8" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_2_elemento_si_8" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_8" type="radio"  name="tb8_2_elemento_8" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_2_elemento_no_8" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_8" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_8" value="<?php echo $edad_inicio?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_8" value="<?php echo $observaciones?>"></td>
							</tr>
							<tr>
								<?php buscar_elemento('Stress');?>
								<td>Stress</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_si_9" type="radio"  name="tb8_2_elemento_9" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_2_elemento_si_9" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_9" type="radio"  name="tb8_2_elemento_9" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_2_elemento_no_9" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_9" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_9" value="<?php echo $edad_inicio?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_9" value="<?php echo $observaciones?>"></td>
							</tr>
							<tr>
								<?php buscar_elemento('Otro Cual(es)?');?>
								<td>Otro Cual(es)?</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_si_10" type="radio"  name="tb8_2_elemento_10" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_2_elemento_si_10" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_2_elemento_no_10" type="radio"  name="tb8_2_elemento_10" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_2_elemento_no_10" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_2_quienes_10" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_2_edad_inicio_10" value="<?php echo $edad_inicio?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_2_observaciones_10" value="<?php echo $observaciones?>"></td>
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
								<?php buscar_elemento('Maltrato Infantil');?>
								<td>Maltrato Infantil</td>
								<td>
									<input class="antecedentes" id="tb8_3_elemento_si_1" type="radio"  name="tb8_3_elemento_1" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_3_elemento_si_1" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_3_elemento_no_1" type="radio"  name="tb8_3_elemento_1" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_3_elemento_no_1" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_3_quienes_1" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_3_edad_inicio_1" value="<?php echo $edad_inicio?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_3_frecuencia_consumo_1" value="<?php echo $frecuencia?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_3_observaciones_1" value="<?php echo $observaciones?>"></td>
							</tr>
							 <tr>
							 	<?php buscar_elemento('Violencia conyugal');?>
								<td>Violencia conyugal</td>
								<td>
									<input class="antecedentes" id="tb8_3_elemento_si_2" type="radio"  name="tb8_3_elemento_2" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_3_elemento_si_2" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_3_elemento_no_2" type="radio"  name="tb8_3_elemento_2" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_3_elemento_no_2" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_3_quienes_2" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_3_edad_inicio_2" value="<?php echo $edad_inicio?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_3_frecuencia_consumo_2" value="<?php echo $frecuencia?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_3_observaciones_2" value="<?php echo $observaciones?>"></td>
							</tr>
							 <tr>
							 	<?php buscar_elemento('Violencia Parental');?>
								<td>Violencia Parental</td>
								<td>
									<input class="antecedentes" id="tb8_3_elemento_si_3" type="radio"  name="tb8_3_elemento_3" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_3_elemento_si_3" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_3_elemento_no_3" type="radio"  name="tb8_3_elemento_3" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_3_elemento_no_3" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_3_quienes_3" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_3_edad_inicio_3" value="<?php echo $edad_inicio?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_3_frecuencia_consumo_3" value="<?php echo $frecuencia?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_3_observaciones_3" value="<?php echo $observaciones?>"></td>
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
								<?php buscar_elemento('Acoso sexual');?>
								<td>Acoso sexual</td>
								<td>
									<input class="antecedentes" id="tb8_4_elemento_si_1" type="radio"  name="tb8_4_elemento_1" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_4_elemento_si_1" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_4_elemento_no_1" type="radio"  name="tb8_4_elemento_1" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_4_elemento_no_1" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_4_quienes_1" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_4_edad_inicio_1" value="<?php echo $edad_inicio?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_4_frecuencia_consumo_1" value="<?php echo $frecuencia?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_4_observaciones_1" value="<?php echo $observaciones?>"></td>
							</tr>
							 <tr>
							 	<?php buscar_elemento('Abuso sexual');?>
								<td>Abuso sexual</td>
								<td>
									<input class="antecedentes" id="tb8_4_elemento_si_2" type="radio"  name="tb8_4_elemento_2" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_4_elemento_si_2" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_4_elemento_no_2" type="radio"  name="tb8_4_elemento_2" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_4_elemento_no_2" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_4_quienes_2" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_4_edad_inicio_2" value="<?php echo $edad_inicio?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_4_frecuencia_consumo_2" value="<?php echo $frecuencia?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_4_observaciones_2" value="<?php echo $observaciones?>"></td>
							</tr>
							 <tr>
							 	<?php buscar_elemento('Maltrato sexual');?>
								<td>Maltrato sexual</td>
								<td>
									<input class="antecedentes" id="tb8_4_elemento_si_3" type="radio"  name="tb8_4_elemento_3" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_4_elemento_si_3" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_4_elemento_no_3" type="radio"  name="tb8_4_elemento_3" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_4_elemento_no_3" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_4_quienes_3" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_4_edad_inicio_3" value="<?php echo $edad_inicio?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_4_frecuencia_consumo_3" value="<?php echo $frecuencia?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_4_observaciones_3" value="<?php echo $observaciones?>"></td>
							</tr>
							 <tr>
							 	<?php buscar_elemento('Prostitucion / Pornografia');?>
								<td>Prostitucion / Pornografia</td>
								<td>
									<input class="antecedentes" id="tb8_4_elemento_si_4" type="radio"  name="tb8_4_elemento_4" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_4_elemento_si_4" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_4_elemento_no_4" type="radio"  name="tb8_4_elemento_4" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_4_elemento_no_4" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_4_quienes_4" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_4_edad_inicio_4" value="<?php echo $edad_inicio?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_4_frecuencia_consumo_4" value="<?php echo $frecuencia?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_4_observaciones_4" value="<?php echo $observaciones?>"></td>
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
								<?php buscar_elemento('Duelos no resueltos');?>
								<td>Duelos no resueltos</td>
								<td>
									<input class="antecedentes" id="tb8_5_elemento_si_1" type="radio"  name="tb8_5_elemento_1" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_5_elemento_si_1" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_5_elemento_no_1" type="radio"  name="tb8_5_elemento_1" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_5_elemento_no_1" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_5_quienes_1" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_5_edad_inicio_1" value="<?php echo $edad_inicio?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_5_observaciones_1" value="<?php echo $observaciones?>"></td>
							</tr>
							 <tr>
							 	<?php buscar_elemento('Ansiedad generalizada');?>
								<td>Ansiedad generalizada</td>
								<td>
									<input class="antecedentes" id="tb8_5_elemento_si_2" type="radio"  name="tb8_5_elemento_2" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_5_elemento_si_2" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_5_elemento_no_2" type="radio"  name="tb8_5_elemento_2" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_5_elemento_no_2" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_5_quienes_2" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_5_edad_inicio_2" value="<?php echo $edad_inicio?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_5_observaciones_2" value="<?php echo $observaciones?>"></td>
							</tr>
							 <tr>
							 	<?php buscar_elemento('Ataques de panico');?>
								<td>Ataques de panico</td>
								<td>
									<input class="antecedentes" id="tb8_5_elemento_si_3" type="radio"  name="tb8_5_elemento_3" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_5_elemento_si_3" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_5_elemento_no_3" type="radio"  name="tb8_5_elemento_3" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_5_elemento_no_3" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_5_quienes_3" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_5_edad_inicio_3" value="<?php echo $edad_inicio?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_5_observaciones_3" value="<?php echo $observaciones?>"></td>
							</tr>
							 <tr>
							 	<?php buscar_elemento('Transtornos del sueño');?>
								<td>Transtornos del sueño</td>
								<td>
									<input class="antecedentes" id="tb8_5_elemento_si_4" type="radio"  name="tb8_5_elemento_4" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_5_elemento_si_4" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_5_elemento_no_4" type="radio"  name="tb8_5_elemento_4" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_5_elemento_no_4" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_5_quienes_4" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_5_edad_inicio_4" value="<?php echo $edad_inicio?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_5_observaciones_4" value="<?php echo $observaciones?>"></td>
							</tr>
							 <tr>
							 	<?php buscar_elemento('Transtornos de alimentacion');?>
								<td>Transtornos de alimentacion</td>
								<td>
									<input class="antecedentes" id="tb8_5_elemento_si_5" type="radio"  name="tb8_5_elemento_5" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_5_elemento_si_5" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_5_elemento_no_5" type="radio"  name="tb8_5_elemento_5" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_5_elemento_no_5" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_5_quienes_5" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_5_edad_inicio_5" value="<?php echo $edad_inicio?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_5_observaciones_5" value="<?php echo $observaciones?>"></td>							</tr>
							 <tr>
							 	<?php buscar_elemento('Transtornos psicosomaticos');?>
								<td>Transtornos psicosomaticos</td>
								<td>
									<input class="antecedentes" id="tb8_5_elemento_si_6" type="radio"  name="tb8_5_elemento_6" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb8_5_elemento_si_6" ></label>
								</td>
								<td>
									<input class="antecedentes" id="tb8_5_elemento_no_6" type="radio"  name="tb8_5_elemento_6" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb8_5_elemento_no_6" ></label>
								</td>
								<td><input class="antecedentes" type="text" name="tb8_5_quienes_6" value="<?php echo $quienes?>"></td>
								<td><input class="antecedentes" type="text" name="tb8_5_edad_inicio_6" value="<?php echo $edad_inicio?>"></td>
								<td><input class="ante_obser" type="text" name="tb8_5_observaciones_6" value="<?php echo $observaciones?>"></td>
							</tr>
						</tbody>
					</table>
				<input class="error" type="text" id="error" value="true" required pattern="true">
				</div>
				<div class="spacey0"></div>
			</div>
			<button type="button" class="button next" onclick="window.location='estadisticas.php'">Siguiente</button>
		</form>
	</main>
	<?php } ?>
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
			<li class="active" onclick="window.location='antecedentes.php'"><label>Antece..<div class="info_tb">Antecedentes en Salud Mental</div></label></li>
			<li onclick="window.location='estadisticas.php'"><label>Estadi..<div class="info_tb">Estadisticas Vitales</div></label></li>
			<li onclick="window.location='condiciones_sanitarias.php'"><label>Condici..<div class="info_tb">Condiciones Sanitarias</div></label></li>
			<li onclick="window.location='observaciones.php'"><label>Observa..<div class="info_tb">Observaciones</div></label></li>
		</ul>
	</div>
	<script src="http://localhost/instituto/static/js/jquery-3.3.1.js"></script>
	<script src="http://localhost/instituto/static/js/bootstrap.js"></script>
	<script src="http://localhost/instituto/static/js/funciones.js"></script>
</body>
</html>