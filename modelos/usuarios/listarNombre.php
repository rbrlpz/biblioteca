<?php 
	include("../../clases/usuario.class.php");
	
	echo Usuario::buscaUsuario($_GET["nombre"]);
?>