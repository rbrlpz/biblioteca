<?php
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
							$editorial, $num_pags, $formato, $isbn, $cantidad){}
	public function bajaLibro($id){}
	public function actualizaLibro(){}
	public static function buscaLibro($id){}
	public static function buscaLibros($nombre){}
	public static function listaLibros(){}
}
?>