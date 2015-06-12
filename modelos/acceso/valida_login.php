<?php 
$user = $_POST["user"];
$pass = $_POST["pass"];
if ($user == "miusuario" && $pass == "dame_chance"){
	session_start();
	$_SESSION["dame_chance"] = "SIMON";
	echo "SI SE PUDO";
}else{
	echo "NO SE PUDO";
}
?>