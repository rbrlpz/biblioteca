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
	<div id="container">
		<h1>Inicio de sesión</h1>
		<form id="login" class="form">
			<div class="form-contanier">
				<input type="text" name="user" class="form-control" placeholder="Usuario">
			</div>
			<div class="form-contanier">
				<input type="password" name="pass" class="form-control" placeholder="Contraseña">
			</div>
			<div class="form-contanier">
				<input type="submit" class="btn btn-primary form-control" value="Entrar">
			</div>
		</form>
	</div>
	<script type="text/javascript">
		$(document).on("submit", "#login", function(evento){
			evento.preventDefault();
			$.post("modelos/acceso/valida_login.php", $("#login").serialize(),
				function(respuesta){
					if (respuesta == "SI SE PUDO"){
						location.href="menu.php";
					}else{
						alert(respuesta);
					}
				});
		});
	</script>
</body>
</html>