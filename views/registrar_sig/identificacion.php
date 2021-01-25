<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Instituto</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<!-- <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon"> -->
	<!-- <link rel="icon" href="img/favicon.png" type="image/x-icon"> -->
	<!-- <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'> -->
	<!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
	<link rel="stylesheet" href="http://localhost/instituto/static/css/estilos.css">
	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAw7N_d66B_oOrYgJ4jH3fNyuoPWTRBd6E&callback=initMap"></script> -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChPpLC5zuF6bKJYUb7Br2-geN5UvbxBC4"></script>
</head>
<body>
	<main>
		<form id="form2" action="/instituto/core/registro_sig/s_identificacion.php" method="POST">
			
			<?php
				require $_SERVER['DOCUMENT_ROOT']."/instituto/application/verificar_sesion.php";
				if (verificar() == True) {
					$usuario = $_SESSION['usuario']->nick_name;
				}
				else{
					return False;
					// exit();
				}
				$id_familia = $_SESSION['id_familia'];
				$checked_si = '';
				$checked_no = 'checked'; 
				require $_SERVER['DOCUMENT_ROOT']."/instituto/application/database/conexion.php";
				$bd = conectar();
				$sql = "SELECT * FROM identificacion_ubicacion JOIN riesgos_ubicacion USING(id_familia) WHERE id_familia = '$id_familia'";
				$query = $bd->query($sql); 
				if (!$query) echo $bd->error;
				$row_p = $query->fetch_object();
				// var_dump($row_p);
				// var_dump($row_p->numero_familias_por_vivienda);
			 ?>
			<div class="divh1">
				<h1>Identificación y Ubicación</h1>
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
				<div class="tr">
					<h3>Área Geográfica</h3>
					<h3>Sisben</h3>
				</div>
				<div class="tr">
					<label>No. de Vivienda</label>
					<span><input type="number" name="numero_vivienda" min=0 max=10000 value="<?php echo $row_p->numero_vivienda?>"  pattern="{0-9}"  required/></span>
					<label>No. de Familias por vivienda</label>
					<span><input type="number" name="numero_familiasxvivienda" min=0 max=10000 value="<?php echo $row_p->numero_familias_por_vivienda?>" required /></span>
					<?php
					if ($row_p->sisben == 'si') {
						$checked_si = 'checked';
						$checked_no = '';
					 } 
					?>
					<label>Si</label>
					<span class="sp1 sisben"><input id="sisben_si" type="radio" name="sisben" value="si" <?php echo $checked_si?>/><label class="radio" for="sisben_si"></label></span>
					<label>No</label>
					<span class="sp1 sisben"><input id="sisben_no" type="radio" name="sisben" value="no" <?php echo $checked_no?>/><label class="radio" for="sisben_no"></label></span>
				</div>
				<div class="tr">
					<label class="lb1">Departamento</label>
					<span><input type="text" name="departamento" value="Nariño" readonly/></span>
					<label class="lb1">Municipio</label>
					<span>
						<select name="municipio" required>
							<option value="" >Seleccione Municipio</option>
							<?php 
							$sql = "SELECT * FROM municipios";
							$query = $bd->query($sql); 
							echo $sql;
							if (!$query) echo $bd->error;
							while($row = $query->fetch_object()){
							$selected = ($row_p->municipio == $row->id_municipio)? 'selected': '';
							?>
					
							<option value="<?php echo $row->id_municipio ?>" <?php echo $selected?>><?php echo $row->nom_municipio?></option>
							<?php } ?>
						</select>
					</span>
					<label class="lb1">Resguardo</label>
					<span>
						<select name="resguardo" required>
							<option value="" >Seleccione Resguardo</option>
							<?php 
							$sql = "SELECT * FROM resguardos";
							$query = $bd->query($sql); 
							echo $sql;
							if (!$query) echo $bd->error;
							while($row = $query->fetch_object()){
								$selected = ($row_p->resguardo == $row->id_resguardo)? 'selected': '';
								?>
								<option value="<?php echo $row->id_resguardo?>" <?php echo $selected?>><?php echo $row->nom_resguardo?></option>
							<?php } ?>
						</select>
					</span>
				</div>
				<div class="tr">
					<label class="lb1">Comunidad</label>
					<span>
						<select name="comunidad">
							<option value="" >Seleccione Comunidad</option>
							<?php 
							$sql = "SELECT * FROM comunidades";
							$query = $bd->query($sql); 
							echo $sql;
							if (!$query) echo $bd->error;
							while($row = $query->fetch_object()){
								$selected = ($row_p->comunidad == $row->id_comunidad)? 'selected': '';
								?>
								<option value="<?php echo $row->id_comunidad?>" <?php echo $selected?>><?php echo $row->nom_comunidad?></option>
							<?php } ?>
						</select>
					</span>
					<label class="lb1">Vereda</label>
					
					<span>
						<input type="text" name="vereda" value="<?php echo $row_p->vereda ?>" />
					</span>
					<label class="lb1">Barrio</label>
					<span>
						<input type="text" name="barrio" value="<?php echo $row_p->barrio ?>" />
					</span>
				</div>
				<div class="tr">
					<h3>Ubicación de la Vivienda: Identifique Sitios de Referencia y Amenazas en el Mapa</h3>

				</div>
				<div class="tr">
				</div>
				<button type="button" target="modal_map" class="call_modal button_map bg_verde">Ver Mapa</button>
				<div id="modal_map" class="modal modal_map">
					<div class="modal_main" style="height: auto;">
						<div class="modal_content">
							<img src="http://localhost/instituto/static/img/varios/cerrar_modal.png" class="close" />
							<!-- <img id="mapa" src="http://localhost/instituto/static/img/mapas/mapa1.jpg" alt="" width="100%" style="margin-bottom: -3px;"> -->
							<div id="map" style="width: 1400px; height: 800px;"></div>
							<input id="ubi_familia" type="hidden" value="<?php echo $row_p->latitud.','.$row_p->longitud?>">
							<div class="modal_content2">
								<span class="modal_input"><input type="text" name="ubi_map" value="<?php echo $row_p->ubicacion_ref ?>" placeholder="Ingresar Descripcion"/></span>
								<button class="button acept bg_verde" type="button">Aceptar</button>
							</div>
							<div class="btn_geolo">
								<div class="img_geolo"></div>
							</div>
						</div>

					</div>
				</div>
				

				<table id="tb_identificacion">
					<thead>
						<tr>
							<th>Riesgo de Ubicación de la Vivienda</th>
							<th>Si</th>
							<th>No</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Zona Inundable</td>
							<?php 

								if ($row_p->zona_inundable == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
								}
								else{
									$checked_si = '';
									$checked_no = 'checked';
								}
							 ?>
							<td class="zona_inun"><input id="z_i_si" type="radio" name="zona_inundable" value="si" <?php echo $checked_si?>/><label class="radio" for="z_i_si"></label></td>
							<td class="zona_inun"><input id="z_i_no" type="radio" name="zona_inundable" value="no" <?php echo $checked_no?>/><label class="radio" for="z_i_no"></label></td>
						</tr>

						<tr>
							<td>Margen de Ríos</td>
							<?php 
								if ($row_p->margen_rios == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
								}
								else{
									$checked_si = '';
									$checked_no = 'checked';
								}
							 ?>
							<td class="margen_rios"><input id="m_r_si" type="radio" name="margen_rios" value="si" <?php echo $checked_si?>/><label class="radio" for="m_r_si"></label></td>
							<td class="margen_rios"><input id="m_r_no" type="radio" name="margen_rios" value="no" <?php echo $checked_no?>/><label class="radio" for="m_r_no"></label></td>
						</tr>
						<tr>
							<td>Zona de ladera o deslizamiento</td>
							<?php 
								if ($row_p->zona_ladera == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
								}
								else{
									$checked_si = '';
									$checked_no = 'checked';
								}
							 ?>
							<td class="zona_lade"><input id="z_l_si" type="radio" name="zona_ladera" value="si" <?php echo $checked_si?>/><label class="radio" for="z_l_si"></label></td>
							<td class="zona_lade"><input id="z_l_no" type="radio" name="zona_ladera" value="no" <?php echo $checked_no?>/><label class="radio" for="z_l_no"></label></td>
						</tr>
						<tr>
							<td>Falda de la montaña</td>
							<?php 
								if ($row_p->falda_montana == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
								}
								else{
									$checked_si = '';
									$checked_no = 'checked';
								}
							 ?>
							<td class="falda_mont"><input id="f_m_si" type="radio" name="falda_montaña" value="si" <?php echo $checked_si?>/><label class="radio" for="f_m_si"></label></td>
							<td class="falda_mont"><input id="f_m_no" type="radio" name="falda_montaña" value="no" <?php echo $checked_no?>/><label class="radio" for="f_m_no"></label></td>
						</tr>
						<tr>
							<td>Relleno</td>
							<?php 
								if ($row_p->relleno == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
								} 
								else{
									$checked_si = '';
									$checked_no = 'checked';
								}
							 ?>
							<td class="relleno"><input id="r_si" type="radio" name="relleno" value="si" <?php echo $checked_si?>/><label class="radio" for="r_si"></label></td>
							<td class="relleno"><input id="r_no" type="radio" name="relleno" value="no" <?php echo $checked_no?>/><label class="radio" for="r_no"></label></td>
						</tr>
						<tr>
							<td>Otro</td>
							<?php 
								if ($row_p->otro_riesgo == 'si') {
									$checked_si = 'checked';
									$checked_no = '';
								 }
								else{
									$checked_si = '';
									$checked_no = 'checked';
								}
							 ?>
							<td class="otro_riesgo"><input id="otro_riesgo_si" type="radio" name="otro_riesgo" value="si" <?php echo $checked_si?>/><label class="radio" for="otro_riesgo_si"></label></td>
							<td class="otro_riesgo"><input id="otro_riesgo_no" type="radio" name="otro_riesgo" value="no" <?php echo $checked_no?>/><label class="radio" for="otro_riesgo_no"></label></td>
						</tr>
					</tbody>

				</table>
				<span id="otro_riesgo" style="display: none;"><input type="text" name="otro_riesgo_txt" value="<?php echo $row_p->cual_otro_riesgo?>"/></span>
				<input id="lat_lng" type="hidden" name="lat_lng" value="<?php echo $row_p->latitud.','.$row_p->longitud ?>">

				<!-- <button type="button" class="button previous" onclick="javascript:window.location.href='inicio.php'; return false;">Anterior</button> -->
				<button type="submit" class="button next">Siguiente</button>
			</div>
		</form>
	</main>
	<script src="http://localhost/instituto/static/js/jquery-3.3.1.js"></script>
	<script src="http://localhost/instituto/static/js/bootstrap.js"></script>
	<script src="http://localhost/instituto/static/js/funciones.js"></script>
	<script src="http://localhost/instituto/static/js/mapas.js"></script>
</body>
</html>