<!DOCTYPE html>
<html lang="e">
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
		<form id="form15" action="/instituto/core/includes/busqueda_familias.php" method="POST">
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
				$sql = "SELECT casa_numero,familia_numero,municipio,nombres,telefono_jefe,parentesco_familiar,numero_doc_identificacion FROM familias JOIN integrantes USING(id_familia) JOIN identificacion_ubicacion USING(id_familia) JOIN otros_tb_integrantes USING(id_familia) WHERE parentesco_familiar = 1 ";
				$query = $bd->query($sql); 
				if (!$query) echo $bd->error;
				while($row = $query->fetch_object()){
				    $collect[] = $row;
				}

			 ?>
			<div class="divh1">
				<h1>Lista de Familias</h1>
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
			<div class="main">
				<div class="content_busq">
					<div class="busqueda_fam">
						<input type="text" name="busqueda_fam" placeholder="Ingrese Busqueda...">
						<img onclick="$('#form15').submit()" id="btn_busqueda_fam" src="/instituto/static/img/varios/lupa.png">
					</div>
					<div class="busqueda_fam_btn">
						<button onclick="window.location='/instituto/views/consultar/busqueda/busqueda_filtros.php'" class="button bg_verde" type="button">Busqueda Con Filtros</button>
					</div>
				</div>
				<div class="result_busq_fam">
					<div class="table">
						<table>
							<thead>
								<tr>
									<th>Casa N°</th>
									<th>Familia N°</th>
									<th>Municipio</th>
									<th>Jefe de Familia</th>
									<th>Numero Documento</th>
									<th>Telefono Jefe Hogar</th>
									<th>Registro Familiar Completo</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$cont = 1; 
								foreach ($collect as $key => $row) {
								?>
								<tr>
									<td><?php echo $row->casa_numero?></td>
									<td><?php echo $row->familia_numero?></td>
									<?php 
										$sql_e = "SELECT * FROM municipios WHERE id_municipio = '$row->municipio'";
										$query_e = $bd->query($sql_e); 
										if (!$query_e) echo $bd->error;
										$row_e = $query_e->fetch_object();
										$row->nom_municipio = $row_e->nom_municipio; 
									?>
									<td class="municipio"><?php echo $row->nom_municipio?></td>
									<td class="nombres"><?php echo $row->nombres?></td>
									<td><?php echo $row->numero_doc_identificacion?></td>
									<td><?php echo $row->telefono_jefe?></td>
									<td class="none_padd registro">
										<button  onclick="window.location='/instituto/views/consultar/identificacion.php?casa_numero=<?php echo $row->casa_numero?>&familia_numero=<?php echo $row->familia_numero?>'" type="button" class="button bg_verde">
											Ver Registro
										</button>
									</td>
								</tr>
								<?php $cont++; 
								} ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="block">
					<div type="button" class="return" onclick="window.location='/instituto/views/inicio.php'"><img src="/instituto/static/img/varios/return.png" alt="">Volver Atras</div>
			   </div>
			</div>
			
		</form>
	</main>
	<script src="http://localhost/instituto/static/js/jquery-3.3.1.js"></script>
	<script src="http://localhost/instituto/static/js/bootstrap.js"></script>
	<script src="http://localhost/instituto/static/js/funciones.js"></script>
	<script src="http://localhost/instituto/static/js/busqueda.js"></script>
</body>
</html>