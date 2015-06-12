<?php
include("../../clases/prestamo.class.php");
$prestamo = new Prestamo();

$usuario = $_POST["usu_id"];
$libro = $_POST["lib_id"];
$f_salida = date("Y-m-d");
$f_entrega = date('Y-m-d', strtotime("+".$_POST['dias']." days"));
$prestamo->altaPrestamo($usuario, $libro, $f_salida, $f_entrega);

?>