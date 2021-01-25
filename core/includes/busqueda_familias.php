<?php 
	require $_SERVER['DOCUMENT_ROOT']."/instituto/application/database/conexion.php";
	// sleep(1);
	$bd = conectar();
	session_start();
	$busqueda = $_POST['busqueda_fam'];
	if ($_POST['busqueda_fam'] !== '') {
		$sql = "SELECT casa_numero,familia_numero,municipio,nom_municipio,nombres,telefono_jefe,parentesco_familiar FROM familias JOIN integrantes USING(id_familia) JOIN identificacion_ubicacion USING(id_familia) JOIN otros_tb_integrantes USING(id_familia) JOIN municipios ON municipio = id_municipio WHERE ( casa_numero = '$busqueda' OR familia_numero = '$busqueda' OR nom_municipio LIKE '%$busqueda%' OR nombres LIKE '%$busqueda%' OR numero_doc_identificacion LIKE '%$busqueda%') AND parentesco_familiar = 1 ";
		$query = $bd->query($sql);
		if ($query->num_rows > 0) {
			$table = '<div class="table">
						<table>
							<thead>
								<tr>
									<th>Casa N°</th>
									<th>Familia N°</th>
									<th>Municipio</th>
									<th>Jefe de Familia</th>
									<th>Telefono Jefe</th>
									<th>Registro Familiar Completo</th>
								</tr>
							</thead>
							<tbody>';
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
				echo '<td>'.$row->telefono_jefe.'</td>';
				echo '<td class="none_padd registro">';
				echo '<button  onclick="window.location=\'/instituto/views/consultar/identificacion.php?casa_numero='.$row->casa_numero.'&familia_numero='.$row->familia_numero.'\'" type="button" class="button bg_verde">';
				echo 'Ver Registro';
				echo '</button>';
				echo '</td>';
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
$bd->close();
?>