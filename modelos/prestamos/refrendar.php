<?php
include("../../clases/prestamo.class.php");
$prestamo = new Prestamo();

$prestamo->renuevaPrestamo($_POST["pre_id"], $_POST["f_entrega"]);

?>