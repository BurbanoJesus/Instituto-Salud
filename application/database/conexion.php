<?php 
function conectar() {
	$bd = new mysqli('localhost','root','','db_instituto');
	if($bd->connect_errno):
		echo "Error".$bd->connect_error;
	endif;
	$bd->set_charset('utf8');
	return $bd;
}
 ?>