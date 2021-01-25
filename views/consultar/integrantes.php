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
		<form id="form3" action="/instituto/core/consultas/s_integrantes.php" method="POST">
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
				$sql = "SELECT * FROM integrantes WHERE integrantes.id_familia = '$id_familia'";
				$query = $bd->query($sql); 
				if (!$query) echo $bd->error;
				while($row = $query->fetch_object()){
				    $collect[] = $row;
					// var_dump($row);
					// echo('<br><br>');		
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
					<?php 
						$sql = "SELECT * FROM otros_tb_integrantes WHERE id_familia = '$id_familia'";
						$query = $bd->query($sql); 
						if (!$query) echo $bd->error;
						$row_e = $query->fetch_object();
						?>
					<table id="tb1_integrantes" class="tb1_sig">
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
										<label>10</label><span class="otros_tb_info">Otra: <input type="text" name="tb1_otra_ocupacion" value="<?php echo $row_e->tb1_otra_ocupacion ?>"/></span>
									</div>
								</th>
								<th colspan="2" class="vinculacion_sgsss">Vinculación al S.G.S.S.S</th>
								<th rowspan="2" class="table_info"><div class="ico">i</div>Grupo Étnico
									<div class="info">
										<label><div class="ico">i</div></label><span>Grupo Étnico</span>
										<label>1</label><span>Indígenas</span>
										<label>1A</label><span class="otros_tb_info"><input type="text" name="tb1_otro_g_a" value="<?php echo $row_e->tb1_otro_g_a?>"/></span>
										<label>1B</label><span class="otros_tb_info"><input type="text" name="tb1_otro_g_b" value="<?php echo $row_e->tb1_otro_g_b?>"/></span>
										<label>1C</label><span class="otros_tb_info"><input type="text" name="tb1_otro_g_c" value="<?php echo $row_e->tb1_otro_g_c?>"/></span>
										<label>1D</label><span class="otros_tb_info"><input type="text" name="tb1_otro_g_d" value="<?php echo $row_e->tb1_otro_g_d?>"/></span>
										<label>1E</label><span class="otros_tb_info"><input type="text" name="tb1_otro_g_e" value="<?php echo $row_e->tb1_otro_g_e?>"/></span>
										<label>1F</label><span class="otros_tb_info"><input type="text" name="tb1_otro_g_f" value="<?php echo $row_e->tb1_otro_g_f?>"/></span>
										<label>2</label><span>Afrodescendientes</span>
										<label>3</label><span>Mulatos</span>
										<label>4</label><span>Gitanos - ROM</span>
										<label>5</label><span class="otros_tb_info">Otros: <input type="text" name="tb1_otro_grupo_etn" value="<?php echo $row_e->tb1_otro_grupo_etn?>"/></span>
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
										<label>5</label><span class="otros_tb_info">Otros: <input type="text" name="tb1_otra_discap" value="<?php echo $row_e->tb1_otra_discap?>"/></span>
									</div>
								</th>

							</tr>
						</thead>
						<tbody>
							<?php 
							$arr_parent = ['','Jefe(a) de Familia','Cónyuge o Compañero(a)','Hijo(a)','Otros Parientes(Padres, Suegros, Etc)','Otros Miembros No Parientes'];
							$cont = 1; 
							foreach ($collect as $key => $row) {
							?>
							<tr>
								<td><?php echo $cont ?></td>
								<td><input type="text" name="tb1_nombres_<?php echo $cont?>" value="<?php echo $row->nombres?>" required/></td>
								<td><input class="tb1_dia" type="number" name="tb1_dia_<?php echo $cont?>" min=1 max=31 value="<?php echo $row->fecha_nac_dia?>" required/></td>
								<td><input class="tb1_mes" type="number" name="tb1_mes_<?php echo $cont?>" min=1 max=12 value="<?php echo $row->fecha_nac_mes?>" required/></td>
								<td><input class="tb1_año" type="number" name="tb1_año_<?php echo $cont?>" min=1800 value="<?php echo $row->fecha_nac_ano?>" required/></td>
								<td><input class="tb1_edad_a" type="number" name="tb1_edad_a_<?php echo $cont?>" value="<?php echo $row->edad_anos?>" required/></td>
								<td><input class="tb1_edad_m" type="number" name="tb1_edad_m_<?php echo $cont?>" value="<?php echo $row->edad_meses?>" required/></td>
								<td><input class="tb1_edad_d" type="number" name="tb1_edad_d_<?php echo $cont?>" value="<?php echo $row->edad_dias?>" required/></td>
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
								<td><input id="tb1_sexo_m_<?php echo $cont?>" type="radio" name="tb1_sexo_<?php echo $cont?>" value="M" <?php echo $checked_si?> required/><label class="radio" for="tb1_sexo_m_<?php echo $cont?>"></label></td>
								<td><input id="tb1_sexo_f_<?php echo $cont?>" type="radio" name="tb1_sexo_<?php echo $cont?>" value="F" <?php echo $checked_no?> required/><label class="radio" for="tb1_sexo_f_<?php echo $cont?>"></label></td>
								
								<td class="parentesco_txt"><input type="text" name="tb1_parentesco_<?php echo $cont?>" value="<?php echo $arr_parent[$row->parentesco_familiar]?>" required/></td>
								<td><input type="text" name="tb1_tipo_identi_<?php echo $cont?>" pattern="CC|cc|CE|ce|PA|pa|RC|rc|TI|ti|ASI|asi|MSI|msi" value="<?php echo $row->tipo_doc_identificacion?>" required/></td>
								<td><input type="text" name="tb1_numero_identi_<?php echo $cont?>" value="<?php echo $row->numero_doc_identificacion?>" required/></td>
								<td><input type="number" name="tb1_escolaridad_<?php echo $cont?>" value="<?php echo $row->escolaridad?>" required/></td>
								<td><input type="number" name="tb1_ocupacion_<?php echo $cont?>" value="<?php echo $row->ocupacion?>" required/></td>
								<td><input type="number" name="tb1_tipo_vincula_<?php echo $cont?>" value="<?php echo $row->tipo_vinculacion_sgsss?>" required/></td>
								<td class="nombre_eps"><input type="text" name="tb1_eps_<?php echo $cont?>" value="<?php echo $row->nombre_eps?>"/></td>
								<td><input type="text" name="tb1_grupo_etnico_<?php echo $cont?>" value="<?php echo $row->grupo_etnico?>"/></td>
								<?php 
									if ($row->desplazado == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								 ?>
								<td>
									<input id="tb1_desplazado_<?php echo $cont?>" type="checkbox" name="tb1_desplazado_<?php echo $cont?>" value="si" <?php echo $checked?>/>
									<label for="tb1_desplazado_<?php echo $cont?>" class="check"></label>
								</td>
								<?php 
									if ($row->discapacidad == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								 ?>
								<td>
									<input id="tb1_discapacidad_<?php echo $cont?>" type="checkbox" name="tb1_discapacidad_<?php echo $cont?>" value="si" <?php echo $checked?>/>
									<label for="tb1_discapacidad_<?php echo $cont?>" class="check"></label>
								</td>
								<td><input type="number" name="tb1_cual_<?php echo $cont?>" value="<?php echo $row->cual_discapacidad?>"/></td>
							</tr>
							<?php $cont++; 
							} ?>
						</tbody>
					</table>
				<div class="spacey0"></div>
				<div id="tb1_telefono" class="tr">
					<label>Telefono contacto jefe(a) hogar</label>
					<span><input type="number" name="tb1_telefono_jefe" value="<?php echo $row_e->telefono_jefe?>"/></span>
				</div>
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
								$flag = False;
								if ($flag == false) {
									$sql = "SELECT * FROM visitas WHERE id_familia = '$id_familia'";
									$query = $bd->query($sql); 
								} else {
									$sql = "SELECT * FROM visitas WHERE id_familia = '$id_familia' AND id_visita NOT IN(SELECT MAX(id_visita) FROM visitas WHERE id_familia = '$id_familia')";
									$query = $bd->query($sql); 
								}
								
								if (!$query) echo $bd->error;
								$cont = 1;
								if ($query->num_rows > 0) {
									while($row = $query->fetch_object()){?>
									<tr>
										<td class="v_reali">Visita <?php echo $row->id_visita ?></td>
										<td class="fecha_vis_integrantes"><?php echo $row->fecha_visita_d ?></td>
										<td class="fecha_vis_integrantes month_txt"><?php echo $row->fecha_visita_m ?></td>
										<td class="fecha_vis_integrantes"><?php echo $row->fecha_visita_a ?></td>
									</tr>
								<?php $cont++;
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
								<?php 
									$sql = "SELECT * FROM visitas_proximas WHERE id_familia = '$id_familia' AND id_visita_prox = (SELECT MAX(id_visita_prox) FROM visitas_proximas WHERE id_familia = '$id_familia')";
									$query = $bd->query($sql); 
									$row = $query->fetch_object();
									if ($row->fecha_visitaprox_d == 0 || $row->fecha_visitaprox_a == 0) {
										 $row->fecha_visitaprox_d = 'Indefinida';
										 $row->fecha_visitaprox_m = 'Indefinida';
										 $row->fecha_visitaprox_a = 'Indefinida';
								 ?>
								<td>Visita <?php echo $cont?></td>
								<td class="fecha_vis_integrantes"><input type="text" name="tb1_v_proxima_d" min=0 max=31 value="<?php echo $row->fecha_visitaprox_d?>"/></td>
								<td class="fecha_vis_integrantes month_txt">
									<input type="text" name="tb1_v_proxima_m" min=0 max=12 value="<?php echo $row->fecha_visitaprox_m?>"/>
								</td>
								<td class="fecha_vis_integrantes"><input type="text" name="tb1_v_proxima_a" min=2019 value="<?php echo $row->fecha_visitaprox_a?>"/></td>
								 <?php 
									} else{
								 ?>
								 <td>Visita <?php echo $cont?></td>
								<td class="fecha_vis_integrantes"><input type="number" name="tb1_v_proxima_d" min=0 max=31 value="<?php echo $row->fecha_visitaprox_d?>"/></td>
								<td class="fecha_vis_integrantes month_txt">
									<input type="number" name="tb1_v_proxima_m" min=0 max=12 value="<?php echo $row->fecha_visitaprox_m?>"/>
								</td>
								<td class="fecha_vis_integrantes"><input type="number" name="tb1_v_proxima_a" min=2019 value="<?php echo $row->fecha_visitaprox_a?>"/></td>

								 <?php } ?>
							</tr>
						</tbody>
					</table>
				</div>
				<button type="button" class="button next" onclick="window.location='menores_a_1.php'">Siguiente</button>
			</div>
			<div class="nav_inf">
				<ul>
					<li onclick="window.location='../inicio.php'"><label>Inicio</label></li>
					<li  onclick="window.location='identificacion.php'"><label>Identi.. <div class="info_tb">Identificacion y Ubicacion</div></label></li>
					<li class="active" onclick="window.location='integrantes.php'"><label>Integra..<div class="info_tb">Personas Integrantes de la Familia</div></label></li>
					<li onclick="window.location='menores_a_1.php'"><label>0 a 1 Años..<div class="info_tb">Registro de Actividades Niños(as) menores a 1 año</div></label></li>
					<li onclick="window.location='niños_1_a_5.php'"><label>1 a 5 Años..<div class="info_tb">Registro de Actividades Niños(as) 1 a 5 años</div></label></li>
					<li onclick="window.location='niños_5_a_9.php'"><label>5 a 9 Años..<div class="info_tb">Registro de Actividades Niños(as) 5 a 9 años</div></label></li>
					<li onclick="window.location='hom_muj_10_a_59.php'"><label>10 a 59 Años..<div class="info_tb">Registro de Actividades Hombres y Mujeres de 10 a 59 años</div></label></li>
					<li onclick="window.location='adultos_60_mas.php'"><label>60 Años o mas..<div class="info_tb">Registro de Actividades Adultos(as) de 60 años y mas</div></label></li>
					<li onclick="window.location='gestacion_parto.php'"><label>Gesta..<div class="info_tb">Registro de Actividades Gestacion, Parto y Postparto</div></label></li>
					<li onclick="window.location='antecedentes.php'"><label>Antece..<div class="info_tb">Antecedentes en Salud Mental</div></label></li>
					<li onclick="window.location='estadisticas.php'"><label>Estadi..<div class="info_tb">Estadisticas Vitales</div></label></li>
					<li onclick="window.location='condiciones.php'"><label>Condici..<div class="info_tb">Condiciones Sanitarias</div></label></li>
					<li onclick="window.location='observaciones.php'"><label>Observa..<div class="info_tb">Observaciones</div></label></li>
				</ul>
			</div>
		</form>
	</main>
	<script src="http://localhost/instituto/static/js/jquery-3.3.1.js"></script>
	<script src="http://localhost/instituto/static/js/bootstrap.js"></script>
	<script src="http://localhost/instituto/static/js/funciones.js"></script>
</body>
</html>