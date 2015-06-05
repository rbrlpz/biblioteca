<?php 
	include("../../clases/editorial.class.php");
	$editorial = new Editorial();
	echo $editorial->altaEditorial($_POST["nombre"], $_POST["email"]);
?>