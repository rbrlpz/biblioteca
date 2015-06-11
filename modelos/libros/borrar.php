<?php
	include("../../clases/libro.class.php");

	$libro = new Libro();

	echo $libro->bajaLibro($_POST["lib_id"]);
?>