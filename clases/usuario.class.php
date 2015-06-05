<?php
include("conexion.class.php");

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

	public function altaUsuario($nombre, $email, $clave, $telefono){
		$conexion = new Conexion();
		$sql = "insert into usuario(usu_nombre, usu_email, usu_clave, usu_telefono)values('$nombre','$email', '$clave', '$telefono')";
		mysqli_query($conexion->link, $sql) or die("Error: ".mysqli_error($conexion->link));
		echo "Usuario insertado correctamente";
	}
	public function bajaUsuario($id){
		$conexion = new Conexion();
		$sql = "delete from usuario where usu_id=$id";
		mysqli_query($conexion->link, $sql) or die("Error: ".mysqli_error($conexion->link));
		echo "Usuario borrado correctamente";
	}
	public function actualizaUsuario(){
		$conexion = new Conexion();
		$sql = "update usuario set usu_nombre='$this->nombre', usu_email='$this->email', usu_clave='$this->clave', usu_telefono='$this->telefono' where usu_id=$this->id";
		mysqli_query($conexion->link, $sql) or die("Error: ".mysqli_error($conexion->link));
		echo "Usuario actualizado correctamente";
	}
	public static function buscaUsuario($id){
		$conexion = new Conexion();
		$sql = "select * from usuario where usu_id=$id";
		$query = mysqli_query($conexion->link, $sql) or die("Error: ".mysqli_error($conexion->link));
		while ($reg = mysqli_fetch_assoc($query)){ $regs[] = $reg;}		
		echo json_encode($regs);
	}
	public static function buscaUsuarios($nombre){
		$conexion = new Conexion();
		$sql = "select * from usuario where usu_nombre like '%$nombre%'";
		$query = mysqli_query($conexion->link, $sql) or die("Error: ".mysqli_error($conexion->link));
		while ($reg = mysqli_fetch_assoc($query)){ $regs[] = $reg;}		
		echo json_encode($regs);
	}
	public static function listaUsuarios(){
		$conexion = new Conexion();
		$sql = "select * from usuario";
		$query = mysqli_query($conexion->link, $sql) or die("Error: ".mysqli_error($conexion->link));
		while ($reg = mysqli_fetch_assoc($query)){ $regs[] = $reg;}		
		echo json_encode($regs);
	}

}