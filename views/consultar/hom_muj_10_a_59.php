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
		$id_familia = $_SESSION['id_familia_consulta'];
		$id_visita = 1;
		$cont = 1;
		$sql = "SELECT * FROM integrantes JOIN de_10_a_59 USING(id_integrante) JOIN visitas USING(id_visita,id_familia) WHERE visitas.id_familia = '$id_familia' AND edad_anos >= 10 AND edad_anos < 60";
		$query = $bd->query($sql);
		while ($row = $query->fetch_object()) {
			$collect[] = $row;
		}
		$query->data_seek(0);

		if (!$query) echo $bd->error;
		if ($query->num_rows == 0) {
			echo "<div class='registro_non'>";
	        echo "<p>No Existen Registros de personas de 10 a 59 Años en esta Familia</p>";
	        echo "<button type='button' class='button next block' onclick='window.location=\"adultos_60_mas.php\"'>Siguiente</button>";
	        echo "</div>";
		}
		else{ 
			
		?>
		<form id="form7" action="/instituto/core/consultas/s_hom_muj_10_a_59.php" method="POST">
			<div class="divh1">
				<h1>Registro de Actividades Hombres y Mujeres de 10 a 59 Años</h1>
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
				<?php 
					$sql_f = "SELECT * FROM visitas  WHERE id_familia = '$id_familia' LIMIT 1";
					$query_f = $bd->query($sql_f);
					$row_f = $query_f->fetch_object();
				 ?>
				<div class="table">
					<div class="tr fecha_visita">
						<label>Fecha Visita <?php echo $row_f->id_visita?></label>
						<label>Día</label>
						<span class="sp_v"><?php echo $row_f->fecha_visita_d?></span>
						<label>Mes</label>
						<span class="sp_v_m month_txt"><?php echo $row_f->fecha_visita_m?></span>
						<label>Año</label>
						<span class="sp_v"><?php echo $row_f->fecha_visita_a?></span>
					</div>
					<table id="tb5_hombresmujeres_10a59">
						<colgroup>
							<col span="8">
						</colgroup>
						<colgroup>
							<col span="27" id="tb5_group_mujeres">
						</colgroup>
						<thead>
							<?php 
								$sql_e = "SELECT remitido_otro,id_visita,otros_tb_hom_muj.id_familia,otro_metodo,otro_motivo FROM de_10_a_59 JOIN otros_tb_hom_muj USING(id_visita) JOIN integrantes USING(id_integrante) WHERE integrantes.id_familia = '$id_familia'";
								$query_e = $bd->query($sql_e); 
								$row_e = $query_e->fetch_object();
							?>
							<tr>
								<th colspan="3" rowspan="5" class="none"></th>
								<th colspan="5" rowspan="1" class="bg_naranja br_naranja">Planificacion Familiar</th>
								<th colspan="27" rowspan="1" class="bg_verde2 br_verde2">Mujeres</th>
								<th colspan="7" rowspan="1" class="bg_verde br_verde">Hombres</th>
								<th colspan="3" rowspan="1" class="bg_naranja br_naranja">Salud Oral</th>
								<th colspan="2" rowspan="2">Problemas Visuales</th>
								<th colspan="2" rowspan="2">Glicemia</th>
								<th colspan="4" rowspan="2">Valoracion Nutricional</th>
								<th colspan="3" rowspan="2">Tension Arterial</th>
								<th colspan="3" rowspan="2">Consume Algun Medicamento</th>
								<th colspan="6" rowspan="1">Conducta</th>
							</tr>
							<tr>
								<th colspan="4" rowspan="2">Si Planifica</th>
								<th colspan="1" rowspan="2">No Planifica</th>
								<th colspan="6" rowspan="2" class="bg_verde2_c br_verde2">Citologia Cervico Vaginal</th>
								<th colspan="3" rowspan="2" class="bg_verde2_c br_verde2">Autoexamen de Seno</th>
								<th colspan="4" rowspan="2" class="bg_verde2_c br_verde2">Violencia Contra la Mujer</th>
								<th colspan="14" rowspan="2" class="bg_verde2_c br_verde2">Vacunacion</th>
								<th colspan="6" rowspan="1" class="bg_verde_c br_verde">Examen de Prostata > 40 años</th>
								<th colspan="1" rowspan="4" class="celda_vertical bg_verde_c br_verde"><p>Fiebre Amarilla</p></th>
								<th colspan="2" rowspan="4">Uso de Seda Dental</th>
								<th colspan="1" rowspan="5">Cepillado No veces por dia</th>
								<th colspan="2" rowspan="4">Canalizado</th>
								<th colspan="2" rowspan="4" class="table_info">
									<div class="ico">i</div>
									Remitido
									<div class="info">
										<label><div class="ico">i</div></label><span>Remitido</span>
										<label>1</label><span>Medico</span>
										<label>2</label><span>Psicologo</span>
										<label>3</label><span>Nutricionista</span>
										<label>4</label><span>Enfermeria</span>
										<label>5</label><span>Odontologia</span>
										<label>6</label><span>Control de Crecimiento y Desarrollo</span>
										<label>7</label><span>Control Adolescentes</span>
										<label>8</label><span>Control Prenatal</span>
										<label>9</label><span>Control Adulto Mayor</span>
										<label>10</label><span class="otros_tb_info">Otro: <input type="text" name="tb5_otra_remision" value="<?php echo $row_e->remitido_otro?>"/></span>
									</div>
								</th>
								<th colspan="2" rowspan="4">Valorado</th>
							</tr>
							<tr>
								<th colspan="3" rowspan="1" class="bg_verde_c br_verde">Ultimos 5 Años</th>
								<th colspan="3" rowspan="2" class="bg_verde_c br_verde">Fecha</th>
								 <th colspan="1" rowspan="4">Si</th>
								<th colspan="1" rowspan="4">No</th>
								<th colspan="1" rowspan="4">Valor Glicemia</th>
								<th colspan="1" rowspan="4" class="table_info">
									<div class="ico">i</div>
									Estado Glicemia
									<div class="info">
										<label><div class="ico">i</div></label><span>Glicemia</span>
										<label></label><span>Normal: 70/100 MG/DL</span>
									</div>
								</th>
								<th colspan="1" rowspan="4">Peso (kg)</th>
								<th colspan="1" rowspan="4">Talla (Cm)</th>
								<th colspan="1" rowspan="4">IMC</th>
								<th colspan="1" rowspan="4" class="table_info">
									<div class="ico">i</div>
									Estado Nutricional
									<div class="info">
										<label><div class="ico">i</div></label><span>Estado Nutricional</span>
										<label></label><span>IMC: Formula: Peso/(Altura)^2</span>
										<label></label><span>Bajo Peso: Menor a 18.5</span>
										<label></label><span>Peso Normal: de 18.5 a 24.9</span>
										<label></label><span>Sobrepeso: de 25 a 29.9</span>
										<label></label><span>Obesidad 1: de 30 a 34.9</span>
										<label></label><span>Obesidad 2: de 35 a 39.9</span>
										<label></label><span>Obesidad 3: Mayor o igual a 40</span>
									</div>
								</th>
								<th colspan="1" rowspan="4">Pulso por Minuto</th>
								<th colspan="1" rowspan="4" class="table_info">
									Valor Tension Arterial
									<div class="ico">i</div>
									<div class="info">
										<label><div class="ico">i</div></label><span>Valor Tension Arterial</span>
										<label></label><span>Ingrese La Presion sistolica / Presion Diastolica</span>
										<label></label><span>EJ: 120/80</span>
									</div>
								</th>
								<th colspan="1" rowspan="4" class="table_info">
								<div class="ico">i</div>
									Estado Tension Arterial
									<div class="info">
										<label><div class="ico">i</div></label><span>Tension Arterial</span>
										<label></label><span>Normal: menor 120 / menor 80</span>
										<label></label><span>Elevada: 120 a 129 / menor 80</span>
										<label></label><span>Hipertension 1: 130 a 139 / 80 a 89</span>
										<label></label><span>Hipertension 2: igual o mayor a 140/ igual o mayor a 80</span>
									</div>
								</th>
								<th colspan="1" rowspan="4">Si</th>
								<th colspan="1" rowspan="4">Cual?</th>
								<th colspan="1" rowspan="4">No</th>
							</tr>

							<tr>
								<th colspan="1" rowspan="3" class="table_info">
								<div class="ico">i</div>
									Metodo
									<div class="info">
										<label><div class="ico">i</div></label><span>Metodos de Planificacion</span>
										<label>1</label><span>Pildora</span>
										<label>2</label><span>Inyeccion</span>
										<label>3</label><span>DIU- T de cobre</span>
										<label>4</label><span>Ritmo</span>
										<label>5</label><span>Ovulos, Tabletas o Crema Vaginal</span>
										<label>6</label><span>Condon</span>
										<label>7</label><span>Yabel</span>
										<label>8</label><span>Vasectomia</span>
										<label>9</label><span>Ligadura de Trompas</span>
										<label>10</label><span class="otros_tb_info">Otro: <input type="text" name="tb5_otro_metodo" value="<?php echo $row_e->otro_metodo?>"/></span>
									</div>
								</th>
								<th colspan="1" rowspan="3">Tiempo con el metodo (meses)</th>
								<th colspan="2" rowspan="2">Controles Ultimo año</th>
								<th colspan="1" rowspan="3" class="table_info">
									<div class="ico">i</div>
									Motivo
									<div class="info">
										<label><div class="ico">i</div></label><span>Motivos para No planificar</span>
										<label>1</label><span>Desconocimiento</span>
										<label>2</label><span>Razones Personales</span>
										<label>3</label><span>Razones Culturales y/o Religiosas</span>
										<label>4</label><span>Contraindicaciones</span>
										<label>5</label><span>Barreras de Acceso</span>
										<label>6</label><span>No Aplica para la edad</span>
										<label>7</label><span class="otros_tb_info">Otro: <input type="text" name="tb5_otro_motivo" value="<?php echo $row_e->otro_motivo?>"/></span>
									</div>
								</th>
								<th colspan="1" rowspan="3" class="bg_verde2_c br_verde2">No</th>
								<th colspan="2" rowspan="1" class="bg_verde2_c br_verde2">Si</th>
								<th colspan="3" rowspan="1" class="bg_verde2_c br_verde2">Fecha</th>
								<th colspan="1" rowspan="3" class="bg_verde2_c br_verde2">No</th>
								<th colspan="2" rowspan="1" class="bg_verde2_c br_verde2">Si</th>
								<th rowspan="3" class="bg_verde2_c br_verde2 table_info">
									<div class="ico bg_verde2">i</div>
									Si
									<div class="info bg_verde2_c">
										<label><div class="ico bg_verde2">i</div></label><span>Violencia Contra la Mujer</span>
										<label>1</label><span>Fisico</span>
										<label>2</label><span>Psicologico</span>
										<label>3</label><span>Sexual</span>
										<label>4</label><span>Fisico y Psicologico</span>
										<label>5</label><span>Fisico y Sexual</span>
										<label>6</label><span>Psicologico y Sexual</span>
										<label>7</label><span>Todos</span>
									</div>
								</th>
								<th rowspan="3" class="bg_verde2_c br_verde2">No</th>
								<th colspan="2" rowspan="2" class="bg_verde2_c br_verde2">Valorado</th>
								<th colspan="2" rowspan="2" class="bg_verde2_c br_verde2">Carné</th>
								<th colspan="10" rowspan="1" class="bg_verde2_c br_verde2">TD/TT</th>
								<th colspan="1" rowspan="2" class="celda_vertical bg_verde2_c br_verde2"><p>Fiebre Amarilla</p></th>
								<th colspan="1" rowspan="3" class="bg_verde2_c br_verde2">SR</th>
								<th colspan="1" rowspan="3" class="bg_verde_c br_verde">No</th>
								<th colspan="2" rowspan="1" class="bg_verde_c br_verde">Si</th>
								 <!-- voy -->
							   
							</tr>

							<tr>
								<th colspan="1" rowspan="2" class="celda_vertical bg_verde2_c br_verde2"><p>Normal</p></th>
								<th colspan="1" rowspan="2" class="celda_vertical bg_verde2_c br_verde2"><p>Anormal</p></th>
								<th colspan="1" rowspan="2" class="bg_verde2_c br_verde2">D</th>
								<th colspan="1" rowspan="2" class="bg_verde2_c br_verde2">M</th>
								<th colspan="1" rowspan="2" class="bg_verde2_c br_verde2">A</th>
								<th colspan="1" rowspan="2" class="celda_vertical bg_verde2_c br_verde2"><p>Normal</p></th>
								<th colspan="1" rowspan="2" class="celda_vertical bg_verde2_c br_verde2"><p>Anormal</p></th>
								<th colspan="5" rowspan="1" class="bg_verde2_c br_verde2">10 a 18 años</th>
								<th colspan="5" rowspan="1" class="bg_verde2_c br_verde2">19 a 49 años</th>
								<th rowspan="2" class="celda_vertical bg_verde_c br_verde"><p>Normal</p></th>
								<th rowspan="2" class="celda_vertical bg_verde_c br_verde"><p>Anormal</p></th>
								<th rowspan="2" class="bg_verde_c br_verde">D</th>
								<th rowspan="2" class="bg_verde_c br_verde">M</th>
								<th rowspan="2" class="bg_verde_c br_verde">A</th>
							  
							</tr>


							<tr>
								<th colspan="2">Nombres</th>
								<th>Edad</th>
								<th>Cuantos</th>
								<th>No</th>
								<th class="bg_verde2_c br_verde2">Si</th>
								<th class="bg_verde2_c br_verde2">No</th>
								<th class="bg_verde2_c br_verde2">Si</th>
								<th class="bg_verde2_c br_verde2">No</th>
								<th class="bg_verde2_c br_verde2">1</th>
								<th class="bg_verde2_c br_verde2">2</th>
								<th class="bg_verde2_c br_verde2">3</th>
								<th class="bg_verde2_c br_verde2">4</th>
								<th class="bg_verde2_c br_verde2">5</th>
								<th class="bg_verde2_c br_verde2">1</th>
								<th class="bg_verde2_c br_verde2">2</th>
								<th class="bg_verde2_c br_verde2">3</th>
								<th class="bg_verde2_c br_verde2">4</th>
								<th class="bg_verde2_c br_verde2">5</th>
								<th class="bg_verde2_c br_verde2">R1</th>
								<th class="bg_verde_c br_verde">R1</th>
								<th>Si</th>
								<th>No</th>
								<th>Si</th>
								<th>No</th>
								<th>Si</th>
								<th>No</th>
								<th>Si</th>
								<th>No</th>
							</tr>

						</thead>
						<tbody>
							<?php  while ( $row = $query->fetch_object()) {
								if ($row->id_visita == 1){
							?>
							<tr>
								<td><?php echo $cont?></td>
								<td><input class="tb5_nombres" type="text" name="tb5_nombres_<?php echo $cont?>" value="<?php echo $row->nombres?>"></td>
								<td><input type="number" name="tb5_edad_<?php echo $cont?>" step=0.1  value="<?php echo $row->edad?>"></td>
								<?php 
									if ($row->metodo_planificacion == 0) {
										$row->metodo_planificacion = '';
										$row->tiempo_con_metodo = '';
										if ($row->controles_ult_ano_planifi == 0) {
											$row->controles_ult_ano_planifi = '';
											$checked = 'checked';
										}
										else{
											$checked = '';
										}
									}
									else{
										$row->motivo_no_planifi = '';
										if ($row->controles_ult_ano_planifi == 0) {
											$row->controles_ult_ano_planifi = '';
											$checked = 'checked';
										}
										else{
											$checked = '';
										}
									}
								 ?>
								<td><input type="number" name="tb5_metodo_<?php echo $cont?>" step=0.1  value="<?php echo $row->metodo_planificacion?>"></td>
								<td><input type="number" name="tb5_tiempo_metodo_<?php echo $cont?>" step=0.1  min=0 max= 10 value="<?php echo $row->tiempo_con_metodo?>"></td>
								<td><input class="tb5_control_si" type="number" name="tb5_cuantos_controles_<?php echo $cont?>" step=0.1  value="<?php echo $row->controles_ult_ano_planifi?>"></td>
								 <td>
									<input class="tb5_control_no" id="tb5_planifica_controles_ultimo_año_no_<?php echo $cont?>" type="radio" name="tb5_planifica_controles_ultimo_año_no_<?php echo $cont?>" value="no" <?php echo $checked?> >
									<label class="radio" for="tb5_planifica_controles_ultimo_año_no_<?php echo $cont?>" ></label>
								</td>
								<td><input type="number" name="tb5_motivo_<?php echo $cont?>" step=0.1  min=0 max= 7 value="<?php echo $row->motivo_no_planifi?>"></td>
								<?php 
									if ($row->citologia == 'no') {
										$checked_n = '';
										$checked_a = '';
										$checked_no = 'checked';
									}
									else if ($row->citologia == 'normal') {
										$checked_n = 'checked';
										$checked_a = '';
										$checked_no = '';
									}
									else{
										$checked_n = '';
										$checked_a = 'checked';
										$checked_no = '';
									}
								 ?>
								<td class="br_verde2">
									<input id="tb5_citolo_no_<?php echo $cont?>" type="radio"  name="tb5_citologia_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_citolo_no_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb5_citilo_normal_<?php echo $cont?>" type="radio"  name="tb5_citologia_<?php echo $cont?>" value="normal" <?php echo $checked_n?> >
									<label class="radio" for="tb5_citilo_normal_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb5_citilo_anormal_<?php echo $cont?>" type="radio"  name="tb5_citologia_<?php echo $cont?>" value="anormal" <?php echo $checked_a?> >
									<label class="radio" for="tb5_citilo_anormal_<?php echo $cont?>" ></label>
								</td>
									<?php
									if($row->citologia == 'no'){
										$row->citologia_d = '';
										$row->citologia_m = '';
										$row->citologia_a = '';
									}
								?>
								<td class="br_verde2"><input type="number" name="tb5_citologia_d_<?php echo $cont?>" step=0.1  value="<?php echo $row->citologia_d;?>"></td>
								<td class="br_verde2"><input type="number" name="tb5_citologia_m_<?php echo $cont?>" step=0.1  value="<?php echo $row->citologia_m;?>"></td>
								<td class="br_verde2"><input class="year_current_td" type="number" name="tb5_citologia_a_<?php echo $cont?>" step=0.1  value="<?php echo $row->citologia_a;?>"></td>
								<?php 
									if ($row->autoexamen_seno == 'no') {
										$checked_n = '';
										$checked_a = '';
										$checked_no = 'checked';
									}
									else if ($row->autoexamen_seno == 'normal') {
										$checked_n = 'checked';
										$checked_a = '';
										$checked_no = '';
									}
									else{
										$checked_n = '';
										$checked_a = 'checked';
										$checked_no = '';
									}
								 ?>
								<td class="br_verde2">
									<input id="tb5_autoexamen_seno_no_<?php echo $cont?>" type="radio"  name="tb5_autoexamen_seno_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_autoexamen_seno_no_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb5_autoexamen_seno_normal_<?php echo $cont?>" type="radio"  name="tb5_autoexamen_seno_<?php echo $cont?>" value="normal" <?php echo $checked_n?> >
									<label class="radio" for="tb5_autoexamen_seno_normal_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb5_autoexamen_seno_anormal_<?php echo $cont?>" type="radio"  name="tb5_autoexamen_seno_<?php echo $cont?>" value="anormal" <?php echo $checked_a?> >
									<label class="radio" for="tb5_autoexamen_seno_anormal_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->violencia_contra_mujer != Null AND $row->violencia_contra_mujer != 0) {
									$violencia_contra_mujer = $row->violencia_contra_mujer;
									$checked_r = '';
									}
									else{
										$violencia_contra_mujer = '';
										$checked_r = 'checked';
									}
								 ?>
								<td class="br_verde2">
									<input class="tb5_violencia_si" id="tb5_violenciacontramujer_si_<?php echo $cont?>" type="number"  name="tb5_violenciacontramujer_<?php echo $cont?>" value="<?php echo $violencia_contra_mujer?>">
								</td>
								<td class="br_verde2">
									<input class="tb5_violencia_no" id="tb5_violenciacontramujer_no_<?php echo $cont?>" type="radio"  name="tb5_violenciacontramujer_no_<?php echo $cont?>" value="no" <?php echo $checked_r?> >
									<label class="radio" for="tb5_violenciacontramujer_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->v_contra_mujer_valorado == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td class="br_verde2">
									<input class="tb5_violencia_v_si" id="tb5_violencia_mujer_valorado_si_<?php echo $cont?>" type="radio"  name="tb5_violencia_mujer_valorado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb5_violencia_mujer_valorado_si_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input class="tb5_violencia_v_no" id="tb5_violencia_mujer_valorado_no_<?php echo $cont?>" type="radio"  name="tb5_violencia_mujer_valorado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_violencia_mujer_valorado_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->carnet == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td class="br_verde2">
									<input id="tb5_carnet_si_<?php echo $cont?>" type="radio"  name="tb5_carnet_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb5_carnet_si_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb5_carnet_no_<?php echo $cont?>" type="radio"  name="tb5_carnet_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_carnet_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_10a18_1 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt1_10a18_<?php echo $cont?>" type="checkbox" name="tb5_td_tt1_10a18_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt1_10a18_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_10a18_2 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt2_10a18_<?php echo $cont?>" type="checkbox" name="tb5_td_tt2_10a18_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt2_10a18_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_10a18_3 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt3_10a18_<?php echo $cont?>" type="checkbox" name="tb5_td_tt3_10a18_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt3_10a18_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_10a18_4 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt4_10a18_<?php echo $cont?>" type="checkbox" name="tb5_td_tt4_10a18_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt4_10a18_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_10a18_5 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt5_10a18_<?php echo $cont?>" type="checkbox" name="tb5_td_tt5_10a18_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt5_10a18_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_19a49_1 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt1_19a49_<?php echo $cont?>" type="checkbox" name="tb5_td_tt1_19a49_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt1_19a49_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_19a49_2 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt2_19a49_<?php echo $cont?>" type="checkbox" name="tb5_td_tt2_19a49_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt2_19a49_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_19a49_3 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt3_19a49_<?php echo $cont?>" type="checkbox" name="tb5_td_tt3_19a49_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt3_19a49_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_19a49_4 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt4_19a49_<?php echo $cont?>" type="checkbox" name="tb5_td_tt4_19a49_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt4_19a49_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_19a49_5 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt5_19a49_<?php echo $cont?>" type="checkbox" name="tb5_td_tt5_19a49_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt5_19a49_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->fiebre_amarilla_m =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_fiebre_a_mujer_r1_<?php echo $cont?>" type="checkbox" name="tb5_fiebre_a_mujer_r1_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_fiebre_a_mujer_r1_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->sr_m =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_sr_<?php echo $cont?>" type="checkbox" name="tb5_sr_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_sr_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->examen_prostata == 'no') {
										$checked_n = '';
										$checked_a = '';
										$checked_no = 'checked';
										$row->examen_pros_d = '';
										$row->examen_pros_m = '';
										$row->examen_pros_a = '';
									}
									else if ($row->examen_prostata == 'normal') {
										$checked_n = 'checked';
										$checked_a = '';
										$checked_no = '';
									}
									else{
										$checked_n = '';
										$checked_a = 'checked';
										$checked_no = '';
									}
								 ?>
								<td class="br_verde">
									<input id="tb5_examen_prostata_5años_no_<?php echo $cont?>" type="radio"  name="tb5_examen_prostata_5años_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_examen_prostata_5años_no_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde">
									<input id="tb5_examen_prostata_5años1_normal_<?php echo $cont?>" type="radio"  name="tb5_examen_prostata_5años_<?php echo $cont?>" value="normal" <?php echo $checked_n?> >
									<label class="radio" for="tb5_examen_prostata_5años1_normal_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde">
									<input id="tb5_examen_prostata_5años_anormal_<?php echo $cont?>" type="radio"  name="tb5_examen_prostata_5años_<?php echo $cont?>" value="anormal" <?php echo $checked_a?> >
									<label class="radio" for="tb5_examen_prostata_5años_anormal_<?php echo $cont?>" ></label>
								</td>
							  
								<td class="br_verde"><input type="number" name="tb5_examen_prostat_fecha_d_<?php echo $cont?>" step=0.1  value="<?php echo $row->examen_pros_d?>"></td>
								<td class="br_verde"><input type="number" name="tb5_examen_prostat_fecha_m_<?php echo $cont?>" step=0.1  value="<?php echo $row->examen_pros_m?>"></td>
								<td class="br_verde"><input class="year_current_td" type="number" name="tb5_examen_prostat_fecha_a_<?php echo $cont?>" step=0.1  value="<?php echo $row->examen_pros_a?>"></td>
								<?php 
									if ($row->fiebre_amarilla_h =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde">
									<input id="tb5_fiebre_a_mhombre_r1_<?php echo $cont?>" type="checkbox" name="tb5_fiebre_a_hombre_r1_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_fiebre_a_mhombre_r1_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->seda_dental == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb5_seda_dental_si_<?php echo $cont?>" type="radio"  name="tb5_seda_dental_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb5_seda_dental_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb5_seda_dental_no_<?php echo $cont?>" type="radio"  name="tb5_seda_dental_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_seda_dental_no_<?php echo $cont?>" ></label>
								</td>
								<td><input type="number" name="tb5_numero_cepilladas_<?php echo $cont?>" value="<?php echo $row->numero_cepilladas?>"></td>
								<?php 
									if ($row->problemas_visuales == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb5_problemas_visuales_si_<?php echo $cont?>" type="radio"  name="tb5_problemas_visuales_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb5_problemas_visuales_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb5_problemas_visuales_no_<?php echo $cont?>" type="radio"  name="tb5_problemas_visuales_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_problemas_visuales_no_<?php echo $cont?>" ></label>
								</td>
								<td><input class="tb5_glicemia" class="tb5_glicemia" type="number" name="tb5_glicemia_<?php echo $cont?>" step=0.1  value="<?php echo $row->valor_glicemia?>"  min=1 required></td>
								<td><input class="tb5_estado_glicemia" class="tb5_estado_glicemia" type="text" name="tb5_glicemia_estado_<?php echo $cont?>" value="<?php echo $row->estado_glicemia?>" required></td>
								<td><input class="tb5_peso" type="number" name="tb5_peso_<?php echo $cont?>" step=0.1  value="<?php echo $row->peso?>" min=1 max=200 required></td>
								<td><input class="tb5_talla" type="number" name="tb5_talla_<?php echo $cont?>" step=0.1  value="<?php echo $row->talla?>" min=1 max=200 required></td>
								<td><input class="tb5_imc" type="number" name="tb5_imc_<?php echo $cont?>" step=0.1  value="<?php echo $row->imc?>" min=1 max=200 required></td>
								<td><input class="tb5_estado_nutricional" type="text" name="tb5_estado_nutricional_<?php echo $cont?>"  value="<?php echo $row->estado_nutricional?>" required></td>
								<td><input class="tb5_pulso" type="number" name="tb5_pulso_<?php echo $cont?>" step=0.1  value="<?php echo $row->pulso_minuto?>"  min=1 required></td>
								<td><input class="tb5_valor_tension" type="text" name="tb5_valor_tension_<?php echo $cont?>" value="<?php echo $row->presion_arterial?>" required></td>
								<td><input class="tb5_estado_tension" type="text" name="tb5_estado_tension_<?php echo $cont?>" step=0.1  value="<?php echo $row->estado_presion_arterial?>" required></td>
								<?php 
									if ($row->consume_medicamento == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									$cual_medicamento = $row->cual_medicamento;
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
										$cual_medicamento = '';

									}
								 ?> 
								<td>
									<input class="consume_medicamento_si" id="tb5_consume_medicamento_si_<?php echo $cont?>" type="radio"  name="tb5_consume_medicamento_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb5_consume_medicamento_si_<?php echo $cont?>" ></label>
								</td>
								<td><input class="consume_medicamento_txt" type="text" name="tb5_consume_medicamento_txt_<?php echo $cont?>" value="<?php echo $cual_medicamento?>"></td>
								<td>
									<input class="consume_medicamento_no" id="tb5_consume_medicamento_no_<?php echo $cont?>" type="radio"  name="tb5_consume_medicamento_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_consume_medicamento_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->canalizado == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb5_canalizado_si_<?php echo $cont?>" type="radio" name="tb5_canalizado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb5_canalizado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb5_canalizado_no_<?php echo $cont?>" type="radio"  name="tb5_canalizado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_canalizado_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->remitido != Null AND $row->remitido != 0) {
									$remitido = $row->remitido;
									$checked_r = '';
									}
									else{
										$remitido = '';
										$checked_r = 'checked';
									}
								 ?>
								<td>
									<input class="remitido" id="tb5_remitido_si_<?php echo $cont?>" type="number"  name="tb5_remitido_<?php echo $cont?>" value="<?php echo $remitido ?>"  min=0 max=10>
								</td>
								<td>
									<input class="remitido_no" id="tb5_remitido_no_<?php echo $cont?>" type="radio"  name="tb5_remitido_no_<?php echo $cont?>" value="no" <?php echo $checked_r?> >
									<label class="radio" for="tb5_remitido_no_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb5_valorado_si_<?php echo $cont?>" type="radio"  name="tb5_valorado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb5_valorado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb5_valorado_no_<?php echo $cont?>" type="radio"  name="tb5_valorado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_valorado_no_<?php echo $cont?>" ></label>
									<input type="hidden" name="id_integrante_<?php echo $cont?>" value="<?php echo $row->id_integrante?>">
								</td>
							</tr>
							<?php
								$cont++; 
								}
							} 
							?>

							<?php
							// var_dump($cont);
							$query->data_seek(0);  
							$cont_v_actual = 0;
							$id_v_actual = 0;
							$cont_sig = 1;
							while ($row = $query->fetch_object()) {
								// var_dump($row->id_visita);
								if ($row->id_visita > 1) {
									if ($row->id_visita != $id_v_actual) {
										$id_v_actual = $row->id_visita;
										$cont_v_actual = 0;
										$cont_sig = 1;
									}
									
									if ($cont_v_actual == 0) {
							?>
							<tr>
								<td colspan="15" class="n_visita">
									<div class="tr fecha_visita">
										<label>Fecha Visita <?php echo $row->id_visita?></label>
										<label>Día</label>
										<span class="sp_v"><?php echo $row->fecha_visita_d?></span>
										<label>Mes</label>
										<span class="sp_v_m month_txt"><?php echo $row->fecha_visita_m?></span>
										<label>Año</label>
										<span class="sp_v"><?php echo $row->fecha_visita_a?></span>
									</div>
							</tr>
								<?php } ?>
							<tr>
								<td><?php echo $cont_sig?></td>
								<td><input class="tb5_nombres" type="text" name="tb5_nombres_<?php echo $cont?>" value="<?php echo $row->nombres?>"></td>
								<td><input type="number" name="tb5_edad_<?php echo $cont?>" step=0.1  value="<?php echo $row->edad?>"></td>
								<?php 
									if ($row->metodo_planificacion == 0) {
										$row->metodo_planificacion = '';
										$row->tiempo_con_metodo = '';
										if ($row->controles_ult_ano_planifi == 0) {
											$row->controles_ult_ano_planifi = '';
											$checked = 'checked';
										}
										else{
											$checked = '';
										}
									}
									else{
										$row->motivo_no_planifi = '';
										if ($row->controles_ult_ano_planifi == 0) {
											$row->controles_ult_ano_planifi = '';
											$checked = 'checked';
										}
										else{
											$checked = '';
										}
									}
								 ?>
								<td><input type="number" name="tb5_metodo_<?php echo $cont?>" step=0.1  value="<?php echo $row->metodo_planificacion?>"></td>
								<td><input type="number" name="tb5_tiempo_metodo_<?php echo $cont?>" step=0.1  value="<?php echo $row->tiempo_con_metodo?>"></td>
								<td><input class="tb5_control_si" type="number" name="tb5_cuantos_controles_<?php echo $cont?>" step=0.1  value="<?php echo $row->controles_ult_ano_planifi?>"></td>
								 <td>
									<input class="tb5_control_no" id="tb5_planifica_controles_ultimo_año_no_<?php echo $cont?>" type="radio" name="tb5_planifica_controles_ultimo_año_no_<?php echo $cont?>" value="no" <?php echo $checked?> >
									<label class="radio" for="tb5_planifica_controles_ultimo_año_no_<?php echo $cont?>" ></label>
								</td>
								<td><input type="number" name="tb5_motivo_<?php echo $cont?>" step=0.1  value="<?php echo $row->motivo_no_planifi?>"></td>
								<?php 
									if ($row->citologia == 'no') {
										$checked_n = '';
										$checked_a = '';
										$checked_no = 'checked';
									}
									else if ($row->citologia == 'normal') {
										$checked_n = 'checked';
										$checked_a = '';
										$checked_no = '';
									}
									else{
										$checked_n = '';
										$checked_a = 'checked';
										$checked_no = '';
									}
								 ?>
								<td class="br_verde2">
									<input id="tb5_citolo_no_<?php echo $cont?>" type="radio"  name="tb5_citologia_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_citolo_no_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb5_citilo_normal_<?php echo $cont?>" type="radio"  name="tb5_citologia_<?php echo $cont?>" value="normal" <?php echo $checked_n?> >
									<label class="radio" for="tb5_citilo_normal_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb5_citilo_anormal_<?php echo $cont?>" type="radio"  name="tb5_citologia_<?php echo $cont?>" value="anormal" <?php echo $checked_a?> >
									<label class="radio" for="tb5_citilo_anormal_<?php echo $cont?>" ></label>
								</td>
									<?php
									if($row->citologia == 'no'){
										$row->citologia_d = '';
										$row->citologia_m = '';
										$row->citologia_a = '';
									}
								?>
								<td class="br_verde2"><input type="number" name="tb5_citologia_d_<?php echo $cont?>" step=0.1  value="<?php echo $row->citologia_d;?>" min=1 max=31></td>
								<td class="br_verde2"><input type="number" name="tb5_citologia_m_<?php echo $cont?>" step=0.1  value="<?php echo $row->citologia_m;?>" min=1 max=12></td>
								<td class="br_verde2"><input class="year_current_td" type="number" name="tb5_citologia_a_<?php echo $cont?>" step=0.1  value="<?php echo $row->citologia_a;?>" min=1900 max=<?php echo date("Y");?> ></td>
								<?php 
									if ($row->autoexamen_seno == 'no') {
										$checked_n = '';
										$checked_a = '';
										$checked_no = 'checked';
									}
									else if ($row->autoexamen_seno == 'normal') {
										$checked_n = 'checked';
										$checked_a = '';
										$checked_no = '';
									}
									else{
										$checked_n = '';
										$checked_a = 'checked';
										$checked_no = '';
									}
								 ?>
								<td class="br_verde2">
									<input id="tb5_autoexamen_seno_no_<?php echo $cont?>" type="radio"  name="tb5_autoexamen_seno_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_autoexamen_seno_no_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb5_autoexamen_seno_normal_<?php echo $cont?>" type="radio"  name="tb5_autoexamen_seno_<?php echo $cont?>" value="normal" <?php echo $checked_n?> >
									<label class="radio" for="tb5_autoexamen_seno_normal_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb5_autoexamen_seno_anormal_<?php echo $cont?>" type="radio"  name="tb5_autoexamen_seno_<?php echo $cont?>" value="anormal" <?php echo $checked_a?> >
									<label class="radio" for="tb5_autoexamen_seno_anormal_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->violencia_contra_mujer != Null AND $row->violencia_contra_mujer != 0) {
									$violencia_contra_mujer = $row->violencia_contra_mujer;
									$checked_r = '';
									}
									else{
										$violencia_contra_mujer = '';
										$checked_r = 'checked';
									}
								 ?>
								<td class="br_verde2">
									<input class="tb5_violencia_si" id="tb5_violenciacontramujer_si_<?php echo $cont?>" type="number"  name="tb5_violenciacontramujer_<?php echo $cont?>" value="<?php echo $violencia_contra_mujer?>">
								</td>
								<td class="br_verde2">
									<input class="tb5_violencia_no" id="tb5_violenciacontramujer_no_<?php echo $cont?>" type="radio"  name="tb5_violenciacontramujer_no_<?php echo $cont?>" value="no" <?php echo $checked_r?> >
									<label class="radio" for="tb5_violenciacontramujer_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->v_contra_mujer_valorado == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td class="br_verde2">
									<input class="tb5_violencia_v_si" id="tb5_violencia_mujer_valorado_si_<?php echo $cont?>" type="radio"  name="tb5_violencia_mujer_valorado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb5_violencia_mujer_valorado_si_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input class="tb5_violencia_v_no" id="tb5_violencia_mujer_valorado_no_<?php echo $cont?>" type="radio"  name="tb5_violencia_mujer_valorado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_violencia_mujer_valorado_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->carnet == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td class="br_verde2">
									<input id="tb5_carnet_si_<?php echo $cont?>" type="radio"  name="tb5_carnet_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb5_carnet_si_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb5_carnet_no_<?php echo $cont?>" type="radio"  name="tb5_carnet_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_carnet_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_10a18_1 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt1_10a18_<?php echo $cont?>" type="checkbox" name="tb5_td_tt1_10a18_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt1_10a18_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_10a18_2 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt2_10a18_<?php echo $cont?>" type="checkbox" name="tb5_td_tt2_10a18_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt2_10a18_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_10a18_3 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt3_10a18_<?php echo $cont?>" type="checkbox" name="tb5_td_tt3_10a18_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt3_10a18_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_10a18_4 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt4_10a18_<?php echo $cont?>" type="checkbox" name="tb5_td_tt4_10a18_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt4_10a18_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_10a18_5 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt5_10a18_<?php echo $cont?>" type="checkbox" name="tb5_td_tt5_10a18_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt5_10a18_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_19a49_1 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt1_19a49_<?php echo $cont?>" type="checkbox" name="tb5_td_tt1_19a49_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt1_19a49_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_19a49_2 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt2_19a49_<?php echo $cont?>" type="checkbox" name="tb5_td_tt2_19a49_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt2_19a49_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_19a49_3 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt3_19a49_<?php echo $cont?>" type="checkbox" name="tb5_td_tt3_19a49_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt3_19a49_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_19a49_4 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt4_19a49_<?php echo $cont?>" type="checkbox" name="tb5_td_tt4_19a49_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt4_19a49_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_19a49_5 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_td_tt5_19a49_<?php echo $cont?>" type="checkbox" name="tb5_td_tt5_19a49_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_td_tt5_19a49_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->fiebre_amarilla_m =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_fiebre_a_mujer_r1_<?php echo $cont?>" type="checkbox" name="tb5_fiebre_a_mujer_r1_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_fiebre_a_mujer_r1_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->sr_m =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde2">
									<input id="tb5_sr_<?php echo $cont?>" type="checkbox" name="tb5_sr_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_sr_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->examen_prostata == 'no') {
										$checked_n = '';
										$checked_a = '';
										$checked_no = 'checked';
										$row->examen_pros_d = '';
										$row->examen_pros_m = '';
										$row->examen_pros_a = '';
									}
									else if ($row->examen_prostata == 'normal') {
										$checked_n = 'checked';
										$checked_a = '';
										$checked_no = '';
									}
									else{
										$checked_n = '';
										$checked_a = 'checked';
										$checked_no = '';
									}
								 ?>
								<td class="br_verde">
									<input id="tb5_examen_prostata_5años_no_<?php echo $cont?>" type="radio"  name="tb5_examen_prostata_5años_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_examen_prostata_5años_no_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde">
									<input id="tb5_examen_prostata_5años1_normal_<?php echo $cont?>" type="radio"  name="tb5_examen_prostata_5años_<?php echo $cont?>" value="normal" <?php echo $checked_n?> >
									<label class="radio" for="tb5_examen_prostata_5años1_normal_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde">
									<input id="tb5_examen_prostata_5años_anormal_<?php echo $cont?>" type="radio"  name="tb5_examen_prostata_5años_<?php echo $cont?>" value="anormal" <?php echo $checked_a?> >
									<label class="radio" for="tb5_examen_prostata_5años_anormal_<?php echo $cont?>" ></label>
								</td>
							  
								<td class="br_verde"><input type="number" name="tb5_examen_prostat_fecha_d_<?php echo $cont?>" step=0.1  value="<?php echo $row->examen_pros_d?>"  min=1 max=31></td>
								<td class="br_verde"><input type="number" name="tb5_examen_prostat_fecha_m_<?php echo $cont?>" step=0.1  value="<?php echo $row->examen_pros_m?>"  min=1 max=12></td>
								<td class="br_verde"><input class="year_current_td" type="number" name="tb5_examen_prostat_fecha_a_<?php echo $cont?>" step=0.1  value="<?php echo $row->examen_pros_a?>"  min=1900 max=<?php echo date("Y");?> ></td>
								<?php 
									if ($row->fiebre_amarilla_h =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="br_verde">
									<input id="tb5_fiebre_a_mhombre_r1_<?php echo $cont?>" type="checkbox" name="tb5_fiebre_a_hombre_r1_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb5_fiebre_a_mhombre_r1_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->seda_dental == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb5_seda_dental_si_<?php echo $cont?>" type="radio"  name="tb5_seda_dental_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb5_seda_dental_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb5_seda_dental_no_<?php echo $cont?>" type="radio"  name="tb5_seda_dental_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_seda_dental_no_<?php echo $cont?>" ></label>
								</td>
								<td><input type="number" name="tb5_numero_cepilladas_<?php echo $cont?>" value="<?php echo $row->numero_cepilladas?>"></td>
								<?php 
									if ($row->problemas_visuales == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb5_problemas_visuales_si_<?php echo $cont?>" type="radio"  name="tb5_problemas_visuales_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb5_problemas_visuales_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb5_problemas_visuales_no_<?php echo $cont?>" type="radio"  name="tb5_problemas_visuales_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_problemas_visuales_no_<?php echo $cont?>" ></label>
								</td>
								<td><input class="tb5_glicemia" class="tb5_glicemia" type="number" name="tb5_glicemia_<?php echo $cont?>" step=0.1  value="<?php echo $row->valor_glicemia?>"  min=1 required></td>
								<td><input class="tb5_estado_glicemia" class="tb5_estado_glicemia" type="text" name="tb5_glicemia_estado_<?php echo $cont?>" value="<?php echo $row->estado_glicemia?>" required></td>
								<td><input class="tb5_peso" type="number" name="tb5_peso_<?php echo $cont?>" step=0.1  value="<?php echo $row->peso?>" min=1 max=200 required></td>
								<td><input class="tb5_talla" type="number" name="tb5_talla_<?php echo $cont?>" step=0.1  value="<?php echo $row->talla?>" min=1 max=200 required></td>
								<td><input class="tb5_imc" type="number" name="tb5_imc_<?php echo $cont?>" step=0.1  value="<?php echo $row->imc?>" min=1 max=200 required></td>
								<td><input class="tb5_estado_nutricional" type="text" name="tb5_estado_nutricional_<?php echo $cont?>"  value="<?php echo $row->estado_nutricional?>" required></td>
								<td><input class="tb5_pulso" type="number" name="tb5_pulso_<?php echo $cont?>" step=0.1  value="<?php echo $row->pulso_minuto?>"  min=1 required></td>
								<td><input class="tb5_valor_tension" type="text" name="tb5_valor_tension_<?php echo $cont?>" value="<?php echo $row->presion_arterial?>" required></td>
								<td><input class="tb5_estado_tension" type="text" name="tb5_estado_tension_<?php echo $cont?>" step=0.1  value="<?php echo $row->estado_presion_arterial?>" required></td>
								<?php 
									if ($row->consume_medicamento == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									$cual_medicamento = $row->cual_medicamento;
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
										$cual_medicamento = '';

									}
								 ?> 
								<td>
									<input class="consume_medicamento_si" id="tb5_consume_medicamento_si_<?php echo $cont?>" type="radio"  name="tb5_consume_medicamento_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb5_consume_medicamento_si_<?php echo $cont?>" ></label>
								</td>
								<td><input class="consume_medicamento_txt" type="text" name="tb5_consume_medicamento_txt_<?php echo $cont?>" value="<?php echo $cual_medicamento?>"></td>
								<td>
									<input class="consume_medicamento_no" id="tb5_consume_medicamento_no_<?php echo $cont?>" type="radio"  name="tb5_consume_medicamento_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_consume_medicamento_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->canalizado == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb5_canalizado_si_<?php echo $cont?>" type="radio" name="tb5_canalizado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb5_canalizado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb5_canalizado_no_<?php echo $cont?>" type="radio"  name="tb5_canalizado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_canalizado_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->remitido != Null AND $row->remitido != 0) {
									$remitido = $row->remitido;
									$checked_r = '';
									}
									else{
										$remitido = '';
										$checked_r = 'checked';
									}
								 ?>
								<td>
									<input class="remitido" id="tb5_remitido_si_<?php echo $cont?>" type="number"  name="tb5_remitido_<?php echo $cont?>" value="<?php echo $remitido ?>"  min=0 max=10>
								</td>
								<td>
									<input class="remitido_no" id="tb5_remitido_no_<?php echo $cont?>" type="radio"  name="tb5_remitido_no_<?php echo $cont?>" value="no" <?php echo $checked_r?> >
									<label class="radio" for="tb5_remitido_no_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb5_valorado_si_<?php echo $cont?>" type="radio"  name="tb5_valorado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb5_valorado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb5_valorado_no_<?php echo $cont?>" type="radio"  name="tb5_valorado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb5_valorado_no_<?php echo $cont?>" ></label>
									<input type="hidden" name="id_integrante_<?php echo $cont?>" value="<?php echo $row->id_integrante?>">
								</td>
							</tr>
							<?php
								$cont_v_actual++;
								$cont++; 
							 	}	
							$cont_sig++; 
							} 
							?>
						</tbody>
					</table>
				</div>
				<div class="spacey0"></div>
				<div class="table">
					<table id="tb5_observaciones" class="observaciones">
						<thead>
						</thead>
						<tbody>
							<?php
							$cont_v_actual = 0;
							$id_v_actual = 0;
							$cont_sig = 1;
							foreach ($collect as $row) {
								if ($row->id_visita != $id_v_actual) {
									$id_v_actual = $row->id_visita;
									$cont_v_actual = 0;
									$cont_sig = 1;
								}
								if ($cont_v_actual == 0) {
							?>
							<tr>
								<td colspan="2" class="none_obs"></td>
							</tr>
							<tr>
								<th colspan="2">Observaciones Visita <?php echo $id_v_actual?></th>
							</tr>
							<?php } ?>
							<tr>
								<td><?php echo $cont_sig?></td>
								<td><input type="text" name="tb5_observaciones_<?php echo $cont?>" value="<?php echo $row->observaciones?>"></td>
							</tr>
							
							<?php
							$cont_v_actual++;
							$cont_sig++; 
							$cont++; 
							} 
							?>
						</tbody>
					</table>
				</div>
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
			<li class="active" onclick="window.location='hom_muj_10_a_59.php'"><label>10 a 59 Años..<div class="info_tb">Registro de Actividades Hombres y Mujeres de 10 a 59 años</div></label></li>
			<li onclick="window.location='adultos_60_mas.php'"><label>60 Años o mas..<div class="info_tb">Registro de Actividades Adultos(as) de 60 años y mas</div></label></li>
			<li onclick="window.location='gestacion_parto.php'"><label>Gesta..<div class="info_tb">Registro de Actividades Gestacion, Parto y Postparto</div></label></li>
			<li onclick="window.location='antecedentes.php'"><label>Antece..<div class="info_tb">Antecedentes en Salud Mental</div></label></li>
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