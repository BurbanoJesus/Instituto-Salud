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
	<link rel="stylesheet" href="http://localhost/instituto/static/css/jquery-ui.css">
	<link rel="stylesheet" href="http://localhost/instituto/static/css/estilos.css">
</head>
<body>
	<main>
		<form id="form16" action="/instituto/core/includes/busqueda_filtros.php" method="POST">
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
				$sql = "SELECT casa_numero,familia_numero,municipio,nombres,telefono_jefe,parentesco_familiar FROM familias JOIN integrantes USING(id_familia) JOIN identificacion_ubicacion USING(id_familia) JOIN otros_tb_integrantes USING(id_familia) WHERE parentesco_familiar = 1 ";
				$query = $bd->query($sql); 
				if (!$query) echo $bd->error;
				while($row = $query->fetch_object()){
				    $collect[] = $row;
					// var_dump($row);
					// echo('<br><br>');		
				}

			 ?>
			<div class="divh1">
				<h1>Busqueda Con Filtros</h1>
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
				<div class="busqueda_fam">
					<input type="text" name="busqueda_avan" placeholder="Ingrese Busqueda...">
					<img onclick="$('#form16').submit()" id="btn_busqueda_avan" src="/instituto/static/img/varios/lupa.png">
				</div>
				<div class="content_busq_filtros">
					<div class="flex">
						<div class="busq_filtros_1">
							<div class="edad">
								<label class="main">
									Edad
									<input id="busq_edad_desde" type="hidden" name="busq_edad_desde" value="0">
									<input id="busq_edad_hasta" type="hidden" name="busq_edad_hasta" value="100">
								</label>
								<div id="slider-range"></div>
								<span id="edad" class="block"></span>
								<div id="min"></div>
								<div id="max"></div>
							</div>
							<label class="main">Sexo</label>
							<label>Masculino</label>
							<input id="busq_sexo" type="radio" name="busq_sexo" value="M" checked required/>
							<label class="radio" for="busq_sexo"></label>
							<label>Femenino</label>
							<input id="busq_sexo_f" type="radio" name="busq_sexo" value="F"/>
							<label class="radio" for="busq_sexo_f"></label>
						</div>
						<div class="busq_filtros_2">
							<div class="block">
								<input id="busq_desplazados" type="checkbox" name="busq_desplazados" value="si"/>
								<label for="busq_desplazados" class="check"></label>
								<label>Desplazados</label>
							</div>
							<div class="block">
								<input id="busq_discapacitados" type="checkbox" name="busq_discapacitados" value="si"/>
								<label for="busq_discapacitados" class="check"></label>
								<label>Discapacitados</label>
							</div>
							<div class="block">
								<input id="busq_no_sabe" type="checkbox" name="busq_no_sabe" value="si"/>
								<label for="busq_no_sabe" class="check"></label>
								<label>No Sabe Leer Ni Escribir</label>
							</div>
							<div class="block">
								<input id="busq_primaria_completa" type="checkbox" name="busq_primaria_completa" value="si"/>
								<label for="busq_primaria_completa" class="check"></label>
								<label>Primaria Completa</label>
							</div>
							<div class="block">
								<input id="busq_secundaria_completa" type="checkbox" name="busq_secundaria_completa" value="si"/>
								<label for="busq_secundaria_completa" class="check"></label>
								<label>Secundaria Completa</label>
							</div>
							<div class="block">
								<input id="busq_tecnico" type="checkbox" name="busq_tecnico" value="si"/>
								<label for="busq_tecnico" class="check"></label>
								<label>Tecnico o Tecnologo</label>
							</div>
							<div class="block">
								<input id="busq_univer" type="checkbox" name="busq_univer" value="si"/>
								<label for="busq_univer" class="check"></label>
								<label>Universidad</label>
							</div>
						</div>
						<div class="busq_filtros_3">
							<div class="block">
								<input id="busq_maltrato" type="checkbox" name="busq_maltrato" value="si"/>
								<label for="busq_maltrato" class="check"></label>
								<label>Señales de Maltrato</label>
							</div>
							<div class="block">
								<input id="busq_citologia" type="checkbox" name="busq_citologia" value="si"/>
								<label for="busq_citologia" class="check"></label>
								<label>Citologia</label>
							</div>
							<div class="block">
								<input id="busq_auto_examen" type="checkbox" name="busq_auto_examen" value="si"/>
								<label for="busq_auto_examen" class="check"></label>
								<label>Auto Examen de Seno</label>
							</div>
							<div class="block">
								<input id="busq_prostata" type="checkbox" name="busq_prostata" value="si"/>
								<label for="busq_prostata" class="check"></label>
								<label>Examen Prostata</label>
							</div>
							<div class="block">
								<input id="busq_fiebre_ama" type="checkbox" name="busq_fiebre_ama" value="si"/>
								<label for="busq_fiebre_ama" class="check"></label>
								<label>Fiebre Amarilla</label>
							</div>
						</div>
						<div class="busq_filtros_4">
							
						</div>	
					</div>
					<div class="block">
						<button type="submit" class="button bg_verde">Buscar</button>
					</div>
				</div>

				<div class="result_busq">
				</div>
				<div class="block">
					<div type="button" class="return" onclick="window.location='/instituto/views/consultar/listar_familias.php'"><img src="/instituto/static/img/varios/return.png" alt="">Volver Atras</div>
			    </div>
				
			</div>
		</form>
	</main>
	<script src="http://localhost/instituto/static/js/jquery-3.3.1.js"></script>
	<script src="http://localhost/instituto/static/js/jquery-ui.js"></script>
	<script src="http://localhost/instituto/static/js/bootstrap.js"></script>
	<script src="http://localhost/instituto/static/js/funciones.js"></script>
	<script src="http://localhost/instituto/static/js/busqueda.js"></script>
	<script>
	  $( function() {
	  	console.log('sadio');
	    $( "#slider-range" ).slider({
	      range: true,
	      min: 0,
	      max: 100,
	      step: 1,
	      values: [ 0, 100 ],
	      slide: function( event, ui ) {
	        $("#edad").text(ui.values[0]+" a "+ui.values[1]+" Años");
	        $("#busq_edad_desde").val(ui.values[0]);
	        $("#busq_edad_hasta").val(ui.values[1]);
	      }
	    });
	    $("#edad").text($("#slider-range").slider("values",0)+" a "+$("#slider-range").slider("values", 1)+" Años");
	    $("#edad").text($("#slider-range").slider("values",0)+" a "+$("#slider-range").slider("values", 1)+" Años");
	  } );
  </script>
  	
</body>
</html>