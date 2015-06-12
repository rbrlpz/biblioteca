<?php 
	include("../../clases/usuario.class.php");
	
	echo Usuario::buscaUsuarios($_GET["term"]);
?>