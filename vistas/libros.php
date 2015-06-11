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
	<link rel="stylesheet" href="../css/miestilo.css"></head>
<body>
	<div id="container">
		<div id="tabuladores">
			<ul class="nav">
				<li><a href="#insertar">Insertar libros</a></li>
				<li><a href="#busca">Buscar</a></li>
			</ul>
		<div id="insertar">
			<h1>Catálogo de Libros</h1>
			<form id="form-insertar" action="" class="form">
				<div class="form-container">
					<label for="titulo">Titulo</label>
					<input type="text" name="titulo" id="titulo" class="form-control" placeholder="Titulo">
				</div>
				<div class="form-container">
					<label for="isbn">ISBN</label>
					<input type="text" name="isbn" id="isbn" class="form-control" placeholder="ISBN">
				</div>
				<div class="form-container">
					<label for="num_pags">No. páginas</label>
					<input type="text" name="num_pags" id="num_pags" class="form-control" placeholder="999">
				</div>
				<div class="form-container">
					<label for="formato">Formato</label>
					<input type="text" name="formato" id="formato" class="form-control" placeholder="Impreso, digital, multimedia...">
				</div>
				<div class="form-container">
					<label for="cantidad">Cantidad</label>
					<input type="text" name="cantidad" id="cantidad" class="form-control" placeholder="Cantidad en existencia">
				</div>
				<div class="form-container">
					<label for="editorial">Editorial</label>
					<input type="text"  id="editorial" class="form-control"  placeholder="Escriba el nombre de la editorial">
					<input type="hidden" name="edi_id" id="edi_id">
				</div>
				<div class="form-container">
					<label for="autor">Autor</label>
					<input type="text" id="autor" class="form-control"  placeholder="Escriba el nombre del autor">
					<select id="aut_id" name="aut_id[]" multiple class="form-control"></select>
				</div>
				<div class="form-container">
					<label for="categoria">Categoria</label>
					<input type="text" id="categoria" class="form-control" placeholder="Escriba el nombre de la categoria">
					<select id="cat_id" name="cat_id[]" multiple class="form-control"></select>
				</div>
				<div class="form-container">
					<input type="submit" id="insertar_libro" value="Insertar libro" class="form-control btn btn-primary">
				</div>
			</form>
		</div>
		<div id="busca">
			<section id="listado">
				<input type="search" id="buscar" placeholder="Buscar por titulo de libro">
				<ul id="lista_libros"></ul>
			</section>
		</div>
	</div>
		<div id="overlay">
			<div id="modificar">
				<form id="frm_modificar" action="" class="form">
					<div class="form-container">
						<label for="titulo">Titulo</label>
						<input type="text" name="titulo" id="Mtitulo" class="form-control" placeholder="Titulo">
					</div>
					<div class="form-container">
						<label for="isbn">ISBN</label>
						<input type="text" name="isbn" id="Misbn" class="form-control" placeholder="ISBN">
					</div>
					<div class="form-container">
						<label for="num_pags">No. páginas</label>
						<input type="text" name="num_pags" id="Mnum_pags" class="form-control" placeholder="999">
					</div>
					<div class="form-container">
						<label for="formato">Formato</label>
						<input type="text" name="formato" id="Mformato" class="form-control" placeholder="Impreso, digital, multimedia...">
					</div>
					<div class="form-container">
						<label for="cantidad">Cantidad</label>
						<input type="text" name="cantidad" id="Mcantidad" class="form-control" placeholder="Cantidad en existencia">
					</div>
					<div class="form-container">
						<label for="editorial">Editorial</label>
						<input type="text"  id="Meditorial" class="form-control"  placeholder="Escriba el nombre de la editorial">
						<input type="hidden" name="edi_id" id="Medi_id">
					</div>
					<div class="form-container">
						<label for="autor">Autor</label>
						<input type="text" id="Mautor" class="form-control"  placeholder="Escriba el nombre del autor">
						<select id="Maut_id" name="aut_id[]" multiple class="form-control"></select>
					</div>
					<div class="form-container">
						<label for="categoria">Categoria</label>
						<input type="text" id="Mcategoria" class="form-control" placeholder="Escriba el nombre de la categoria">
						<select id="Mcat_id" name="cat_id[]" multiple class="form-control"></select>
					</div>
					<div class="form-container">
						<input type="hidden" id="lib_id" name="lib_id" >
						<input type="submit" id="modificar_libro" value="Modificar libro" class="form-control btn btn-primary">
					</div>

				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$("#tabuladores").tabs();
		$("#editorial").autocomplete({
			source: "../modelos/editoriales/listarNombreAutocomplete.php",
			select: function(evento, editoriales){
				$("#edi_id").val(editoriales.item.id);
			} 
		});

		$("#autor").autocomplete({
			source: "../modelos/autores/listarNombreAutocomplete.php",
			select: function(evento, autores){
				$("#aut_id").append("<option selected value='"+
									autores.item.id
								+"'>"+ autores.item.label+"</option>");
			} 
		});
		$("#categoria").autocomplete({
			source: "../modelos/categorias/listarNombreAutocomplete.php",
			select: function(evento, categorias){
				$("#cat_id").append("<option selected value='"+
									categorias.item.id
								+"'>"+ categorias.item.label+"</option>");
			} 
		});

		$(document).on("click", "#insertar_libro", function(evento){
			evento.preventDefault();
			$.post("../modelos/libros/insertar.php", 
				$("#form-insertar").serialize(),
				function(respuesta){
					alert(respuesta);
					lista();
				});
		});

		function lista(){
			$("#lista_libros").html("");
			$.get("../modelos/libros/listar.php", function(json){
				json.forEach(function(registro, index){
					$("#lista_libros").prepend("<li id='"+
							registro.lib_id+"'>"+
							registro.lib_titulo+
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

		$(document).on("click", "#lista_libros li", function(){
			$(".acciones").hide();
			$(this).children().show(500);
		});

		$(document).on("click",".borrar", function(evento){
			var id = $(this).parent().parent().attr("id");
			$.post("../modelos/libros/borrar.php", {"lib_id":id}, 
				function(respuesta){
					alert(respuesta);
					lista();
				});
		});
		$(document).on("click",".modifica", function(evento){
			var id = $(this).parent().parent().attr("id");
			$("#overlay").show(500, function(){
				$.post("../modelos/libros/buscaId.php", {"lib_id":id}, 
					function(respuesta){
						console.log(respuesta);
					}, "json");

			});
		});

		$(document).on("keyup", "#buscar", function(){
			$("#lista_libros").html("");
			$.get("../modelos/libros/listarNombre.php", 
				{"nombre": $("#buscar").val()},
				function(json){
				json.forEach(function(registro, index){
					$("#lista_libros").prepend("<li id='"+
							registro.lib_id+"'>"+
							registro.lib_titulo+
							"<div class='acciones'>"+
							"<input type='button' class='modifica btn btn-warning' value='Modificar'>"+
							"<input type='button' class='borrar btn btn-danger' value='Borrar'>"+
							"</div>"+
							"</li>");
				}); //termina foreach
				$(".acciones").hide();
			},"json");
		});
	</script>
</body>
</html>