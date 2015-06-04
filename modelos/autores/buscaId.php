<?php 
	include("../../clases/autor.class.php");
	
	echo Autor::buscaAutor($_POST["aut_id"]);
?>