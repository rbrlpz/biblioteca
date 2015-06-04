<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Catálogo de autores</title>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../css/miestilo.css">
</head>
<body>
	<div id="container">
		<h1>Catálogo de autores</h1>
		<form id="form-insertar" action="" class="form">
			<div class="form-container">
				<label for="nombre">Nombre</label>
				<input type="text" id="nombre" name="nombre" placeholder="nombre del autor" class="form-control">
			</div>
			<div class="form-container">
				<label for="email">Email</label>
				<input type="email" id="email" name="email" placeholder="email del autor" class="form-control">
			</div>
			<div class="form-container">
				<input type="submit" id="insertar_autor" value="Insertar autor" class="form-control btn btn-primary">
			</div>
		</form>

		<section id="listado">
			<input type="search" id="buscar" placeholder="Buscar por nombre de autor">
			<ul id="lista_autores"></ul>
		</section>

		<div id="overlay">
			<div id="modificar">
				<form id="frm_modificar" action="" class="form">
					<div class="form-container">
						<label for="Mnombre">Nombre</label>
						<input type="text" id="Mnombre" name="nombre" placeholder="nombre del autor" class="form-control">
					</div>
					<div class="form-container">
						<label for="Memail">Email</label>
						<input type="email" id="Memail" name="email" placeholder="email del autor" class="form-control">
					</div>
					<div class="form-container">
						<input type="hidden" id="aut_id" name="aut_id" >
						<input type="submit" id="modificar_autor" value="Modificar autor" class="form-control btn btn-primary">
					</div>

				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function lista(){
			$("#lista_autores").html("");
			$.get("../modelos/autores/listar.php",function(registros){
				registros.forEach(function(registro, index){
					$("#lista_autores").prepend("<li id='"+
							registro.aut_id+"'>"+
							registro.aut_nombre+
							"<div class='acciones'>"+
							"<input type='button' class='modifica btn btn-warning' value='Modificar'>"+
							"<input type='button' class='borrar btn btn-danger' value='Borrar'>"+
							"</div>"+
							"</li>");
				}); //termina foreach
				$(".acciones").hide();
			},"json");
		}
		lista();
		$(document).on("click","#insertar_autor",function(evento){
			evento.preventDefault();
			$.post("../modelos/autores/insertar.php", 
				$("#form-insertar").serialize(), function(respuesta){
					alert(respuesta);
					lista();
				});
		});

		$(document).on("click", "#lista_autores li", function(){
			$(".acciones").hide();
			$(this).children().show(500);
		});

		$(document).on("click",".borrar", function(evento){
			var id = $(this).parent().parent().attr("id");
			$.post("../modelos/autores/borrar.php", {"aut_id":id}, 
				function(respuesta){
					alert(respuesta);
					lista();
				});
		});

		$(document).on("click",".modifica", function(evento){
			var id = $(this).parent().parent().attr("id");
			$("#overlay").show(500, function(){
				$.post("../modelos/autores/buscaId.php", {"aut_id":id}, 
					function(respuesta){
						$("#Mnombre").val(respuesta[0].aut_nombre);
						$("#Memail").val(respuesta[0].aut_email);
						$("#aut_id").val(id);
					}, "json");

			});
		});
	
		$(document).on("click", "#modificar_autor", function(evento){
			evento.preventDefault();
			$.post("../modelos/autores/modificar.php", 
				$("#frm_modificar").serialize(), function(respuesta){
					alert(respuesta);
					lista();
					$("#overlay").hide(500);
				});
		})
		$(document).on("keyup", "#buscar", function(){
			$("#lista_autores").html("");
			$.get("../modelos/autores/listarNombre.php",
				{"nombre": $("#buscar").val()},
				function(registros){
				registros.forEach(function(registro, index){
					$("#lista_autores").prepend("<li id='"+
							registro.aut_id+"'>"+
							registro.aut_nombre+
							"<div class='acciones'>"+
							"<input type='button' class='modifica btn btn-warning' value='Modificar'>"+
							"<input type='button' class='borrar btn btn-danger' value='Borrar'>"+
							"</div>"+
							"</li>");
				}); //termina foreach
				$(".acciones").hide();
			},"json");
		})
	</script>
</body>
</html>