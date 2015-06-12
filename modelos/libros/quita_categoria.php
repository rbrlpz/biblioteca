<?php 
	include("../../clases/libro.class.php");
echo Libro::quitaCategoria($_POST["lib_id"],$_POST["cat_id"]);
?>