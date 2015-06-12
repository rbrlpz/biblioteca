<?php
include("../../clases/prestamo.class.php");
$prestamo = new Prestamo();

$prestamo->cambiaStatus($_POST["id"]);

?>