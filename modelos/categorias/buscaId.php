<?php 
	include("../../clases/categoria.class.php");

echo Categoria::buscaCategoria($_POST["id"]);
?>