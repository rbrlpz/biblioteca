<?php
include("conexion.class.php");
class Categoria{
	private $id;
	private $nombre;

	public function getid(){return $this->id; }
	public function getnombre(){return $this->nombre; }

	public function setid($id){ $this->id = $id;}
	public function setnombre($nombre){ $this->nombre = $nombre;}

	public function altaCategoria($nombre){
		$conexion = new Conexion();
		$sql = "insert into categoria (cat_nombre) values('$nombre')";
		mysqli_query($conexion->link, $sql) 
				or die("Ocurrió un error: ".mysqli_error($conexion->link));
		mysqli_close($conexion->link);
		return "El registro se ha agregado";
	}
	public function bajaCategoria($id){
		$conexion = new Conexion();
		$sql = "delete from categoria where cat_id =".$id;
		mysqli_query($conexion->link, $sql) 
				or die("Ocurrió un error: ".mysqli_error($conexion->link));
		mysqli_close($conexion->link);
		return "El registro se ha borrado";
	}
	public function actualizaCategoria(){
		$conexion = new Conexion();
		$sql = "update categoria set cat_nombre= '$this->nombre' where 
				cat_id=$this->id";
		mysqli_query($conexion->link, $sql) 
				or die("Ocurrió un error: ".mysqli_error($conexion->link));
		mysqli_close($conexion->link);
		return "El registro se ha actualizado";
	}

	public static function buscaCategoria($id){
		$conexion = new Conexion();
		$sql = "select cat_id, cat_nombre from categoria 
					where cat_id=$id";
		$consulta = mysqli_query($conexion->link, $sql) 
			or die("Ocurrio un error:".mysqli_error($conexion->link));
		while ($registro = mysqli_fetch_assoc($consulta)){
			$registros[] = $registro;
		}
		mysqli_close($conexion->link);
		return json_encode($registros);
	}
	public static function buscaCategorias($nombre){
		$conexion = new Conexion();
		$sql = "select cat_id, cat_nombre,cat_id as id, cat_nombre as label from categoria 
					where cat_nombre like '%$nombre%'";
		$consulta = mysqli_query($conexion->link, $sql) 
			or die("Ocurrio un error:".mysqli_error($conexion->link));
		while ($registro = mysqli_fetch_assoc($consulta)){
			$registros[] = $registro;
		}
		mysqli_close($conexion->link);
		return json_encode($registros);
	}
	public static function listaCategorias(){
		$conexion = new Conexion();
		$sql = "select cat_id, cat_nombre from categoria";
		$consulta = mysqli_query($conexion->link, $sql) 
			or die("Ocurrio un error:".mysqli_error($conexion->link));
		while ($registro = mysqli_fetch_assoc($consulta)){
			$registros[] = $registro;
		}
		mysqli_close($conexion->link);
		return json_encode($registros);
	}
}