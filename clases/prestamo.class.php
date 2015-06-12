<?php 
include("conexion.class.php");
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

public function altaPrestamo($usuario, $libro, $f_salida, $f_entrega){
	$conexion = new Conexion();
	$sql = "INSERT INTO prestamo(pre_usu_id, pre_lib_id, 
						pre_f_salida, pre_f_entrega, pre_estatus) 
						VALUES ($usuario, $libro, '$f_salida','$f_entrega', 'PRESTADO')";
	mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));
	echo "Libro prestado, fecha de entrega: $f_entrega";
}
public function cambiaStatus($id){
	$conexion = new Conexion();
	$sql = "update prestamo set pre_estatus='ENTREGADO' where pre_id=$id";
	mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));
	echo "Libro entregado";
}
public function renuevaPrestamo($id, $f_entrega){
	$conexion = new Conexion();
	$sql = "update prestamo set pre_estatus='RENOVADO', 
			pre_f_entrega='$f_entrega' where pre_id=$id";
	mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));
	echo "Libro renovado, fecha de entrega: $f_entrega";
}
public static function buscaActivos(){
	$conexion = new Conexion();
	$sql = "select pre_id, pre_f_entrega, pre_f_salida, 
			usu_nombre, lib_titulo from prestamo, usuario, libro 
			where 
			lib_id = pre_lib_id and 
			usu_id = pre_usu_id and 
			pre_estatus != 'ENTREGADO'";
	$query = mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));
	while ($r = mysqli_fetch_assoc($query)){$rows[] = $r;}
	echo json_encode($rows);
}
public static function buscaPrestamo($id){
	$conexion = new Conexion();
	$sql = "select pre_id, pre_usu_id, pre_lib_id, pre_f_entrega, pre_f_salida, 
			usu_nombre, lib_titulo from prestamo, usuario, libro 
			where 
			lib_id = pre_lib_id and 
			usu_id = pre_usu_id and 
			pre_id =$id";
	$query = mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));
	while ($r = mysqli_fetch_assoc($query)){$rows[] = $r;}
	echo json_encode($rows);
}
public static function buscaPrestamos($usuario){
	$conexion = new Conexion();
	$sql = "select pre_id, pre_usu_id, pre_lib_id, pre_f_entrega, pre_f_salida, 
			usu_nombre, lib_titulo from prestamo, usuario, libro 
			where 
			lib_id = pre_lib_id and 
			usu_id = pre_usu_id and 
			where usu_nombre like '%$usuario%'";
	$query = mysqli_query($conexion->link, $sql) or die(mysqli_error($conexion->link));
	while ($r = mysqli_fetch_assoc($query)){$rows[] = $r;}
	echo json_encode($rows);
	}
}
?>