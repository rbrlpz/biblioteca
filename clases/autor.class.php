<?php 
include("conexion.class.php");
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

	public function altaAutor($nombre, $email){
		$conexion = new Conexion();
		$sql = "insert into autor(aut_nombre, aut_email)values('$nombre','$email')";
		mysqli_query($conexion->link, $sql) or die("Error: ".mysqli_error($conexion->link));
		echo "Autor insertado correctamente";
	}
	public function bajaAutor($id){
		$conexion = new Conexion();
		$sql = "delete from autor where aut_id=$id";
		mysqli_query($conexion->link, $sql) or die("Error: ".mysqli_error($conexion->link));
		echo "Autor borrado correctamente";
	}
	public function actualizaAutor(){
		$conexion = new Conexion();
		$sql = "update autor set aut_nombre='$this->nombre', aut_email='$this->email' where aut_id=$this->id";
		mysqli_query($conexion->link, $sql) or die("Error: ".mysqli_error($conexion->link));
		echo "Autor actualizado correctamente";
	}
	public static function buscaAutor($id){
		$conexion = new Conexion();
		$sql = "select * from autor where aut_id=$id";
		$query = mysqli_query($conexion->link, $sql) or die("Error: ".mysqli_error($conexion->link));
		while ($reg = mysqli_fetch_assoc($query)){ $regs[] = $reg;}		
		echo json_encode($regs);
	}
	public static function buscaAutores($nombre){
		$conexion = new Conexion();
		$sql = "select *, aut_id as id, aut_nombre as label from autor where aut_nombre like '%$nombre%'";
		$query = mysqli_query($conexion->link, $sql) or die("Error: ".mysqli_error($conexion->link));
		while ($reg = mysqli_fetch_assoc($query)){ $regs[] = $reg;}		
		echo json_encode($regs);
	}
	public static function listaAutores(){
		$conexion = new Conexion();
		$sql = "select * from autor";
		$query = mysqli_query($conexion->link, $sql) or die("Error: ".mysqli_error($conexion->link));
		while ($reg = mysqli_fetch_assoc($query)){ $regs[] = $reg;}		
		echo json_encode($regs);
	}

}
?>