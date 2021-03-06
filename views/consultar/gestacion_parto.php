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
		$sql = "SELECT * FROM integrantes JOIN gestacion USING(id_integrante) JOIN visitas USING(id_visita,id_familia) WHERE visitas.id_familia = '$id_familia' AND sexo = 'F'";
		$query = $bd->query($sql);
		while ($row = $query->fetch_object()) {
			$collect[] = $row;
		}
		$query->data_seek(0);


		if (!$query) echo $bd->error;
		if ($query->num_rows == 0) {
			echo "<div class='registro_non'>";
	        echo "<p>No Existen Registros de Gestacion y Parto en esta Familia</p>";
	        echo "<button type='button' class='button next block' onclick='window.location=\"antecedentes.php\"'>Siguiente</button>";
	        echo "</div>";
		}
		else{ 
			
		?>
		<form id="form9" action="/instituto/core/consultas/s_gestacion_parto.php" method="POST">
			<div class="divh1">
				<h1>Registro de Actividades Gestacion, Parto y Postparto</h1>
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
					$sql_f = "SELECT * FROM visitas WHERE id_familia = '$id_familia' LIMIT 1";
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
					<table id="tb7_gestacion">
						<?php 
						 	$sql_e = "SELECT remitido_otro,id_visita,otros_tb_gestacion.id_familia,otro_metodo,otro_atencion_parto,otro_control_prenatal FROM gestacion JOIN otros_tb_gestacion USING(id_visita) JOIN integrantes USING(id_integrante) WHERE integrantes.id_familia = '$id_familia' LIMIT 1";
						 	$query_e = $bd->query($sql_e); 
							$row_e = $query_e->fetch_object();
						?>
						<thead>
							<tr>
								<th colspan="1" rowspan="5" class="none"></th>
								<th colspan="4" rowspan="1" class="none"><div class="none_r"></div></th>
								<th colspan="46" rowspan="1" class="bg_verde br_verde">Gestacion</th>
								<th colspan="5" rowspan="1" class="bg_blanco br_verde">Parto</th>
								<th colspan="4" rowspan="1" class="bg_verde br_verde">Postparto</th>
								<th colspan="3" rowspan="1">Consume Algun Medicamento</th>
								<th colspan="6" rowspan="1">Conducta</th>
							</tr>

							<tr>
								<th colspan="2" rowspan="3" class="celda_vertical"><p>Embarazada</p></th>
								<th colspan="1" rowspan="4">Nombres</th>
								<th colspan="1" rowspan="4" class="celda_vertical"><p>Edad</p></th>
								<th colspan="6" rowspan="2" class="table_info">
									<div class="ico">i</div>
									Control Prenatal
									<div class="info">
										<label><div class="ico">i</div></label><span>Control Prenatal</span>
										<label>1</label><span>Medico</span>
										<label>2</label><span>Enfermera</span>
										<label>3</label><span>Auxiliar de Enfermeria</span>
										<label>4</label><span>Promotora</span>
										<label>5</label><span>Odontologia</span>
										<label>6</label><span>Partera</span>
										<label>7</label><span>Nadie</span>
										<label>8</label><span>Familiar y/o conocido</span>
										<label>9</label><span>Medico Tradicional</span>
										<label>10</label><span class="otros_tb_info">Otro: <input type="text" name="tb7_otra_persona" value="<?php echo $row_e->otro_control_prenatal?>"/></span>
									</div>
								</th>
								<th colspan="8" rowspan="2" class="table_info">
									<div class="ico">i</div>
									Antecedentes Obstetricos
									<div class="info">
										<label><div class="ico">i</div></label><span>Antecedentes Obstetricos</span>
										<label>G</label><span>Gestaciones</span>
										<label>P</label><span>Partos</span>
										<label>A</label><span>Abortos</span>
										<label>C</label><span>Cesareas</span>
										<label>No. HV</label><span>No. Hijos Vivos</span>
										<label>FUP</label><span>Fecha Ultimo Parto</span>
										<label></label><span></span>
										<label>*</label><span>Para las mujeres en edad fertil (MEF) No embarazadas diligencie los antecedentes obstreticos</span>
									</div>
								</th>
								<th colspan="2" rowspan="3">Calificacion Riesgo Materno</th>
								<th colspan="3" rowspan="3">Fecha Ultima Regla</th>
								<th colspan="3" rowspan="3">FechaProbable del Parto</th>
								<th colspan="1" rowspan="4">Peso (Kgs)</th>
								<th colspan="1" rowspan="4" class="celda_vertical"><p>Semanas Gestacion</p></th>
								<th colspan="8" rowspan="1">Examen</th>
								<th colspan="6" rowspan="1">Vacunacion</th>
								<th colspan="2" rowspan="3" class="table_info">
									<div class="ico">i</div>
									Suple-mentacion
									<div class="info">
										<label></label><span></span>
										<label><div class="ico">i</div></label><span>Suplementacion Con hierro + Acido Folico, Calcio</span>
									</div>
								</th>
								<th colspan="6" rowspan="1">Habitos</th>
								<th colspan="1" rowspan="4" class="celda_vertical"><p>Parto Normal</p></th>
								<th colspan="1" rowspan="4" class="celda_vertical"><p>Parto Instrum.</p></th>
								<th colspan="1" rowspan="4" class="celda_vertical"><p>Cesarea</p></th>
								<th colspan="2" rowspan="2" class="table_info">
									<div class="ico">i</div>
									Atencion del Parto
									<div class="info">
										<label><div class="ico">i</div></label><span>Atencion del Parto</span>
										<label>1</label><span>Medico</span>
										<label>2</label><span>Enfermera</span>
										<label>3</label><span>Auxiliar de Enfermeria</span>
										<label>4</label><span>Promotora</span>
										<label>5</label><span>Odontologia</span>
										<label>6</label><span>Partera</span>
										<label>7</label><span>Nadie</span>
										<label>8</label><span>Familiar y/o conocido</span>
										<label>9</label><span>Medico Tradicional</span>
										<label>10</label><span class="otros_tb_info">Otro: <input type="text" name="tb7_otra_persona_atencion_parto" value="<?php echo $row_e->otro_atencion_parto?>"/></span>
									</div>
								</th>
								<th colspan="2" rowspan="3">Atencion Institucional</th>
								<th colspan="2" rowspan="3" class="table_info">
									<div class="ico">i</div>
									Planifica.
									<div class="info">
										<label><div class="ico">i</div></label><span>Metodo de Planificacion</span>
									   <label>1</label><span>Pildora</span>
										<label>2</label><span>Inyeccion</span>
										<label>3</label><span>DIU- T de cobre</span>
										<label>4</label><span>Ritmo</span>
										<label>5</label><span>Ovulos, Tabletas o Crema Vaginal</span>
										<label>6</label><span>Condon</span>
										<label>7</label><span>Yabel</span>
										<label>8</label><span>Vasectomia</span>
										<label>9</label><span>Ligadura de Trompas</span>
										<label>10</label><span class="otros_tb_info">Otro: <input type="text" name="tb7_otro_metodo" value="<?php echo $row_e->otro_metodo?>"/></span>
									</div>
								</th>
								<th colspan="1" rowspan="4">Si</th>
								<th colspan="1" rowspan="4">Cual?</th>
								<th colspan="1" rowspan="4">No</th>
								<th colspan="2" rowspan="3">Canalizado</th>
								<th colspan="2" rowspan="3" class="table_info">
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
										<label>10</label><span class="otros_tb_info">Otro: <input type="text" name="tb7_otra_remision" value="<?php echo $row_e->remitido_otro?>"/></span>
									</div>
								</th>
								<th colspan="2" rowspan="3">Valorado</th>
							</tr>

							<tr>
								<th colspan="3" rowspan="1">Serologia</th>
								<th colspan="3" rowspan="1">VIH</th>
								<th colspan="2" rowspan="1">Odonto.</th>
								<th colspan="3" rowspan="2">TD / TT Gestantes 10 a 18</th>
								<th colspan="3" rowspan="2">TD / TT Gestantes 19 a 49</th>
								<th colspan="2" rowspan="2">Seden-tarismo</th>
								<th colspan="2" rowspan="2">Fuma</th>
								<th colspan="2" rowspan="2">Consume Bebidas Alcoholicas</th>
							</tr>

						   
							<tr>
								<th colspan="1" rowspan="1">Si</th>
								<th colspan="1" rowspan="2">No</th>
								<th colspan="1" rowspan="2" class="celda_vertical table_info"><p>Quien.</p>
									<div class="info">
										<label></label><span></span>
										<label><div class="ico">i</div></label><span>Quien Realizó el control prenatal</span>
									</div>
								</th>
								<th colspan="3" rowspan="1">Fecha Inicio</th>
								<th colspan="1" rowspan="2">G</th>
								<th colspan="1" rowspan="2">P</th>
								<th colspan="1" rowspan="2">A</th>
								<th colspan="1" rowspan="2">C</th>
								<th colspan="1" rowspan="2">No. HV</th>
								<th colspan="3" rowspan="1" class="table_info">FUP
									 <div class="info">
										<label></label><span></span>
										<label><div class="ico">i</div></label><span>Fecha Ultimo Parto</span>
									</div>
								</th>
								<th colspan="2" rowspan="1">Si</th>
								<th colspan="1" rowspan="2">No</th>
								<th colspan="2" rowspan="1">Si</th>
								<th colspan="1" rowspan="2">No</th>
								<th colspan="1" rowspan="2">Si</th>
								<th colspan="1" rowspan="2">No</th>
								<th colspan="1" rowspan="2">Institu-cional</th>
								<th colspan="1" rowspan="2">Domici-liario</th>
							</tr>

							<tr>
								<th>Si</th>
								<th>No</th>
								<th>Cuantos?</th>
								<th>D</th>
								<th>M</th>
								<th>A</th>
								<th>D</th>
								<th>M</th>
								<th>A</th>
								<th>Alto</th>
								<th>Bajo</th>
								<th>D</th>
								<th>M</th>
								<th>A</th>
								<th>D</th>
								<th>M</th>
								<th>A</th>
								<th>Pos</th>
								<th>Neg</th>
								<th>Pos</th>
								<th>Neg</th>
								<th>1</th>
								<th>2</th>
								<th>3</th>
								<th>1</th>
								<th>2</th>
								<th>3</th>
								<th>Si</th>
								<th>No</th>
								<th>Si</th>
								<th>No</th>
								<th>Si</th>
								<th>No</th>
								<th>Si</th>
								<th>No</th>
								<th>Si</th>
								<th>No</th>
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
								<?php 
									if ($row->embarazada == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb7_embarazada_si_<?php echo $cont?>" type="radio"  name="tb7_embarazada_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_embarazada_si_<?php echo $cont?>" ></label>
								</td>

								 <td>
									<input id="tb7_embarazada_no_<?php echo $cont?>" type="radio"  name="tb7_embarazada_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_embarazada_no_<?php echo $cont?>" ></label>
								</td>
								<td><input class="tb7_nombres" type="text" name="tb7_nombres_<?php echo $cont?>" value="<?php echo $row->nombres?>"></td>
								<td><input type="number" name="tb7_edad_<?php echo $cont?>" value="<?php echo $row->edad_anos?>"></td>
								<?php 
									if ($row->control_prenatal == 0) {
										$row->control_prenatal = '';
										$row->control_prenatal_quien = '';
										$row->control_prenatal_d = '';
										$row->control_prenatal_m = '';
										$row->control_prenatal_a = '';
										$checked = 'checked';
									}
									else{
										$checked = '';
									}
								 ?>
								<td><input type="number" name="tb7_control_prenatal_cuantos_<?php echo $cont?>" value="<?php echo $row->control_prenatal?>"></td>
								<td>
									<input id="tb7_control_prenatal_no_<?php echo $cont?>" type="radio"  name="tb7_control_prenatal_<?php echo $cont?>" value="no" <?php echo $checked?> >
									<label class="radio" for="tb7_control_prenatal_no_<?php echo $cont?>" ></label>
								</td>
								<td><input type="number" name="tb7_control_prenatal_quien_<?php echo $cont?>" value="<?php echo $row->control_prenatal_quien?>"></td>
								<td><input type="number" name="tb7_control_prenatal_fecha_d_<?php echo $cont?>" value="<?php echo $row->control_prenatal_d?>"  min=1 max=31></td>
								<td><input type="number" name="tb7_control_prenatal_fecha_m_<?php echo $cont?>" value="<?php echo $row->control_prenatal_m?>"  min=1 max=12></td>
								<td><input class="year_current_td" type="number" name="tb7_control_prenatal_fecha_a_<?php echo $cont?>" value="<?php echo $row->control_prenatal_a?>"  min=1900 max=<?php echo date("Y");?> ></td>

								<td><input type="number" name="tb7_ante_obstre_gestaciones_<?php echo $cont?>" value="<?php echo $row->ante_gestaciones?>"></td>
								<td><input type="number" name="tb7_ante_obstre_partos_<?php echo $cont?>" value="<?php echo $row->ante_partos?>"></td>
								<td><input type="number" name="tb7_ante_obstre_abortos_<?php echo $cont?>" value="<?php echo $row->ante_abortos?>"></td>
								<td><input type="number" name="tb7_ante_obstre_cesareas_<?php echo $cont?>" value="<?php echo $row->ante_cesareas?>"></td>
								<td><input type="number" name="tb7_ante_obstre_num_hijos_<?php echo $cont?>" value="<?php echo $row->ante_num_hijos_vivos?>"></td>
								<td><input type="number" name="tb7_a_f_ult_part_d_<?php echo $cont?>" value="<?php echo $row->ultimo_parto_d?>"  min=1 max=31></td>
								<td><input type="number" name="tb7_a_f_ult_part_m_<?php echo $cont?>" value="<?php echo $row->ultimo_parto_m?>"  min=1 max=12></td>
								<td><input class="year_current_td" type="number" name="tb7_a_f_ult_part_a_<?php echo $cont?>" value="<?php echo $row->ultimo_parto_a?>"  min=1900 max=<?php echo date("Y");?> ></td>
								<?php 
									if ($row->califi_riesgo_materno == 'alto') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb7_clasi_riesgo_materno_si_<?php echo $cont?>" type="radio"  name="tb7_clasi_riesgo_materno_<?php echo $cont?>" value="alto" <?php echo $checked_si?> >
									<label class="radio" for="tb7_clasi_riesgo_materno_si_<?php echo $cont?>" ></label>
								</td>

								 <td>
									<input id="tb7_clasi_riesgo_materno_no_<?php echo $cont?>" type="radio"  name="tb7_clasi_riesgo_materno_<?php echo $cont?>" value="bajo" <?php echo $checked_no?> >
									<label class="radio" for="tb7_clasi_riesgo_materno_no_<?php echo $cont?>" ></label>
								</td>

								<td><input type="number" name="tb7_fecha_ult_regla_d_<?php echo $cont?>" value="<?php echo $row->ultimo_regla_d?>"  min=1 max=31></td>
								<td><input type="number" name="tb7_fecha_ult_regla_m_<?php echo $cont?>" value="<?php echo $row->ultimo_regla_m?>"  min=1 max=12></td>
								<td><input class="year_current_td" type="number" name="tb7_fecha_ult_regla_a_<?php echo $cont?>" value="<?php echo $row->ultimo_regla_a?>"  min=1900 max=<?php echo date("Y");?> ></td>
								<td><input type="number" name="tb7_fecha_prop_parto_d_<?php echo $cont?>" value="<?php echo $row->fecha_prob_parto_d?>"  min=1 max=31></td>
								<td><input type="number" name="tb7_fecha_prop_parto_m_<?php echo $cont?>" value="<?php echo $row->fecha_prob_parto_m?>"  min=1 max=12></td> 
								<td><input class="year_current_td" type="number" name="tb7_fecha_prop_parto_a_<?php echo $cont?>" value="<?php echo $row->fecha_prob_parto_a?>"  min=1900 max=<?php echo date("Y");?> ></td>
								<td><input type="number" name="tb7_peso_<?php echo $cont?>" value="<?php echo $row->peso?>"></td>
								<td><input type="number" name="tb7_gestacion_semanas_<?php echo $cont?>" value="<?php echo $row->gestacion?>"></td>
								<?php 
									if ($row->serologia == 'no') {
										$checked_n = '';
										$checked_a = '';
										$checked_no = 'checked';
									}
									else if ($row->serologia == 'positivo') {
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
								<td>
									<input id="tb7_serologia_pos_<?php echo $cont?>" type="radio"  name="tb7_serologia_<?php echo $cont?>" value="positivo" <?php echo $checked_n?> >
									<label class="radio" for="tb7_serologia_pos_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_serologia_neg_<?php echo $cont?>" type="radio"  name="tb7_serologia_<?php echo $cont?>" value="negativo" <?php echo $checked_a?> >
									<label class="radio" for="tb7_serologia_neg_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_serologia_no_<?php echo $cont?>" type="radio"  name="tb7_serologia_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_serologia_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->vih == 'no') {
										$checked_n = '';
										$checked_a = '';
										$checked_no = 'checked';
									}
									else if ($row->vih == 'positivo') {
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
								<td>
									<input id="tb7_vih_pos_<?php echo $cont?>" type="radio"  name="tb7_vih_<?php echo $cont?>" value="positivo" <?php echo $checked_n?> >
									<label class="radio" for="tb7_vih_pos_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_vih_neg_<?php echo $cont?>" type="radio"  name="tb7_vih_<?php echo $cont?>" value="negativo" <?php echo $checked_a?> >
									<label class="radio" for="tb7_vih_neg_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_vih_no_<?php echo $cont?>" type="radio"  name="tb7_vih_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_vih_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->odontologia == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb7_odontologico_si_<?php echo $cont?>" type="radio"  name="tb7_odontologico_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_odontologico_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_odontologico_no_<?php echo $cont?>" type="radio"  name="tb7_odontologico_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_odontologico_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_10a18_1  =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								 ?>
								<td>
									<input id="tb7_td_tt1_10a18_si_<?php echo $cont?>" type="checkbox"  name="tb7_td_tt1_10a18_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb7_td_tt1_10a18_si_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_10a18_2 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								 ?>
								 <td>
									<input id="tb7_td_tt2_10a18_si_<?php echo $cont?>" type="checkbox"  name="tb7_td_tt2_10a18_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb7_td_tt2_10a18_si_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_10a18_3 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								 ?>
								 <td>
									<input id="tb7_td_tt3_10a18_si_<?php echo $cont?>" type="checkbox"  name="tb7_td_tt310a18_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb7_td_tt3_10a18_si_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_19a49_1 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								 ?>
								 <td>
									<input id="tb7_td_tt1_19a49_si_<?php echo $cont?>" type="checkbox"  name="tb7_td_tt1_19a49_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb7_td_tt1_19a49_si_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_19a49_2 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								 ?>
								 <td>
									<input id="tb7_td_tt2_19a49_si_<?php echo $cont?>" type="checkbox"  name="tb7_td_tt2_19a49_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb7_td_tt2_19a49_si_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_19a49_3 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								 ?>
								 <td>
									<input id="tb7_td_tt3_19a49_si_<?php echo $cont?>" type="checkbox"  name="tb7_td_tt3_19a49_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb7_td_tt3_19a49_si_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->suplementacion == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb7_suplementacion_si_<?php echo $cont?>" type="radio"  name="tb7_suplementacion_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_suplementacion_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_suplementacion_no_<?php echo $cont?>" type="radio"  name="tb7_suplementacion_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_suplementacion_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->sedentarismo == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb7_sedentarismo_si_<?php echo $cont?>" type="radio"  name="tb7_sedentarismo_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_sedentarismo_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_sedentarismo_no_<?php echo $cont?>" type="radio"  name="tb7_sedentarismo_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_sedentarismo_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->fuma == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb7_fuma_si_<?php echo $cont?>" type="radio"  name="tb7_fuma_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_fuma_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_fuma_no_<?php echo $cont?>" type="radio"  name="tb7_fuma_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_fuma_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->consume_alcohol == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb7_consume_alcohol_si_<?php echo $cont?>" type="radio"  name="tb7_consume_alcohol_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_consume_alcohol_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_consume_alcohol_no_<?php echo $cont?>" type="radio"  name="tb7_consume_alcohol_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_consume_alcohol_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->tipo_parto == 'no') {
										$checked_n = '';
										$checked_a = '';
										$checked_no = 'checked';
									}
									else if ($row->tipo_parto == 'normal') {
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
								<td>
									<input id="tb7_parto_n_<?php echo $cont?>" type="radio"  name="tb7_parto_<?php echo $cont?>" value="normal" <?php echo $checked_n?> >
									<label class="radio" for="tb7_parto_n_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_parto_ins_<?php echo $cont?>" type="radio"  name="tb7_parto_<?php echo $cont?>" value="instrumental" <?php echo $checked_a?> >
									<label class="radio" for="tb7_parto_ins_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_parto_ces_<?php echo $cont?>" type="radio"  name="tb7_parto_<?php echo $cont?>" value="cesarea" <?php echo $checked_no?> >
									<label class="radio" for="tb7_parto_ces_<?php echo $cont?>" ></label>
								</td>

								<td><input type="number" name="tb7_atencion_parto_institucional_<?php echo $cont?>" value="<?php echo $row->atencion_parto_i?>"></td>
								<td><input type="number" name="tb7_atencion_parto_domiciliario_<?php echo $cont?>" value="<?php echo $row->atencion_parto_d?>"></td>
								<?php 
									if ($row->atencion_institucional == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb7_postparto_atencion_institu_si_<?php echo $cont?>" type="radio"  name="tb7_postparto_atencion_institu_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_postparto_atencion_institu_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_postparto_atencion_institu_no_<?php echo $cont?>" type="radio"  name="tb7_postparto_atencion_institu_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_postparto_atencion_institu_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->planificacion == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								?>
								<td>
									<input id="tb7_postparto_planifica_si_<?php echo $cont?>" type="radio"  name="tb7_postparto_planifica_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_postparto_planifica_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_postparto_planifica_no_<?php echo $cont?>" type="radio"  name="tb7_postparto_planifica_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_postparto_planifica_no_<?php echo $cont?>" ></label>
								</td>
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
									<input class="consume_medicamento_si" id="tb7_consume_medicamento_si_<?php echo $cont?>" type="radio"  name="tb7_consume_medicamento_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_consume_medicamento_si_<?php echo $cont?>" ></label>
								</td>
								<td><input class="consume_medicamento_txt" type="text" name="tb7_consume_medicamento_txt_<?php echo $cont?>" value="<?php echo $cual_medicamento?>"></td>

								<td>
									<input class="consume_medicamento_no" id="tb7_consume_medicamento_no_<?php echo $cont?>" type="radio"  name="tb7_consume_medicamento_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_consume_medicamento_no_<?php echo $cont?>" ></label>
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
									<input id="tb7_canalizado_si_<?php echo $cont?>" type="radio"  name="tb7_canalizado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_canalizado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_canalizado_no_<?php echo $cont?>" type="radio"  name="tb7_canalizado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_canalizado_no_<?php echo $cont?>" ></label>
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
									<input class="remitido" id="tb7_remitido_si_<?php echo $cont?>" type="number"  name="tb7_remitido_<?php echo $cont?>" value="<?php echo $remitido?>"  min=0 max=10>
								</td>
								<td>
									<input class="remitido_no" id="tb7_remitido_no_<?php echo $cont?>" type="radio"  name="tb7_remitido_no_<?php echo $cont?>" value="no" <?php echo $checked_r?> >
									<label class="radio" for="tb7_remitido_no_<?php echo $cont?>" ></label>
								</td>

								<td>
									<input id="tb7_valorado_si_<?php echo $cont?>" type="radio"  name="tb7_valorado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_valorado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_valorado_no_<?php echo $cont?>" type="radio"  name="tb7_valorado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_valorado_no_<?php echo $cont?>" ></label>
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
								<?php 
									if ($row->embarazada == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb7_embarazada_si_<?php echo $cont?>" type="radio"  name="tb7_embarazada_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_embarazada_si_<?php echo $cont?>" ></label>
								</td>

								 <td>
									<input id="tb7_embarazada_no_<?php echo $cont?>" type="radio"  name="tb7_embarazada_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_embarazada_no_<?php echo $cont?>" ></label>
								</td>
								<td><input class="tb7_nombres" type="text" name="tb7_nombres_<?php echo $cont?>" value="<?php echo $row->nombres?>"></td>
								<td><input type="number" name="tb7_edad_<?php echo $cont?>" value="<?php echo $row->edad_anos?>"></td>
								<?php 
									if ($row->control_prenatal == 0) {
										$row->control_prenatal = '';
										$row->control_prenatal_quien = '';
										$row->control_prenatal_d = '';
										$row->control_prenatal_m = '';
										$row->control_prenatal_a = '';
										$checked = 'checked';
									}
									else{
										$checked = '';
									}
								 ?>
								<td><input type="number" name="tb7_control_prenatal_cuantos_<?php echo $cont?>" value="<?php echo $row->control_prenatal?>"></td>
								<td>
									<input id="tb7_control_prenatal_no_<?php echo $cont?>" type="radio"  name="tb7_control_prenatal_<?php echo $cont?>" value="no" <?php echo $checked?> >
									<label class="radio" for="tb7_control_prenatal_no_<?php echo $cont?>" ></label>
								</td>
								<td><input type="number" name="tb7_control_prenatal_quien_<?php echo $cont?>" value="<?php echo $row->control_prenatal_quien?>"></td>
								<td><input type="number" name="tb7_control_prenatal_fecha_d_<?php echo $cont?>" value="<?php echo $row->control_prenatal_d?>"  min=1 max=31></td>
								<td><input type="number" name="tb7_control_prenatal_fecha_m_<?php echo $cont?>" value="<?php echo $row->control_prenatal_m?>"  min=1 max=12></td>
								<td><input class="year_current_td" type="number" name="tb7_control_prenatal_fecha_a_<?php echo $cont?>" value="<?php echo $row->control_prenatal_a?>"  min=1900 max=<?php echo date("Y");?> ></td>

								<td><input type="number" name="tb7_ante_obstre_gestaciones_<?php echo $cont?>" value="<?php echo $row->ante_gestaciones?>"></td>
								<td><input type="number" name="tb7_ante_obstre_partos_<?php echo $cont?>" value="<?php echo $row->ante_partos?>"></td>
								<td><input type="number" name="tb7_ante_obstre_abortos_<?php echo $cont?>" value="<?php echo $row->ante_abortos?>"></td>
								<td><input type="number" name="tb7_ante_obstre_cesareas_<?php echo $cont?>" value="<?php echo $row->ante_cesareas?>"></td>
								<td><input type="number" name="tb7_ante_obstre_num_hijos_<?php echo $cont?>" value="<?php echo $row->ante_num_hijos_vivos?>"></td>
								<td><input type="number" name="tb7_a_f_ult_part_d_<?php echo $cont?>" value="<?php echo $row->ultimo_parto_d?>"  min=1 max=31></td>
								<td><input type="number" name="tb7_a_f_ult_part_m_<?php echo $cont?>" value="<?php echo $row->ultimo_parto_m?>"  min=1 max=12></td>
								<td><input class="year_current_td" type="number" name="tb7_a_f_ult_part_a_<?php echo $cont?>" value="<?php echo $row->ultimo_parto_a?>"  min=1900 max=<?php echo date("Y");?> ></td>
								<?php 
									if ($row->califi_riesgo_materno == 'alto') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb7_clasi_riesgo_materno_si_<?php echo $cont?>" type="radio"  name="tb7_clasi_riesgo_materno_<?php echo $cont?>" value="alto" <?php echo $checked_si?> >
									<label class="radio" for="tb7_clasi_riesgo_materno_si_<?php echo $cont?>" ></label>
								</td>

								 <td>
									<input id="tb7_clasi_riesgo_materno_no_<?php echo $cont?>" type="radio"  name="tb7_clasi_riesgo_materno_<?php echo $cont?>" value="bajo" <?php echo $checked_no?> >
									<label class="radio" for="tb7_clasi_riesgo_materno_no_<?php echo $cont?>" ></label>
								</td>

								<td><input type="number" name="tb7_fecha_ult_regla_d_<?php echo $cont?>" value="<?php echo $row->ultimo_regla_d?>"  min=1 max=31></td>
								<td><input type="number" name="tb7_fecha_ult_regla_m_<?php echo $cont?>" value="<?php echo $row->ultimo_regla_m?>"  min=1 max=12></td>
								<td><input class="year_current_td" type="number" name="tb7_fecha_ult_regla_a_<?php echo $cont?>" value="<?php echo $row->ultimo_regla_a?>"  min=1900 max=<?php echo date("Y");?> ></td>
								<td><input type="number" name="tb7_fecha_prop_parto_d_<?php echo $cont?>" value="<?php echo $row->fecha_prob_parto_d?>"  min=1 max=31></td>
								<td><input type="number" name="tb7_fecha_prop_parto_m_<?php echo $cont?>" value="<?php echo $row->fecha_prob_parto_m?>"  min=1 max=12></td> 
								<td><input class="year_current_td" type="number" name="tb7_fecha_prop_parto_a_<?php echo $cont?>" value="<?php echo $row->fecha_prob_parto_a?>"  min=1900 max=<?php echo date("Y");?> ></td>
								<td><input type="number" name="tb7_peso_<?php echo $cont?>" value="<?php echo $row->peso?>"></td>
								<td><input type="number" name="tb7_gestacion_semanas_<?php echo $cont?>" value="<?php echo $row->gestacion?>"></td>
								<?php 
									if ($row->serologia == 'no') {
										$checked_n = '';
										$checked_a = '';
										$checked_no = 'checked';
									}
									else if ($row->serologia == 'positivo') {
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
								<td>
									<input id="tb7_serologia_pos_<?php echo $cont?>" type="radio"  name="tb7_serologia_<?php echo $cont?>" value="positivo" <?php echo $checked_n?> >
									<label class="radio" for="tb7_serologia_pos_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_serologia_neg_<?php echo $cont?>" type="radio"  name="tb7_serologia_<?php echo $cont?>" value="negativo" <?php echo $checked_a?> >
									<label class="radio" for="tb7_serologia_neg_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_serologia_no_<?php echo $cont?>" type="radio"  name="tb7_serologia_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_serologia_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->vih == 'no') {
										$checked_n = '';
										$checked_a = '';
										$checked_no = 'checked';
									}
									else if ($row->vih == 'positivo') {
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
								<td>
									<input id="tb7_vih_pos_<?php echo $cont?>" type="radio"  name="tb7_vih_<?php echo $cont?>" value="positivo" <?php echo $checked_n?> >
									<label class="radio" for="tb7_vih_pos_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_vih_neg_<?php echo $cont?>" type="radio"  name="tb7_vih_<?php echo $cont?>" value="negativo" <?php echo $checked_a?> >
									<label class="radio" for="tb7_vih_neg_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_vih_no_<?php echo $cont?>" type="radio"  name="tb7_vih_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_vih_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->odontologia == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb7_odontologico_si_<?php echo $cont?>" type="radio"  name="tb7_odontologico_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_odontologico_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_odontologico_no_<?php echo $cont?>" type="radio"  name="tb7_odontologico_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_odontologico_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_10a18_1  =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								 ?>
								<td>
									<input id="tb7_td_tt1_10a18_si_<?php echo $cont?>" type="checkbox"  name="tb7_td_tt1_10a18_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb7_td_tt1_10a18_si_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_10a18_2 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								 ?>
								 <td>
									<input id="tb7_td_tt2_10a18_si_<?php echo $cont?>" type="checkbox"  name="tb7_td_tt2_10a18_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb7_td_tt2_10a18_si_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_10a18_3 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								 ?>
								 <td>
									<input id="tb7_td_tt3_10a18_si_<?php echo $cont?>" type="checkbox"  name="tb7_td_tt310a18_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb7_td_tt3_10a18_si_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_19a49_1 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								 ?>
								 <td>
									<input id="tb7_td_tt1_19a49_si_<?php echo $cont?>" type="checkbox"  name="tb7_td_tt1_19a49_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb7_td_tt1_19a49_si_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_19a49_2 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								 ?>
								 <td>
									<input id="tb7_td_tt2_19a49_si_<?php echo $cont?>" type="checkbox"  name="tb7_td_tt2_19a49_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb7_td_tt2_19a49_si_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->td_tt_19a49_3 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								 ?>
								 <td>
									<input id="tb7_td_tt3_19a49_si_<?php echo $cont?>" type="checkbox"  name="tb7_td_tt3_19a49_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb7_td_tt3_19a49_si_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->suplementacion == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb7_suplementacion_si_<?php echo $cont?>" type="radio"  name="tb7_suplementacion_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_suplementacion_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_suplementacion_no_<?php echo $cont?>" type="radio"  name="tb7_suplementacion_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_suplementacion_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->sedentarismo == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb7_sedentarismo_si_<?php echo $cont?>" type="radio"  name="tb7_sedentarismo_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_sedentarismo_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_sedentarismo_no_<?php echo $cont?>" type="radio"  name="tb7_sedentarismo_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_sedentarismo_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->fuma == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb7_fuma_si_<?php echo $cont?>" type="radio"  name="tb7_fuma_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_fuma_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_fuma_no_<?php echo $cont?>" type="radio"  name="tb7_fuma_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_fuma_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->consume_alcohol == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb7_consume_alcohol_si_<?php echo $cont?>" type="radio"  name="tb7_consume_alcohol_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_consume_alcohol_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_consume_alcohol_no_<?php echo $cont?>" type="radio"  name="tb7_consume_alcohol_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_consume_alcohol_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->tipo_parto == 'no') {
										$checked_n = '';
										$checked_a = '';
										$checked_no = 'checked';
									}
									else if ($row->tipo_parto == 'normal') {
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
								<td>
									<input id="tb7_parto_n_<?php echo $cont?>" type="radio"  name="tb7_parto_<?php echo $cont?>" value="normal" <?php echo $checked_n?> >
									<label class="radio" for="tb7_parto_n_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_parto_ins_<?php echo $cont?>" type="radio"  name="tb7_parto_<?php echo $cont?>" value="instrumental" <?php echo $checked_a?> >
									<label class="radio" for="tb7_parto_ins_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_parto_ces_<?php echo $cont?>" type="radio"  name="tb7_parto_<?php echo $cont?>" value="cesarea" <?php echo $checked_no?> >
									<label class="radio" for="tb7_parto_ces_<?php echo $cont?>" ></label>
								</td>

								<td><input type="number" name="tb7_atencion_parto_institucional_<?php echo $cont?>" value="<?php echo $row->atencion_parto_i?>"></td>
								<td><input type="number" name="tb7_atencion_parto_domiciliario_<?php echo $cont?>" value="<?php echo $row->atencion_parto_d?>"></td>
								<?php 
									if ($row->atencion_institucional == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb7_postparto_atencion_institu_si_<?php echo $cont?>" type="radio"  name="tb7_postparto_atencion_institu_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_postparto_atencion_institu_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_postparto_atencion_institu_no_<?php echo $cont?>" type="radio"  name="tb7_postparto_atencion_institu_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_postparto_atencion_institu_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->planificacion == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								?>
								<td>
									<input id="tb7_postparto_planifica_si_<?php echo $cont?>" type="radio"  name="tb7_postparto_planifica_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_postparto_planifica_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_postparto_planifica_no_<?php echo $cont?>" type="radio"  name="tb7_postparto_planifica_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_postparto_planifica_no_<?php echo $cont?>" ></label>
								</td>
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
									<input class="consume_medicamento_si" id="tb7_consume_medicamento_si_<?php echo $cont?>" type="radio"  name="tb7_consume_medicamento_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_consume_medicamento_si_<?php echo $cont?>" ></label>
								</td>
								<td><input class="consume_medicamento_txt" type="text" name="tb7_consume_medicamento_txt_<?php echo $cont?>" value="<?php echo $cual_medicamento?>"></td>

								<td>
									<input class="consume_medicamento_no" id="tb7_consume_medicamento_no_<?php echo $cont?>" type="radio"  name="tb7_consume_medicamento_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_consume_medicamento_no_<?php echo $cont?>" ></label>
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
									<input id="tb7_canalizado_si_<?php echo $cont?>" type="radio"  name="tb7_canalizado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_canalizado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_canalizado_no_<?php echo $cont?>" type="radio"  name="tb7_canalizado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_canalizado_no_<?php echo $cont?>" ></label>
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
									<input class="remitido" id="tb7_remitido_si_<?php echo $cont?>" type="number"  name="tb7_remitido_<?php echo $cont?>" value="<?php echo $remitido?> "  min=0 max=10>
								</td>
								<td>
									<input class="remitido_no" id="tb7_remitido_no_<?php echo $cont?>" type="radio"  name="tb7_remitido_no_<?php echo $cont?>" value="no" <?php echo $checked_r?> >
									<label class="radio" for="tb7_remitido_no_<?php echo $cont?>" ></label>
								</td>

								<td>
									<input id="tb7_valorado_si_<?php echo $cont?>" type="radio"  name="tb7_valorado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb7_valorado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_valorado_no_<?php echo $cont?>" type="radio"  name="tb7_valorado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb7_valorado_no_<?php echo $cont?>" ></label>
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
					<table id="tb7_observaciones" class="observaciones">
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
								<td><input type="text" name="tb7_observaciones_<?php echo $cont?>" value="<?php echo $row->observaciones?>"></td>
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
			<li onclick="window.location='hom_muj_10_a_59.php'"><label>10 a 59 Años..<div class="info_tb">Registro de Actividades Hombres y Mujeres de 10 a 59 años</div></label></li>
			<li onclick="window.location='adultos_60_mas.php'"><label>60 Años o mas..<div class="info_tb">Registro de Actividades Adultos(as) de 60 años y mas</div></label></li>
			<li class="active" onclick="window.location='gestacion_parto.php'"><label>Gesta..<div class="info_tb">Registro de Actividades Gestacion, Parto y Postparto</div></label></li>
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