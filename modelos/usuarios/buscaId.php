<?php 
	include("../../clases/usuario.class.php");
	
	echo Usuario::buscaUsuario($_POST["usu_id"]);
?>