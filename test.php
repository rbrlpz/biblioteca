<?php 
include("clases/categoria.class.php");
$categoria = new Categoria();
for ($i = 0; $i<5; $i++){
	$categoria->altaCategoria("Programación Web".$i);
}

echo Categoria::listaCategorias();
?>