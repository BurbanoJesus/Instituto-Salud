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
		<form id="form12" action="/instituto/core/registro_sig/s_condiciones.php" method="POST">
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
				$sql = "SELECT * FROM caracteristicas WHERE id_familia = '$id_familia' AND id_visita = '$id_visita' ORDER BY id_visita DESC LIMIT 1";
				$query = $bd->query($sql);

				if (!$query) echo $bd->error;
				if ($query->num_rows > 0) {
					echo 'ya se registro';
					header("location: /instituto/views/registrar_sig/observaciones.php");
					return False;
				}

				$checked_si = ''; 
				$checked_no = 'checked'; 
				$checked_vsi = ''; 
				$checked_vno = ''; 
				$num_vacunados = Null;
				$num_no_vacunados = Null;

			 ?>
			<div class="divh1">
				<h1>Evaluacion Condiciones Sanitarias de la Vivienda</h1>
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
				<div class="table special_one">
					<table id="tb10_1_caracteristicas">
						<thead>
								<tr>
									 <th colspan="3" class="bg_celeste">1. Caracteristicas de la Vivienda</th>
								</tr>
								<tr>
									 <th colspan="3">Fecha Visita <?php echo $_SESSION['id_visita']?>
										<div class="td_fecha_visita">
											<span class="fecha_visita"><input type="number" name="tb10_1_fechavisista_d" value="<?php echo $_SESSION['v_actual_d']?>"></span>
											<span class="fecha_visita"><input type="number" name="tb10_1_fechavisista_m" value="<?php echo $_SESSION['v_actual_m']?>"></span>
											<span class="fecha_visita"><input type="number" name="tb10_1_fechavisista_a" value="<?php echo $_SESSION['v_actual_a']?>"></span>
										</div>
									 </th>
								 </tr>
								 <tr>
									 <th>Piso</th>
									 <th>Paredes</th>
									 <th>Techo</th>
								</tr>
						</thead>
						<tbody>
							<tr>
								<?php 
								$sql = "SELECT * FROM caracteristicas WHERE id_familia = '$id_familia' ORDER BY id_visita DESC LIMIT 1";
								$query = $bd->query($sql); 
								$row = $query->fetch_object();
								?>
								<td class="cell_center">
									<select class="select_td" name="tb10_1_piso" id="tb10_1_piso" required>
									<option value="">Seleccionar Material</option>
									<option value="1" <?php if($row->piso == 1) echo "selected";?> >Cemento</option>
									<option value="2" <?php if($row->piso == 2) echo "selected";?> >Madera</option>
									<option value="3" <?php if($row->piso == 3) echo "selected";?> >Bahareque</option>
									<option value="4" <?php if($row->piso == 4) echo "selected";?> >Palma</option>
									<option value="5" <?php if($row->piso == 5) echo "selected";?> >Barro o Tierra</option>
									<option value="6" <?php if($row->piso == 6) echo "selected";?> >Paja</option>
									<option value="7" <?php if($row->piso == 7) echo "selected";?> >Plastico</option>
									<option value="8" <?php if($row->piso == 8) echo "selected";?> >Teja de Eternit</option>
									<option value="9" <?php if($row->piso == 9) echo "selected";?> >Teja de Barro</option>
									<option value="10" <?php if($row->piso == 10) echo "selected";?> >Lamina de Zinc</option>
									<option value="11" <?php if($row->piso == 11) echo "selected";?> >Otro</option>
								</select>
								</td>
								<td>
									<select class="select_td" name="tb10_1_paredes" id="tb10_1_paredes" required>
									<option value="">Seleccionar Material</option>
									<option value="1" <?php if($row->paredes == 1) echo "selected";?> >Cemento</option>
									<option value="2" <?php if($row->paredes == 2) echo "selected";?> >Madera</option>
									<option value="3" <?php if($row->paredes == 3) echo "selected";?> >Bahareque</option>
									<option value="4" <?php if($row->paredes == 4) echo "selected";?> >Palma</option>
									<option value="5" <?php if($row->paredes == 5) echo "selected";?> >Barro o Tierra</option>
									<option value="6" <?php if($row->paredes == 6) echo "selected";?> >Paja</option>
									<option value="7" <?php if($row->paredes == 7) echo "selected";?> >Plastico</option>
									<option value="8" <?php if($row->paredes == 8) echo "selected";?> >Teja de Eternit</option>
									<option value="9" <?php if($row->paredes == 9) echo "selected";?> >Teja de Barro</option>
									<option value="10" <?php if($row->paredes == 10) echo "selected";?> >Lamina de Zinc</option>
									<option value="11" <?php if($row->paredes == 11) echo "selected";?> >Otro</option>
								</select>
								</td>
								<td>
									<select class="select_td" name="tb10_1_techo" id="tb10_1_techo" required>
									<option value="">Seleccionar Material</option>
									<option value="1" <?php if($row->techo == 1) echo "selected";?> >Cemento</option>
									<option value="2" <?php if($row->techo == 2) echo "selected";?> >Madera</option>
									<option value="3" <?php if($row->techo == 3) echo "selected";?> >Bahareque</option>
									<option value="4" <?php if($row->techo == 4) echo "selected";?> >Palma</option>
									<option value="5" <?php if($row->techo == 5) echo "selected";?> >Barro o Tierra</option>
									<option value="6" <?php if($row->techo == 6) echo "selected";?> >Paja</option>
									<option value="7" <?php if($row->techo == 7) echo "selected";?> >Plastico</option>
									<option value="8" <?php if($row->techo == 8) echo "selected";?> >Teja de Eternit</option>
									<option value="9" <?php if($row->techo == 9) echo "selected";?> >Teja de Barro</option>
									<option value="10" <?php if($row->techo == 10) echo "selected";?> >Lamina de Zinc</option>
									<option value="11" <?php if($row->techo == 11) echo "selected";?> >Otro</option>
								</select>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="table">
					<table id="tb10_1_2_caracteristicas">
						<thead>
							
							<tr>
								<th rowspan="2" class="cell_center">Numero Habitaciones Vivienda</th>
								<th colspan="2">Ventilacion Adecuada</th>
								<th rowspan="2">Cocina con</th>
								<th colspan="2">Ubicacion Cocina</th>
							</tr>
							<tr>
								<th>Si</th>
								<th>No</th>
								<th>Dentro</th>
								<th>Fuera</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="number" name="tb10_1_2_num_habitaciones" value="<?php echo $row->num_habitaciones?>"></td>
								<?php 
									if ($row->ventilacion_adecuada == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb10_1_2_ventilacion_adecuada_si" type="radio"  name="tb10_1_2_ventilacion_adecuada" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_1_2_ventilacion_adecuada_si" ></label>
								</td>
								<td>
									<input id="tb10_1_2_ventilacion_adecuada_no" type="radio"  name="tb10_1_2_ventilacion_adecuada" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_1_2_ventilacion_adecuada_no" ></label>
								</td>
								<td>
									<select class="select_td" name="tb10_1_2_cocina_con" id="" required>
									<option value="">Seleccionar Elemento</option>
									<option value="1" <?php if($row->cocina_con == 1) echo "selected";?> >Gas</option>
									<option value="2" <?php if($row->cocina_con == 2) echo "selected";?> >Leña</option>
									<option value="3" <?php if($row->cocina_con == 3) echo "selected";?> >Gasolina</option>
									<option value="4" <?php if($row->cocina_con == 4) echo "selected";?> >Electricidad</option>
									<option value="5" <?php if($row->cocina_con == 5) echo "selected";?> >Carbon</option>
									<option value="6" <?php if($row->cocina_con == 6) echo "selected";?> >Otro</option>
								</select>
								</td>
								<?php 
									if ($row->ubicacion_cocina == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
									}
									else{
										$checked_si = '';
										$checked_no = 'checked';
									}
								 ?>
								<td>
									<input id="tb10_1_2_ubicacion_cocina_si" type="radio"  name="tb10_1_2_ubicacion_cocina" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_1_2_ubicacion_cocina_si" ></label>
								</td>
								<td>
									<input id="tb10_1_2_ubicacion_cocina_no" type="radio"  name="tb10_1_2_ubicacion_cocina" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_1_2_ubicacion_cocina_no" ></label>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="table">
					<table id="tb10_2_tratamiento_agua">
						<thead>
								<?php 
								$sql = "SELECT * FROM tratamiento_agua WHERE id_familia = '$id_familia' ORDER BY id_visita DESC LIMIT 1";
								$query = $bd->query($sql); 
								$row = $query->fetch_object();
								// var_dump($row);
								?>
								<tr>
									<th colspan="6" class="bg_celeste">2. Tratamiento de Agua</th>
								</tr>
								<tr>
									 <th colspan="5">Fecha Visita <?php echo $_SESSION['id_visita']?>
										<div class="td_fecha_visita">
											<span class="fecha_visita"><input type="number" name="tb10_2_fechavisista_d" value="<?php echo $_SESSION['v_actual_d']?>"></span>
											<span class="fecha_visita"><input type="number" name="tb10_2_fechavisista_m" value="<?php echo $_SESSION['v_actual_m']?>"></span>
											<span class="fecha_visita"><input type="number" name="tb10_2_fechavisista_a" value="<?php echo $_SESSION['v_actual_a']?>"></span>
										</div>
									 </th>
								</tr>
								<tr>
									<th colspan="1" rowspan="2">Sin Tratamiento</th>
									<th colspan="4" rowspan="1">Con tratamiento</th>
								</tr>
								<tr>
									<th>Filtrada</th>
									<th>Hervida</th>
									<th>Clorada</th>
									<th>Otro</th>
								</tr>
						</thead>
						<tbody>
							<tr>
								<?php 
									if ($row->sin_tratamiento == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td class="cell_center">
									<input id="tb10_2_sin_tratamiento_si" type="checkbox"  name="tb10_2_sin_tratamiento" value="si" <?php echo $checked?> >
									<label class="check" for="tb10_2_sin_tratamiento_si" ></label>
								</td>
								<?php 
									if ($row->filtrada == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb10_2_con_filtrada_si" type="checkbox"  name="tb10_2_con_filtrada" value="si" <?php echo $checked?> >
									<label class="check" for="tb10_2_con_filtrada_si" ></label>
								</td>
								<?php 
									if ($row->hervida == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb10_2_con_hervida_si" type="checkbox"  name="tb10_2_con_hervida" value="si" <?php echo $checked?> >
									<label class="check" for="tb10_2_con_hervida_si" ></label>
								</td>
								<?php 
									if ($row->clorada == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb10_2_con_clorada_si" type="checkbox"  name="tb10_2_con_clorada" value="si" <?php echo $checked?> >
									<label class="check" for="tb10_2_con_clorada_si" ></label>
								</td>
								<?php 
									if ($row->otro == 'si') {
									$checked = 'checked';
									}
									else{
										$checked = '';
									}
								?>
								<td>
									<input id="tb10_2_con_otro_si" type="checkbox"  name="tb10_2_con_otro" value="si" <?php echo $checked?> >
									<label class="check" for="tb10_2_con_otro_si" ></label>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="table">
					<table id="tb10_3_animales_vivienda">
						
						<thead>
								<tr>
									<th colspan="6" class="bg_celeste">3. Animales en la Vivienda</th>
								</tr>
								<tr>
									<th colspan="6">Fecha Visita <?php echo $_SESSION['id_visita']?>
										<div class="td_fecha_visita">
											<span class="fecha_visita"><input type="number" name="tb10_3_fechavisista_d" value="<?php echo $_SESSION['v_actual_d']?>"></span>
											<span class="fecha_visita"><input type="number" name="tb10_3_fechavisista_m" value="<?php echo $_SESSION['v_actual_m']?>"></span>
											<span class="fecha_visita"><input type="number" name="tb10_3_fechavisista_a" value="<?php echo $_SESSION['v_actual_a']?>"></span>
										</div>
									 </th>
								</tr>
								 <tr>
									<th colspan="1" rowspan="2">Tipo de Animales</th>
									<th colspan="1" rowspan="2">No</th>
									<th colspan="4" rowspan="1">Vacunado</th>
								</tr>
								<tr>
									<th>Si</th>
									<th>#</th>
									<th>No</th>
									<th>#</th>
								</tr>
						</thead>
						<tbody>
							<?php

								$sql = "SELECT * FROM animales WHERE id_familia = '$id_familia' AND id_visita = (SELECT MAX(id_visita) FROM animales WHERE id_familia = '$id_familia')";
								$query = $bd->query($sql); 
								while($row = $query->fetch_object()){
									$collect[]= $row;
								}

								function buscar_animal($animal)
								{	
									global $collect;
									global $bd;
									global $num_vacunados;
									global $num_no_vacunados;
									global $checked_no;
									global $checked_vsi;
									global $checked_vno;
									global $flag;
									$checked_vsi = '';
									$checked_vno = '';
									foreach ($collect as $key => $value){
										if ($value->tipo_animal == $animal) {
											if ($value->tiene_animal == ''){
												// var_dump('siii');
												$checked_no = ''; 
												$num_vacunados = $value->num_vacunados;
												if ($num_vacunados > 0) {
													$checked_vsi = 'checked'; 
												}else{
													$checked_vsi = ''; 
												}
												$num_no_vacunados = $value->num_no_vacunados;
												if ($num_no_vacunados > 0) {
													$checked_vno = 'checked'; 
												}else{
													$checked_vno = ''; 
												}
												$flag = true;
											} else {
												$checked_si = ''; 
												$checked_no = 'checked';
												$num_vacunados = '';
												$num_no_vacunados = ''; 
											}
											break;											
										} 
									}
									if ($flag == false) {
										$checked_no = 'checked'; 
										$checked_vsi = ''; 
										$checked_vno = ''; 
										// var_dump($checked_no);
									}
								}
								?>
							<tr>
								<?php buscar_animal('Cerdos');?>
								<td>Cerdos</td>
								<td>
									<input class="tb10_3_animal_no" id="tb10_3_animal_no_1" type="radio"  name="tb10_3_animal_no_1" value="no" <?php echo $checked_no ?> >
									<label class="radio" for="tb10_3_animal_no_1" ></label>
								</td>
								<td>
									<input class="tb10_3_animal_vsi" id="tb10_3_animal_vacunado_si_1" type="checkbox"  name="tb10_3_animal_vacunado_si_1" value="si" <?php echo $checked_vsi?> >
									<label class="check" for="tb10_3_animal_vacunado_si_1" ></label>
								</td>
								<td><input class="tb10_3_animal_numero_vacunado" type="number" name="tb10_3_animal_numero_vacunado_1" value="<?php echo $num_vacunados?>"></td>
								<td>
									<input class="tb10_3_animal_vno" id="tb10_3_animal_vacunado_no_1" type="checkbox"  name="tb10_3_animal_vacunado_no_1" value="no" <?php echo $checked_vno?> >
									<label class="check" for="tb10_3_animal_vacunado_no_1"></label>
								</td>
								<td><input class="tb10_3_animal_numero_vacunado_no" type="number" name="tb10_3_animal_numero_vacunado_no_1" value="<?php echo $num_no_vacunados?>"></td>
							</tr>
							<tr>
								<?php buscar_animal('Perros');?>
								<td>Perros</td>
								<td>
									<input class="tb10_3_animal_no" id="tb10_3_animal_no_2" type="radio"  name="tb10_3_animal_no_2" value="no" <?php echo $checked_no ?> >
									<label class="radio" for="tb10_3_animal_no_2" ></label>
								</td>
								<td>
									<input class="tb10_3_animal_vsi" id="tb10_3_animal_vacunado_si_2" type="checkbox"  name="tb10_3_animal_vacunado_si_2" value="si" <?php echo $checked_vsi?> >
									<label class="check" for="tb10_3_animal_vacunado_si_2" ></label>
								</td>
								<td><input class="tb10_3_animal_numero_vacunado" type="number" name="tb10_3_animal_numero_vacunado_2" value="<?php echo $num_vacunados?>"></td>
								<td>
									<input class="tb10_3_animal_vno" id="tb10_3_animal_vacunado_no_2" type="checkbox"  name="tb10_3_animal_vacunado_no_2" value="no" <?php echo $checked_vno?> >
									<label class="check" for="tb10_3_animal_vacunado_no_2"></label>
								</td>
								<td><input class="tb10_3_animal_numero_vacunado_no" type="number" name="tb10_3_animal_numero_vacunado_no_2" value="<?php echo $num_no_vacunados?>"></td>
							</tr>
							<tr>
								<?php buscar_animal('Gatos');?>
								<td>Gatos</td>
								<td>
									<input class="tb10_3_animal_no" id="tb10_3_animal_no_3" type="radio"  name="tb10_3_animal_no_3" value="no" <?php echo $checked_no ?> >
									<label class="radio" for="tb10_3_animal_no_3" ></label>
								</td>
								<td>
									<input class="tb10_3_animal_vsi" id="tb10_3_animal_vacunado_si_3" type="checkbox"  name="tb10_3_animal_vacunado_si_3" value="si" <?php echo $checked_vsi?> >
									<label class="check" for="tb10_3_animal_vacunado_si_3" ></label>
								</td>
								<td><input class="tb10_3_animal_numero_vacunado" type="number" name="tb10_3_animal_numero_vacunado_3" value="<?php echo $num_vacunados?>"></td>
								<td>
									<input class="tb10_3_animal_vno" id="tb10_3_animal_vacunado_no_3" type="checkbox"  name="tb10_3_animal_vacunado_no_3" value="no" <?php echo $checked_vno?> >
									<label class="check" for="tb10_3_animal_vacunado_no_3"></label>
								</td>
								<td><input class="tb10_3_animal_numero_vacunado_no" type="number" name="tb10_3_animal_numero_vacunado_no_3" value="<?php echo $num_no_vacunados?>"></td>
							</tr>
							<tr>
								<?php buscar_animal('Aves');?>
								<td>Aves</td>
								<td>
									<input class="tb10_3_animal_no" id="tb10_3_animal_no_4" type="radio"  name="tb10_3_animal_no_4" value="no" <?php echo $checked_no ?> >
									<label class="radio" for="tb10_3_animal_no_4" ></label>
								</td>
								<td>
									<input class="tb10_3_animal_vsi" id="tb10_3_animal_vacunado_si_4" type="checkbox"  name="tb10_3_animal_vacunado_si_4" value="si" <?php echo $checked_vsi?> >
									<label class="check" for="tb10_3_animal_vacunado_si_4" ></label>
								</td>
								<td><input class="tb10_3_animal_numero_vacunado" type="number" name="tb10_3_animal_numero_vacunado_4" value="<?php echo $num_vacunados?>"></td>
								<td>
									<input class="tb10_3_animal_vno" id="tb10_3_animal_vacunado_no_4" type="checkbox"  name="tb10_3_animal_vacunado_no_4" value="no" <?php echo $checked_vno?> >
									<label class="check" for="tb10_3_animal_vacunado_no_4"></label>
								</td>
								<td><input class="tb10_3_animal_numero_vacunado_no" type="number" name="tb10_3_animal_numero_vacunado_no_4" value="<?php echo $num_no_vacunados?>"></td>
							</tr>
							<tr>
								<?php buscar_animal('Caballos');?>
								<td>Caballos</td>
								<td>
									<input class="tb10_3_animal_no" id="tb10_3_animal_no_5" type="radio"  name="tb10_3_animal_no_5" value="no" <?php echo $checked_no ?> >
									<label class="radio" for="tb10_3_animal_no_5" ></label>
								</td>
								<td>
									<input class="tb10_3_animal_vsi" id="tb10_3_animal_vacunado_si_5" type="checkbox"  name="tb10_3_animal_vacunado_si_5" value="si" <?php echo $checked_vsi?> >
									<label class="check" for="tb10_3_animal_vacunado_si_5" ></label>
								</td>
								<td><input class="tb10_3_animal_numero_vacunado" type="number" name="tb10_3_animal_numero_vacunado_5" value="<?php echo $num_vacunados?>"></td>
								<td>
									<input class="tb10_3_animal_vno" id="tb10_3_animal_vacunado_no_5" type="checkbox"  name="tb10_3_animal_vacunado_no_5" value="no" <?php echo $checked_vno?> >
									<label class="check" for="tb10_3_animal_vacunado_no_5"></label>
								</td>
								<td><input class="tb10_3_animal_numero_vacunado_no" type="number" name="tb10_3_animal_numero_vacunado_no_6" value="<?php echo $num_no_vacunados?>"></td>
							</tr>
							<tr>
								<?php buscar_animal('Otros');?>
								<td>Otros</td>
								<td>
									<input class="tb10_3_animal_no" id="tb10_3_animal_no_6" type="radio"  name="tb10_3_animal_no_6" value="no" <?php echo $checked_no ?> >
									<label class="radio" for="tb10_3_animal_no_6" ></label>
								</td>
								<td>
									<input class="tb10_3_animal_vsi" id="tb10_3_animal_vacunado_si_6" type="checkbox"  name="tb10_3_animal_vacunado_si_6" value="si" <?php echo $checked_vsi?> >
									<label class="check" for="tb10_3_animal_vacunado_si_6" ></label>
								</td>
								<td><input class="tb10_3_animal_numero_vacunado" type="number" name="tb10_3_animal_numero_vacunado_6" value="<?php echo $num_vacunados?>"></td>
								<td>
									<input class="tb10_3_animal_vno" id="tb10_3_animal_vacunado_no_6" type="checkbox"  name="tb10_3_animal_vacunado_no_6" value="no" <?php echo $checked_vno?> >
									<label class="check" for="tb10_3_animal_vacunado_no_6"></label>
								</td>
								<td><input class="tb10_3_animal_numero_vacunado_no" type="number" name="tb10_3_animal_numero_vacunado_no_6" value="<?php echo $num_no_vacunados?>">
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="table">
					<table id="tb10_4_vectores">
						<thead>
								<tr>
									<th colspan="6" class="bg_celeste">4. Presencia de Vectores</th>
								</tr>
							 <tr>
								<th colspan="6">Fecha Visita <?php echo $_SESSION['id_visita']?>
									<div class="td_fecha_visita">
										<span class="fecha_visita"><input type="number" name="tb10_4_fechavisista_d" value="<?php echo $_SESSION['v_actual_d']?>"></span>
										<span class="fecha_visita"><input type="number" name="tb10_4_fechavisista_m" value="<?php echo $_SESSION['v_actual_m']?>"></span>
										<span class="fecha_visita"><input type="number" name="tb10_4_fechavisista_a" value="<?php echo $_SESSION['v_actual_a']?>"></span>
									</div>
								 </th>
							 </tr>
								 <tr>
									<th colspan="1">Tipo de Vectores</th>
									<th colspan="1">Si</th>
									<th colspan="1">No</th>
								</tr>
						</thead>
						<tbody>
							<?php
							$sql = "SELECT * FROM condiciones WHERE id_familia = '$id_familia' AND id_visita = (SELECT MAX(id_visita) FROM condiciones WHERE id_familia = '$id_familia')";
							$query = $bd->query($sql); 
							$collect = [];
							while($row = $query->fetch_object()){
								$collect[]= $row;
							}
							// var_dump($collect);
							function buscar_elemento($elemento)
								{	
									global $collect;
									global $bd;
									global $checked_no;
									global $checked_si;
									global $flag;
									
									foreach ($collect as $key => $value){
										if ($value->nombre_elemento == $elemento) {
											$checked_si = 'checked'; 
											$checked_no = '';
											$flag == True;
											break;											
										}
										else{
											$checked_si = ''; 
											$checked_no = 'checked';
										}
									}
								}
							?>
							<tr>
								<?php buscar_elemento('Moscas');?>
								<td>Moscas</td>
								<td>
									<input id="tb10_4_moscas_si" type="radio"  name="tb10_4_elemento_1" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_4_moscas_si" ></label>
								</td>
								<td>
									<input id="tb10_4_moscas_no" type="radio"  name="tb10_4_elemento_1" value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_4_moscas_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Zancudos');?>
								<td>Zancudos</td>
								<td>
									<input id="tb10_4_zancudos_si" type="radio"  name="tb10_4_elemento_2" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_4_zancudos_si" ></label>
								</td>
								<td>
									<input id="tb10_4_zancudos_no" type="radio"  name="tb10_4_elemento_2"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_4_zancudos_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Pitos');?>
								<td>Pitos</td>
								<td>
									<input id="tb10_4_pitos_si" type="radio"  name="tb10_4_elemento_3" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_4_pitos_si" ></label>
								</td>
								<td>
									<input id="tb10_4_pitos_no" type="radio"  name="tb10_4_elemento_3"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_4_pitos_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Ratas');?>
								<td>Ratas</td>
								<td>
									<input id="tb10_4_ratas_si" type="radio"  name="tb10_4_elemento_4" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_4_ratas_si" ></label>
								</td>
								<td>
									<input id="tb10_4_ratas_no" type="radio"  name="tb10_4_elemento_4"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_4_ratas_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Otros');?>
								<td>Otros</td>
								<td>
									<input id="tb10_4_otros_si" type="radio"  name="tb10_4_elemento_5" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_4_otros_si" ></label>
								</td>
								<td>
									<input id="tb10_4_otros_no" type="radio"  name="tb10_4_elemento_5"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_4_otros_no" ></label>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="table">

					<table id="tb10_5_animales_vivienda">
						
						<thead>
								<tr>
									<th colspan="6" class="bg_celeste">5. Alumbrado de la Vivienda</th>
								</tr>
								<tr>
									<th colspan="6">Fecha Visita <?php echo $_SESSION['id_visita']?>
										<div class="td_fecha_visita">
											<span class="fecha_visita"><input type="number" name="tb10_5_fechavisista_d" value="<?php echo $_SESSION['v_actual_d']?>"></span>
											<span class="fecha_visita"><input type="number" name="tb10_5_fechavisista_m" value="<?php echo $_SESSION['v_actual_m']?>"></span>
											<span class="fecha_visita"><input type="number" name="tb10_5_fechavisista_a" value="<?php echo $_SESSION['v_actual_a']?>"></span>
										</div>
									 </th>
								 </tr>
								 <tr>
									<th colspan="1">Tipo de Alumbrado</th>
									<th colspan="1">Si</th>
									<th colspan="1">No</th>
								</tr>
						</thead>
						<tbody>
							<tr>
								<?php buscar_elemento('Vela');?>
								<td>Vela</td>
								<td>
									<input id="tb10_5_vela_si" type="radio"  name="tb10_5_elemento_1"  value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_5_vela_si" ></label>
								</td>
								<td>
									<input id="tb10_5_vela_no" type="radio"  name="tb10_5_elemento_1"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_5_vela_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Lampara Petroleo');?>
								<td>Lampara Petroleo</td>
								<td>
									<input id="tb10_5_lampara_petroleo_si" type="radio"  name="tb10_5_elemento_2"  value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_5_lampara_petroleo_si" ></label>
								</td>
								<td>
									<input id="tb10_5_lampara_petroleo_no" type="radio"  name="tb10_5_elemento_2"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_5_lampara_petroleo_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Energia Solar');?>
								<td>Energia Solar</td>
								<td>
									<input id="tb10_5_Energia_solar_si" type="radio"  name="tb10_5_elemento_3"  value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_5_Energia_solar_si" ></label>
								</td>
								<td>
									<input id="tb10_5_Energia_solar_no" type="radio"  name="tb10_5_elemento_3"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_5_Energia_solar_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Energia Electrica');?>
								<td>Energia Electrica</td>
								<td>
									<input id="tb10_5_Energia_electrica_si" type="radio"  name="tb10_5_elemento_4"  value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_5_Energia_electrica_si" ></label>
								</td>
								<td>
									<input id="tb10_5_Energia_electrica_no" type="radio"  name="tb10_5_elemento_4"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_5_Energia_electrica_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Interconexion');?>
								<td>Interconexion</td>
								<td>
									<input id="tb10_5_interconexion_si" type="radio"  name="tb10_5_elemento_5"  value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_5_interconexion_si" ></label>
								</td>
								<td>
									<input id="tb10_5_interconexion_no" type="radio"  name="tb10_5_elemento_5"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_5_interconexion_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Planta');?>
								<td>Planta</td>
								<td>
									<input id="tb10_5_planta_si" type="radio"  name="tb10_5_elemento_6"  value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_5_planta_si" ></label>
								</td>
								<td>
									<input id="tb10_5_planta_no" type="radio"  name="tb10_5_elemento_6"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_5_planta_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Otro 5');?>
								<td>Otro</td>
								<td>
									<input id="tb10_5_otro_si" type="radio"  name="tb10_5_elemento_7"  value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_5_otro_si" ></label>
								</td>
								<td>
									<input id="tb10_5_otro_no" type="radio"  name="tb10_5_elemento_7"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_5_otro_no" ></label>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="table">

					<table id="tb10_6_animales_vivienda">
						
						<thead>
							 
								<tr>
									<th colspan="6" class="bg_celeste">6. Abastecimiento de Agua</th>
								</tr>
								<tr>
									<th colspan="6">Fecha Visita <?php echo $_SESSION['id_visita']?>
										<div class="td_fecha_visita">
											<span class="fecha_visita"><input type="number" name="tb10_6_fechavisista_d" value="<?php echo $_SESSION['v_actual_d']?>"></span>
											<span class="fecha_visita"><input type="number" name="tb10_6_fechavisista_m" value="<?php echo $_SESSION['v_actual_m']?>"></span>
											<span class="fecha_visita"><input type="number" name="tb10_6_fechavisista_a" value="<?php echo $_SESSION['v_actual_a']?>"></span>
										</div>
									 </th>
								</tr>
								 <tr>
									<th colspan="1">Tipo de Abastecimiento</th>
									<th colspan="1">Si</th>
									<th colspan="1">No</th>
								</tr>
							
						</thead>
						<tbody>
							<tr>
								<?php buscar_elemento('Acueducto');?>
								<td>Acueducto</td>
								<td>
									<input id="tb10_6_acueducto_si" type="radio"  name="tb10_6_elemento_1" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_6_acueducto_si" ></label>
								</td>
								<td>
									<input id="tb10_6_acueducto_no" type="radio"  name="tb10_6_elemento_1"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_6_acueducto_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Agua Lluvia');?>
								<td>Agua Lluvia</td>
								<td>
									<input id="tb10_6_agua_lluvia_si" type="radio"  name="tb10_6_elemento_2" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_6_agua_lluvia_si" ></label>
								</td>
								<td>
									<input id="tb10_6_agua_lluvia_no" type="radio"  name="tb10_6_elemento_2"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_6_agua_lluvia_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Rio Quebrada 6');?>
								<td>Rio Quebrada</td>
								<td>
									<input id="tb10_6_rio_quebrada_si" type="radio"  name="tb10_6_elemento_3" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_6_rio_quebrada_si" ></label>
								</td>
								<td>
									<input id="tb10_6_rio_quebrada_no" type="radio"  name="tb10_6_elemento_3"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_6_rio_quebrada_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Pozo');?>
								<td>Pozo</td>
								<td>
									<input id="tb10_6_pozo_si" type="radio"  name="tb10_6_elemento_4" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_6_pozo_si" ></label>
								</td>
								<td>
									<input id="tb10_6_pozo_no" type="radio"  name="tb10_6_elemento_4"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_6_pozo_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Chorro');?>
								<td>Chorro</td>
								<td>
									<input id="tb10_6_chorro_si" type="radio"  name="tb10_6_elemento_5" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_6_chorro_si" ></label>
								</td>
								<td>
									<input id="tb10_6_chorro_no" type="radio"  name="tb10_6_elemento_5"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_6_chorro_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Aljibe');?>
								<td>Aljibe</td>
								<td>
									<input id="tb10_6_aljibe_si" type="radio"  name="tb10_6_elemento_6" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_6_aljibe_si" ></label>
								</td>
								<td>
									<input id="tb10_6_aljibe_no" type="radio"  name="tb10_6_elemento_6"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_6_aljibe_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Comprada');?>
								<td>Comprada</td>
								<td>
									<input id="tb10_6_comprada_si" type="radio"  name="tb10_6_elemento_7" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_6_comprada_si" ></label>
								</td>
								<td>
									<input id="tb10_6_comprada_no" type="radio"  name="tb10_6_elemento_7"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_6_comprada_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Otro 6');?>
								<td>Otro</td>
								<td>
									<input id="tb10_6_otro_si" type="radio"  name="tb10_6_elemento_8" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_6_otro_si" ></label>
								</td>
								<td>
									<input id="tb10_6_otro_no" type="radio"  name="tb10_6_elemento_8"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_6_otro_no" ></label>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="table special_one">

					<table id="tb10_7_manejo_basura">
						<thead>
								<tr>
									<th colspan="6" class="bg_celeste">7. Manejo de la Basura</th>
								</tr>
							    <tr>
									<th colspan="6">Fecha Visita <?php echo $_SESSION['id_visita']?>
										<div class="td_fecha_visita">
											<span class="fecha_visita"><input type="number" name="tb10_7_fechavisista_d" value="<?php echo $_SESSION['v_actual_d']?>"></span>
											<span class="fecha_visita"><input type="number" name="tb10_7_fechavisista_m" value="<?php echo $_SESSION['v_actual_m']?>"></span>
											<span class="fecha_visita"><input type="number" name="tb10_7_fechavisista_a" value="<?php echo $_SESSION['v_actual_a']?>"></span>
										</div>
									 </th>
								</tr>
								 <tr>
									<th colspan="1">Manejo de la basura dentro de la vivienda</th>
									<th colspan="1">Si</th>
									<th colspan="1">No</th>
								</tr>
							 
						</thead>
						<tbody>
							<tr>
								<?php buscar_elemento('Caneca con Tapa');?>
								<td>Caneca con Tapa</td>
								<td>
									<input id="tb10_7_caneca_con_tapa_si" type="radio"  name="tb10_7_elemento_1" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_7_caneca_con_tapa_si" ></label>
								</td>
								<td>
									<input id="tb10_7_caneca_con_tapa_no" type="radio"  name="tb10_7_elemento_1"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_7_caneca_con_tapa_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Caneca sin Tapa');?>
								<td>Caneca sin Tapa</td>
								<td>
									<input id="tb10_7_caneca_sin_tapa_si" type="radio"  name="tb10_7_elemento_2" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_7_caneca_sin_tapa_si" ></label>
								</td>
								<td>
									<input id="tb10_7_caneca_sin_tapa_no" type="radio"  name="tb10_7_elemento_2"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_7_caneca_sin_tapa_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Balde y/o Tarro');?>
								<td>Balde y/o Tarro</td>
								<td>
									<input id="tb10_7_balde_tarro_si" type="radio"  name="tb10_7_elemento_3" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_7_balde_tarro_si" ></label>
								</td>
								<td>
									<input id="tb10_7_balde_tarro_no" type="radio"  name="tb10_7_elemento_3"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_7_balde_tarro_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Carton');?>
								<td>Carton</td>
								<td>
									<input id="tb10_7_carton_si" type="radio"  name="tb10_7_elemento_4" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_7_carton_si" ></label>
								</td>
								<td>
									<input id="tb10_7_carton_no" type="radio"  name="tb10_7_elemento_4"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_7_carton_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Bolsa Plastica');?>
								<td>Bolsa Plastica</td>
								<td>
									<input id="tb10_7_bolsa_plastica_si" type="radio"  name="tb10_7_elemento_5" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_7_bolsa_plastica_si" ></label>
								</td>
								<td>
									<input id="tb10_7_bolsa_plastica_no" type="radio"  name="tb10_7_elemento_5"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_7_bolsa_plastica_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Caja Madera 7_1');?>
								<td>Caja Madera</td>
								<td>
									<input id="tb10_7_caja_madera_si" type="radio"  name="tb10_7_elemento_6" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_7_caja_madera_si" ></label>
								</td>
								<td>
									<input id="tb10_7_caja_madera_no" type="radio"  name="tb10_7_elemento_6"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_7_caja_madera_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Otro 7');?>
								<td>Otro</td>
								<td>
									<input id="tb10_7_otro_si" type="radio"  name="tb10_7_elemento_7" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_7_otro_si" ></label>
								</td>
								<td>
									<input id="tb10_7_otro_no" type="radio"  name="tb10_7_elemento_7"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_7_otro_no" ></label>
								</td>
							</tr>
					
						</tbody>
					</table>
				</div>
				<div class="table">


					<table id="tb10_7_2_manejo_basura">
						<thead>
								<tr>
									<th colspan="1" style="text-align: center;">Deposicion final de la basura</th>
									<th colspan="1">Si</th>
									<th colspan="1">No</th>
								</tr>
						</thead>
						<tbody>
							<tr>
								<?php buscar_elemento('Botadero Publico');?>
								<td>Botadero Publico</td>
								<td>
									<input id="tb10_7_2_botadero_publico_si" type="radio"  name="tb10_7_elemento_8" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_7_2_botadero_publico_si" ></label>
								</td>
								<td>
									<input id="tb10_7_2_botadero_publico_no" type="radio"  name="tb10_7_elemento_8"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_7_2_botadero_publico_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Rio Quebrada 7');?>
								<td>Rio Quebrada</td>
								<td>
									<input id="tb10_7_2_rio_quebrada_si" type="radio"  name="tb10_7_elemento_9" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_7_2_rio_quebrada_si" ></label>
								</td>
								<td>
									<input id="tb10_7_2_rio_quebrada_no" type="radio"  name="tb10_7_elemento_9"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_7_2_rio_quebrada_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Solar');?>
								<td>Solar</td>
								<td>
									<input id="tb10_7_2_solar_si" type="radio"  name="tb10_7_elemento_10" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_7_2_solar_si" ></label>
								</td>
								<td>
									<input id="tb10_7_2_solar_no" type="radio"  name="tb10_7_elemento_10"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_7_2_solar_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Quema');?>
								<td>Quema</td>
								<td>
									<input id="tb10_7_2_quema_si" type="radio"  name="tb10_7_elemento_11" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_7_2_quema_si" ></label>
								</td>
								<td>
									<input id="tb10_7_2_quema_no" type="radio"  name="tb10_7_elemento_11"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_7_2_quema_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Caja Madera 7_2');?>
								<td>Caja Madera</td>
								<td>
									<input id="tb10_7_2_caja_madera_si" type="radio"  name="tb10_7_elemento_12" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_7_2_caja_madera_si" ></label>
								</td>
								<td>
									<input id="tb10_7_2_caja_madera_no" type="radio"  name="tb10_7_elemento_12"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_7_2_caja_madera_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Usada Abono');?>
								<td>Usada Abono</td>
								<td>
									<input id="tb10_7_2_usada_abono_si" type="radio"  name="tb10_7_elemento_13" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_7_2_usada_abono_si" ></label>
								</td>
								<td>
									<input id="tb10_7_2_usada_abono_no" type="radio"  name="tb10_7_elemento_13"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_7_2_usada_abono_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Otro 7_2');?>
								<td>Otro</td>
								<td>
									<input id="tb10_7_2_otro_si" type="radio"  name="tb10_7_elemento_14" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_7_2_otro_si" ></label>
								</td>
								<td>
									<input id="tb10_7_2_otro_no" type="radio"  name="tb10_7_elemento_14"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_7_2_otro_no" ></label>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="table">

					<table id="tb10_8_manejo_basura">
						<thead>
								<tr>
									<th colspan="6" class="bg_celeste">8. Disposicion Final de Excretas</th>
								</tr>
								<tr>
									<th colspan="6">Fecha Visita <?php echo $_SESSION['id_visita']?>
										<div class="td_fecha_visita">
											<span class="fecha_visita"><input type="number" name="tb10_8_fechavisista_d" value="<?php echo $_SESSION['v_actual_d']?>"></span>
											<span class="fecha_visita"><input type="number" name="tb10_8_fechavisista_m" value="<?php echo $_SESSION['v_actual_m']?>"></span>
											<span class="fecha_visita"><input type="number" name="tb10_8_fechavisista_a" value="<?php echo $_SESSION['v_actual_a']?>"></span>
										</div>
									 </th>
								</tr>
								<tr>
									<th colspan="1">Tipo</th>
									<th colspan="1">Si</th>
									<th colspan="1">No</th>
								</tr>
						</thead>
						<tbody>
							<tr>
								<?php buscar_elemento('Alcantarillado');?>
								<td>Alcantarillado</td>
								<td>
									<input id="tb10_8_alcantarillado_si" type="radio"  name="tb10_8_elemento_1" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_8_alcantarillado_si" ></label>
								</td>
								<td>
									<input id="tb10_8_alcantarillado_no" type="radio"  name="tb10_8_elemento_1"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_8_alcantarillado_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Taza Sanitaria / Pozo Septico');?>
								<td>Taza Sanitaria / Pozo Septico</td>
								<td>
									<input id="tb10_8_taza_sanitaria_pozo_septico_si" type="radio"  name="tb10_8_elemento_2" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_8_taza_sanitaria_pozo_septico_si" ></label>
								</td>
								<td>
									<input id="tb10_8_taza_sanitaria_pozo_septico_no" type="radio"  name="tb10_8_elemento_2"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_8_taza_sanitaria_pozo_septico_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Letrina');?>
								<td>Letrina</td>
								<td>
									<input id="tb10_8_letrina_si" type="radio"  name="tb10_8_elemento_3" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_8_letrina_si" ></label>
								</td>
								<td>
									<input id="tb10_8_letrina_no" type="radio"  name="tb10_8_elemento_3"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_8_letrina_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Quebrada');?>
								<td>Quebrada</td>
								<td>
									<input id="tb10_8_quebrada_si" type="radio"  name="tb10_8_elemento_4" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_8_quebrada_si" ></label>
								</td>
								<td>
									<input id="tb10_8_quebrada_no" type="radio"  name="tb10_8_elemento_4"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_8_quebrada_no" ></label>
								</td>
							</tr>
							<tr>
								<?php buscar_elemento('Campo Abierto');?>
								<td>Campo Abierto</td>
								<td>
									<input id="tb10_8_campo_abierto_si" type="radio"  name="tb10_8_elemento_5" value="si" <?php echo $checked_si?> >
									<label class="radio" for="tb10_8_campo_abierto_si" ></label>
								</td>
								<td>
									<input id="tb10_8_campo_abierto_no" type="radio"  name="tb10_8_elemento_5"  value="no" <?php echo $checked_no?> >
									<label class="radio" for="tb10_8_campo_abierto_no" ></label>
								</td>
							</tr>
					
						</tbody>
					</table>
					</div>
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