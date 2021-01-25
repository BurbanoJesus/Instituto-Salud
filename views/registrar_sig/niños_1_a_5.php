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
		$id_familia = $_SESSION['id_familia'];
		$id_visita = $_SESSION['id_visita'];
		$cont = 1;
		$sql = "SELECT * FROM integrantes JOIN de_1_a_5 USING(id_integrante)  WHERE integrantes.id_familia = '$id_familia' AND edad_anos >= 1 AND edad_anos < 5 AND id_visita = (SELECT MAX(id_visita)-1 FROM visitas WHERE id_familia = '$id_familia')";
		$query = $bd->query($sql);

		$sql_s = "SELECT * FROM de_1_a_5 JOIN integrantes USING(id_integrante) WHERE id_visita= '$id_visita' AND id_familia = '$id_familia'";
		$query_s = $bd->query($sql_s);

		if (!$query) echo $bd->error;
		if ($query->num_rows == 0 or $query_s->num_rows > 0) {
			echo 'No hay registros o ya se insertaron';
			header("location: /instituto/views/registrar_sig/niños_5_a_9.php");
			return False;
			
		}
		else{ 
			
			
		?>
	<main>
		<form id="form5" action="/instituto/core/registro_sig/s_niños_1_a_5.php" method="POST">
			<div class="divh1">
				<h1>Registro de Actividades Niños(as) 1 a 5 Años(12 a 59 Meses y 29 Días)</h1>
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
					 <div class="tr">
						<h3>Crecimiento y Desarrollo</h3>
						<h3>Vacunación</h3>
						<h3>Salud Oral</h3>
						<h3></h3>
					</div>
					<table id="tb3_niños_1a5">
						<thead>
							<?php 
								$sql_e = "SELECT remitido_otro FROM de_1_a_5 JOIN integrantes USING(id_integrante) WHERE id_familia = '$id_familia' LIMIT 1";
								$query_e = $bd->query($sql_e); 
								$row_e = $query_e->fetch_object();
							?>
							<tr>
								<th colspan="2" rowspan="3" class="none" style="border-right-color: var(--purple)"></th>
								<th rowspan="5" class="celda_vertical"><p class="large">Edad / Meses</p></th>
								<th colspan="2" rowspan="4" class="celda_vertical"><p>Control Crecimiento y Desarrollo</p></th>
								<th colspan="2" rowspan="4" class="celda_vertical"><p>Lactancia Exclusiva (6 meses)</p></th>
								<th colspan="4" rowspan="4" class="table_info">
										<div class="ico">i</div><br/>
										Valoración Nutricional
										<div class="info">
										<label><div class="ico">i</div></label><span>Valoración Nutricional</span>
										<label>1</label><span>IMC : Indice de Masa Corporal, Se calcula con la formula: Peso/(Altura)^2</span>
									</div>
								</th>
								<th colspan="2" rowspan="3" class="celda_vertical"><p>Estado Nutricional</p></th>
								<th colspan="11">Valoración del Desarrollo</th>
								<th colspan="4" rowspan="2">Problemas</th>
								<th colspan="6" rowspan="2"></th>
								<th colspan="10" rowspan="2">Pentavalente</th>
								<th colspan="22" rowspan="2"></th>
							</tr>
							<tr>
								<th colspan="4">Motricidad</th>
								<th colspan="2" rowspan="2">Audición y lenguaje</th>
								<th colspan="2" rowspan="2">Persona Social</th>
								<th colspan="3">Señales de Maltrato</th>
							</tr>

							<tr>
								<th colspan="2">Gruesa</th>
								<th colspan="2">Fina</th>
								<th colspan="2">Si</th>
								<th rowspan="3">No</th>
								<th rowspan="2" colspan="2">Visuales</th>
								<th rowspan="2" colspan="2">Auditivos</th>
								<th rowspan="2" colspan="2">Carné</th>
								<th rowspan="3" colspan="1" class="celda_vertical"><p>BCG</p></th>
								<th rowspan="2" colspan="5">Polio</th>
								<th rowspan="2" colspan="5">DPT</th>
								<th rowspan="2" colspan="3">Hepatitis B</th>
								<th rowspan="2" colspan="3">HIB</th>
								<th rowspan="2" colspan="2">SRP</th>
								<th rowspan="2" colspan="2">Influencia Antigripal</th>
								<th rowspan="3" class="celda_vertical"><p>Fiebre Amarilla</p></th>
								<th rowspan="3">Cepillado No. Veces Por Día</th>
								<th rowspan="2" colspan="3">Consume Algún Medicamento</th>
								<th colspan="4">Desparasitado</th>
								<th colspan="6">Conducta</th>
							</tr>

							<tr>
								<th colspan="2" rowspan="2">Nombres</th>
								<th rowspan="2" class="celda_vertical"><p>Normal</p></th>
								<th rowspan="2" class="celda_vertical"><p>Anormal</p></th>
								<th rowspan="2" class="celda_vertical"><p>Normal</p></th>
								<th rowspan="2" class="celda_vertical"><p>Anormal</p></th>
								<th rowspan="2" class="celda_vertical"><p>Normal</p></th>
								<th rowspan="2" class="celda_vertical"><p>Anormal</p></th>
								<th rowspan="2" class="celda_vertical"><p>Normal</p></th>
								<th rowspan="2" class="celda_vertical"><p>Anormal</p></th>
								<th rowspan="2" class="celda_vertical"><p>Normal</p></th>
								<th rowspan="2" class="celda_vertical"><p>Anormal</p></th>
								<th rowspan="2" class="celda_vertical"><p>Físico</p></th>
								<th rowspan="2" class="celda_vertical"><p>Psicológico</p></th>
								<th colspan="3">Si</th>
								<th rowspan="2" colspan="1">No</th>
								<th colspan="2">Canalizado</th>
								<th colspan="2" class="table_info">
									<div class="ico">i</div>
									Remitido
									<div class="info">
										<label><div class="ico">i</div></label><span>Remitido</span>
										<label>1</label><span>Medico</span>
										<label>2</label><span>Psicólogo</span>
										<label>3</label><span>Nutricionista</span>
										<label>4</label><span>Enfermería</span>
										<label>5</label><span>Odontología</span>
										<label>6</label><span>Control de Crecimiento y Desarrollo</span>
										<label>7</label><span>Control Adolescentes</span>
										<label>8</label><span>Control Prenatal</span>
										<label>9</label><span>Control Adulto Mayor</span>
										<label>10</label><span class="otros_tb_info">Otro: <input type="text" name="tb3_otra_remision" value="<?php echo $row_e->remitido_otro?>"/></span>
									</div>
								</th>
								<th colspan="2">Valorado</th>
							</tr>


							<tr>
								<th>Si</th>
								<th>No</th>
								<th>Si</th>
								<th>No</th>
								<th>Peso (kg)</th>
								<th>Talla (cm)</th>
								<th>IMC</th>
								<th>Graficas</th>
								<th>Si</th>
								<th>No</th>
								<th>Si</th>
								<th>No</th>
								<th>Si</th>
								<th>No</th>
								<th>1</th>
								<th>2</th>
								<th>3</th>
								<th>R1</th>
								<th>R2</th>
								<th>1</th>
								<th>2</th>
								<th>3</th>
								<th>R1</th>
								<th>R2</th>
								<th>1</th>
								<th>2</th>
								<th>3</th>
								<th>1</th>
								<th>2</th>
								<th>3</th>
								<th>1</th>
								<th>R1</th>
								<th>1</th>
								<th>2</th>
								<th>Si</th>
								<th>Cual?</th>
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
								$collect[] = $row;
								$edad = $row->edad_actual_m+$row->edad_actual_a*12;
							?>
							<tr>
								<td><?php echo $cont?></td>
								<td><input class="tb3_nombres" type="text" name="tb3_nombres_<?php echo $cont?>" value="<?php echo $row->nombres?>"></td>
								<td><input class="tb3_edad" type="number" name="tb3_edad_<?php echo $cont?>" value="<?php echo $edad?>"></td>
								<?php 
									if ($row->control_crec_desa == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td><input id="tb3_control_crec_si_<?php echo $cont?>" type="radio"  name="tb3_control_crecimiento_<?php echo $cont?>" value="si" <?php echo $checked_si?> ><label class="radio" for="tb3_control_crec_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb3_control_crec_no_<?php echo $cont?>" type="radio"  name="tb3_control_crecimiento_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb3_control_crec_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->lactancia_exclusiva == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb3_lactancia_si_<?php echo $cont?>" type="radio"  name="tb3_lactancia_<?php echo $cont?>" value="si" <?php echo $checked_si?>>
									<label class="radio" for="tb3_lactancia_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb3_lactancia_no_<?php echo $cont?>" type="radio"  name="tb3_lactancia_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb3_lactancia_no_<?php echo $cont?>" ></label>
								</td>
								<td><input class="tb3_peso" type="number" name="tb3_peso_<?php echo $cont?>" step=0.1  value="" min=1 max=100 required></td>
								<td><input class="tb3_talla" type="number" name="tb3_talla_<?php echo $cont?>" step=0.1  value="" min=1 max=200 required></td>
								<td><input class="tb3_imc" type="number" name="tb3_imc_<?php echo $cont?>" step=0.1  value="" min=1 max=100 required></td>
								<td>
									<div class="divgraf">
										<button type="button" class="call_modal button bg_celeste modal_peso_m2" target="modal_peso_m_<?php echo $cont?>">Peso</button>
										<button type="button" class="call_modal button bg_celeste modal_talla_m2" target="modal_talla_m_<?php echo $cont?>">Talla</button>
									</div>
								</td>
								<?php 
									if ($row->estado_nutricional == 'normal') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb3_estado_n_<?php echo $cont?>" type="radio"  name="tb3_estado_nutricional_<?php echo $cont?>" value="normal" <?php echo $checked_si?> >
									<label class="radio" for="tb3_estado_n_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb3_estado_a_<?php echo $cont?>" type="radio"  name="tb3_estado_nutricional_<?php echo $cont?>" value="anormal" <?php echo $checked_no?> >
									<label class="radio" for="tb3_estado_a_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->motricidad_gruesa == 'normal') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb3_motri_g_n_<?php echo $cont?>" type="radio"  name="tb3_motricidad_gruesa_<?php echo $cont?>" value="normal" <?php echo $checked_si?> >
									<label class="radio" for="tb3_motri_g_n_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb3_motri_g_a_<?php echo $cont?>" type="radio"  name="tb3_motricidad_gruesa_<?php echo $cont?>" value="anormal" <?php echo $checked_no?> >
									<label class="radio" for="tb3_motri_g_a_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->motricidad_fina == 'normal') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb3_motri_f_n_<?php echo $cont?>" type="radio"  name="tb3_motricidad_fina_<?php echo $cont?>" value="normal" <?php echo $checked_si?> >
									<label class="radio" for="tb3_motri_f_n_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb3_motri_f_a_<?php echo $cont?>" type="radio"  name="tb3_motricidad_fina_<?php echo $cont?>" value="anormal" <?php echo $checked_no?> >
									<label class="radio" for="tb3_motri_f_a_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->audicion_lenguaje == 'normal') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb3_audi_n_<?php echo $cont?>" type="radio"  name="tb3_audicion_lenguaje_<?php echo $cont?>" value="normal" <?php echo $checked_si?>>
									<label class="radio" for="tb3_audi_n_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb3_audi_a_<?php echo $cont?>" type="radio"  name="tb3_audicion_lenguaje_<?php echo $cont?>" value="anormal" <?php echo $checked_no?>>
									<label class="radio" for="tb3_audi_a_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->personal_social == 'normal') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb3_pers_n_<?php echo $cont?>" type="radio"  name="tb3_personal_social_<?php echo $cont?>" value="normal" <?php echo $checked_si?> >
									<label class="radio" for="tb3_pers_n_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb3_pers_a_<?php echo $cont?>" type="radio"  name="tb3_personal_social_<?php echo $cont?>" value="anormal" <?php echo $checked_no?> >
									<label class="radio" for="tb3_pers_a_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->maltrato_fisico == 'si') {
									$checked = 'checked';
									$checked_r = '';

									}
									else{
										$checked = '';
									}
								 ?>
								<td>
									<input class="tb3_m_fisico" id="tb3_m_fisico_<?php echo $cont?>" type="checkbox" name="tb3_maltrato_fisico_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_m_fisico_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->maltrato_psico == 'si') {
									$checked = 'checked';
									$checked_r = '';
									}
									else{
										$checked = '';
										$checked_r = 'checked';
									}
								 ?>
								 <td>
									<input class="tb3_m_psico" id="tb3_m_psico_<?php echo $cont?>" type="checkbox" name="tb3_maltrato_psicologico_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_m_psico_<?php echo $cont?>" ></label>
								</td>
								 <td>
									<input class="tb3_m_no" id="tb3_m_no_<?php echo $cont?>" type="radio"  name="tb3_maltrato_<?php echo $cont?>" value="no" <?php echo $checked_r?> >
									<label class="radio" for="tb3_m_no_<?php echo $cont?>" ></label>
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
									<input id="tb3_problema_v_si_<?php echo $cont?>" type="radio"  name="tb3_problema_visual_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb3_problema_v_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb3_problema_v_no_<?php echo $cont?>" type="radio"  name="tb3_problema_visual_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb3_problema_v_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->problemas_auditivos == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb3_problema_a_si_<?php echo $cont?>" type="radio"  name="tb3_problema_auditivo_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb3_problema_a_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb3_problema_a_no_<?php echo $cont?>" type="radio"  name="tb3_problema_auditivo_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb3_problema_a_no_<?php echo $cont?>" ></label>
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
								<td>
									<input id="tb3_carnet_si_<?php echo $cont?>" type="radio"  name="tb3_carnet_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb3_carnet_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb3_carnet_no_<?php echo $cont?>" type="radio"  name="tb3_carnet_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb3_carnet_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->bcg == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								 ?>
								<td>
									<input id="tb3_bcg_<?php echo $cont?>" type="checkbox" name="tb3_bcg_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_bcg_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->polio_1 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_p1_<?php echo $cont?>" type="checkbox" name="tb3_polio1_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_p1_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->polio_2 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_p2_<?php echo $cont?>" type="checkbox" name="tb3_polio2_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_p2_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->polio_3 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_p3_<?php echo $cont?>" type="checkbox" name="tb3_polio3_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_p3_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->polio_r1 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_pr1_<?php echo $cont?>" type="checkbox" name="tb3_polio_r1_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_pr1_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->polio_r2 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_pr2_<?php echo $cont?>" type="checkbox" name="tb3_polio_r2_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_pr2_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->dpt_1 =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_dpt1_<?php echo $cont?>" type="checkbox" name="tb3_dpt1_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_dpt1_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->dpt_2 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_dpt2_<?php echo $cont?>" type="checkbox" name="tb3_dpt2_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_dpt2_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->dpt_3 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_dpt3_<?php echo $cont?>" type="checkbox" name="tb3_dpt3_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_dpt3_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->dpt_r1 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_dpt_r1_<?php echo $cont?>" type="checkbox" name="tb3_dpt_r1_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_dpt_r1_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->dpt_r2 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_dpt_r2_<?php echo $cont?>" type="checkbox" name="tb3_dpt_r2_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_dpt_r2_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->hepatitisb_1 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_hepa1_<?php echo $cont?>" type="checkbox" name="tb3_hepatitisb1_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_hepa1_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->hepatitisb_2 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_hepa2_<?php echo $cont?>" type="checkbox" name="tb3_hepatitisb2_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_hepa2_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->hepatitisb_3 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_hepa3_<?php echo $cont?>" type="checkbox" name="tb3_hepatitisb3_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_hepa3_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->hib_1 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_hib1_<?php echo $cont?>" type="checkbox" name="tb3_hib1_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_hib1_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->hib_2 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_hib2_<?php echo $cont?>" type="checkbox" name="tb3_hib2_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_hib2_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->hib_3 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_hib3_<?php echo $cont?>" type="checkbox" name="tb3_hib3_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_hib3_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->srp_1 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_srp1_<?php echo $cont?>" type="checkbox" name="tb3_srp1_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_srp1_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->srp_r1 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_srp_r1_<?php echo $cont?>" type="checkbox" name="tb3_srp_r1_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_srp_r1_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->influenza_antigripal_1 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_influenza1_<?php echo $cont?>" type="checkbox" name="tb3_influenza1_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_influenza1_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->influenza_antigripal_2 == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb3_influenza2_<?php echo $cont?>" type="checkbox" name="tb3_influenza2_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_influenza2_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->fiebre_amarilla == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								 <td>
									<input id="tb3_fiebre_a_<?php echo $cont?>" type="checkbox" name="tb3_fiebre_amarilla_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb3_fiebre_a_<?php echo $cont?>" ></label>
								</td>
								 <td>
									<input id="tb3_num_cep_<?php echo $cont?>" type="number" name="tb3_numero_cepilladas_<?php echo $cont?>" value="<?php echo $row->num_cepilladas?>">
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
									<input class="consume_medicamento_si" id="tb3_consume_m_si_<?php echo $cont?>" type="radio"  name="tb3_consume_medica_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb3_consume_m_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input class="consume_medicamento_txt" id="tb3_consume_m_txt_<?php echo $cont?>" type="text" name="tb3_consume_medica_txt_<?php echo $cont?>" value="<?php echo $cual_medicamento?>">
								</td>
								<td>
									<input class="consume_medicamento_no" id="tb3_consume_m_no_<?php echo $cont?>" type="radio"  name="tb3_consume_medica_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb3_consume_m_no_<?php echo $cont?>" <?php echo $checked_no?> ></label>
								</td>
								<?php
									if($row->desparasitado == 'no'){
										$row->desparasitado_d = '';
										$row->desparasitado_m = '';
										$row->desparasitado_a = '';
										$checked = 'checked'; 
									}
									else{
										$checked = '';
									} 
								?>
								<td>
									<input class="tb3_desparasitado_si" id="tb3_despara_d_<?php echo $cont?>" type="number" name="tb3_desparasitado_d_<?php echo $cont?>" value="<?php echo $row->desparasitado_d?>">
								</td>
								<td>
									<input class="tb3_desparasitado_si" id="tb3_despara_m_<?php echo $cont?>" type="number" name="tb3_desparasitado_m_<?php echo $cont?>" value="<?php echo $row->desparasitado_m?>">
								</td>
								<td>
									<input class="tb3_desparasitado_si" id="tb3_despara_a_<?php echo $cont?>" type="number" name="tb3_desparasitado_a_<?php echo $cont?>" value="<?php echo $row->desparasitado_a?>">
								</td>
								 <td>
									<input class="tb3_desparasitado_no" id="tb3_despara_no_<?php echo $cont?>" type="radio"  name="tb3_desparasitado_no_<?php echo $cont?>" value="no" <?php echo $checked?>  >
									<label class="radio" for="tb3_despara_no_<?php echo $cont?>" ></label>
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
									<input id="tb3_canalizado_si_<?php echo $cont?>" type="radio"  name="tb3_canalizado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb3_canalizado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb3_canalizado_no_<?php echo $cont?>" type="radio"  name="tb3_canalizado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb3_canalizado_no_<?php echo $cont?>" ></label>
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
									<input class="remitido" id="tb3_remitido_si_<?php echo $cont?>" type="number"  name="tb3_remitido_<?php echo $cont?>" value="<?php echo $remitido?>" min=0 max=10>
								</td>
								<td>
									<input class="remitido_no" id="tb3_remitido_no_<?php echo $cont?>" type="radio"  name="tb3_remitido_no_<?php echo $cont?>" value="no" <?php echo $checked_r?> >
									<label class="radio" for="tb3_remitido_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->valorado == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb3_valorado_si_<?php echo $cont?>" type="radio"  name="tb3_valorado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb3_valorado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb3_valorado_no_<?php echo $cont?>" type="radio"  name="tb3_valorado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb3_valorado_no_<?php echo $cont?>" ></label>
									<input type="hidden" name="id_integrante_<?php echo $cont?>" value="<?php echo $row->id_integrante?>">
									<input type="hidden" name="id_visita_<?php echo $cont?>" value="<?php echo $row->id_visita?>">
									<input type="hidden" name="id_opcion_<?php echo $cont?>" value="1">
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
					<table id="tb3_observaciones" class="observaciones">
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
								<td><input type="text" name="tb3_observaciones_<?php echo $cont?>" value=""></td>
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
			<?php  
				$cont = 1;
				foreach ($collect as $row){
				
			?>
			<div id="modal_peso_m_<?php echo $cont?>" class="modal modal_peso">
				<div class="modal_main">
					<div class="modal_content">
						<img src="http://localhost/instituto/static/img/varios/cerrar_modal2.png" class="close" />
						<span class="grafica_tit">Grafica Para la Evaluacion de Peso de un Niño(a) Menor de 5 años</span>
						<span class="grafica_sub">Peso para la edad</span>
						<div class="peso_nac">
							<label class="grafica_label">Peso al Nacer (Gramos)</label>
							<input class="peso_al_nacer_2" type="number" name="tb3_peso_al_nacer_<?php echo $cont?>" value="<?php echo $row->peso_al_nacer?>" min=1 max=15000>
							<div class="grafica_info" style="display: none;">
								<span class="gi_tit">Observe La Direccion del Crecimiento del Niño</span>
								<img src="http://localhost/instituto/static/img/graficas/GraficaPesoInfo.png" alt=""/>
							</div>
						</div>
						<canvas class="canvas_p" id="canvas_p<?php echo $cont?>" width="1200" height="600" style="position: relative; display: none;"></canvas>
						<br>
						<div class="modal_content2">
							<button class="button acept bg_verde" type="button">Aceptar</button>
						</div>
					</div>
				</div>
			</div>
			<?php
				$cont++; 
				} 
			?>

			<?php  
				$cont = 1;
				foreach ($collect as $row){
				if ($row->sexo == 'M') {
		
			?>
			<div id="modal_talla_m_<?php echo $cont?>" class="modal modal_talla">
				<div class="modal_main">
					<div class="modal_content">
						<img src="http://localhost/instituto/static/img/varios/cerrar_modal2.png" class="close" />
						<span class="grafica_tit">Grafica Para la Evaluacion de Talla de un Niño menor de 5 años</span>
						<span class="grafica_sub">Talla para la edad</span>
						
						<canvas id="canvas_t<?php echo $cont?>" width="1200" height="600"></canvas>
						<br>
						<div class="modal_content2">
							<button class="button acept bg_verde" type="button">Aceptar</button>
						</div>
						<input type="hidden" name="tb3_sexo_<?php echo $cont?>" value="<?php echo $row->sexo?>">
					</div>
				</div>
			</div>
			<?php }
			else{ ?>
			<div id="modal_talla_m_<?php echo $cont?>" class="modal modal_talla">
				<div class="modal_main">
					<div class="modal_content">
						<img src="http://localhost/instituto/static/img/varios/cerrar_modal2.png" class="close" />
						<span class="grafica_tit">Grafica Para la Evaluacion de Talla de un Niña menor de 5 años</span>
						<span class="grafica_sub">Talla para la edad</span>
						
						<canvas id="canvas_t<?php echo $cont?>" width="1200" height="600"></canvas>
						<br>
						<div class="modal_content2">
							<button class="button acept bg_verde" type="button">Aceptar</button>
						</div>
						<input type="hidden" name="tb3_sexo_<?php echo $cont?>" value="<?php echo $row->sexo?>">
					</div>
				</div>
			</div>
			<?php }
				$cont++; 
				} 
			?>
		</form>
	</main>
	<?php } ?>
	<script src="http://localhost/instituto/static/js/jquery-3.3.1.js"></script>
	<script src="http://localhost/instituto/static/js/bootstrap.js"></script>
	<script src="http://localhost/instituto/static/js/funciones.js"></script>
	<script src="http://localhost/instituto/static/js/Chart.js"></script>
	<script src="http://localhost/instituto/static/js/graficas.js"></script>
</body>
</html>
