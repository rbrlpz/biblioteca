<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Catálogo de editoriales</title>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../css/miestilo.css">
</head>
<body>
	<div id="container">
		<h1>Catálogo de editoriales</h1>
		<form id="form-insertar" action="" class="form">
			<div class="form-container">
				<label for="nombre">Nombre</label>
				<input type="text" id="nombre" name="nombre" placeholder="nombre del editorial" class="form-control">
			</div>
			<div class="form-container">
				<label for="email">Email</label>
				<input type="email" id="email" name="email" placeholder="email del editorial" class="form-control">
			</div>
			<div class="form-container">
				<input type="submit" id="insertar_editorial" value="Insertar editorial" class="form-control btn btn-primary">
			</div>
		</form>

		<section id="listado">
			<input type="search" id="buscar" placeholder="Buscar por nombre de editorial">
			<ul id="lista_editoriales"></ul>
		</section>

		<div id="overlay">
			<div id="modificar">
				<form id="frm_modificar" action="" class="form">
					<div class="form-container">
						<label for="Mnombre">Nombre</label>
						<input type="text" id="Mnombre" name="nombre" placeholder="nombre del editorial" class="form-control">
					</div>
					<div class="form-container">
						<label for="Memail">Email</label>
						<input type="email" id="Memail" name="email" placeholder="email del editorial" class="form-control">
					</div>
					<div class="form-container">
						<input type="hidden" id="edi_id" name="edi_id" >
						<input type="submit" id="modificar_editorial" value="Modificar editorial" class="form-control btn btn-primary">
					</div>

				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function lista(){
			$("#lista_editoriales").html("");
			$.get("../modelos/editoriales/listar.php",function(registros){
				registros.forEach(function(registro, index){
					$("#lista_editoriales").prepend("<li id='"+
							registro.edi_id+"'>"+
							registro.edi_nombre+
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
		$(document).on("click","#insertar_editorial",function(evento){
			evento.preventDefault();
			$.post("../modelos/editoriales/insertar.php", 
				$("#form-insertar").serialize(), function(respuesta){
					alert(respuesta);
					lista();
				});
		});

		$(document).on("click", "#lista_editoriales li", function(){
			$(".acciones").hide();
			$(this).children().show(500);
		});

		$(document).on("click",".borrar", function(evento){
			var id = $(this).parent().parent().attr("id");
			$.post("../modelos/editoriales/borrar.php", {"edi_id":id}, 
				function(respuesta){
					alert(respuesta);
					lista();
				});
		});

		$(document).on("click",".modifica", function(evento){
			var id = $(this).parent().parent().attr("id");
			$("#overlay").show(500, function(){
				$.post("../modelos/editoriales/buscaId.php", {"edi_id":id}, 
					function(respuesta){
						$("#Mnombre").val(respuesta[0].edi_nombre);
						$("#Memail").val(respuesta[0].edi_email);
						$("#edi_id").val(id);
					}, "json");

			});
		});
	
		$(document).on("click", "#modificar_editorial", function(evento){
			evento.preventDefault();
			$.post("../modelos/editoriales/modificar.php", 
				$("#frm_modificar").serialize(), function(respuesta){
					alert(respuesta);
					lista();
					$("#overlay").hide(500);
				});
		})
		$(document).on("keyup", "#buscar", function(){
			$("#lista_editoriales").html("");
			$.get("../modelos/editoriales/listarNombre.php",
				{"nombre": $("#buscar").val()},
				function(registros){
				registros.forEach(function(registro, index){
					$("#lista_editoriales").prepend("<li id='"+
							registro.edi_id+"'>"+
							registro.edi_nombre+
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