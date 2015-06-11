<?php 
ini_set("display_errors",1);
	include("../../clases/libro.class.php");
	Libro::buscaLibros($_GET["nombre"]);
?>