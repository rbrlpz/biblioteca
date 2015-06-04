<?php 
	include("../../clases/autor.class.php");
	$autor = new Autor();
	echo $autor->bajaAutor($_POST["aut_id"]);
?>