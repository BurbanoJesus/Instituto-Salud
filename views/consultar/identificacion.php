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
	
</head>
<body>
	<main>
		<form id="form2" action="/instituto/core/consultas/s_identificacion.php" method="POST">
			
			<?php
				require $_SERVER['DOCUMENT_ROOT']."/instituto/application/verificar_sesion.php";
				if (verificar() == True) {
					$usuario = $_SESSION['usuario']->nick_name;
				}
				else{
					return False;
					// exit();
				}
				if (isset($_GET['casa_numero']) && isset($_GET['familia_numero'])) {
					$_SESSION['id_familia_consulta'] = $_GET['casa_numero'].'_'.$_GET['familia_numero'];
				}
				$id_familia = $_SESSION['id_familia_consulta'];
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
					if ($row_p->sisben == 'si'){
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
						<?php 
						$sql = "SELECT * FROM municipios WHERE id_municipio = '$row_p->municipio'";
						$query = $bd->query($sql); 
						if (!$query) echo $bd->error;
						$row = $query->fetch_object();
						?>
						<input type="text" name="municipio" value="<?php echo $row->nom_municipio?>">
					</span>
					<label class="lb1">Resguardo</label>
					<span>
						<?php 
						$sql = "SELECT * FROM resguardos WHERE id_resguardo = '$row_p->resguardo'";
						$query = $bd->query($sql); 
						if (!$query) echo $bd->error;
						$row = $query->fetch_object();
						?>
						<input type="text" name="resguardo" value="<?php echo $row->nom_resguardo?>">
					</span>
				</div>
				<div class="tr">
					<label class="lb1">Comunidad</label>
					<span>
						<?php 
						$sql = "SELECT * FROM comunidades WHERE id_comunidad = '$row_p->comunidad'";
						$query = $bd->query($sql); 
						if (!$query) echo $bd->error;
						if ($query->num_rows > 0) {
							$row = $query->fetch_object();
						}
						else{
							$row->nom_comunidad = 'No Definido';
						}
						?>
						<input type="text" name="comunidad" value="<?php echo $row->nom_comunidad?>">
					</span>
					<label class="lb1">Vereda</label>
					<span>
						<input type="text" name="vereda" value="<?php echo ($row_p->vereda != '') ? $row_p->vereda:  'No definido';?>" />
					</span>
					<label class="lb1">Barrio</label>
					<span>
						<input type="text" name="barrio" value="<?php echo ($row_p->barrio != '') ? $row_p->barrio:  'No definido';?>" />
					</span>
				</div>
				<div class="tr">
					<h3>Ubicación de la Vivienda: Identifique Sitios de Referencia y Amenazas en el Mapa</h3>

				</div>
				<div class="block" style="width: 1000px; position: relative; margin: auto;">
					<div id="map" style="width: 100%; height: 800px; border: 1px solid var(--verde); border-bottom: none;"></div>
					<input id="ubi_familia" type="hidden" value="<?php echo $row_p->latitud.','.$row_p->longitud?>">
					<div class="modal_content2">
						<span class="modal_input" style="border: 1px solid var(--verde);"><input type="text" name="ubi_map" value="<?php echo $row_p->ubicacion_ref ?>" placeholder="Ingresar Descripcion"/></span>
					</div>
					<div class="btn_geolo">
						<div class="img_geolo"></div>
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
				<span id="otro_riesgo"><input type="text" name="otro_riesgo_txt" value="<?php echo $row_p->cual_otro_riesgo?>"/></span>
				<input id="lat_lng" type="hidden" name="lat_lng" value="<?php echo $row_p->latitud.','.$row_p->longitud ?>">

				<!-- <button type="button" class="button previous" onclick="javascript:window.location.href='inicio.php'; return false;">Anterior</button> -->
				<button type="button" class="button next" onclick="window.location='/instituto/views/consultar/integrantes.php'">Siguiente</button>
			</div>
			<div class="nav_inf">
				<ul>
					<li onclick="window.location='../inicio.php'"><label>Inicio</label></li>
					<li class="active" onclick="window.location='identificacion.php'"><label>Identi.. <div class="info_tb">Identificacion y Ubicacion</div></label></li>
					<li onclick="window.location='integrantes.php'"><label>Integra..<div class="info_tb">Personas Integrantes de la Familia</div></label></li>
					<li onclick="window.location='menores_a_1.php'"><label>0 a 1 Años..<div class="info_tb">Registro de Actividades Niños(as) menores a 1 año</div></label></li>
					<li onclick="window.location='niños_1_a_5.php'"><label>1 a 5 Años..<div class="info_tb">Registro de Actividades Niños(as) 1 a 5 años</div></label></li>
					<li onclick="window.location='niños_5_a_9.php'"><label>5 a 9 Años..<div class="info_tb">Registro de Actividades Niños(as) 5 a 9 años</div></label></li>
					<li onclick="window.location='hom_muj_10_a_59.php'"><label>10 a 59 Años..<div class="info_tb">Registro de Actividades Hombres y Mujeres de 10 a 59 años</div></label></li>
					<li onclick="window.location='adultos_60_mas.php'"><label>60 Años o mas..<div class="info_tb">Registro de Actividades Adultos(as) de 60 años y mas</div></label></li>
					<li onclick="window.location='gestacion_parto.php'"><label>Gesta..<div class="info_tb">Registro de Actividades Gestacion, Parto y Postparto</div></label></li>
					<li onclick="window.location='antecedentes.php'"><label>Antece..<div class="info_tb">Antecedentes en Salud Mental</div></label></li>
					<li onclick="window.location='estadisticas.php'"><label>Estadi..<div class="info_tb">Estadisticas Vitales</div></label></li>
					<li onclick="window.location='condiciones_sanitarias.php'"><label>Condici..<div class="info_tb">Condiciones Sanitarias</div></label></li>
					<li onclick="window.location='observaciones.php'"><label>Observa..<div class="info_tb">Observaciones</div></label></li>
				</ul>
			</div>
		</form>
	</main>
	<script src="http://localhost/instituto/static/js/jquery-3.3.1.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChPpLC5zuF6bKJYUb7Br2-geN5UvbxBC4"></script>
	<script src="http://localhost/instituto/static/js/bootstrap.js"></script>
	<script src="http://localhost/instituto/static/js/funciones.js"></script>
	<script src="http://localhost/instituto/static/js/mapas.js"></script>
</body>
</html>