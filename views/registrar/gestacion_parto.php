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
		$id_visita = $_SESSION['id_visita'];
		$cont = 1;
		$sql = "SELECT * FROM integrantes WHERE id_familia = '$id_familia' AND sexo ='F' AND edad_anos >= 10";
		$query = $bd->query($sql);
		$query_2 = $query; 

		$sql_s = "SELECT * FROM gestacion JOIN integrantes USING(id_integrante) WHERE id_visita= '$id_visita' AND id_familia = '$id_familia'";
		$query_s = $bd->query($sql_s);

		if (!$query) echo $bd->error;
		if ($query->num_rows == 0 or $query_s->num_rows > 0) {
			echo 'No hay registros o Ya se registraron';
			header("location: /instituto/views/registrar/antecedentes.php");
			return False;
		}
		else{ 
			
		?>
		<form id="form9" action="/instituto/core/registro/s_gestacion_parto.php" method="POST">
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
				<div class="table">
					<div class="tr fecha_visita">
						<label>Fecha Visita <?php echo $_SESSION['id_visita']  ?></label>
						<label>Día</label>
						<span class="sp_v"><?php echo $_SESSION['v_actual_d'] ?></span>
						<label>Mes</label>
						<span class="sp_v_m month_txt"><?php echo $_SESSION['v_actual_m'] ?></span>
						<label>Año</label>
						<span class="sp_v"><?php echo $_SESSION['v_actual_a'] ?></span>
					</div>
 
					<table id="tb7_gestacion">
						
						<thead>
							<tr>
								<th colspan="1" rowspan="5" class="none"></th>
								<th colspan="4" rowspan="1" class="none"><div class="none_r"></th>
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
										<label>10</label><span class="otros_tb_info">Otro: <input type="text" name="tb7_otra_persona" value=""/></span>
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
										<label>10</label><span class="otros_tb_info">Otro: <input type="text" name="tb7_otra_persona_atencion_parto" value=""/></span>
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
										<label>10</label><span class="otros_tb_info">Otro: <input type="text" name="tb7_otro_metodo" value=""/></span>
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
										<label>10</label><span class="otros_tb_info">Otro: <input type="text" name="tb7_otra_remision" value=""/></span>
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
								$collect[] = $row;
							?>
							<tr>
								<td><?php echo $cont?></td>
								<td>
									<input id="tb7_embarazada_si_<?php echo $cont?>" type="radio"  name="tb7_embarazada_<?php echo $cont?>" value="si">
									<label class="radio" for="tb7_embarazada_si_<?php echo $cont?>" ></label>
								</td>

								 <td>
									<input id="tb7_embarazada_no_<?php echo $cont?>" type="radio"  name="tb7_embarazada_<?php echo $cont?>" value="no" checked>
									<label class="radio" for="tb7_embarazada_no_<?php echo $cont?>" ></label>
								</td>
								<td><input class="tb7_nombres" type="text" name="tb7_nombres_<?php echo $cont?>" value="<?php echo $row->nombres?>"></td>
								<td><input type="number" name="tb7_edad_<?php echo $cont?>" value="<?php echo $row->edad_anos?>"></td>
								<td><input type="number" name="tb7_control_prenatal_cuantos_<?php echo $cont?>" value=""></td>
 
								<td>
									<input id="tb7_control_prenatal_no_<?php echo $cont?>" type="radio"  name="tb7_control_prenatal_<?php echo $cont?>" value="no" checked>
									<label class="radio" for="tb7_control_prenatal_no_<?php echo $cont?>" ></label>
								</td>
								<td><input type="number" name="tb7_control_prenatal_quien_<?php echo $cont?>" value=""></td>
								<td><input type="number" name="tb7_control_prenatal_fecha_d_<?php echo $cont?>" value="" min=1 max=31></td>
								<td><input type="number" name="tb7_control_prenatal_fecha_m_<?php echo $cont?>" value="" min=1 max=12></td>
								<td><input class="year_current_td" type="number" name="tb7_control_prenatal_fecha_a_<?php echo $cont?>" value="" min=1900 max=<?php echo date("Y");?> ></td>

								<td><input type="number" name="tb7_ante_obstre_gestaciones_<?php echo $cont?>" value=""></td>
								<td><input type="number" name="tb7_ante_obstre_partos_<?php echo $cont?>" value=""></td>
								<td><input type="number" name="tb7_ante_obstre_abortos_<?php echo $cont?>" value=""></td>
								<td><input type="number" name="tb7_ante_obstre_cesareas_<?php echo $cont?>" value=""></td>
								<td><input type="number" name="tb7_ante_obstre_num_hijos_<?php echo $cont?>" value=""></td>
								<td><input type="number" name="tb7_a_f_ult_part_d_<?php echo $cont?>" value="" min=1 max=31></td>
								<td><input type="number" name="tb7_a_f_ult_part_m_<?php echo $cont?>" value="" min=1 max=12></td>
								<td><input class="year_current_td" type="number" name="tb7_a_f_ult_part_a_<?php echo $cont?>" value="" min=1900 max=<?php echo date("Y");?> ></td>

								 <td>
									<input id="tb7_clasi_riesgo_materno_si_<?php echo $cont?>" type="radio"  name="tb7_clasi_riesgo_materno_<?php echo $cont?>" value="alto" checked>
									<label class="radio" for="tb7_clasi_riesgo_materno_si_<?php echo $cont?>" ></label>
								</td>

								 <td>
									<input id="tb7_clasi_riesgo_materno_no_<?php echo $cont?>" type="radio"  name="tb7_clasi_riesgo_materno_<?php echo $cont?>" value="bajo">
									<label class="radio" for="tb7_clasi_riesgo_materno_no_<?php echo $cont?>" ></label>
								</td>

								<td><input type="number" name="tb7_fecha_ult_regla_d_<?php echo $cont?>" value="" min=1 max=31></td>
								<td><input type="number" name="tb7_fecha_ult_regla_m_<?php echo $cont?>" value="" min=1 max=12></td>
								<td><input class="year_current_td" type="number" name="tb7_fecha_ult_regla_a_<?php echo $cont?>" value="" min=1900 max=<?php echo date("Y");?> ></td>
								<td><input type="number" name="tb7_fecha_prop_parto_d_<?php echo $cont?>" value="" min=1 max=31></td>
								<td><input type="number" name="tb7_fecha_prop_parto_m_<?php echo $cont?>" value="" min=1 max=12></td>
								<td><input class="year_current_td" type="number" name="tb7_fecha_prop_parto_a_<?php echo $cont?>" value="" min=1900 max=<?php echo date("Y");?> ></td>
								<td><input type="number" name="tb7_peso_<?php echo $cont?>" value=""></td>
								<td><input type="number" name="tb7_gestacion_semanas_<?php echo $cont?>" value=""></td>

								<td>
									<input id="tb7_serologia_pos_<?php echo $cont?>" type="radio"  name="tb7_serologia_<?php echo $cont?>" value="positivo">
									<label class="radio" for="tb7_serologia_pos_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_serologia_neg_<?php echo $cont?>" type="radio"  name="tb7_serologia_<?php echo $cont?>" value="negativo" checked>
									<label class="radio" for="tb7_serologia_neg_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_serologia_no_<?php echo $cont?>" type="radio"  name="tb7_serologia_<?php echo $cont?>" value="no">
									<label class="radio" for="tb7_serologia_no_<?php echo $cont?>" ></label>
								</td>

								<td>
									<input id="tb7_vih_pos_<?php echo $cont?>" type="radio"  name="tb7_vih_<?php echo $cont?>" value="positivo">
									<label class="radio" for="tb7_vih_pos_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_vih_neg_<?php echo $cont?>" type="radio"  name="tb7_vih_<?php echo $cont?>" value="negativo" checked>
									<label class="radio" for="tb7_vih_neg_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_vih_no_<?php echo $cont?>" type="radio"  name="tb7_vih_<?php echo $cont?>" value="no">
									<label class="radio" for="tb7_vih_no_<?php echo $cont?>" ></label>
								</td>

								<td>
									<input id="tb7_odontologico_si_<?php echo $cont?>" type="radio"  name="tb7_odontologico_<?php echo $cont?>" value="si" checked>
									<label class="radio" for="tb7_odontologico_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_odontologico_no_<?php echo $cont?>" type="radio"  name="tb7_odontologico_<?php echo $cont?>" value="no">
									<label class="radio" for="tb7_odontologico_no_<?php echo $cont?>" ></label>
								</td>

								<td>
									<input id="tb7_td_tt1_10a18_si_<?php echo $cont?>" type="checkbox"  name="tb7_td_tt1_10a18_<?php echo $cont?>" value="si">
									<label class="check" for="tb7_td_tt1_10a18_si_<?php echo $cont?>" ></label>
								</td>
								 <td>
									<input id="tb7_td_tt2_10a18_si_<?php echo $cont?>" type="checkbox"  name="tb7_td_tt2_10a18_<?php echo $cont?>" value="si">
									<label class="check" for="tb7_td_tt2_10a18_si_<?php echo $cont?>" ></label>
								</td>
								 <td>
									<input id="tb7_td_tt3_10a18_si_<?php echo $cont?>" type="checkbox"  name="tb7_td_tt310a18_<?php echo $cont?>" value="si">
									<label class="check" for="tb7_td_tt3_10a18_si_<?php echo $cont?>" ></label>
								</td>
								 <td>
									<input id="tb7_td_tt1_19a49_si_<?php echo $cont?>" type="checkbox"  name="tb7_td_tt1_19a49_<?php echo $cont?>" value="si">
									<label class="check" for="tb7_td_tt1_19a49_si_<?php echo $cont?>" ></label>
								</td>
								 <td>
									<input id="tb7_td_tt2_19a49_si_<?php echo $cont?>" type="checkbox"  name="tb7_td_tt2_19a49_<?php echo $cont?>" value="si">
									<label class="check" for="tb7_td_tt2_19a49_si_<?php echo $cont?>" ></label>
								</td>
								 <td>
									<input id="tb7_td_tt3_19a49_si_<?php echo $cont?>" type="checkbox"  name="tb7_td_tt3_19a49_<?php echo $cont?>" value="si">
									<label class="check" for="tb7_td_tt3_19a49_si_<?php echo $cont?>" ></label>
								</td>

								 <td>
									<input id="tb7_suplementacion_si_<?php echo $cont?>" type="radio"  name="tb7_suplementacion_<?php echo $cont?>" value="si">
									<label class="radio" for="tb7_suplementacion_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_suplementacion_no_<?php echo $cont?>" type="radio"  name="tb7_suplementacion_<?php echo $cont?>" value="no" checked>
									<label class="radio" for="tb7_suplementacion_no_<?php echo $cont?>" ></label>
								</td>

								<td>
									<input id="tb7_sedentarismo_si_<?php echo $cont?>" type="radio"  name="tb7_sedentarismo_<?php echo $cont?>" value="si">
									<label class="radio" for="tb7_sedentarismo_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_sedentarismo_no_<?php echo $cont?>" type="radio"  name="tb7_sedentarismo_<?php echo $cont?>" value="no"  checked>
									<label class="radio" for="tb7_sedentarismo_no_<?php echo $cont?>" ></label>
								</td>

								<td>
									<input id="tb7_fuma_si_<?php echo $cont?>" type="radio"  name="tb7_fuma_<?php echo $cont?>" value="si">
									<label class="radio" for="tb7_fuma_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_fuma_no_<?php echo $cont?>" type="radio"  name="tb7_fuma_<?php echo $cont?>" value="no" checked>
									<label class="radio" for="tb7_fuma_no_<?php echo $cont?>" ></label>
								</td>

								<td>
									<input id="tb7_consume_alcohol_si_<?php echo $cont?>" type="radio"  name="tb7_consume_alcohol_<?php echo $cont?>" value="si">
									<label class="radio" for="tb7_consume_alcohol_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_consume_alcohol_no_<?php echo $cont?>" type="radio"  name="tb7_consume_alcohol_<?php echo $cont?>" value="no" checked>
									<label class="radio" for="tb7_consume_alcohol_no_<?php echo $cont?>" ></label>
								</td>

								 <td>
									<input id="tb7_parto_n_<?php echo $cont?>" type="radio"  name="tb7_parto_<?php echo $cont?>" value="normal" checked>
									<label class="radio" for="tb7_parto_n_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_parto_ins_<?php echo $cont?>" type="radio"  name="tb7_parto_<?php echo $cont?>" value="instrumental">
									<label class="radio" for="tb7_parto_ins_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_parto_ces_<?php echo $cont?>" type="radio"  name="tb7_parto_<?php echo $cont?>" value="cesarea">
									<label class="radio" for="tb7_parto_ces_<?php echo $cont?>" ></label>
								</td>

								<td><input type="number" name="tb7_atencion_parto_institucional_<?php echo $cont?>" value=""></td>
								<td><input type="number" name="tb7_atencion_parto_domiciliario_<?php echo $cont?>" value=""></td>

								 <td>
									<input id="tb7_postparto_atencion_institu_si_<?php echo $cont?>" type="radio"  name="tb7_postparto_atencion_institu_<?php echo $cont?>" value="si" checked>
									<label class="radio" for="tb7_postparto_atencion_institu_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_postparto_atencion_institu_no_<?php echo $cont?>" type="radio"  name="tb7_postparto_atencion_institu_<?php echo $cont?>" value="no">
									<label class="radio" for="tb7_postparto_atencion_institu_no_<?php echo $cont?>" ></label>
								</td>

								 <td>
									<input id="tb7_postparto_planifica_si_<?php echo $cont?>" type="radio"  name="tb7_postparto_planifica_<?php echo $cont?>" value="si">
									<label class="radio" for="tb7_postparto_planifica_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_postparto_planifica_no_<?php echo $cont?>" type="radio"  name="tb7_postparto_planifica_<?php echo $cont?>" value="no" checked>
									<label class="radio" for="tb7_postparto_planifica_no_<?php echo $cont?>" ></label>
								</td>

								 <td>
									<input class="consume_medicamento_si" id="tb7_consume_medicamento_si_<?php echo $cont?>" type="radio"  name="tb7_consume_medicamento_<?php echo $cont?>" value="si">
									<label class="radio" for="tb7_consume_medicamento_si_<?php echo $cont?>" ></label>
								</td>
								<td><input class="consume_medicamento_txt" type="text" name="tb7_consume_medicamento_txt_<?php echo $cont?>" value=""></td>

								<td>
									<input class="consume_medicamento_no" id="tb7_consume_medicamento_no_<?php echo $cont?>" type="radio"  name="tb7_consume_medicamento_<?php echo $cont?>" value="no" checked>
									<label class="radio" for="tb7_consume_medicamento_no_<?php echo $cont?>" ></label>
								</td>

								<td>
									<input id="tb7_canalizado_si_<?php echo $cont?>" type="radio"  name="tb7_canalizado_<?php echo $cont?>" value="si">
									<label class="radio" for="tb7_canalizado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_canalizado_no_<?php echo $cont?>" type="radio"  name="tb7_canalizado_<?php echo $cont?>" value="no" checked>
									<label class="radio" for="tb7_canalizado_no_<?php echo $cont?>" ></label>
								</td>

								<td>
									<input class="remitido" id="tb7_remitido_si_<?php echo $cont?>" type="number"  name="tb7_remitido_<?php echo $cont?>" value=""  min=0 max=10>
								</td>
								<td>
									<input class="remitido_no" id="tb7_remitido_no_<?php echo $cont?>" type="radio"  name="tb7_remitido_no_<?php echo $cont?>" value="no" checked>
									<label class="radio" for="tb7_remitido_no_<?php echo $cont?>" ></label>
								</td>

								<td>
									<input id="tb7_valorado_si_<?php echo $cont?>" type="radio"  name="tb7_valorado_<?php echo $cont?>" value="si">
									<label class="radio" for="tb7_valorado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb7_valorado_no_<?php echo $cont?>" type="radio"  name="tb7_valorado_<?php echo $cont?>" value="no" checked>
									<label class="radio" for="tb7_valorado_no_<?php echo $cont?>" ></label>
									<input type="hidden" name="id_integrante_<?php echo $cont?>" value="<?php echo $row->id_integrante?>">
								</td>
							</tr>
							<?php
								$cont++; 
								} 
							?>
						</tbody>
					</table>
				</div>
				<div class="spacey0"></div>
				<div class="table">
					<table id="tb7_observaciones" class="observaciones">
						<thead>
							<tr>
								<th colspan="2">Observaciones</th>
							</tr>
						</thead>
						<tbody>
							<?php  
								$cont = 1;
								foreach ($collect as $row){
								
							?>
							<tr>
								<td><?php echo $cont?></td>
								<td><input type="text" name="tb7_observaciones_<?php echo $cont?>" value=""></td>
							</tr>
							<?php
								$cont++; 
								} 
							?>
						</tbody>
					</table>
				</div>
				<div class="next_button">
					<button type="submit" class="button next">Siguiente</button>
				</div>
			</div>
		</form>
	</main>
	<?php } ?>
	<script src="http://localhost/instituto/static/js/jquery-3.3.1.js"></script>
	<script src="http://localhost/instituto/static/js/bootstrap.js"></script>
	<script src="http://localhost/instituto/static/js/funciones.js"></script>
</body>
</html>