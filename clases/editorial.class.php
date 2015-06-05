<?php 
include("conexion.class.php");

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

	public function altaEditorial($nombre, $email){
		$conexion = new Conexion();
		$sql = "insert into editorial(edi_nombre, edi_email)values('$nombre','$email')";
		mysqli_query($conexion->link, $sql) or die("Error: ".mysqli_error($conexion->link));
		echo "Editorial insertada correctamente";
	}
	public function bajaEditorial($id){
		$conexion = new Conexion();
		$sql = "delete from editorial where edi_id=$id";
		mysqli_query($conexion->link, $sql) or die("Error: ".mysqli_error($conexion->link));
		echo "Editorial borrada correctamente";
	}
	public function actualizaEditorial(){
		$conexion = new Conexion();
		$sql = "update editorial set edi_nombre='$this->nombre', edi_email='$this->email' where edi_id=$this->id";
		mysqli_query($conexion->link, $sql) or die("Error: ".mysqli_error($conexion->link));
		echo "Editorial actualizada correctamente";
	}
	public static function buscaEditorial($id){
		$conexion = new Conexion();
		$sql = "select * from editorial where edi_id=$id";
		$query = mysqli_query($conexion->link, $sql) or die("Error: ".mysqli_error($conexion->link));
		while ($reg = mysqli_fetch_assoc($query)){ $regs[] = $reg;}		
		echo json_encode($regs);
	}
	public static function buscaEditoriales($nombre){
		$conexion = new Conexion();
		$sql = "select *, edi_id as id, edi_nombre as label from editorial where edi_nombre like '%$nombre%'";
		$query = mysqli_query($conexion->link, $sql) or die("Error: ".mysqli_error($conexion->link));
		while ($reg = mysqli_fetch_assoc($query)){ $regs[] = $reg;}		
		echo json_encode($regs);
	}
	public static function listaEditoriales(){
		$conexion = new Conexion();
		$sql = "select * from editorial";
		$query = mysqli_query($conexion->link, $sql) or die("Error: ".mysqli_error($conexion->link));
		while ($reg = mysqli_fetch_assoc($query)){ $regs[] = $reg;}		
		echo json_encode($regs);
	}


}
?>