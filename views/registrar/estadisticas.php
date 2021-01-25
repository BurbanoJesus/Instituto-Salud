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
		<form id="form11" action="/instituto/core/registro/s_estadisticas.php" method="POST">
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
			
			$sql = "SELECT nombres,id_familia FROM `estadis_morbilidad` WHERE id_familia = '$id_familia' UNION SELECT nombres,id_familia FROM `estadis_mortalidad` WHERE id_familia = '$id_familia' UNION SELECT nombres,id_familia FROM `estadis_NACIDOS` WHERE id_familia = '$id_familia' ";
			$query = $bd->query($sql);

			if (!$query) echo $bd->error;
			if ($query->num_rows > 0) {
				echo 'No hay registros o ya se registro';
				header("location: /instituto/views/registrar/condiciones_sanitarias.php");
				return False;
			}
			?>
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
					<table id="tb9_1_nacidos" class="tb9_1_pri">
						<thead>
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
										<label>10</label><span class="otros_tb_info">Otro: <input type="text" name="tb9_1_otra_persona" value=""/></span>
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
						</tbody>
					</table>
					<button type="button" class="button_add">Agregar Fila</button>
					<div class="tr estadisticas">
						<label class="bg_morado br_morado">Mortalidad - Ultimo Año</label>
					</div>

					 <table id="tb9_2_mortalidad" class="tb9_2_pri">
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
						</tbody>
					</table>
					<button type="button" class="button_add">Agregar Fila</button>
					<div class="tr estadisticas">
						<label class="bg_morado br_morado">Morbilidad Sentida</label>
					</div>
					<table id="tb9_3_morbilidad" class="tb9_3_pri">
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
							 
						
						</tbody>
					</table>
					<button type="button" class="button_add">Agregar Fila</button>
				</div>
				<div class="spacey0"></div>
				<div class="block">
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
