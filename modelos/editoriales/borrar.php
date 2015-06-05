<?php 
	include("../../clases/editorial.class.php");
	$editorial = new Editorial();
	echo $editorial->bajaEditorial($_POST["edi_id"]);
?>