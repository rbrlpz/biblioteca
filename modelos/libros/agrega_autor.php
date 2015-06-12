<?php 
	include("../../clases/libro.class.php");
echo Libro::agregaAutor($_POST["lib_id"],$_POST["aut_id"]);
?>