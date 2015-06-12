<?php
include("conexion.class.php");
class Libro{
	// Atributos de clase
	private $titulo;
	private $isbn;
	private $num_pags;
	private $editorial;
	private $autores;
	private $categorias;
	private $formato;
	private $cantidad;
	private $disponible=true;
	//metodos de encapsulamiento
	public function gettitulo(){	return $this->titulo; }
	public function getisbn(){	return $this->isbn; }
	public function getnum_pags(){	return $this->num_pags; }
	public function geteditorial(){	return $this->editorial; }
	public function getautores(){	return $this->autores; }
	public function getcategorias(){	return $this->categorias; }
	public function getformato(){	return $this->formato; }
	public function getcantidad(){	return $this->cantidad; }
	public function getdisponible(){	return $this->disponible; }
	public function settitulo($titulo){	$this->titulo = $titulo; }
	public function setisbn($isbn){	$this->isbn = $isbn; }
	public function setnum_pags($num_pags){	$this->num_pags = $num_pags; }
	public function seteditorial($editorial){	$this->editorial = $editorial; }
	public function setautores($autores){	$this->autores = $autores; }
	public function setcategorias($categorias){	$this->categorias = $categorias; }
	public function setformato($formato){	$this->formato = $formato; }
	public function setcantidad($cantidad){	$this->cantidad = $cantidad; }
	public function setdisponible($disponible){	$this->disponible = $disponible; }
	//metodos de acceso
	public function altaLibro($titulo, $autores, $categorias, 
							$editorial, $num_pags, $formato, $isbn, $cantidad){
		$conexion  = new Conexion();
		$sql = "INSERT INTO libro(lib_titulo, lib_isbn, 
							lib_num_pags, lib_formato, lib_disponible, 
							lib_cantidad) 
				VALUES ('$titulo','$isbn','$num_pags','$formato',1, $cantidad)";
		mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));
		$lib_id = mysqli_insert_id($conexion->link);

		$sql = "insert into libros_editorial(lie_lib_id, lie_edi_id) values(
			$lib_id, $editorial)";
		mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));

		foreach ($autores as $autor) {
			$sql = "insert into libros_autor(lia_lib_id, lia_aut_id) values(
			$lib_id, $autor)";
		mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));			
		}

		foreach ($categorias as $categoria) {
			$sql = "insert into libros_categoria(lic_lib_id, lic_cat_id) values(
			$lib_id, $categoria)";
		mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));			
		}
	echo "Datos insertados correctamente";
	}

	public function bajaLibro($id){
		$conexion = new Conexion();
		$sql = "update libro set lib_disponible=0 where lib_id = $id";
		mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));
		echo "Libro dado de baja exitosamente";
	}

	public function actualizaLibro(){
		$conexion = new Conexion();
		$sql = "update libro set lib_titulo='$this->titulo', lib_isbn='$this->isbn',
		lib_num_pags='$this->num_pags', lib_formato='$this->formato', lib_cantidad='$this->cantidad'
		 where lib_id = $this->id";
		mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));
		echo "Libro actualizado exitosamente";
	}

	public static function buscaLibro($id){
		$conexion = new Conexion();
		$sql = "select * from libro where lib_disponible=1 and lib_id=$id";
		$query = mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));
		while($r = mysqli_fetch_assoc($query)){
			// por cada libro, buscar la relación con autores
			$sql = "select aut_id, aut_nombre 
					from autor, libros_autor 
					where lia_aut_id = aut_id and lia_lib_id=$id";
			$query_aut = mysqli_query($conexion->link, $sql)  or die(mysqli_error($conexion->link));
			$autores = Array();
			while ($a = mysqli_fetch_assoc($query_aut)){$autores[]=$a;}
			$r["autores"]=$autores; // generamos una nueva posicion en el arreglo de libro indicando el o los autores

			$sql = "select cat_id, cat_nombre 
					from categoria, libros_categoria 
					where lic_cat_id = cat_id and lic_lib_id=$id";
			$query_aut = mysqli_query($conexion->link, $sql)  or die(mysqli_error($conexion->link));
			$categorias = Array();
			while ($a = mysqli_fetch_assoc($query_aut)){$categorias[]=$a;}
			$r["categorias"]=$categorias;

			$sql = "select edi_id, edi_nombre 
					from editorial, libros_editorial 
					where lie_edi_id = edi_id and lie_lib_id=$id";
			$query_aut = mysqli_query($conexion->link, $sql)  or die(mysqli_error($conexion->link));
			$editorial = Array();
			while ($a = mysqli_fetch_assoc($query_aut)){$editorial[]=$a;}
			$r["editorial"]=$editorial;

			$rows[]=$r;
		}
		echo json_encode($rows);
	}
	public static function buscaLibros($nombre){
		$conexion = new Conexion();
		$sql = "select *, lib_id as id, lib_titulo as label from libro where lib_disponible=1 and lib_titulo like '%$nombre%'";
		$query = mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));
		while($r = mysqli_fetch_assoc($query)){$rows[]=$r;}

		echo json_encode($rows);
	}
	public static function listaLibros(){
		$conexion = new Conexion();
		$sql = "select * from libro where lib_disponible=1";
		$query = mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));
		while($r = mysqli_fetch_assoc($query)){$rows[]=$r;}

		echo json_encode($rows);
	}

	public static function agregaAutor($lib_id, $aut_id){
		$conexion = new Conexion();
		$sql = "insert into libros_autor (lia_lib_id, lia_aut_id) values($lib_id, $aut_id)";
		mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));
		echo "Agregado correctamente";
	}

	public static function quitaAutor($lib_id, $aut_id){
		$conexion = new Conexion();
		$sql = "delete from libros_autor where lia_lib_id= $lib_id and lia_aut_id = $aut_id limit 1";
		mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));
		echo "Eliminada correctamente";
	}

	public static function quitaCategoria($lib_id, $cat_id){
		$conexion = new Conexion();
		$sql = "delete from libros_categoria where lic_lib_id= $lib_id and lic_cat_id = $cat_id limit 1";
		mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));
		echo "Eliminada correctamente";
	}

	public static function agregaCategoria($lib_id, $cat_id){
		$conexion = new Conexion();
		$sql = "insert into libros_categoria (lic_lib_id, lic_cat_id) values($lib_id, $cat_id)";
		mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));
		echo "Agregado correctamente";
	}
}
?>