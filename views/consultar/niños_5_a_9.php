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
		$id_visita = 1;
		$cont = 1;
		$sql = "SELECT * FROM integrantes JOIN de_5_a_9 USING(id_integrante) JOIN visitas USING(id_visita,id_familia) WHERE visitas.id_familia = '$id_familia' AND edad_anos >= 5 AND edad_anos < 10";
		$query = $bd->query($sql);
		while ($row = $query->fetch_object()) {
			$collect[] = $row;
		}
		$query->data_seek(0);

		if (!$query) echo $bd->error;
		if ($query->num_rows == 0) {
			echo "<div class='registro_non'>";
	        echo "<p>No Existen Registros de Niños de 5 a 9 Años en esta Familia</p>";
	        echo "<button type='button' class='button next block' onclick='window.location=\"hom_muj_10_a_59.php\"'>Siguiente</button>";
	        echo "</div>";
		}
		else{
			
		?>
	<main>
		<form id="form6" action="/instituto/core/consultas/s_niños_5_a_9.php" method="POST">
			<div class="divh1">
				<h1>Registro de Actividades Niños(as) 5 a 9 Años</h1>
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
					 <div class="tr">
						<h3>Crecimiento y Desarrollo</h3>
						<h3>Vacunación</h3>
						<h3>Salud Oral</h3>
						<h3></h3>
					</div>
					<table id="tb4_niños_5a9">
						<thead>
							<?php 
								$sql_e = "SELECT remitido_otro FROM de_5_a_9 JOIN integrantes USING(id_integrante) WHERE id_familia = '$id_familia' LIMIT 1";
								$query_e = $bd->query($sql_e); 
								$row_e = $query_e->fetch_object();
							?>
							<tr>
								<th colspan="2" rowspan="3" class="none"></th>
								<th rowspan="5" class="celda_vertical"><p class="large">Edad / Meses</p></th>
								<th colspan="2" rowspan="4" class="celda_vertical"><p>Control Crecimiento y Desarrollo</p></th>
								<th colspan="2" rowspan="4" class="celda_vertical"><p>Lactancia Exclusiva (6 meses)</p></th>
								<th colspan="3" rowspan="4" class="table_info">
										<div class="ico">i</div><br/>
										Valoración Nutricional
										<div class="info">
										<label><div class="ico">i</div></label><span>Valoración Nutricional</span>
										<label></label><span>IMC : Indice de Masa Corporal, Se calcula con la formula: Peso/(Altura)^2</span>
									</div>
								</th>
								<th colspan="2" rowspan="3" class="celda_vertical"><p>Estado Nutricional</p></th>
								<th colspan="11">Valoración del Desarrollo</th>
								<th colspan="25" rowspan="2"></th>
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
								<th rowspan="2" class="celda_vertical"><p>DPT</p></th>
								<th rowspan="2" class="celda_vertical"><p>VOP</p></th>
								<th rowspan="2" class="celda_vertical"><p>SRP</p></th>
								<th rowspan="2" colspan="2">Caries</th>
								<th rowspan="2" colspan="2">Aplicación de Fluor</th>
								<th rowspan="2" colspan="2">Aplicación Sellantes</th>
								<th rowspan="2" colspan="2">Uso de seda dental</th>
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
										<label>10</label><span class="otros_tb_info">Otro: <input type="text" name="tb4_otra_remision" value="<?php echo $row_e->remitido_otro?>"/></span>
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
								<th>R1</th>
								<th>R2</th>
								<th>R3</th>
								<th>Si</th>
								<th>No</th>
								<th>Si</th>
								<th>No</th>
								<th>Si</th>
								<th>No</th>
								<th>Si</th>
								<th>No</th>
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
								if ($row->id_visita == 1){
							?>
							<tr>
								<td><?php echo $cont?></td>
								<td><input class="tb4_nombres" type="text" name="tb4_nombres_<?php echo $cont?>" value="<?php echo $row->nombres?>"></td>
								<td><input type="number" name="tb4_edad_<?php echo $cont?>" step=0.1  value="<?php echo $row->edad_meses_vis?>"></td>
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
								<td><input id="tb4_control_crec_si_<?php echo $cont?>" type="radio"  name="tb4_control_crecimiento_<?php echo $cont?>" value="si" <?php echo $checked_si?> ><label class="radio" for="tb4_control_crec_si_<?php echo $cont?>"></label>
								</td>
								<td>
									<input id="tb4_control_crec_no_<?php echo $cont?>" type="radio"  name="tb4_control_crecimiento_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb4_control_crec_no_<?php echo $cont?>"></label>
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
									<input id="tb4_lactancia_si_<?php echo $cont?>" type="radio"  name="tb4_lactancia_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb4_lactancia_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_lactancia_no_<?php echo $cont?>" type="radio"  name="tb4_lactancia_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb4_lactancia_no_<?php echo $cont?>" ></label>
								</td>
								<td><input class="tb4_peso" type="number" name="tb4_peso_<?php echo $cont?>" step=0.1  value="<?php echo $row->peso?>"  min=1 max=200 required></td>
								<td><input class="tb4_talla" type="number" name="tb4_talla_<?php echo $cont?>" step=0.1  value="<?php echo $row->talla?>" min=1 max=200 required></td>
								<td><input class="tb4_imc" type="number" name="tb4_imc_<?php echo $cont?>" step=0.1  value="<?php echo $row->imc?>" min=1 max=100 required></td>
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
									<input class="tb4_estado_nutricional" id="tb4_estado_n_<?php echo $cont?>" type="radio"  name="tb4_estado_nutricional_<?php echo $cont?>" value="normal" <?php echo $checked_si?> >
									<label class="radio" for="tb4_estado_n_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_estado_a_<?php echo $cont?>" type="radio"  name="tb4_estado_nutricional_<?php echo $cont?>" value="anormal" <?php echo $checked_no?> >
									<label class="radio" for="tb4_estado_a_<?php echo $cont?>" ></label>
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
									<input id="tb4_motri_g_n_<?php echo $cont?>" type="radio"  name="tb4_motricidad_gruesa_<?php echo $cont?>" value="normal" <?php echo $checked_si?> >
									<label class="radio" for="tb4_motri_g_n_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_motri_g_a_<?php echo $cont?>" type="radio"  name="tb4_motricidad_gruesa_<?php echo $cont?>" value="anormal" <?php echo $checked_no?> >
									<label class="radio" for="tb4_motri_g_a_<?php echo $cont?>" ></label>
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
									<input id="tb4_motri_f_n_<?php echo $cont?>" type="radio"  name="tb4_motricidad_fina_<?php echo $cont?>" value="normal" <?php echo $checked_si?> >
									<label class="radio" for="tb4_motri_f_n_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_motri_f_a_<?php echo $cont?>" type="radio"  name="tb4_motricidad_fina_<?php echo $cont?>" value="anormal" <?php echo $checked_no?> >
									<label class="radio" for="tb4_motri_f_a_<?php echo $cont?>" ></label>
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
									<input id="tb4_audi_n_<?php echo $cont?>" type="radio"  name="tb4_audicion_lenguaje_<?php echo $cont?>" value="normal" <?php echo $checked_si?> >
									<label class="radio" for="tb4_audi_n_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_audi_a_<?php echo $cont?>" type="radio"  name="tb4_audicion_lenguaje_<?php echo $cont?>" value="anormal" <?php echo $checked_no?> >
									<label class="radio" for="tb4_audi_a_<?php echo $cont?>" ></label>
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
									<input id="tb4_pers_n_<?php echo $cont?>" type="radio"  name="tb4_personal_social_<?php echo $cont?>" value="normal" <?php echo $checked_si?> >
									<label class="radio" for="tb4_pers_n_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_pers_a_<?php echo $cont?>" type="radio"  name="tb4_personal_social_<?php echo $cont?>" value="anormal" <?php echo $checked_no?> >
									<label class="radio" for="tb4_pers_a_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->maltrato_fisico == 'si') {
									$checked = 'checked';
									$checked_r = '';

									}
									else{
										$checked = '';
										$checked_r = 'checked';
									}
								 ?>
								<td>
									<input class="tb4_m_fisico" id="tb4_m_fisico_<?php echo $cont?>" type="checkbox" name="tb4_maltrato_fisico_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb4_m_fisico_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->maltrato_psico == 'si') {
									$checked = 'checked';
									$checked_r = '';
									}
									else{
										$checked = '';
									}
								 ?>
								<td>
									<input class="tb4_m_psico" id="tb4_m_psico_<?php echo $cont?>" type="checkbox" name="tb4_maltrato_psicologico_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb4_m_psico_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input class="tb4_m_no" id="tb4_m_no_<?php echo $cont?>" type="radio"  name="tb4_maltrato_<?php echo $cont?>" value="no" <?php echo $checked_r?> >
									<label class="radio" for="tb4_m_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->dpt =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb4_dpt_<?php echo $cont?>" type="checkbox" name="tb4_dpt_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb4_dpt_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->vop =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								 <td>
									<input id="tb4_vop_<?php echo $cont?>" type="checkbox" name="tb4_vop_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb4_vop_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->srp =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								 <td>
									<input id="tb4_srp_<?php echo $cont?>" type="checkbox" name="tb4_srp_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb4_srp_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->caries == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb4_caries_si_<?php echo $cont?>" type="radio"  name="tb4_caries_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb4_caries_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_caries_no_<?php echo $cont?>" type="radio"  name="tb4_caries_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb4_caries_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->aplicacion_fluor == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								 <td>
									<input id="tb4_aplica_fluor_si_<?php echo $cont?>" type="radio"  name="tb4_aplica_fluor_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb4_aplica_fluor_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_aplica_fluor_no_<?php echo $cont?>" type="radio"  name="tb4_aplica_fluor_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb4_aplica_fluor_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->aplicacion_sellantes == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								 <td>
									<input id="tb4_aplica_sellantes_si_<?php echo $cont?>" type="radio"  name="tb4_aplica_sellantes_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb4_aplica_sellantes_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_aplica_sellantes_no_<?php echo $cont?>" type="radio"  name="tb4_aplica_sellantes_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb4_aplica_sellantes_no_<?php echo $cont?>" ></label>
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
									<input id="tb4_seda_dental_si_<?php echo $cont?>" type="radio"  name="tb4_seda_dental_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb4_seda_dental_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_seda_dental_no_<?php echo $cont?>" type="radio"  name="tb4_seda_dental_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb4_seda_dental_no_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_num_cep_<?php echo $cont?>" type="text" name="tb4_numero_cepilladas_<?php echo $cont?>" value="0">
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
									<input class="consume_medicamento_si" id="tb4_consume_m_si_<?php echo $cont?>" type="radio"  name="tb4_consume_medica_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb4_consume_m_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input class="consume_medicamento_txt" id="tb4_consume_m_txt_<?php echo $cont?>" type="text" name="tb4_consume_medica_txt_<?php echo $cont?>" value="<?php echo $cual_medicamento?>">
								</td>
								<td>
									<input class="consume_medicamento_no" id="tb4_consume_m_no_<?php echo $cont?>" type="radio"  name="tb4_consume_medica_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb4_consume_m_no_<?php echo $cont?>" ></label>
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
									<input class="tb4_desparasitado_si" id="tb4_despara_d_<?php echo $cont?>" type="number" name="tb4_desparasitado_d_<?php echo $cont?>" value="<?php echo $row->desparasitado_d?>">
								</td>
								<td>
									<input class="tb4_desparasitado_si" id="tb4_despara_m_<?php echo $cont?>" type="number" name="tb4_desparasitado_m_<?php echo $cont?>" value="<?php echo $row->desparasitado_m?>">
								</td>
								<td>
									<input class="tb4_desparasitado_si year_current_td" id="tb4_despara_a_<?php echo $cont?>" type="number" name="tb4_desparasitado_a_<?php echo $cont?>" value="<?php echo $row->desparasitado_a?>">
								</td>
								 <td>
									<input class="tb4_desparasitado_no" id="tb4_despara_no_<?php echo $cont?>" type="radio"  name="tb4_desparasitado_no_<?php echo $cont?>" value="no" <?php echo $checked?> >
									<label class="radio" for="tb4_despara_no_<?php echo $cont?>" ></label>
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
									<input id="tb4_canalizado_si_<?php echo $cont?>" type="radio"  name="tb4_canalizado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb4_canalizado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_canalizado_no_<?php echo $cont?>" type="radio"  name="tb4_canalizado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb4_canalizado_no_<?php echo $cont?>" ></label>
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
									<input class="remitido" id="tb4_remitido_si_<?php echo $cont?>" type="number"  name="tb4_remitido_<?php echo $cont?>" value="<?php echo $remitido?>" min=0 max=10>
								</td>
								<td>
									<input class="remitido_no" id="tb4_remitido_no_<?php echo $cont?>" type="radio"  name="tb4_remitido_no_<?php echo $cont?>" value="no" <?php echo $checked_r?> >
									<label class="radio" for="tb4_remitido_no_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_valorado_si_<?php echo $cont?>" type="radio"  name="tb4_valorado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb4_valorado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_valorado_no_<?php echo $cont?>" type="radio"  name="tb4_valorado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb4_valorado_no_<?php echo $cont?>" ></label>
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
								<td><input class="tb4_nombres" type="text" name="tb4_nombres_<?php echo $cont?>" value="<?php echo $row->nombres?>"></td>
								<td><input type="number" name="tb4_edad_<?php echo $cont?>" step=0.1  value="<?php echo $row->edad_meses_vis?>"></td>
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
								<td><input id="tb4_control_crec_si_<?php echo $cont?>" type="radio"  name="tb4_control_crecimiento_<?php echo $cont?>" value="si" <?php echo $checked_si?> ><label class="radio" for="tb4_control_crec_si_<?php echo $cont?>"></label>
								</td>
								<td>
									<input id="tb4_control_crec_no_<?php echo $cont?>" type="radio"  name="tb4_control_crecimiento_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb4_control_crec_no_<?php echo $cont?>"></label>
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
									<input id="tb4_lactancia_si_<?php echo $cont?>" type="radio"  name="tb4_lactancia_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb4_lactancia_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_lactancia_no_<?php echo $cont?>" type="radio"  name="tb4_lactancia_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb4_lactancia_no_<?php echo $cont?>" ></label>
								</td>
								<td><input class="tb4_peso" type="number" name="tb4_peso_<?php echo $cont?>" step=0.1  value="<?php echo $row->peso?>"  min=1 max=200 required></td>
								<td><input class="tb4_talla" type="number" name="tb4_talla_<?php echo $cont?>" step=0.1  value="<?php echo $row->talla?>" min=1 max=200 required></td>
								<td><input class="tb4_imc" type="number" name="tb4_imc_<?php echo $cont?>" step=0.1  value="<?php echo $row->imc?>" min=1 max=100 required></td>
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
									<input class="tb4_estado_nutricional" id="tb4_estado_n_<?php echo $cont?>" type="radio"  name="tb4_estado_nutricional_<?php echo $cont?>" value="normal" <?php echo $checked_si?> >
									<label class="radio" for="tb4_estado_n_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_estado_a_<?php echo $cont?>" type="radio"  name="tb4_estado_nutricional_<?php echo $cont?>" value="anormal" <?php echo $checked_no?> >
									<label class="radio" for="tb4_estado_a_<?php echo $cont?>" ></label>
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
									<input id="tb4_motri_g_n_<?php echo $cont?>" type="radio"  name="tb4_motricidad_gruesa_<?php echo $cont?>" value="normal" <?php echo $checked_si?> >
									<label class="radio" for="tb4_motri_g_n_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_motri_g_a_<?php echo $cont?>" type="radio"  name="tb4_motricidad_gruesa_<?php echo $cont?>" value="anormal" <?php echo $checked_no?> >
									<label class="radio" for="tb4_motri_g_a_<?php echo $cont?>" ></label>
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
									<input id="tb4_motri_f_n_<?php echo $cont?>" type="radio"  name="tb4_motricidad_fina_<?php echo $cont?>" value="normal" <?php echo $checked_si?> >
									<label class="radio" for="tb4_motri_f_n_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_motri_f_a_<?php echo $cont?>" type="radio"  name="tb4_motricidad_fina_<?php echo $cont?>" value="anormal" <?php echo $checked_no?> >
									<label class="radio" for="tb4_motri_f_a_<?php echo $cont?>" ></label>
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
									<input id="tb4_audi_n_<?php echo $cont?>" type="radio"  name="tb4_audicion_lenguaje_<?php echo $cont?>" value="normal" <?php echo $checked_si?> >
									<label class="radio" for="tb4_audi_n_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_audi_a_<?php echo $cont?>" type="radio"  name="tb4_audicion_lenguaje_<?php echo $cont?>" value="anormal" <?php echo $checked_no?> >
									<label class="radio" for="tb4_audi_a_<?php echo $cont?>" ></label>
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
									<input id="tb4_pers_n_<?php echo $cont?>" type="radio"  name="tb4_personal_social_<?php echo $cont?>" value="normal" <?php echo $checked_si?> >
									<label class="radio" for="tb4_pers_n_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_pers_a_<?php echo $cont?>" type="radio"  name="tb4_personal_social_<?php echo $cont?>" value="anormal" <?php echo $checked_no?> >
									<label class="radio" for="tb4_pers_a_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->maltrato_fisico == 'si') {
									$checked = 'checked';
									$checked_r = '';

									}
									else{
										$checked = '';
										$checked_r = 'checked';
									}
								 ?>
								<td>
									<input class="tb4_m_fisico" id="tb4_m_fisico_<?php echo $cont?>" type="checkbox" name="tb4_maltrato_fisico_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb4_m_fisico_<?php echo $cont?>" ></label>
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
									<input class="tb4_m_psico" id="tb4_m_psico_<?php echo $cont?>" type="checkbox" name="tb4_maltrato_psicologico_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb4_m_psico_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input class="tb4_m_no" id="tb4_m_no_<?php echo $cont?>" type="radio"  name="tb4_maltrato_<?php echo $cont?>" value="no" <?php echo $checked_r?> >
									<label class="radio" for="tb4_m_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->dpt =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb4_dpt_<?php echo $cont?>" type="checkbox" name="tb4_dpt_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb4_dpt_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->vop =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								 <td>
									<input id="tb4_vop_<?php echo $cont?>" type="checkbox" name="tb4_vop_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb4_vop_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->srp =='si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								 <td>
									<input id="tb4_srp_<?php echo $cont?>" type="checkbox" name="tb4_srp_<?php echo $cont?>" value="si" <?php echo $checked?> >
									<label class="check" for="tb4_srp_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->caries == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb4_caries_si_<?php echo $cont?>" type="radio"  name="tb4_caries_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb4_caries_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_caries_no_<?php echo $cont?>" type="radio"  name="tb4_caries_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb4_caries_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->aplicacion_fluor == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								 <td>
									<input id="tb4_aplica_fluor_si_<?php echo $cont?>" type="radio"  name="tb4_aplica_fluor_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb4_aplica_fluor_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_aplica_fluor_no_<?php echo $cont?>" type="radio"  name="tb4_aplica_fluor_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb4_aplica_fluor_no_<?php echo $cont?>" ></label>
								</td>
								<?php 
									if ($row->aplicacion_sellantes == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								 <td>
									<input id="tb4_aplica_sellantes_si_<?php echo $cont?>" type="radio"  name="tb4_aplica_sellantes_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb4_aplica_sellantes_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_aplica_sellantes_no_<?php echo $cont?>" type="radio"  name="tb4_aplica_sellantes_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb4_aplica_sellantes_no_<?php echo $cont?>" ></label>
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
									<input id="tb4_seda_dental_si_<?php echo $cont?>" type="radio"  name="tb4_seda_dental_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb4_seda_dental_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_seda_dental_no_<?php echo $cont?>" type="radio"  name="tb4_seda_dental_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb4_seda_dental_no_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_num_cep_<?php echo $cont?>" type="text" name="tb4_numero_cepilladas_<?php echo $cont?>" value="0">
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
									<input class="consume_medicamento_si" id="tb4_consume_m_si_<?php echo $cont?>" type="radio"  name="tb4_consume_medica_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb4_consume_m_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input class="consume_medicamento_txt" id="tb4_consume_m_txt_<?php echo $cont?>" type="text" name="tb4_consume_medica_txt_<?php echo $cont?>" value="<?php echo $cual_medicamento?>">
								</td>
								<td>
									<input class="consume_medicamento_no" id="tb4_consume_m_no_<?php echo $cont?>" type="radio"  name="tb4_consume_medica_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb4_consume_m_no_<?php echo $cont?>" ></label>
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
									<input class="tb4_desparasitado_si" id="tb4_despara_d_<?php echo $cont?>" type="number" name="tb4_desparasitado_d_<?php echo $cont?>" value="<?php echo $row->desparasitado_d?>">
								</td>
								<td>
									<input class="tb4_desparasitado_si" id="tb4_despara_m_<?php echo $cont?>" type="number" name="tb4_desparasitado_m_<?php echo $cont?>" value="<?php echo $row->desparasitado_m?>">
								</td>
								<td>
									<input class="tb4_desparasitado_si" id="tb4_despara_a_<?php echo $cont?>" type="number" name="tb4_desparasitado_a_<?php echo $cont?>" value="<?php echo $row->desparasitado_a?>">
								</td>
								 <td>
									<input class="tb4_desparasitado_no" id="tb4_despara_no_<?php echo $cont?>" type="radio"  name="tb4_desparasitado_no_<?php echo $cont?>" value="no" <?php echo $checked?> >
									<label class="radio" for="tb4_despara_no_<?php echo $cont?>" ></label>
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
									<input id="tb4_canalizado_si_<?php echo $cont?>" type="radio"  name="tb4_canalizado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb4_canalizado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_canalizado_no_<?php echo $cont?>" type="radio"  name="tb4_canalizado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb4_canalizado_no_<?php echo $cont?>" ></label>
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
									<input class="remitido" id="tb4_remitido_si_<?php echo $cont?>" type="number"  name="tb4_remitido_<?php echo $cont?>" value="<?php echo $remitido?>" min=0 max=10>
								</td>
								<td>
									<input class="remitido_no" id="tb4_remitido_no_<?php echo $cont?>" type="radio"  name="tb4_remitido_no_<?php echo $cont?>" value="no" <?php echo $checked_r?> >
									<label class="radio" for="tb4_remitido_no_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_valorado_si_<?php echo $cont?>" type="radio"  name="tb4_valorado_<?php echo $cont?>" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb4_valorado_si_<?php echo $cont?>" ></label>
								</td>
								<td>
									<input id="tb4_valorado_no_<?php echo $cont?>" type="radio"  name="tb4_valorado_<?php echo $cont?>" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb4_valorado_no_<?php echo $cont?>" ></label>
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
					<table id="tb4_observaciones" class="observaciones">
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
								<td><input type="text" name="tb4_observaciones_<?php echo $cont?>" value="<?php echo $row->observaciones?>"></td>
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
			<li class="active" onclick="window.location='niños_5_a_9.php'"><label>5 a 9 Años..<div class="info_tb">Registro de Actividades Niños(as) 5 a 9 años</div></label></li>
			<li onclick="window.location='hom_muj_10_a_59.php'"><label>10 a 59 Años..<div class="info_tb">Registro de Actividades Hombres y Mujeres de 10 a 59 años</div></label></li>
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