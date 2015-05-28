<?php 
class Editorial{
	private $id;
	private $nombre;
	private $email;

	public function getid(){return $this->id;}
	public function getnombre(){return $this->nombre;}
	public function getemail(){return $this->email;}
	public function setid($id){$this->id = $id;}
	public function setnombre($nombre){$this->nombre = $nombre;}
	public function setemail($email){$this->email = $email;}

	public function altaEditorial($nombre, $email){}
	public function bajaEditorial($id){}
	public function actualizaEditorial(){}
	public static function buscaEditorial($id){}
	public static function buscaEditoriales($nombre){}
	public static function listaEditoriales(){}

}
?>