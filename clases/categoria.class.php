<?php
class Categoria{
	private $id;
	private $nombre;

	public function getid(){return $this->id; }
	public function getnombre(){return $this->nombre; }

	public function setid($id){ $this->id = $id;}
	public function setnombre($nombre){ $this->nombre = $nombre;}

	public function altaCategoria($nombre){}
	public function bajaCategoria($id){}
	public function actualizaCategoria(){}

	public static function buscaCategoria($id){}
	public static function buscaCategorias($nombre){}
	public static function listaCategorias(){}
}