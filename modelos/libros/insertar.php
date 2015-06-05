<?php
 include("../../clases/libro.class.php");
	$titulo =$_POST["titulo"];
	$isbn =$_POST["isbn"];
	$num_pags =$_POST["num_pags"];
	$editorial =$_POST["edi_id"];
	$autores =$_POST["aut_id"];
	$categorias =$_POST["cat_id"];
	$formato =$_POST["formato"];
	$cantidad =$_POST["cantidad"];

	$libro = new Libro();
	echo $libro->altaLibro($titulo, $autores, $categorias, 
							$editorial, $num_pags, $formato, 
							$isbn, $cantidad);
							
?>