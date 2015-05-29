<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Catalogo de categorias</title>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../css/miestilo.css">
</head>
<body>
	<div id="container">
		<h1>Catalogo de categorias</h1>
		<form id="frm_insertar" class="form">
			<div class="form-container">
				<label for="nombre">Nombre de categoria:</label>
				<input class="form-control" type="text" name="nombre" id="nombre">
			</div>
			<div class="form-container">
				<input id="insertar_categoria" class="form-control btn btn-primary" type="submit" value="Insertar categoria">
				
			</div>
		</form>
		<section id="listado">
			<ul id="lista_categorias"></ul>
		</section>
	</div>
	<div id="overlay">
		<div id="modificar"></div>
	</div>
	<script type="text/javascript">
		$(document).on("click",
						"#insertar_categoria", 
						function(evento){
							evento.preventDefault();
							$.post("../modelos/categorias/insertar.php",
								$("#frm_insertar").serialize(),
								function(respuesta){
									alert(respuesta);
									lista();
								});

						});
		function lista(){
			$.get("../modelos/categorias/listar.php", 
				function(registros){
					$("#lista_categorias").html("");
					registros.forEach(function(registro,index){
						$("#lista_categorias").append("<li id='"+registro.cat_id+"'>"+registro.cat_nombre+"</li>")
					});	
			}, "json");
		}
		lista();
	</script>
</body>
</html>