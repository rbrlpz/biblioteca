<?php 
	include("../../clases/editorial.class.php");
	
	echo Editorial::buscaEditorial($_POST["edi_id"]);
?>