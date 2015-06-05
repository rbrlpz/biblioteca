<?php 
	include("../../clases/usuario.class.php");
	$usuario = new Usuario();
	echo $usuario->bajaUsuario($_POST["usu_id"]);
?>