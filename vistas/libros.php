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
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="../css/miestilo.css"></head>
<body>
	<div id="container">
		<h1>Catálogo de Libros</h1>
		<form id="form-insertar" action="" class="form">
			<div class="form-container">
				<label for="titulo">Titulo</label>
				<input type="text" name="titulo" id="titulo" class="form-control">
			</div>
			<div class="form-container">
				<label for="isbn">ISBN</label>
				<input type="text" name="isbn" id="isbn" class="form-control">
			</div>
			<div class="form-container">
				<label for="num_pags">No. páginas</label>
				<input type="text" name="num_pags" id="num_pags" class="form-control">
			</div>
			<div class="form-container">
				<label for="formato">Formato</label>
				<input type="text" name="formato" id="formato" class="form-control">
			</div>
			<div class="form-container">
				<label for="cantidad">Cantidad</label>
				<input type="text" name="cantidad" id="cantidad" class="form-control">
			</div>
			<div class="form-container">
				<label for="editorial">Editorial</label>
				<input type="text" name="editorial" id="editorial" class="form-control">
				<input type="hidden" name="edi_id" id="edi_id">
			</div>
			<div class="form-container">
				<label for="autor">Autor</label>
				<input type="text" name="autor" id="autor" class="form-control">
				<select id="aut_id" name="aut_id" multiple></select>
			</div>
			<div class="form-container">
				<label for="categoria">Categoria</label>
				<input type="text" name="categoria" id="categoria" class="form-control">
				<select name="cat_id" multiple></select>
			</div>
		</form>
		<section id="listado">
			<input type="search" id="buscar" placeholder="Buscar por titulo de libro">
			<ul id="lista_libros"></ul>
		</section>

		<div id="overlay">
			<div id="modificar">
				<form id="frm_modificar" action="" class="form">
					<div class="form-container">
						<input type="hidden" id="usu_id" name="usu_id" >
						<input type="submit" id="modificar_libro" value="Modificar libro" class="form-control btn btn-primary">
					</div>

				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$("#editorial").autocomplete({
			source: "../modelos/editoriales/listarNombreAutocomplete.php",
			select: function(evento, editoriales){
				$("#edi_id").val(editoriales.item.id);
			} 
		});

		$("#autor").autocomplete({
			source: "../modelos/autores/listarNombreAutocomplete.php",
			select: function(evento, autores){
				console.log(autores);
				$("#aut_id").append("<option value='"+
									autores.item.id
								+"'>"+ autores.item.label+"</option>");
			} 
		});
	</script>
</body>
</html>