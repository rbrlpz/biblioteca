<?php 
	include("../../clases/usuario.class.php");
	$usuario = new usuario();
	$usuario->setnombre($_POST["nombre"]);
	$usuario->setemail($_POST["email"]);
	$usuario->setclave($_POST["clave"]);
	$usuario->settelefono($_POST["telefono"]);
	$usuario->setid($_POST["usu_id"]);
	echo $usuario->actualizaUsuario();
?>