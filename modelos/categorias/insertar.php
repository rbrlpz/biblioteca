<?php 
	include("../../clases/categoria.class.php");

	$categoria = new Categoria();
	echo $categoria->altaCategoria($_POST["nombre"]);
?>