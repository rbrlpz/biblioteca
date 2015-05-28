<?php 
class Autor{
	private $id;
	private $nombre;
	private $email;

	public function getid(){return $this->id;}
	public function getnombre(){return $this->nombre;}
	public function getemail(){return $this->email;}
	public function setid($id){$this->id = $id;}
	public function setnombre($nombre){$this->nombre = $nombre;}
	public function setemail($email){$this->email = $email;}

	public function altaAutor($nombre, $email){}
	public function bajaAutor($id){}
	public function actualizaAutor(){}
	public static function buscaAutor($id){}
	public static function buscaAutores($nombre){}
	public static function listaAutores(){}

}
?>