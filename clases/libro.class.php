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

	public function bajaLibro($id){}
	public function actualizaLibro(){}
	public static function buscaLibro($id){}
	public static function buscaLibros($nombre){}
	public static function listaLibros(){}
}
?>