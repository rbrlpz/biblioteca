<?php 
class Conexion{
	private $host = "localhost";
	private $user = "biblio";
	private $database = "biblio";
	private $password = "unacontrasena";
	public $link;
	//grant all on biblio.* to biblio@localhost identified by "unacontrasena";
	public function Conexion(){
		$this->link = mysqli_connect($this->gethost(),
									$this->getuser(),
									$this->getpassword(),
									$this->getdatabase());
	}


public function gethost(){return $this->host;}
public function getuser(){return $this->user;}
public function getdatabase(){return $this->database;}
public function getpassword(){return $this->password;}
}
?>