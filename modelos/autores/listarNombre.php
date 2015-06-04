<?php 
	include("../../clases/autor.class.php");
	
	echo Autor::buscaAutores($_GET["nombre"]);
?>