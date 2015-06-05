<?php 
	include("../../clases/editorial.class.php");
	$editorial = new Editorial();
	$editorial->setnombre($_POST["nombre"]);
	$editorial->setemail($_POST["email"]);
	$editorial->setid($_POST["edi_id"]);
	echo $editorial->actualizaEditorial();
?>