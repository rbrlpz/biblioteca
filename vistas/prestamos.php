<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Catalogo de libros</title>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<link rel="stylesheet" href="../css/jquery-ui.theme.min.css">
	<link rel="stylesheet" href="../css/jquery-ui.structure.min.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../css/miestilo.css">
</head>
<body>
	<div id="container">
		<div id="tabs">
			<ul>
				<li><a href="#prestar">Prestamos</a></li>
				<li><a href="#refrendar">Refrendos</a></li>
				<li><a href="#entregar">Entregas</a></li>
			</ul>
			<div id="prestar">
				<form id="nuevo-prestamo" class="form">
					<div class="form-container">
						<label for="libro">Libro</label>
						<input id="libro" class="form-control" placeholder="Escriba el titulo del libro">
						<input type="hidden" name="lib_id" id="lib_id">
					</div>
					<div class="form-container">
						<label for="usuario">Usuario</label>
						<input id="usuario" class="form-control" placeholder="Escriba el nombre de la persona">
						<input type="hidden" name="usu_id" id="usu_id">
					</div>
					<div class="form-container">
						<label for="dias">Días de prestamo</label>
						<input type="number" name="dias" id="dias" class="form-control" min="0">
					</div>
					<div class="form-container">
						<input type="submit" value="PRESTAR" class="form-control btn btn-primary">
					</div>
				</form>
			</div>
			<div id="refrendar">
				<ul class="activos list-group" id="lista_activos">
				</ul>
			</div>
			<div id="entregar">
				<ul class="activos list-group" id="lista_activos">
				</ul>
			</div>
	</div>
	<div id="overlay">
		<div id="modificar">
			<form id="frm_modificar" action="" class="form">
				<div class="form-container">
					<label for="refusuario">Usuario:</label>
					<span id="refusuario"></span>
				</div>
				<div class="form-container">
					<label for="reflibro">Libro:</label>
					<span id="reflibro"></span>
				</div>
				<div class="form-container">
					<label for="fant">Fecha de entrega anterior:</label><span id="fant"></span>
				</div>
				<div class="form-container">
					<label for="f_entrega">Nueva Fecha:</label>
					<input type="date" name="f_entrega" id="f_entrega">
				</div>
				<div class="form-container">
					<input type="hidden" id="pre_id" name="pre_id">
					<input type="submit" value="REFRENDAR" class="form-control btn btn-primary">
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		$("#tabs").tabs();
		$("#libro").autocomplete({
			source:"../modelos/libros/listarNombreAutocomplete.php",
			select:function(evento, ui){
				$("#lib_id").val(ui.item.id);
			}
		});

		$("#usuario").autocomplete({
			source:"../modelos/usuarios/listarNombreAutocomplete.php",
			select:function(evento, ui){
				$("#usu_id").val(ui.item.id);
			}
		});

		$(document).on("submit","#nuevo-prestamo",function(evt){
			evt.preventDefault();
			$.post("../modelos/prestamos/insertar.php", 
				$("#nuevo-prestamo").serialize(),
				function(respuesta){
					alert(respuesta);
					$("#nuevo-prestamo")[0].reset();
					listar()
				});
		});

		function lista_activos(accion){
			$(".activos").html("");
			$.get("../modelos/prestamos/lista_activos.php", 
				function(respuesta){
				respuesta.forEach(function(element, index){
					$("#"+accion.toLowerCase()+" .activos").append("<li data-fentrega='"+
										element.pre_f_entrega+
										"' class='li_prestamo list-group-item' id='"+
										element.pre_id+
										"'>"+
										"<div>Usuario: "+
										element.usu_nombre + 
										"</div><div>Libro: " + 
										element.lib_titulo + 
										"</div><div>Feha de entrega: "+
										element.pre_f_entrega
										+"</div>" +
										"<span class='acciones'>"+
										"<input type='button' class='"+
										accion +
										" btn btn-warning' value='"+
										accion +
										"'>"+
										"</span>"+
										"</li>");
				});
			},"json");
		}
		function listar(){
			lista_activos("Refrendar");
			lista_activos("Entregar");
		}
		listar();
		$(document).on("click",".Refrendar",function(){
			var datos = $(this).parent().parent().text().split(" - ");
			var id = $(this).parent().parent().attr("id");
			var fentrega = $(this).parent().parent().data("fentrega");

			$("#overlay").show(500, function(){
				$("#refusuario").html(datos[0]);
				$("#reflibro").html(datos[1]);
				$("#fant").html(fentrega);
				$("#f_entrega").val(fentrega);
				$("#pre_id").val(id);
			});

		});

		$(document).on("click",".Entregar",function(){
			if (confirm("¿Ya entregó el libro?")){
				var id = $(this).parent().parent().attr("id");
				$.post("../modelos/prestamos/entregar.php", 
					{"id":id},
					function(respuesta){
						alert(respuesta);
						listar();
				});
			}
		});

		$(document).on("submit","#frm_modificar", function(e){
			e.preventDefault();
			$.post("../modelos/prestamos/refrendar.php",
				$("#frm_modificar").serialize(),
				function(respuesta){
					alert(respuesta);
					$("#overlay").hide(500);
					listar();
				});
		});

		$(document).on("keyup",function(evento){
			if (evento.keyCode == 27){
				$("#overlay").hide(500);
			}
		});
	</script>
</body>
</html>