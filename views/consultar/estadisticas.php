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

	require $_SERVER['DOCUMENT_ROOT']."/instituto/application/database/conexion.php";
	$bd = conectar();
	$id_familia = $_SESSION['id_familia_consulta'];
	
	$sql = "SELECT nombres,id_familia FROM `estadis_morbilidad` WHERE id_familia = '$id_familia' UNION SELECT nombres,id_familia FROM `estadis_mortalidad` WHERE id_familia = '$id_familia' UNION SELECT nombres,id_familia FROM `estadis_NACIDOS` WHERE id_familia = '$id_familia' ";
	$query = $bd->query($sql);
	if (!$query) echo $bd->error;
	if ($query->num_rows == 0) {
		echo "<div class='registro_non'>";
        echo "<p>No Existen Registros de Estadisticas Vitales en esta Familia</p>";
        echo "<button type='button' class='button next block' onclick='window.location=\"condiciones_sanitarias.php\"'>Siguiente</button>";
        echo "</div>";
	}
	else{

	?>
	<main>
		<form id="form11" action="/instituto/core/consultas/s_estadisticas.php" method="POST">
			<div class="divh1">
				<h1>Estadisticas Vitales</h1>
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
					<div class="tr estadisticas">
						<label class="bg_morado br_morado">Nacidos Vivos - Ultimo Año</label>
					</div>
					<table id="tb9_1_nacidos" class="tb9_1_sig">
						<thead>
							<?php 
							$sql_e = "SELECT parto_atendido_otro FROM estadis_nacidos WHERE id_familia = '$id_familia'";
							$query_e = $bd->query($sql_e); 
							if (!$query_e) echo $bd->error;
							$row_e = $query_e->fetch_object();
							?>
							<tr>
								<th colspan="2" rowspan="2">Nombres y Apellidos</th>
								<th colspan="2">Sexo</th>
								<th colspan="1" rowspan="2">Edad</th>
								<th colspan="2">Registrado</th>
								<th colspan="1" rowspan="2" class="table_info">
									Parto atendido por
									<div class="info">
										<label><div class="ico">i</div></label><span>Atendido Por:</span>
										<label>1</label><span>Medico</span>
										<label>2</label><span>Enfermera</span>
										<label>3</label><span>Auxiliar de Enfermeria</span>
										<label>4</label><span>Promotora</span>
										<label>5</label><span>Odontologia</span>
										<label>6</label><span>Partera</span>
										<label>7</label><span>Nadie</span>
										<label>8</label><span>Familiar y/o conocido</span>
										<label>9</label><span>Medico Tradicional</span>
										<label>10</label><span class="otros_tb_info">Otro: <input type="text" name="tb9_1_otra_persona" value="<?php echo $row_e->parto_atendido_otro?>"/></span>
									</div>
									<div class="ico">i</div>

								</th>
								<th colspan="1" rowspan="2">Dia</th>
								<th colspan="1" rowspan="2">Mes</th>
								<th colspan="1" rowspan="2">Año</th>
							</tr>
							<tr>
								<th>M</th>
								<th>F</th>
								<th>Si</th>
								<th>No</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							
							$sql = "SELECT * FROM estadis_nacidos WHERE id_familia = '$id_familia'";
							$query = $bd->query($sql);
							if (!$query) echo $bd->error;
							$cont = 1;
							if ($query->num_rows > 0) {
								while ($row = $query->fetch_object()){						 
							?>
							<tr>
								<td><?php echo $cont?></td>
								<td><input type="text" name="tb9_1_nombres_<?php echo $cont?>" value="<?php echo $row->nombres?>"></td>
								<?php 
									if ($row->sexo == 'M') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb9_1_sexo_si_<?php echo $cont?>" type="radio"  name="tb9_1_sexo_<?php echo $cont?>" value="M" <?php echo $checked_si?> >
									<label class="radio" for="tb9_1_sexo_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb9_1_sexo_no_<?php echo $cont?>" type="radio"  name="tb9_1_sexo_<?php echo $cont?>" value="F" <?php echo $checked_no?> >
									<label class="radio" for="tb9_1_sexo_no_<?php echo $cont?>" ></label>
								</td>
								<td><input type="number" name="tb9_1_edad_<?php echo $cont?>" value="<?php echo $row->edad?>"></td>
								<?php 
									if ($row->registrado == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb9_1_registrado_si_<?php echo $cont?>" type="radio"  name="tb9_1_registrado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb9_1_registrado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb9_1_registrado_no_<?php echo $cont?>" type="radio"  name="tb9_1_registrado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb9_1_registrado_no_<?php echo $cont?>" ></label>
								</td>
								<td><input type="number" name="tb9_1_parto_atendido_por_<?php echo $cont?>" value="<?php echo $row->parto_atendido_por?>"></td>
								<td><input type="number" name="tb9_1_dia_<?php echo $cont?>" value="<?php echo $row->parto_fecha_d?>"></td>
								<td><input type="number" name="tb9_1_mes_<?php echo $cont?>" value="<?php echo $row->parto_fecha_m?>"></td>
								<td><input type="number" name="tb9_1_año_<?php echo $cont?>" value="<?php echo $row->parto_fecha_a?>"></td>
							</tr>
							<?php 
								$cont++; 
								} 
							}else{
							?>
							<tr>
								<td>1</td>
								<td><input type="text" name="tb9_1_nombres_1" value=""></td>

								<td>
									<input id="tb9_1_sexo_si_1" type="radio"  name="tb9_1_sexo_1" value="M" checked>
									<label class="radio" for="tb9_1_sexo_si_1" ></label>
								</td>
								<td>
									<input id="tb9_1_sexo_no_1" type="radio"  name="tb9_1_sexo_1" value="F">
									<label class="radio" for="tb9_1_sexo_no_1" ></label>
								</td>
								<td><input type="number" name="tb9_1_edad_1" value=""></td>
								
								<td>
									<input id="tb9_1_registrado_si_1" type="radio"  name="tb9_1_registrado_1" value="si" checked>
									<label class="radio" for="tb9_1_registrado_si_1" ></label>
								</td>
								<td>
									<input id="tb9_1_registrado_no_1" type="radio"  name="tb9_1_registrado_1" value="no">
									<label class="radio" for="tb9_1_registrado_no_1" ></label>
								</td>
								<td><input type="number" name="tb9_1_parto_atendido_por_1" value=""></td>
								<td><input type="number" name="tb9_1_dia_1" value=""></td>
								<td><input type="number" name="tb9_1_mes_1" value=""></td>
								<td><input type="number" name="tb9_1_año_1" value=""></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
					<div class="tr estadisticas">
						<label class="bg_morado br_morado">Mortalidad - Ultimo Año</label>
					</div>

					 <table id="tb9_2_mortalidad" class="tb9_2_sig">
						<thead>
							 <tr>
								<th colspan="2" rowspan="2">Nombres y Apellidos</th>
								<th colspan="2">Sexo</th>
								<th colspan="1" rowspan="2">Edad</th>
								<th colspan="1" rowspan="2">Causa</th>
								<th colspan="1" rowspan="2">Codigo CIE - 10</th>
								<th colspan="1" rowspan="2">Dia</th>
								<th colspan="1" rowspan="2">Mes</th>
								<th colspan="1" rowspan="2">Año</th>
							</tr>
							<tr>
								<th>M</th>
								<th>F</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							mysqli_data_seek($query, 0);
							$sql = "SELECT * FROM estadis_mortalidad WHERE id_familia = '$id_familia'";
							$query = $bd->query($sql);
							if (!$query) echo $bd->error;
							$cont = 1;
							if ($query->num_rows > 0) {
								while ($row = $query->fetch_object()){			 
							?>
							<tr>
								<td><?php echo $cont?></td>
								<td><input type="text" name="tb9_2_nombres_<?php echo $cont?>" value="<?php echo $row->nombres?>"></td>
								<?php 
									if ($row->sexo == 'M') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb9_2_sexo_si_<?php echo $cont?>" type="radio"  name="tb9_2_sexo_<?php echo $cont?>" value="M" <?php echo $checked_si?> >
									<label class="radio" for="tb9_2_sexo_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb9_2_sexo_no_<?php echo $cont?>" type="radio"  name="tb9_2_sexo_<?php echo $cont?>" value="F" <?php echo $checked_no?> >
									<label class="radio" for="tb9_2_sexo_no_<?php echo $cont?>" ></label>
								</td>
								<td><input type="number" name="tb9_2_edad_<?php echo $cont?>" value="<?php echo $row->edad?>"></td>
								<td><input type="text" name="tb9_2_causa_<?php echo $cont?>" value="<?php echo $row->causa?>"></td>
								<td><input type="text" name="tb9_2_codigo_cie_<?php echo $cont?>" value="<?php echo $row->codigo_cie10?>"></td>
								<td><input type="number" name="tb9_2_dia_<?php echo $cont?>" value="<?php echo $row->parto_fecha_d?>"></td>
								<td><input type="number" name="tb9_2_mes_<?php echo $cont?>" value="<?php echo $row->parto_fecha_m?>"></td>
								<td><input type="number" name="tb9_2_año_<?php echo $cont?>" value="<?php echo $row->parto_fecha_a?>"></td>
							</tr> 
							<?php 
								$cont++; 
								} 
							}else{
							?>
							<tr>
								<td>1</td>
								<td><input type="text" name="tb9_2_nombres_1" value=""></td>

								<td>
									<input id="tb9_2_sexo_si_1" type="radio"  name="tb9_2_sexo_1" value="M" checked>
									<label class="radio" for="tb9_2_sexo_si_1" ></label>
								</td>
								<td>
									<input id="tb9_2_sexo_no_1" type="radio"  name="tb9_2_sexo_1" value="F">
									<label class="radio" for="tb9_2_sexo_no_1" ></label>
								</td>
								<td><input type="number" name="tb9_2_edad_1" value=""></td>
								<td><input type="text" name="tb9_2_causa_1" value=""></td>
								<td><input type="text" name="tb9_2_codigo_cie_1" value=""></td>
								<td><input type="number" name="tb9_2_dia_1" value=""></td>
								<td><input type="number" name="tb9_2_mes_1" value=""></td>
								<td><input type="number" name="tb9_2_año_1" value=""></td>
							</tr> 
						<?php } ?>
						</tbody>
					</table>
					<div class="tr estadisticas">
						<label class="bg_morado br_morado">Morbilidad Sentida</label>
					</div>
					<table id="tb9_3_morbilidad" class="tb9_3_sig">
						<thead>
							 <tr>
								<th colspan="2" rowspan="2">Nombres y Apellidos</th>
								<th colspan="2">Sexo</th>
								<th colspan="1" rowspan="2">Edad</th>
								<th colspan="1" rowspan="2">Causa</th>
								<th colspan="1" rowspan="2">Codigo CIE - 10</th>
							</tr>
							<tr>
								<th>M</th>
								<th>F</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							mysqli_data_seek($query, 0);
							$sql = "SELECT * FROM estadis_morbilidad WHERE id_familia = '$id_familia'";
							$query = $bd->query($sql);
							if (!$query) echo $bd->error;
							$cont = 1;
							if ($query->num_rows > 0) {
								while ($row = $query->fetch_object()){						 
							?>
							<tr>
								<td><?php echo $cont?></td>
								<td><input type="text" name="tb9_3_nombres_<?php echo $cont?>" value="<?php echo $row->nombres?>"></td>
								<?php 
									if ($row->sexo == 'M') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb9_3_sexo_si_<?php echo $cont?>" type="radio"  name="tb9_3_sexo_<?php echo $cont?>" value="M" <?php echo $checked_si?> >
									<label class="radio" for="tb9_3_sexo_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb9_3_sexo_no_<?php echo $cont?>" type="radio"  name="tb9_3_sexo_<?php echo $cont?>" value="F" <?php echo $checked_no?> >
									<label class="radio" for="tb9_3_sexo_no_<?php echo $cont?>" ></label>
								</td>
								<td><input type="number" name="tb9_3_edad_<?php echo $cont?>" value="<?php echo $row->edad?>"></td>
								<td><input type="text" name="tb9_3_causa_<?php echo $cont?>" value="<?php echo $row->causa?>"></td>
								<td><input type="text" name="tb9_3_codigo_cie_<?php echo $cont?>" value="<?php echo $row->codigo_cie10?>"></td>
							</tr>
						<?php 
								$cont++; 
								} 
							}else{
							?>
							<tr>
								<td>1</td>
								<td><input type="text" name="tb9_3_nombres_1" value=""></td>

								<td>
									<input id="tb9_3_sexo_si_1" type="radio"  name="tb9_3_sexo_1" value="M" checked>
									<label class="radio" for="tb9_3_sexo_si_1" ></label>
								</td>
								<td>
									<input id="tb9_3_sexo_no_1" type="radio"  name="tb9_3_sexo_1" value="F">
									<label class="radio" for="tb9_3_sexo_no_1" ></label>
								</td>
								<td><input type="number" name="tb9_3_edad_1" value=""></td>
								<td><input type="text" name="tb9_3_causa_1" value=""></td>
								<td><input type="text" name="tb9_3_codigo_cie_1" value=""></td>
							</tr>
						<?php } ?>						
						</tbody>
					</table>
				</div>
				<div class="spacey0"></div>
			</div>
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
			<li onclick="window.location='antecedentes.php'"><label>Antece..<div class="info_tb">Antecedentes en Salud Mental</div></label></li>
			<li class="active" onclick="window.location='estadisticas.php'"><label>Estadi..<div class="info_tb">Estadisticas Vitales</div></label></li>
			<li onclick="window.location='condiciones_sanitarias.php'"><label>Condici..<div class="info_tb">Condiciones Sanitarias</div></label></li>
			<li onclick="window.location='observaciones.php'"><label>Observa..<div class="info_tb">Observaciones</div></label></li>
		</ul>
	</div>
	<script src="http://localhost/instituto/static/js/jquery-3.3.1.js"></script>
	<script src="http://localhost/instituto/static/js/bootstrap.js"></script>
	<script src="http://localhost/instituto/static/js/funciones.js"></script>
</body>
</html>
