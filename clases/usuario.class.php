<?php
class Usuario{
	private $id;
	private $nombre;
	private $email;
	private $clave;
	private $telefono;

	public function getid(){return $this->id;}
	public function getnombre(){return $this->nombre;}
	public function getemail(){return $this->email;}
	public function getclave(){return $this->clave;}
	public function gettelefono(){return $this->telefono;}
	public function setid($id){$this->id=$id;}
	public function setnombre($nombre){$this->nombre=$nombre;}
	public function setemail($email){$this->email=$email;}
	public function setclave($clave){$this->clave=$clave;}
	public function settelefono($telefono){$this->telefono=$telefono;}

	public function altaUsuario($nombre, $email, $clave,$telefono){}
	public function bajaUsuario($id){}
	public function actualizaUsuario(){}
	public static function buscaUsuario($id){}
	public static function buscaUsuarios($nombre){}
	public static function listaUsuarios(){}
}