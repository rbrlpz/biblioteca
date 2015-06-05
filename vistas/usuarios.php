<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Catálogo de usuarios</title>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../css/miestilo.css">
</head>
<body>
	<div id="container">
		<h1>Catálogo de usuarios</h1>
		<form id="form-insertar" action="" class="form">
			<div class="form-container">
				<label for="nombre">Nombre</label>
				<input type="text" id="nombre" name="nombre" placeholder="nombre del usuario" class="form-control">
			</div>
			<div class="form-container">
				<label for="email">Email</label>
				<input type="email" id="email" name="email" placeholder="email del usuario" class="form-control">
			</div>
			<div class="form-container">
				<label for="clave">Clave</label>
				<input type="text" id="clave" name="clave" placeholder="clave del usuario" class="form-control">
			</div>
			<div class="form-container">
				<label for="telefono">Telefono</label>
				<input type="tel" id="telefono" name="telefono" placeholder="telefono del usuario" class="form-control">
			</div>
			<div class="form-container">
				<input type="submit" id="insertar_usuario" value="Insertar usuario" class="form-control btn btn-primary">
			</div>
		</form>

		<section id="listado">
			<input type="search" id="buscar" placeholder="Buscar por nombre de usuario">
			<ul id="lista_usuarios"></ul>
		</section>

		<div id="overlay">
			<div id="modificar">
				<form id="frm_modificar" action="" class="form">
					<div class="form-container">
						<label for="Mnombre">Nombre</label>
						<input type="text" id="Mnombre" name="nombre" placeholder="nombre del usuario" class="form-control">
					</div>
					<div class="form-container">
						<label for="Memail">Email</label>
						<input type="email" id="Memail" name="email" placeholder="email del usuario" class="form-control">
					</div>
					<div class="form-container">
						<label for="clave">Clave</label>
						<input type="text" id="Mclave" name="clave" placeholder="clave del usuario" class="form-control">
					</div>
					<div class="form-container">
						<label for="telefono">Telefono</label>
						<input type="tel" id="Mtelefono" name="telefono" placeholder="telefono del usuario" class="form-control">
					</div>
					<div class="form-container">
						<input type="hidden" id="usu_id" name="usu_id" >
						<input type="submit" id="modificar_usuario" value="Modificar usuario" class="form-control btn btn-primary">
					</div>

				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function lista(){
			$("#lista_usuarios").html("");
			$.get("../modelos/usuarios/listar.php",function(registros){
				registros.forEach(function(registro, index){
					$("#lista_usuarios").prepend("<li id='"+
							registro.usu_id+"'>"+
							registro.usu_nombre+
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
		$(document).on("click","#insertar_usuario",function(evento){
			evento.preventDefault();
			$.post("../modelos/usuarios/insertar.php", 
				$("#form-insertar").serialize(), function(respuesta){
					alert(respuesta);
					lista();
				});
		});

		$(document).on("click", "#lista_usuarios li", function(){
			$(".acciones").hide();
			$(this).children().show(500);
		});

		$(document).on("click",".borrar", function(evento){
			var id = $(this).parent().parent().attr("id");
			$.post("../modelos/usuarios/borrar.php", {"usu_id":id}, 
				function(respuesta){
					alert(respuesta);
					lista();
				});
		});

		$(document).on("click",".modifica", function(evento){
			var id = $(this).parent().parent().attr("id");
			$("#overlay").show(500, function(){
				$.post("../modelos/usuarios/buscaId.php", {"usu_id":id}, 
					function(respuesta){
						$("#Mnombre").val(respuesta[0].usu_nombre);
						$("#Memail").val(respuesta[0].usu_email);
						$("#Mclave").val(respuesta[0].usu_clave);
						$("#Mtelefono").val(respuesta[0].usu_telefono);
						$("#usu_id").val(id);
					}, "json");

			});
		});
	
		$(document).on("click", "#modificar_usuario", function(evento){
			evento.preventDefault();
			$.post("../modelos/usuarios/modificar.php", 
				$("#frm_modificar").serialize(), function(respuesta){
					alert(respuesta);
					lista();
					$("#overlay").hide(500);
				});
		})
		$(document).on("keyup", "#buscar", function(){
			$("#lista_usuarios").html("");
			$.get("../modelos/usuarios/listarNombre.php",
				{"nombre": $("#buscar").val()},
				function(registros){
				registros.forEach(function(registro, index){
					$("#lista_usuarios").prepend("<li id='"+
							registro.usu_id+"'>"+
							registro.usu_nombre+
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