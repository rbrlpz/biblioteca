<?php 
	include("../../clases/categoria.class.php");

echo Categoria::buscaCategorias($_GET["term"]);
?>