<?php 
	include("../../clases/usuario.class.php");
	$usuario = new Usuario();
	echo $usuario->altaUsuario($_POST["nombre"], $_POST["email"],$_POST["clave"],$_POST["telefono"]);
?>