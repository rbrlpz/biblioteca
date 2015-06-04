<?php 
	include("../../clases/autor.class.php");
	$autor = new Autor();
	echo $autor->altaAutor($_POST["nombre"], $_POST["email"]);
?>