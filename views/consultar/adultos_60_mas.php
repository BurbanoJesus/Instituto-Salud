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
		$sql = "SELECT * FROM integrantes JOIN de_60_mas USING(id_integrante)  JOIN visitas USING(id_visita,id_familia) WHERE visitas.id_familia = '$id_familia' AND edad_anos >= 60";
		$query = $bd->query($sql);
		while ($row = $query->fetch_object()) {
			$collect[] = $row;
		}
		$query->data_seek(0);

		if (!$query) echo $bd->error;
		if ($query->num_rows == 0) {
			echo "<div class='registro_non'>";
	        echo "<p>No Existen Registros de Adultos Mayores a 60 Años en esta Familia</p>";
	        echo "<button type='button' class='button next block' onclick='window.location=\"gestacion_parto.php\"'>Siguiente</button>";
	        echo "</div>";
		}
		else{ 
			
		?>
		<form id="form8" action="/instituto/core/consultas/s_adultos_60_mas.php" method="POST">
			<div class="divh1">
				<h1>Registro de Actividades Adulto(a) 60 Años o Mas</h1>
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
					<table id="tb6_adultos_60">
						
						<thead>
							<?php 
								$sql_e = "SELECT remitido_otro FROM de_60_mas JOIN integrantes USING(id_integrante) WHERE id_familia = '$id_familia' LIMIT 1";
								$query_e = $bd->query($sql_e); 
								$row_e = $query_e->fetch_object();
							?>
							<tr>
								<th colspan="3" rowspan="5" class="none"></th>
								<th colspan="4" rowspan="1" class="none"><div class="none_r"></div></th>
								<th colspan="12" rowspan="1" class="bg_verde2 br_verde2">Mujeres</th>
								<th colspan="4" rowspan="1" class="bg_verde br_verde">Hombres</th>
								<th colspan="7" rowspan="1" class="bg_naranja br_naranja">Salud Oral</th>
								<th colspan="2" rowspan="2">Glicemia</th>
								<th colspan="5" rowspan="2">Presion Arterial</th>
								<th colspan="2" rowspan="2">Actividad Fisica</th>
								<th colspan="2" rowspan="2">Problemas Visuales</th>
								<th colspan="5" rowspan="2">Vacunacion en este grupo de edad</th>
								<th colspan="3" rowspan="2">Consume Algun Medicamento</th>
								<th colspan="6" rowspan="1">Conducta</th>
							</tr>
							<tr>
								<th colspan="4" rowspan="2" class="bg_naranja br_naranja">Valoracion Nutricional</th>
								<th colspan="9" rowspan="1" class="bg_verde2_c br_verde2">Citologia Cervico Vaginal</th>
								<th colspan="3" rowspan="2" class="bg_verde2_c br_verde2">Autoexamen de Seno</th>
								<th colspan="4" rowspan="2" class="bg_verde_c br_verde">Examen de Prostata > 40 años</th>
								<th colspan="2" rowspan="4">Uso de Seda Dental</th>
								<th colspan="1" rowspan="5" class="celda_vertical"><p class="v_medium">Cepillado No. Veces por dia</p></th>
								<th colspan="2" rowspan="4">Piedra piezas Dentales</th>
								<th colspan="2" rowspan="4">Usa Protesis</th>
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
										<label>10</label><span class="otros_tb_info">Otro: <input type="text" name="tb6_otra_remision" value="<?php echo $row_e->remitido_otro?>"/></span>
									</div>
								</th>
								<th colspan="2" rowspan="4">Valorado</th>
							</tr>
							<tr>
								<th colspan="9" rowspan="1" class="bg_verde2_c br_verde2">Ultimos</th>
								<th colspan="1" rowspan="4">Valor Glicemia</th>
								<th colspan="1" rowspan="4" class="table_info">
									<div class="ico">i</div>
									Estado Glicemia
									<div class="info">
										<label><div class="ico">i</div></label><span>Glicemia</span>
										<label></label><span>Normal: 70/100 MG/DL</span>
									</div>
								</th>
								<th colspan="1" rowspan="4" class="celda_vertical"><p class="large">Pulso por Minuto</p></th>
								<th colspan="1" rowspan="4" class="celda_vertical"><p>Sistolica</p></th>
								<th colspan="1" rowspan="4" class="celda_vertical"><p>Diastolica</p></th>
								<th colspan="1" rowspan="4" class="table_info">
									<div class="ico">i</div>
									*PAM
									<div class="info">
										<label><div class="ico">i</div></label><span>Estado Nutricional</span>
										<label></label><span>*Presion Arterial Media:</span>
										<label></label><span>Presion Sistolica (PS)</span>
										<label></label><span>Presion Diastolica (PD)</span>
										<label></label><span></span>
										<label></label><span>PAM = (PS + 2*PD) / 3 </span>
										<label></label><span></span>
									  
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
								<th colspan="1" rowspan="4">No</th>
								<th colspan="1" rowspan="4">Si</th>
								<th colspan="1" rowspan="4">No</th>
								<th colspan="1" rowspan="4" class="celda_vertical"><p class="v_medium">Tipo de Biologico</p></th>
								<th colspan="1" rowspan="4" class="celda_vertical"><p class="v_medium">No.de dosis</p></th>
								<th colspan="3" rowspan="3">Fecha</th>
								<th colspan="1" rowspan="4">Si</th>
								<th colspan="1" rowspan="4">Cual?</th>
								<th colspan="1" rowspan="4">No</th>
							</tr>

							<tr>
								<th colspan="1" rowspan="3">Peso (kg)</th>
								<th colspan="1" rowspan="3">Talla (Cm)</th>
								<th colspan="1" rowspan="3">IMC</th>
								<th colspan="1" rowspan="3" class="table_info">
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

								<th colspan="3" rowspan="1" class="bg_verde2_c br_verde2">5 años</th>
								<th colspan="3" rowspan="1" class="bg_verde2_c br_verde2">4 años</th>
								<th colspan="3" rowspan="1" class="bg_verde2_c br_verde2">1 año</th>
								<th colspan="1" rowspan="3" class="bg_verde2_c br_verde2">No</th>
								<th colspan="2" rowspan="2" class="bg_verde2_c br_verde2">Si</th>
								<th colspan="2" rowspan="2" class="bg_verde_c br_verde">Ultimos 5 Años</th>
								<th colspan="2" rowspan="2" class="bg_verde_c br_verde">Resultado</th>
							</tr>

							<tr>
								<th colspan="1" rowspan="2" class="bg_verde2_c br_verde2">No</th>
								<th colspan="2" rowspan="1" class="bg_verde2_c br_verde2">Si</th>
								<th colspan="1" rowspan="2" class="bg_verde2_c br_verde2">No</th>
								<th colspan="2" rowspan="1" class="bg_verde2_c br_verde2">Si</th>
								<th colspan="1" rowspan="2" class="bg_verde2_c br_verde2">No</th>
								<th colspan="2" rowspan="1" class="bg_verde2_c br_verde2">Si</th>
							   
							</tr>


							<tr>
								<th colspan="2">Nombres</th>
								<th>Edad</th>
								<th class="celda_vertical bg_verde2_c br_verde2"><p>Normal</p></th>
								<th class="celda_vertical bg_verde2_c br_verde2"><p>Anormal</p></th> 
								<th class="celda_vertical bg_verde2_c br_verde2"><p>Normal</p></th>
								<th class="celda_vertical bg_verde2_c br_verde2"><p>Anormal</p></th> 
								<th class="celda_vertical bg_verde2_c br_verde2"><p>Normal</p></th>
								<th class="celda_vertical bg_verde2_c br_verde2"><p>Anormal</p></th>
								<th class="celda_vertical bg_verde2_c br_verde2"><p>Normal</p></th>
								<th class="celda_vertical bg_verde2_c br_verde2"><p>Anormal</p></th>
								<th class="celda_vertical bg_verde_c br_verde">Si</th>
								<th class="celda_vertical bg_verde_c br_verde">No</th>
								<th class="celda_vertical bg_verde_c br_verde"><p>Normal</p></th>
								<th class="celda_vertical bg_verde_c br_verde"><p>Anormal</p></th>
								<th>Si</th>
								<th>No</th>
								<th>Si</th>
								<th>No</th>
								<th>Si</th>
								<th>No</th>
								<th>D</th>
								<th>M</th>
								<th>A</th>
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
								<td><input class="tb6_nombres" type="text" name="tb6_nombres_<?php echo $cont?>" value="<?php echo $row->nombres?>"></td>
								<td><input type="number" name="tb6_edad_<?php echo $cont?>" step=0.1  value="<?php echo $edad?>"></td>
								<td><input class="tb6_peso" type="number" name="tb6_peso_<?php echo $cont?>" step=0.1  value="<?php echo $row->peso?>" min=1 max=200 required></td>
								<td><input class="tb6_talla" type="number" name="tb6_talla_<?php echo $cont?>" step=0.1  value="<?php echo $row->talla?>" min=1 max=200 required></td>
								<td><input class="tb6_imc" type="number" name="tb6_imc_<?php echo $cont?>" step=0.1  value="<?php echo $row->imc?>" min=1 max=200 required></td>
								<td><input class="tb6_estado_nutricional" type="text" name="tb6_estado_nutricional_<?php echo $cont?>"  value="<?php echo $row->estado_nutricional?>"></td>
							 	<?php 
									if ($row->citologia_ult_5 == 'no') {
										$checked_n = '';
										$checked_a = '';
										$checked_no = 'checked';
									}
									else if ($row->citologia_ult_5 == 'normal') {
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
									<input id="tb6_citolo5_no_<?php echo $cont?>" type="radio"  name="tb6_citologia5_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_citolo5_no_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb6_citilo5_normal_<?php echo $cont?>" type="radio"  name="tb6_citologia5_<?php echo $cont?>" value="normal" <?php echo $checked_n?> >
									<label class="radio" for="tb6_citilo5_normal_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb6_citilo5_anormal_<?php echo $cont?>" type="radio"  name="tb6_citologia5_<?php echo $cont?>" value="anormal" <?php echo $checked_a?> >
									<label class="radio" for="tb6_citilo5_anormal_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->citologia_ult_4 == 'no') {
										$checked_n = '';
										$checked_a = '';
										$checked_no = 'checked';
									}
									else if ($row->citologia_ult_4 == 'normal') {
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
									<input id="tb6_citolo4_no_<?php echo $cont?>" type="radio"  name="tb6_citologia4_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_citolo4_no_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb6_citilo4_normal_<?php echo $cont?>" type="radio"  name="tb6_citologia4_<?php echo $cont?>" value="normal" <?php echo $checked_n?> >
									<label class="radio" for="tb6_citilo4_normal_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb6_citilo4_anormal_<?php echo $cont?>" type="radio"  name="tb6_citologia4_<?php echo $cont?>" value="anormal" <?php echo $checked_a?> >
									<label class="radio" for="tb6_citilo4_anormal_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->citologia_ult_1 == 'no') {
										$checked_n = '';
										$checked_a = '';
										$checked_no = 'checked';
									}
									else if ($row->citologia_ult_1 == 'normal') {
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
									<input id="tb6_citolo1_no_<?php echo $cont?>" type="radio"  name="tb6_citologia1_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_citolo1_no_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb6_citilo1_normal_<?php echo $cont?>" type="radio"  name="tb6_citologia1_<?php echo $cont?>" value="normal" <?php echo $checked_n?> >
									<label class="radio" for="tb6_citilo1_normal_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb6_citilo1_anormal_<?php echo $cont?>" type="radio"  name="tb6_citologia1_<?php echo $cont?>" value="anormal" <?php echo $checked_a?> >
									<label class="radio" for="tb6_citilo1_anormal_<?php echo $cont?>" ></label>
								</td>
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
									<input id="tb6_autoexamen_seno_no_<?php echo $cont?>" type="radio"  name="tb6_autoexamen_seno_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_autoexamen_seno_no_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb6_autoexamen_seno_normal_<?php echo $cont?>" type="radio"  name="tb6_autoexamen_seno_<?php echo $cont?>" value="normal" <?php echo $checked_n?> >
									<label class="radio" for="tb6_autoexamen_seno_normal_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb6_autoexamen_seno_anormal_<?php echo $cont?>" type="radio"  name="tb6_autoexamen_seno_<?php echo $cont?>" value="anormal" <?php echo $checked_a?> >
									<label class="radio" for="tb6_autoexamen_seno_anormal_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->examen_prostata == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								 <td class="br_verde">
									<input id="tb6_examen_prostata_5años_si_<?php echo $cont?>" type="radio"  name="tb6_examen_prostata_5años_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb6_examen_prostata_5años_si_<?php echo $cont?>" ></label>
								</td>

								 <td class="br_verde">
									<input id="tb6_examen_prostata_5años_no_<?php echo $cont?>" type="radio"  name="tb6_examen_prostata_5años_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_examen_prostata_5años_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->examen_prostata_res == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td class="br_verde">
									<input id="tb6_examen_prostata_resultado_normal_<?php echo $cont?>" type="radio"  name="tb6_examen_prostata_resultado_<?php echo $cont?>" value="normal" <?php echo $checked_si?> >
									<label class="radio" for="tb6_examen_prostata_resultado_normal_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde">
									<input id="tb6_examen_prostata_resultado_anormal_<?php echo $cont?>" type="radio"  name="tb6_examen_prostata_resultado_<?php echo $cont?>" value="anormal" <?php echo $checked_no?> >
									<label class="radio" for="tb6_examen_prostata_resultado_anormal_<?php echo $cont?>" ></label>
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
									<input id="tb6_seda_dental_si_<?php echo $cont?>" type="radio"  name="tb6_seda_dental_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb6_seda_dental_si_<?php echo $cont?>" ></label>
								</td>

								 <td>
									<input id="tb6_seda_dental_no_<?php echo $cont?>" type="radio"  name="tb6_seda_dental_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_seda_dental_no_<?php echo $cont?>" ></label>
								</td>
							  	
								<td><input type="number" name="tb6_cepilladas_<?php echo $cont?>" value=""></td>
								<?php 
									if ($row->piedra_piezas_dentales == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb6_piezas_dentales_si_<?php echo $cont?>" type="radio"  name="tb6_piezas_dentales_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb6_piezas_dentales_si_<?php echo $cont?>" ></label>
								</td>

								 <td>
									<input id="tb6_piezas_dentales_no_<?php echo $cont?>" type="radio"  name="tb6_piezas_dentales_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_piezas_dentales_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->uso_protesis_dentales == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb6_protesis_dentales_si_<?php echo $cont?>" type="radio"  name="tb6_protesis_dentales_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb6_protesis_dentales_si_<?php echo $cont?>" ></label>
								</td>

								 <td>
									<input id="tb6_protesis_dentales_no_<?php echo $cont?>" type="radio"  name="tb6_protesis_dentales_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_protesis_dentales_no_<?php echo $cont?>" ></label>
								</td>
								<td><input class="tb6_glicemia" type="number" name="tb6_glicemia_<?php echo $cont?>" step=0.1  value="<?php echo $row->valor_glicemia?>" required></td>
								<td><input class="tb6_glicemia_estado" type="text" name="tb6_glicemia_estado_<?php echo $cont?>" value="<?php echo $row->estado_glicemia?>" required></td>
								<td><input class="tb6_pulso" type="number" name="tb6_pulso_<?php echo $cont?>" value="<?php echo $row->pulso_minuto?>" required></td>
								<td><input class="tb6_sistolica" type="number" name="tb6_sistolica_<?php echo $cont?>" value="<?php echo $row->presion_sistolica?>" required></td>
								<td><input class="tb6_diastolica" type="number" name="tb6_diastolica_<?php echo $cont?>" value="<?php echo $row->presion_diastolica?>" required></td>
								<td><input class="tb6_pam" type="number" name="tb6_pam_<?php echo $cont?>" step="0.1" value="<?php echo $row->pam?>" required></td>
								<td><input class="tb6_estado_tension" type="text" name="tb6_estado_tension_<?php echo $cont?>" value="<?php echo $row->estado_presion?>" required></td>
								<?php 
									if ($row->actividad_fisica == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								 <td>
									<input id="tb6_actividad_fisica_si_<?php echo $cont?>" type="radio"  name="tb6_actividad_fisica_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb6_actividad_fisica_si_<?php echo $cont?>" ></label>
								</td>
								 <td>
									<input id="tb6_actividad_fisica_no_<?php echo $cont?>" type="radio"  name="tb6_actividad_fisica_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_actividad_fisica_no_<?php echo $cont?>" ></label>
								</td>
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
									<input id="tb6_problemas_visuales_si_<?php echo $cont?>" type="radio"  name="tb6_problemas_visuales_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb6_problemas_visuales_si_<?php echo $cont?>" ></label>
								</td>

								 <td>
									<input id="tb6_problemas_visuales_no_<?php echo $cont?>" type="radio"  name="tb6_problemas_visuales_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_problemas_visuales_no_<?php echo $cont?>" ></label>
								</td>

								<td><input type="text" name="tb6_vacunacion_tipo_biologico_<?php echo $cont?>" value="<?php echo $row->vacu_tipo_biologico?>"></td>
								<td><input type="number" name="tb6_vacunacion_numero_dosis_<?php echo $cont?>" value="<?php echo $row->vacu_num_dosis?>"></td>

								<td><input type="number" name="tb6_fecha_vacunacion_d_<?php echo $cont?>" value="<?php echo $row->vacu_d?>" value="" min=1 max=31></td>
								<td><input type="number" name="tb6_fecha_vacunacion_m_<?php echo $cont?>" value="<?php echo $row->vacu_m?>" value="" min=1 max=12></td>
								<td><input class="year_current_td" type="number" name="tb6_fecha_vacunacion_a_<?php echo $cont?>" value="<?php echo $row->vacu_a?>" min=1900 max=<?php echo date("Y");?> ></td>
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
									<input class="consume_medicamento_si" id="tb6_consume_medicamento_si_<?php echo $cont?>" type="radio"  name="tb6_consume_medicamento_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb6_consume_medicamento_si_<?php echo $cont?>" ></label>
								</td>
								<td><input class="consume_medicamento_txt" type="text" name="tb6_consume_medicamento_txt_<?php echo $cont?>" value="<?php echo $cual_medicamento?>"></td>
								<td>
									<input class="consume_medicamento_no" id="tb6_consume_medicamento_no_<?php echo $cont?>" type="radio"  name="tb6_consume_medicamento_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_consume_medicamento_no_<?php echo $cont?>" ></label>
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
									<input  id="tb6_canalizado_si_<?php echo $cont?>" type="radio"  name="tb6_canalizado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb6_canalizado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb6_canalizado_no_<?php echo $cont?>" type="radio"  name="tb6_canalizado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_canalizado_no_<?php echo $cont?>" ></label>
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
									<input class="remitido" id="tb6_remitido_si_<?php echo $cont?>" type="number" name="tb6_remitido_<?php echo $cont?>" value="<?php echo $remitido?>" min=0 max=10>
								</td>
								<td>
									<input class="remitido_no" id="tb6_remitido_no_<?php echo $cont?>" type="radio"  name="tb6_remitido_no_<?php echo $cont?>" value="no" <?php echo $checked_r?> >
									<label class="radio" for="tb6_remitido_no_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb6_valorado_si_<?php echo $cont?>" type="radio"  name="tb6_valorado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb6_valorado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb6_valorado_no_<?php echo $cont?>" type="radio"  name="tb6_valorado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_valorado_no_<?php echo $cont?>" ></label>
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
								<td><input class="tb6_nombres" type="text" name="tb6_nombres_<?php echo $cont?>" value="<?php echo $row->nombres?>"></td>
								<td><input type="number" name="tb6_edad_<?php echo $cont?>" step=0.1  value="<?php echo $edad?>"></td>
								<td><input class="tb6_peso" type="number" name="tb6_peso_<?php echo $cont?>" step=0.1  value="<?php echo $row->peso?>" min=1 max=200 required></td>
								<td><input class="tb6_talla" type="number" name="tb6_talla_<?php echo $cont?>" step=0.1  value="<?php echo $row->talla?>" min=1 max=200 required></td>
								<td><input class="tb6_imc" type="number" name="tb6_imc_<?php echo $cont?>" step=0.1  value="<?php echo $row->imc?>" min=1 max=200 required></td>
								<td><input class="tb6_estado_nutricional" type="text" name="tb6_estado_nutricional_<?php echo $cont?>"  value="<?php echo $row->estado_nutricional?>"></td>
							 	<?php 
									if ($row->citologia_ult_5 == 'no') {
										$checked_n = '';
										$checked_a = '';
										$checked_no = 'checked';
									}
									else if ($row->citologia_ult_5 == 'normal') {
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
									<input id="tb6_citolo5_no_<?php echo $cont?>" type="radio"  name="tb6_citologia5_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_citolo5_no_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb6_citilo5_normal_<?php echo $cont?>" type="radio"  name="tb6_citologia5_<?php echo $cont?>" value="normal" <?php echo $checked_n?> >
									<label class="radio" for="tb6_citilo5_normal_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb6_citilo5_anormal_<?php echo $cont?>" type="radio"  name="tb6_citologia5_<?php echo $cont?>" value="anormal" <?php echo $checked_a?> >
									<label class="radio" for="tb6_citilo5_anormal_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->citologia_ult_4 == 'no') {
										$checked_n = '';
										$checked_a = '';
										$checked_no = 'checked';
									}
									else if ($row->citologia_ult_4 == 'normal') {
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
									<input id="tb6_citolo4_no_<?php echo $cont?>" type="radio"  name="tb6_citologia4_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_citolo4_no_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb6_citilo4_normal_<?php echo $cont?>" type="radio"  name="tb6_citologia4_<?php echo $cont?>" value="normal" <?php echo $checked_n?> >
									<label class="radio" for="tb6_citilo4_normal_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb6_citilo4_anormal_<?php echo $cont?>" type="radio"  name="tb6_citologia4_<?php echo $cont?>" value="anormal" <?php echo $checked_a?> >
									<label class="radio" for="tb6_citilo4_anormal_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->citologia_ult_1 == 'no') {
										$checked_n = '';
										$checked_a = '';
										$checked_no = 'checked';
									}
									else if ($row->citologia_ult_1 == 'normal') {
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
									<input id="tb6_citolo1_no_<?php echo $cont?>" type="radio"  name="tb6_citologia1_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_citolo1_no_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb6_citilo1_normal_<?php echo $cont?>" type="radio"  name="tb6_citologia1_<?php echo $cont?>" value="normal" <?php echo $checked_n?> >
									<label class="radio" for="tb6_citilo1_normal_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb6_citilo1_anormal_<?php echo $cont?>" type="radio"  name="tb6_citologia1_<?php echo $cont?>" value="anormal" <?php echo $checked_a?> >
									<label class="radio" for="tb6_citilo1_anormal_<?php echo $cont?>" ></label>
								</td>
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
									<input id="tb6_autoexamen_seno_no_<?php echo $cont?>" type="radio"  name="tb6_autoexamen_seno_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_autoexamen_seno_no_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb6_autoexamen_seno_normal_<?php echo $cont?>" type="radio"  name="tb6_autoexamen_seno_<?php echo $cont?>" value="normal" <?php echo $checked_n?> >
									<label class="radio" for="tb6_autoexamen_seno_normal_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde2">
									<input id="tb6_autoexamen_seno_anormal_<?php echo $cont?>" type="radio"  name="tb6_autoexamen_seno_<?php echo $cont?>" value="anormal" <?php echo $checked_a?> >
									<label class="radio" for="tb6_autoexamen_seno_anormal_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->examen_prostata == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								 <td class="br_verde">
									<input id="tb6_examen_prostata_5años_si_<?php echo $cont?>" type="radio"  name="tb6_examen_prostata_5años_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb6_examen_prostata_5años_si_<?php echo $cont?>" ></label>
								</td>

								 <td class="br_verde">
									<input id="tb6_examen_prostata_5años_no_<?php echo $cont?>" type="radio"  name="tb6_examen_prostata_5años_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_examen_prostata_5años_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->examen_prostata_res == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td class="br_verde">
									<input id="tb6_examen_prostata_resultado_normal_<?php echo $cont?>" type="radio"  name="tb6_examen_prostata_resultado_<?php echo $cont?>" value="normal" <?php echo $checked_si?> >
									<label class="radio" for="tb6_examen_prostata_resultado_normal_<?php echo $cont?>" ></label>
								</td>
								<td class="br_verde">
									<input id="tb6_examen_prostata_resultado_anormal_<?php echo $cont?>" type="radio"  name="tb6_examen_prostata_resultado_<?php echo $cont?>" value="anormal" <?php echo $checked_no?> >
									<label class="radio" for="tb6_examen_prostata_resultado_anormal_<?php echo $cont?>" ></label>
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
									<input id="tb6_seda_dental_si_<?php echo $cont?>" type="radio"  name="tb6_seda_dental_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb6_seda_dental_si_<?php echo $cont?>" ></label>
								</td>

								 <td>
									<input id="tb6_seda_dental_no_<?php echo $cont?>" type="radio"  name="tb6_seda_dental_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_seda_dental_no_<?php echo $cont?>" ></label>
								</td>
							  	
								<td><input type="number" name="tb6_cepilladas_<?php echo $cont?>" value=""></td>
								<?php 
									if ($row->piedra_piezas_dentales == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb6_piezas_dentales_si_<?php echo $cont?>" type="radio"  name="tb6_piezas_dentales_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb6_piezas_dentales_si_<?php echo $cont?>" ></label>
								</td>

								 <td>
									<input id="tb6_piezas_dentales_no_<?php echo $cont?>" type="radio"  name="tb6_piezas_dentales_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_piezas_dentales_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->uso_protesis_dentales == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb6_protesis_dentales_si_<?php echo $cont?>" type="radio"  name="tb6_protesis_dentales_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb6_protesis_dentales_si_<?php echo $cont?>" ></label>
								</td>

								 <td>
									<input id="tb6_protesis_dentales_no_<?php echo $cont?>" type="radio"  name="tb6_protesis_dentales_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_protesis_dentales_no_<?php echo $cont?>" ></label>
								</td>
								<td><input class="tb6_glicemia" type="number" name="tb6_glicemia_<?php echo $cont?>" step=0.1  value="<?php echo $row->valor_glicemia?>" required></td>
								<td><input class="tb6_glicemia_estado" type="text" name="tb6_glicemia_estado_<?php echo $cont?>" value="<?php echo $row->estado_glicemia?>" required></td>
								<td><input class="tb6_pulso" type="number" name="tb6_pulso_<?php echo $cont?>" value="<?php echo $row->pulso_minuto?>" required></td>
								<td><input class="tb6_sistolica" type="number" name="tb6_sistolica_<?php echo $cont?>" value="<?php echo $row->presion_sistolica?>" required></td>
								<td><input class="tb6_diastolica" type="number" name="tb6_diastolica_<?php echo $cont?>" value="<?php echo $row->presion_diastolica?>" required></td>
								<td><input class="tb6_pam" type="number" name="tb6_pam_<?php echo $cont?>" step="0.1" value="<?php echo $row->pam?>" required></td>
								<td><input class="tb6_estado_tension" type="text" name="tb6_estado_tension_<?php echo $cont?>" value="<?php echo $row->estado_presion?>" required></td>
								<?php 
									if ($row->actividad_fisica == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								 <td>
									<input id="tb6_actividad_fisica_si_<?php echo $cont?>" type="radio"  name="tb6_actividad_fisica_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb6_actividad_fisica_si_<?php echo $cont?>" ></label>
								</td>
								 <td>
									<input id="tb6_actividad_fisica_no_<?php echo $cont?>" type="radio"  name="tb6_actividad_fisica_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_actividad_fisica_no_<?php echo $cont?>" ></label>
								</td>
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
									<input id="tb6_problemas_visuales_si_<?php echo $cont?>" type="radio"  name="tb6_problemas_visuales_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb6_problemas_visuales_si_<?php echo $cont?>" ></label>
								</td>

								 <td>
									<input id="tb6_problemas_visuales_no_<?php echo $cont?>" type="radio"  name="tb6_problemas_visuales_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_problemas_visuales_no_<?php echo $cont?>" ></label>
								</td>

								<td><input type="text" name="tb6_vacunacion_tipo_biologico_<?php echo $cont?>" value="<?php echo $row->vacu_tipo_biologico?>"></td>
								<td><input type="number" name="tb6_vacunacion_numero_dosis_<?php echo $cont?>" value="<?php echo $row->vacu_num_dosis?>"></td>

								<td><input type="number" name="tb6_fecha_vacunacion_d_<?php echo $cont?>" value="<?php echo $row->vacu_d?>" value="" min=1 max=31></td>
								<td><input type="number" name="tb6_fecha_vacunacion_m_<?php echo $cont?>" value="<?php echo $row->vacu_m?>" value="" min=1 max=12></td>
								<td><input class="year_current_td" type="number" name="tb6_fecha_vacunacion_a_<?php echo $cont?>" value="<?php echo $row->vacu_a?>" min=1900 max=<?php echo date("Y");?> ></td>
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
									<input class="consume_medicamento_si" id="tb6_consume_medicamento_si_<?php echo $cont?>" type="radio"  name="tb6_consume_medicamento_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb6_consume_medicamento_si_<?php echo $cont?>" ></label>
								</td>
								<td><input class="consume_medicamento_txt" type="text" name="tb6_consume_medicamento_txt_<?php echo $cont?>" value="<?php echo $cual_medicamento?>"></td>
								<td>
									<input class="consume_medicamento_no" id="tb6_consume_medicamento_no_<?php echo $cont?>" type="radio"  name="tb6_consume_medicamento_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_consume_medicamento_no_<?php echo $cont?>" ></label>
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
									<input  id="tb6_canalizado_si_<?php echo $cont?>" type="radio"  name="tb6_canalizado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb6_canalizado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb6_canalizado_no_<?php echo $cont?>" type="radio"  name="tb6_canalizado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_canalizado_no_<?php echo $cont?>" ></label>
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
									<input class="remitido" id="tb6_remitido_si_<?php echo $cont?>" type="number" name="tb6_remitido_<?php echo $cont?>" value="<?php echo $remitido?>" min=0 max=10>
								</td>
								<td>
									<input class="remitido_no" id="tb6_remitido_no_<?php echo $cont?>" type="radio"  name="tb6_remitido_no_<?php echo $cont?>" value="no" <?php echo $checked_r?> >
									<label class="radio" for="tb6_remitido_no_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb6_valorado_si_<?php echo $cont?>" type="radio"  name="tb6_valorado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb6_valorado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb6_valorado_no_<?php echo $cont?>" type="radio"  name="tb6_valorado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb6_valorado_no_<?php echo $cont?>" ></label>
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
					<table id="tb6_observaciones" class="observaciones">
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
								<td><input type="text" name="tb6_observaciones_<?php echo $cont?>" value="<?php echo $row->observaciones?>"></td>
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
			<li class="active" onclick="window.location='adultos_60_mas.php'"><label>60 Años o mas..<div class="info_tb">Registro de Actividades Adultos(as) de 60 años y mas</div></label></li>
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