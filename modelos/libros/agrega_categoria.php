<?php 
	include("../../clases/libro.class.php");
echo Libro::agregaCategoria($_POST["lib_id"],$_POST["cat_id"]);
?>