<?php 
class Prestamo{
	private $id;
	private $usuario;
	private $libro;
	private $f_salida;
	private $f_entrega;
	private $status=true;

	public function getid(){return $this->id;}
	public function getusuario(){return $this->usuario;}
	public function getlibro(){return $this->libro;}
	public function getf_salida(){return $this->f_salida;}
	public function getf_entrega(){return $this->f_entrega;}
	public function getstatus(){return $this->status;}
	public function setid($id){$this->id = $id;}
	public function setusuario($usuario){$this->usuario = $usuario;}
	public function setlibro($libro){$this->libro = $libro;}
	public function setf_salida($f_salida){$this->f_salida = $f_salida;}
	public function setf_entrega($f_entrega){$this->f_entrega = $f_entrega;}
	public function setstatus($status){$this->status = $status;}

public function altaPestamo($usuario, $libro, $f_salida, $f_entrega){}
public function cambiaStatus($id){}
public function renuevaPrestamo($id, $f_entrega){}
public static function buscaActivos(){}
public static function buscaPrestamo($id){}
public static function buscaPrestamos($usuario){}







}
?>