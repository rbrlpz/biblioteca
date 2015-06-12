<?php 
session_start();
if (!isset($_SESSION["dame_chance"])) {
	die("<script>location.href='index.php';</script>");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Inicio de sesión</title>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/miestilo.css">
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Super Biblio</a>
			</div>
			<div>
				<ul class="nav navbar-nav">
					<li><a href="vistas/usuarios.php">Usuarios</a></li>
					<li><a href="vistas/autores.php">Autores</a></li>
					<li><a href="vistas/editoriales.php">Editoriales</a></li>
					<li><a href="vistas/categorias.php">Categorias</a></li>
					<li><a href="vistas/libros.php">Libros</a></li>
					<li><a href="vistas/prestamos.php">Prestamos</a></li>
					<li><a href="cerrar.php">Cerrar sesión</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div id="container">
		<div class="jumbotron">
			<h1>Se ve bien chidote</h1>
		</div>
	</div>
</body>
</html>