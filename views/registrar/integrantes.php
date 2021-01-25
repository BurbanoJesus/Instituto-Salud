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
		<form id="form3" action="/instituto/core/registro/s_integrantes.php" method="POST">
			<?php
				require $_SERVER['DOCUMENT_ROOT']."/instituto/application/verificar_sesion.php";
				require $_SERVER['DOCUMENT_ROOT']."/instituto/application/database/conexion.php";
				$bd = conectar();
				$_SESSION['id_familia'] = '1';
				$id_familia = $_SESSION['id_familia'];
				$sql = "SELECT * FROM integrantes WHERE id_familia = '$id_familia'";
				$query = $bd->query($sql);
			
				if (!$query) echo $bd->error;
				if ($query->num_rows != 0) {
					echo 'No hay registros';
					header("location: /instituto/views/registrar/menores_a_1.php");
					return False;
				}
			 ?>
			<div class="divh1">
				<h1>Personas Integrantes de la Familia</h1>
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
					<table id="tb1_integrantes" class="tb1_pri">
						<thead>
							<tr>
								<th colspan="2" id="none"></th>
								<th colspan="3">Fecha Nacimiento</th>
								<th colspan="3">Edad</th>
								<th colspan="2">Sexo</th>
								<th rowspan="2" class="table_info"><div class="ico">i</div>Parentesco Familiar
									<div class="info">
										<label><div class="ico">i</div></label><span>Parentesco Familiar</span>
										<label>1</label><span>Jefe(a) de Familia</span>
										<label>2</label><span>Cónyuge o Compañero(a)</span>
										<label>3</label><span>Hijo(a)</span>
										<label>4</label><span>Otros Parientes(Padres, Suegros, Etc)</span>
										<label>5</label><span>Otros Miembros No Parientes</span>
									</div>
								</th>
								<th colspan="2" nowrap >Documento de Identificación</th>
								<th rowspan="2" class="table_info"><div class="ico">i</div>Escolaridad
									<div class="info">
										<label><div class="ico">i</div></label><span>Escolaridad</span>
										<label>1</label><span>No sabe leer ni escribir</span>
										<label>2</label><span>Nunca fue a la escuela pero sabe leer y escribir</span>
										<label>3</label><span>Preescolar</span>
										<label>4</label><span>Primaria Incompleta</span>
										<label>5</label><span>Primaria Completa</span>
										<label>6</label><span>Secundaria Incompleta</span>
										<label>7</label><span>Secundaria Completa</span>
										<label>8</label><span>Técnico o Tecnólogo</span>
										<label>9</label><span>Universitario</span>
									</div>
								</th>
								<th rowspan="2" class="table_info"><div class="ico">i</div>Ocupación
									<div class="info">
										<label><div class="ico">i</div></label><span>Ocupación</span>
										<label>1</label><span>Agricultura</span>
										<label>2</label><span>Minería</span>
										<label>3</label><span>Madera</span>
										<label>4</label><span>Pesca</span>
										<label>5</label><span>Oficios de Hogar</span>
										<label>6</label><span>Estudiando</span>
										<label>7</label><span>Pensionado/Jubilado</span>
										<label>8</label><span>No aplica por edad</span>
										<label>9</label><span>Sin ocupación</span>
										<label>10</label><span class="otros_tb_info">Otra: <input type="text" name="tb1_otra_ocupacion" value=""/></span>
									</div>
								</th>
								<th colspan="2">Vinculación al S.G.S.S.S</th>
								<th rowspan="2" class="table_info"><div class="ico">i</div>Grupo Étnico
									<div class="info">
										<label><div class="ico">i</div></label><span>Grupo Étnico</span>
										<label>1</label><span>Indígenas</span>
										<label>1A</label><span class="otros_tb_info"><input type="text" name="tb1_otro_g_a" value=""/></span>
										<label>1B</label><span class="otros_tb_info"><input type="text" name="tb1_otro_g_b" value=""/></span>
										<label>1C</label><span class="otros_tb_info"><input type="text" name="tb1_otro_g_c" value=""/></span>
										<label>1D</label><span class="otros_tb_info"><input type="text" name="tb1_otro_g_d" value=""/></span>
										<label>1E</label><span class="otros_tb_info"><input type="text" name="tb1_otro_g_e" value=""/></span>
										<label>1F</label><span class="otros_tb_info"><input type="text" name="tb1_otro_g_f" value=""/></span>
										<label>2</label><span>Afrodescendientes</span>
										<label>3</label><span>Mulatos</span>
										<label>4</label><span>Gitanos - ROM</span>
										<label>5</label><span class="otros_tb_info">Otros: <input type="text" name="tb1_otro_grupo_etn" value=""/></span>
									</div>
								</th>
								<th colspan="3">Grupo de Atención Especial</th>
							</tr>
							 <tr>
								<th>Cod.</th>
								<th nowrap>Nombre Y Apellidos</th>
								<th>Dia</th>
								<th>Mes</th>
								<th>Año</th>
								<th>Años</th>
								<th>Meses</th>
								<th>Dias</th>
								<th>M</th>
								<th>F</th>
								<th class="table_info"><div class="ico">i</div>Tipo
									<div class="info">
										<label><div class="ico">i</div></label><span>Tipo de documento de Identificación</span>
										<label>CC</label><span>Cedula de Ciudadanía</span>
										<label>CE</label><span>Cedula de Extranjería</span>
										<label>PA</label><span>Pasaporte</span>
										<label>RC</label><span>Registro Civil</span>
										<label>TI</label><span>Tarjeta de Identidad</span>
										<label>ASI</label><span>Adulto sin Identificación</span>
										<label>MSI</label><span>Menor sin Identificación</span>
									</div>
								</th>
								<th>Numero</th>
								<th class="table_info"><div class="ico">i</div>Tipo de Vinculación
									<div class="info">
										<label><div class="ico">i</div></label><span>Tipo de vinculación al S.G.S.S.S</span>
										<label>1</label><span>Contributivo</span>
										<label>2</label><span>Subsidiado</span>
										<label>3</label><span>Población pobre no asegurada(Vinculado)</span>
										<label>4</label><span>Régimen Especial</span>
									</div></th>
								<th>Nombre E.P.S</th>
								<th>Despla-zado</th>
								<th>Discapa-cidad</th>
								<th class="table_info"><div class="ico">i</div>Cual
									<div class="info">
										<label><div class="ico">i</div></label><span>Discapacidad</span>
										<label>1</label><span>Motora</span>
										<label>2</label><span>Auditiva</span>
										<label>3</label><span>Visual</span>
										<label>4</label><span>Cognitiva o mental</span>
										<label>5</label><span class="otros_tb_info">Otros: <input type="text" name="tb1_otra_discap" value=""/></span>
									</div>
								</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td>01</td>
								<td><input class="tb1_nombres" type="text" name="tb1_nombres_1" value="" required/></td>
								<td><input class="tb1_dia" type="number" name="tb1_dia_1" min=1 max=31 value="" required/></td>
								<td><input class="tb1_mes" type="number" name="tb1_mes_1" min=1 max=12 value="" required/></td>
								<td><input class="tb1_año" type="number" name="tb1_año_1" min=1800 value="" required/></td>
								<td><input class="tb1_edad_a" type="number" name="tb1_edad_a_1" value="" required/></td>
								<td><input class="tb1_edad_m" type="number" name="tb1_edad_m_1" value="" required/></td>
								<td><input class="tb1_edad_d" type="number" name="tb1_edad_d_1" value="" required/></td>
								<td><input id="tb1_sexo_m_1" type="radio" name="tb1_sexo_1" value="M" required/><label class="radio" for="tb1_sexo_m_1"></label></td>
								<td><input id="tb1_sexo_f_1" type="radio" name="tb1_sexo_1" value="F"/><label class="radio" for="tb1_sexo_f_1"></label></td>
								<td><input readonly type="number" name="tb1_parentesco_1" value="1" min=0 max=5 required/></td>
								<td><input type="text" name="tb1_tipo_identi_1" value="" pattern="CC|cc|CE|ce|PA|pa|RC|rc|TI|ti|ASI|asi|MSI|msi" required/></td>
								<td><input type="number" name="tb1_numero_identi_1" value="" required/></td>
								<td><input type="number" name="tb1_escolaridad_1" value="" min=0 max=9 required/></td>
								<td><input type="number" name="tb1_ocupacion_1" value="" min=0 max=10 required/></td>
								<td><input type="number" name="tb1_tipo_vincula_1" value="" min=0 max=4 required/></td>
								<td><input type="text" name="tb1_eps_1" value=""/></td>
								<td><input type="text" name="tb1_grupo_etnico_1" value="" pattern="0|1|2|3|4|5|1A|1B|1C|1D|1E|1F"/></td>
								<td>
									<input id="tb1_desplazado_1" type="checkbox" name="tb1_desplazado_1" value="si"/>
									<label for="tb1_desplazado_1" class="check"></label>
								</td>
								<td>
									<input class="discap_integrantes_no" id="tb1_discapacidad_1" type="checkbox" name="tb1_discapacidad_1" value="si"/>
									<label for="tb1_discapacidad_1" class="check"></label>
								</td>
								<td><input class="discap_integrantes" type="number" name="tb1_cual_1" min="0" max="5" value=""/></td>
							</tr>

						</tbody>
					</table>
					<button type="button" class="button_add">Agregar Fila</button>
				<div class="spacey0"></div>
				<div id="tb1_telefono" class="tr">
					<label>Telefono contacto jefe(a) hogar</label>
					<span><input type="number" name="tb1_telefono_jefe" value=""/></span>
				</div>
				</div>

				<div class="table">
					<table id="tb1_v_actual" class="tb1_visitas">
						<thead>
							<tr>
								<th>Fecha Visita Actual</th>
								<th>Dia</th>
								<th>Mes</th>
								<th>Año</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<?php 
								
								$id_familia = $_SESSION['id_familia'];
								$sql = "SELECT max(id_visita) as id_visita FROM visitas WHERE id_familia = '$id_familia'";
								$query = $bd->query($sql); 
								if (!$query) echo $bd->error;
								if ($query->lengths == Null) {
									$row = $query->fetch_object();
									$id_visita = $row->id_visita + 1;
									// var_dump($id_visita);
								}
								else{ 
									$id_visita = 1;
								}
								?>
								<td>Visita <?php echo($id_visita);?></td>
								<td class="fecha_vis_integrantes"><input type="number" name="tb1_v_actual_d" min=0 max=31 value=""/></td>
								<td class="fecha_vis_integrantes">
									<select name="tb1_v_actual_m" class="select_td">
										<option value="1">Enero</option>
										<option value="2">Febrero</option>
										<option value="3">Marzo</option>
										<option value="4">Abril</option>
										<option value="5">Mayo</option>
										<option value="6">Junio</option>
										<option value="7">Julio</option>
										<option value="8">Agosto</option>
										<option value="9">Septiembre</option>
										<option value="10">Octubre</option>
										<option value="11">Noviembre</option>
										<option value="12">Diciembre</option>
									</select>
								</td>
								<td class="fecha_vis_integrantes"><input type="number" name="tb1_v_actual_a" min=1900 value=""/></td>
							</tr>
						</tbody>
					</table>
				</div>
				
				<div class="table">
					<table id="tb1_v_realizadas" class="tb1_visitas">
						<thead>
							<tr>
								<th>Visitas Realizadas</th>
								<th>Dia</th>
								<th>Mes</th>
								<th>Año</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$sql = "SELECT * FROM visitas WHERE id_familia = '$id_familia'";
								$query = $bd->query($sql); 
								if (!$query) echo $bd->error;
								// var_dump($query);
								if ($query->num_rows > 0) {
									while($row = $query->fetch_object()){?>
									<tr>
										<td class="v_reali">Visita <?php echo $row->id_visita ?></td>
										<td class="fecha_vis_integrantes"><?php echo $row->fecha_visita_d ?></td>
										<td class="month_txt fecha_vis_integrantes"><?php echo $row->fecha_visita_m ?></td>
										<td class="fecha_vis_integrantes"><?php echo $row->fecha_visita_a ?></td>
									</tr>
								<?php
								}
								}else{ 
									echo '<tr><td colspan="4" class="v_reali bg_blanco">No hay visitas Realizadas</td></tr>';
								}
								?>
						</tbody>
					</table>
				</div>

				<div class="table">
					<table id="tb1_v_proximas" class="tb1_visitas">
						<thead>
							<tr>
								<th>Visitas Proximas</th>
								<th>Dia</th>
								<th>Mes</th>
								<th>Año</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Visita <?php echo $id_visita+1;$id_visita++; ?></td>
								<td class="fecha_vis_integrantes"><input type="number" name="tb1_v_proxima_d" min=0 max=31 value=""/></td>
								<td class="fecha_vis_integrantes">
									<select class="select_td" name="tb1_v_proxima_m">
										<option value="1">Enero</option>
										<option value="2">Febrero</option>
										<option value="3">Marzo</option>
										<option value="4">Abril</option>
										<option value="5">Mayo</option>
										<option value="6">Junio</option>
										<option value="7">Julio</option>
										<option value="8">Agosto</option>
										<option value="9">Septiembre</option>
										<option value="10">Octubre</option>
										<option value="11">Noviembre</option>
										<option value="12">Diciembre</option>
									</select>
								</td>
								<td class="fecha_vis_integrantes"><input type="number" name="tb1_v_proxima_a" min=2019 value=""/></td>
							</tr>
						</tbody>
					</table>
				</div>
				<button type="submit" class="button next">Siguiente</button>
			</div>
		</form>
	</main>
	<script src="http://localhost/instituto/static/js/jquery-3.3.1.js"></script>
	<script src="http://localhost/instituto/static/js/bootstrap.js"></script>
	<script src="http://localhost/instituto/static/js/funciones.js"></script>
</body>
</html>