<?php 
	include("../../clases/editorial.class.php");
	
	echo Editorial::buscaEditoriales($_GET["nombre"]);
?>