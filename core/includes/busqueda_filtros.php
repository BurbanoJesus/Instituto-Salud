<?php 
	require $_SERVER['DOCUMENT_ROOT']."/instituto/application/database/conexion.php";
	// sleep(1);
	$bd = conectar();
	session_start();
	$busqueda = $_POST['busqueda_avan'];
	$busq_edad_desde = $_POST['busq_edad_desde'];
	$busq_edad_hasta = $_POST['busq_edad_hasta'];
	$busq_sexo = $_POST['busq_sexo'];
	$busq_desplazados = (isset($_POST['busq_desplazados'])) ? $_POST['busq_desplazados']: '';
	$busq_discapacitados = (isset($_POST['busq_discapacitados'])) ? $_POST['busq_discapacitados']: '';
	$busq_no_sabe = (isset($_POST['busq_no_sabe'])) ? 1: '';
	$busq_primaria_completa = (isset($_POST['busq_primaria_completa'])) ? 5: '';
	$busq_secundaria_completa = (isset($_POST['busq_secundaria_completa'])) ? 7: '';
	$busq_tecnico = (isset($_POST['busq_tecnico'])) ? 8: '';
	$busq_univer = (isset($_POST['busq_univer'])) ? $_POST['busq_univer']: '';
	$busq_maltrato = (isset($_POST['busq_maltrato'])) ? $_POST['busq_maltrato']: '%%';
	$busq_citologia = (isset($_POST['busq_citologia'])) ? $_POST['busq_citologia']: '%%';
	$busq_auto_examen = (isset($_POST['busq_auto_examen'])) ? $_POST['busq_auto_examen']: '%%';
	$busq_prostata = (isset($_POST['busq_prostata'])) ? $_POST['busq_prostata']: '%%';
	$busq_fiebre_ama = (isset($_POST['busq_fiebre_ama'])) ? $_POST['busq_fiebre_ama']: '%%';

	$busq_no_sabe = ($busq_no_sabe == '' && $busq_primaria_completa == '' && $busq_secundaria_completa == '' && $busq_tecnico == '' && $busq_univer == '') ? '%%': $busq_no_sabe;

	function validate_filt(){
		global $busq_citologia;
		global $busq_auto_examen;
		global $busq_prostata;
		if ($busq_prostata == 'si' OR $busq_auto_examen == 'si' OR $busq_citologia == 'si') {
			// var_dump('1');
			return False;
		}
		else{
			// var_dump('2');
			return True;
		}
	}


	if ($_POST['busqueda_avan'] != 'undefined') {
		$union = '';
		$sql='';
		if ($busq_edad_desde == 0 && validate_filt() == True && $busq_fiebre_ama != 'si') {

			$sql = "SELECT casa_numero,familia_numero,municipio,nom_municipio,nombres,edad_anos,numero_doc_identificacion FROM (
					SELECT * FROM(
					SELECT DISTINCT *
					FROM familias 
					JOIN integrantes USING(id_familia) 
					JOIN menores_a_1 USING(id_integrante) 
					JOIN identificacion_ubicacion USING(id_familia) 
					JOIN otros_tb_integrantes USING(id_familia) 
					JOIN municipios ON municipio = id_municipio 
					ORDER BY id_visita DESC) t0
					GROUP BY t0.id_integrante) t1
				WHERE 
				(t1.nombres LIKE '%$busqueda%' OR t1.numero_doc_identificacion LIKE '%$busqueda%') 
				AND 
				(t1.escolaridad LIKE '$busq_no_sabe' OR t1.escolaridad = '$busq_primaria_completa' 
				OR t1.escolaridad = '$busq_secundaria_completa' OR t1.escolaridad = '$busq_tecnico' 
				OR t1.escolaridad = '$busq_univer')
				AND t1.edad_anos >= '$busq_edad_desde' 
				AND t1.edad_anos <= '$busq_edad_hasta' 
				AND t1.sexo = '$busq_sexo' 
				AND t1.desplazado LIKE '%$busq_desplazados%' 
				AND t1.discapacidad LIKE '%$busq_discapacitados%'
				AND t1.discapacidad LIKE '%$busq_discapacitados%'
				AND (t1.maltrato_fisico LIKE '$busq_maltrato' OR t1.maltrato_psico LIKE '$busq_maltrato')
			";
			$union = 'UNION ';
		}
		if($busq_edad_desde < 5 && $busq_edad_hasta >= 1 && validate_filt() == True){
			$sql .= $union."SELECT casa_numero,familia_numero,municipio,nom_municipio,nombres,edad_anos,numero_doc_identificacion FROM (
			SELECT * FROM(
					SELECT DISTINCT * 
					FROM familias 
					JOIN integrantes USING(id_familia) 
					JOIN de_1_a_5 USING(id_integrante) 
					JOIN identificacion_ubicacion USING(id_familia) 
					JOIN otros_tb_integrantes USING(id_familia) 
					JOIN municipios ON municipio = id_municipio 
					ORDER BY id_visita DESC) t0
					GROUP BY t0.id_integrante) t1
				WHERE 
				(t1.nombres LIKE '%$busqueda%' OR t1.numero_doc_identificacion LIKE '%$busqueda%') 
				AND 
				(t1.escolaridad LIKE '$busq_no_sabe' OR t1.escolaridad = '$busq_primaria_completa' 
				OR t1.escolaridad = '$busq_secundaria_completa' OR t1.escolaridad = '$busq_tecnico' 
				OR t1.escolaridad = '$busq_univer')
				AND t1.edad_anos >= '$busq_edad_desde' 
				AND t1.edad_anos <= '$busq_edad_hasta'
				AND t1.sexo = '$busq_sexo' 
				AND t1.desplazado LIKE '%$busq_desplazados%' 
				AND t1.discapacidad LIKE '%$busq_discapacitados%'
				AND t1.discapacidad LIKE '%$busq_discapacitados%'
				AND (t1.maltrato_fisico LIKE '$busq_maltrato' OR t1.maltrato_psico LIKE '$busq_maltrato')
				AND t1.fiebre_amarilla LIKE '$busq_fiebre_ama'
			";
			$union = 'UNION ';
		}
		if($busq_edad_desde < 10 && $busq_edad_hasta >= 5 && validate_filt() == True && $busq_fiebre_ama != 'si'){
			$sql .=  $union."SELECT casa_numero,familia_numero,municipio,nom_municipio,nombres,edad_anos,numero_doc_identificacion FROM (
			SELECT * FROM(
					SELECT DISTINCT * 
					FROM familias 
					JOIN integrantes USING(id_familia) 
					JOIN de_5_a_9 USING(id_integrante) 
					JOIN identificacion_ubicacion USING(id_familia) 
					JOIN otros_tb_integrantes USING(id_familia) 
					JOIN municipios ON municipio = id_municipio 
					ORDER BY id_visita DESC) t0
					GROUP BY t0.id_integrante) t1
				WHERE 
				(t1.nombres LIKE '%$busqueda%' OR t1.numero_doc_identificacion LIKE '%$busqueda%') 
				AND 
				(t1.escolaridad LIKE '$busq_no_sabe' OR t1.escolaridad = '$busq_primaria_completa' 
				OR t1.escolaridad = '$busq_secundaria_completa' OR t1.escolaridad = '$busq_tecnico' 
				OR t1.escolaridad = '$busq_univer')
				AND t1.edad_anos >= '$busq_edad_desde' 
				AND t1.edad_anos <= '$busq_edad_hasta'
				AND t1.sexo = '$busq_sexo' 
				AND t1.desplazado LIKE '%$busq_desplazados%' 
				AND t1.discapacidad LIKE '%$busq_discapacitados%'
				AND t1.discapacidad LIKE '%$busq_discapacitados%'
				AND (t1.maltrato_fisico LIKE '$busq_maltrato' OR t1.maltrato_psico LIKE '$busq_maltrato')
			";
			$union = 'UNION ';
		}
		if($busq_edad_desde < 60 && $busq_edad_hasta >= 10){

			$busq_citologia_arr = array('no','normal','anormal');
			$busq_citologia_arr = implode( "', '" , $busq_citologia_arr);
			$busq_auto_examen_arr = array('no','normal','anormal');
			$busq_auto_examen_arr = implode( "', '" , $busq_auto_examen_arr);
			$busq_prostata_arr = array('no','normal','anormal');
			$busq_prostata_arr = implode( "', '" , $busq_prostata_arr);
			$busq_maltrato_arr = array('',1,2,3,4,5,6,7);
			$busq_maltrato_arr = implode( "', '" , $busq_maltrato_arr);

			if($busq_sexo == 'M'){
				if($busq_citologia == 'si' OR $busq_auto_examen == 'si' OR $busq_maltrato == 'si'){
					$busq_citologia_arr = 'nan';
					$busq_auto_examen_arr = 'nan';
					$busq_maltrato_arr = 'nan';
				}
				if ($busq_prostata == 'si') {
					$busq_prostata_arr = array('normal','anormal');
					$busq_prostata_arr = implode( "', '" , $busq_prostata_arr);
				}
			}
			else if($busq_sexo == 'F'){
				if (($busq_prostata == 'si')) {
					$busq_prostata_arr = 'nan';
				}
				if ($busq_citologia == 'si') {
					$busq_citologia_arr = array('normal','anormal');
					$busq_citologia_arr = implode( "', '" , $busq_citologia_arr);
				}
				if ($busq_auto_examen == 'si') {
					$busq_auto_examen_arr = array('normal','anormal');
					$busq_auto_examen_arr = implode( "', '" , $busq_auto_examen_arr);
				}
				if ($busq_maltrato == 'si') {
					$busq_maltrato_arr =  array(1,2,3,4,5,6,7);
					$busq_maltrato_arr = implode( "', '" , $busq_maltrato_arr);
				}
			}

			$sql .= $union."SELECT casa_numero,familia_numero,municipio,nom_municipio,nombres,edad_anos,numero_doc_identificacion FROM (
			SELECT * FROM(
					SELECT DISTINCT * 
					FROM familias 
					JOIN integrantes USING(id_familia) 
					JOIN de_10_a_59 USING(id_integrante) 
					JOIN identificacion_ubicacion USING(id_familia) 
					JOIN otros_tb_integrantes USING(id_familia) 
					JOIN municipios ON municipio = id_municipio 
					ORDER BY id_visita DESC) t0
					GROUP BY t0.id_integrante) t1
				WHERE 
				(t1.nombres LIKE '%$busqueda%' OR t1.numero_doc_identificacion LIKE '%$busqueda%') 
				AND 
				(t1.escolaridad LIKE '$busq_no_sabe' OR t1.escolaridad = '$busq_primaria_completa' 
				OR t1.escolaridad = '$busq_secundaria_completa' OR t1.escolaridad = '$busq_tecnico' 
				OR t1.escolaridad = '$busq_univer')
				AND t1.edad_anos >= '$busq_edad_desde' 
				AND t1.edad_anos <= '$busq_edad_hasta'
				AND t1.sexo = '$busq_sexo' 
				AND t1.desplazado LIKE '%$busq_desplazados%' 
				AND t1.discapacidad LIKE '%$busq_discapacitados%'
				AND t1.discapacidad LIKE '%$busq_discapacitados%'
				AND (t1.violencia_contra_mujer IN ('$busq_maltrato_arr'))
				AND (t1.citologia IN ('$busq_citologia_arr'))
				AND (t1.autoexamen_seno IN ('$busq_auto_examen_arr'))
				AND (t1.examen_prostata IN ('$busq_prostata_arr'))
				AND (t1.fiebre_amarilla_m LIKE '$busq_fiebre_ama' OR t1.fiebre_amarilla_h LIKE '$busq_fiebre_ama')
			"; 
			$union = 'UNION ';
		}
		if($busq_edad_desde <= 100 && $busq_edad_hasta >= 60 && $busq_fiebre_ama != 'si'){
			$busq_citologia_arr = array('no','normal','anormal');
			$busq_citologia_arr = implode( "', '" , $busq_citologia_arr );
			$busq_auto_examen_arr = array('no','normal','anormal');
			$busq_auto_examen_arr = implode( "', '" , $busq_auto_examen_arr );
			$busq_prostata_arr = array('si','no');
			$busq_prostata_arr = implode( "', '" , $busq_prostata_arr );

			if($busq_sexo == 'M'){
				if (($busq_citologia == 'si' OR $busq_auto_examen == 'si')) {
					$busq_citologia_arr = 'nan';
					$busq_auto_examen_arr = 'nan';
				}
				if ($busq_prostata == 'si') {
					$busq_prostata_arr = 'si';
				}
			}
			else if($busq_sexo == 'F'){
				if (($busq_prostata == 'si')) {
					$busq_prostata_arr = 'nan';
				}
				if ($busq_citologia == 'si') {
					$busq_citologia_arr = array('normal','anormal');
					$busq_citologia_arr = implode( "', '" , $busq_citologia_arr);
				}
				if ($busq_auto_examen == 'si') {
					$busq_auto_examen_arr = array('normal','anormal');
					$busq_auto_examen_arr = implode( "', '" , $busq_auto_examen_arr);
				}
			}
			$sql .=  $union."SELECT casa_numero,familia_numero,municipio,nom_municipio,nombres,edad_anos,numero_doc_identificacion FROM (
			SELECT * FROM(
					SELECT DISTINCT * 
					FROM familias 
					JOIN integrantes USING(id_familia) 
					JOIN de_60_mas USING(id_integrante) 
					JOIN identificacion_ubicacion USING(id_familia) 
					JOIN otros_tb_integrantes USING(id_familia) 
					JOIN municipios ON municipio = id_municipio 
					ORDER BY id_visita DESC) t0
					GROUP BY t0.id_integrante) t1
				WHERE 
				(t1.nombres LIKE '%$busqueda%' OR t1.numero_doc_identificacion LIKE '%$busqueda%') 
				AND 
				(t1.escolaridad LIKE '$busq_no_sabe' OR t1.escolaridad = '$busq_primaria_completa' 
				OR t1.escolaridad = '$busq_secundaria_completa' OR t1.escolaridad = '$busq_tecnico' 
				OR t1.escolaridad = '$busq_univer')
				AND t1.edad_anos >= '$busq_edad_desde' 
				AND t1.edad_anos <= '$busq_edad_hasta'
				AND t1.sexo = '$busq_sexo' 
				AND t1.desplazado LIKE '%$busq_desplazados%' 
				AND t1.discapacidad LIKE '%$busq_discapacitados%'
				AND t1.discapacidad LIKE '%$busq_discapacitados%'
				AND (t1.citologia_ult_5 IN ('$busq_citologia_arr'))
				AND (t1.autoexamen_seno IN ('$busq_auto_examen_arr'))
				AND (t1.examen_prostata IN ('$busq_prostata_arr'))
			";
			$union = 'UNION ';
		}
		// echo $sql;
		$query = $bd->query($sql);
		if ($query->num_rows > 0) {
			$num_results = '<div class="num_results">Numero de Personas: <span>'.$query->num_rows.'</span></div>';
			$table = '<div class="table">
						<table>
							<thead>
								<tr>
									<th>Casa N°</th>
									<th>Familia N°</th>
									<th>Municipio</th>
									<th>Nombres</th>
									<th>Edad</th>
									<th>Numero Identificacion</th>
								</tr>
							</thead>
							<tbody>';
			echo $num_results;
			echo $table;
			while($row = $query->fetch_object()){
				echo '<tr>';
				echo '<td>'.$row->casa_numero.'</td>';
				echo '<td>'.$row->familia_numero.'</td>';
						$sql_e = "SELECT * FROM municipios WHERE id_municipio = '$row->municipio'";
						$query_e = $bd->query($sql_e); 
						if (!$query_e) echo $bd->error;
						$row_e = $query_e->fetch_object();
						$row->nom_municipio = $row_e->nom_municipio; 
						$cont = 1; 
				echo '<td class="municipio">'.$row->nom_municipio.'</td>';
				echo '<td class="nombres">'.$row->nombres.'</td>';
				echo '<td>'.$row->edad_anos.'</td>';
				echo '<td>'.$row->numero_doc_identificacion.'</td>';
				echo '</tr>';
				$cont++; 
				} 
				echo '</tbody>';
				echo '</table>';
				echo '</div>';
			}
			else{
				$error = '<div class="error_table">No se Encontraron Resultados</div>';
				echo $error;
			}
		}
		else{
				$error = '<div class="error_table">No se Encontraron Resultados ()</div>';
				echo $error;
			}
$bd->close();
?>