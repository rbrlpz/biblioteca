<?php 
	include("../../clases/categoria.class.php");

	$categoria = new Categoria();
	$categoria->setid($_POST["cat_id"]);
	$categoria->setnombre($_POST["nombre"]);
	echo $categoria->actualizaCategoria();
?>