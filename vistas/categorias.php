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
			<input type="search" id="buscar" placeholder="Buscar por nombre de categoria">
			<ul id="lista_categorias"></ul>
		</section>
	</div>
	<div id="overlay">
		<div id="modificar">
			<form id="frm_modificar" class="form">
			<div class="form-container">
				<label for="nombre">Nombre de categoria:</label>
				<input class="form-control" type="text" name="nombre" id="Mnombre">
			</div>
			<div class="form-container">
				<input id="modificar_categoria" class="form-control btn btn-primary" type="submit" value="Modificar categoria">
				
				<input type="text" name="cat_id" id="cat_id">
			</div>
		</form>
		</div>
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
//http://github.com/rbrlpz/biblioteca
						});
		function lista(){
			$.get("../modelos/categorias/listar.php", 
				function(registros){
					$("#lista_categorias").html("");
					registros.forEach(function(registro,index){
						$("#lista_categorias").append("<li id='"+
							registro.cat_id+"'>"+
							registro.cat_nombre+
							"<div class='acciones'>"+
							"<input type='button' class='modifica btn btn-warning' value='Modificar'>"+
							"<input type='button' class='borrar btn btn-danger' value='Borrar'>"+
							"</li>");
					});

				$(".acciones").hide();	
			}, "json");
		}
		lista();
	$(document).on("click","#lista_categorias li",
		function(){
			$(".acciones").hide();
			$(this).children().show(500);
		});
$(document).on("click",".modifica", function(){
	var id = $(this).parent().parent().attr("id");
	$("#overlay").show(500);
	$.post("../modelos/categorias/buscaId.php", "id="+id,
		function(registro){
			$("#Mnombre").val(registro[0].cat_nombre);
			$("#cat_id").val(registro[0].cat_id);
		},"json");
});

$(document).on("click",".borrar", function(){
	var id = $(this).parent().parent().attr("id");
	$.post("../modelos/categorias/borrar.php", "id="+id, 
		function(respuesta){
			alert(respuesta);
			lista();
		})
});


$(document).on("click",
						"#modificar_categoria", 
						function(evento){
							evento.preventDefault();
							$.post("../modelos/categorias/modificar.php",
								$("#frm_modificar").serialize(),
								function(respuesta){
									alert(respuesta);
									lista();
									$("#overlay").hide(500);
								});
//http://github.com/rbrlpz/biblioteca
						});

$(document).on("keyup", "#buscar", function(){
	$.get("../modelos/categorias/listarNombre.php",
				"nombre="+$("#buscar").val(), 
				function(registros){
					$("#lista_categorias").html("");
					registros.forEach(function(registro,index){
						$("#lista_categorias").append("<li id='"+
							registro.cat_id+"'>"+
							registro.cat_nombre+
							"<div class='acciones'>"+
							"<input type='button' class='modifica btn btn-warning' value='Modificar'>"+
							"<input type='button' class='borrar btn btn-danger' value='Borrar'>"+
							"</li>");
					});

				$(".acciones").hide();	
			}, "json");
});
	</script>
</body>
</html>