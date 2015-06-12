<?php
 include("../../clases/libro.class.php");
	$titulo =$_POST["titulo"];
	$isbn =$_POST["isbn"];
	$num_pags =$_POST["num_pags"];
	$editorial =$_POST["edi_id"];
	$formato =$_POST["formato"];
	$cantidad =$_POST["cantidad"];
	$id = $_POST["lib_id"];


	$libro = new Libro();
	$libro->settitulo($titulo);
	$libro->setisbn($isbn);
	$libro->setnum_pags($num_pags);
	$libro->seteditorial($editorial);
	$libro->setformato($formato);
	$libro->setcantidad($cantidad);
	$libro->setid($id);

	echo $libro->actualizaLibro();
							
?>