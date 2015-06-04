<?php 
	include("../../clases/autor.class.php");
	$autor = new Autor();
	$autor->setnombre($_POST["nombre"]);
	$autor->setemail($_POST["email"]);
	$autor->setid($_POST["aut_id"]);
	echo $autor->actualizaAutor();
?>