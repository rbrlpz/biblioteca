<?php 
	include("../../clases/libro.class.php");
echo Libro::buscaLibro($_POST["lib_id"]);
?>