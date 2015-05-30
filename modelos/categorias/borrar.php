<?php 
	include("../../clases/categoria.class.php");

	$categoria = new Categoria();
	echo $categoria->bajaCategoria($_POST["id"]);
?>