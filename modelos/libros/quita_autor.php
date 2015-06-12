<?php 
	include("../../clases/libro.class.php");
echo Libro::quitaAutor($_POST["lib_id"],$_POST["aut_id"]);
?>