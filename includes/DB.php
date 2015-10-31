<?php
class DataBase{
	private $servidor="";
	private $usuario="";
	private $contraseña="";
	private $database="";
	private $con="";
	
	/**
	*Constructor de la clase DataBase.
	*Pide como parametros el nombre del servidor, usuario,contraseña y la base de datos a la cual nos vamos a conectar.
	*En caso de no poderse conectar a la base de datos o al servidor nos mostrara en pantalla un mensaje de error. 
	*/
	function DataBase($servidor,$usuario,$contraseña,$database){
		$this->setServidor($servidor);
		$this->setUsuario($usuario);
		$this->setContraseña($contraseña);
		$this->setDatabase($database);
		if(!$this->conexion()){
			echo '<p>'."Error al conectarse al servidor".'</p>';
		}
	}
	
	/**
	*Función que realiza la conexion con el servidor y la base de datos.
	*Nos regresa la conexion
	*/
	private function conexion(){
		$this->con = mysqli_connect($this->getServidor(),$this->getUsuario(),$this->getContraseña(),$this->getDatabase());
		return $this->con;
	}
	/**
	*Función que realiza el cierre de la conexion a la base de datos 
	*/
	function cerrar_conexion(){
		mysqli_close($this->con);
	}
	/**
	*Función que nos permite ejecutar un query.
	*Para consultas como SELECT, SHOW, DESCRIBE, o EXPLAIN nos regresa un objeto mysqli_result y para otro tipo de 
	*consultas nos regresa TRUE en caso de exito o FALSE en caso de algun fallo. 
	*/
	function queryMySQL($query){
		return mysqli_query($this->con,$query);
	}
	/**
	*Devuelve una matriz de cadenas que corresponde a la fila recuperada. 
	*NULL si no hay más filas en conjunto de resultados.
	*/
	function fetch_a_result_assoc($consulta){
		return mysqli_fetch_array($consulta,MYSQLI_ASSOC);
	}
	/**
	*Devuelve una matriz de cadenas que corresponde a la fila recuperada. 
	*NULL si no hay más filas en conjunto de resultados.
	*/
	function  fetch_a_result_num($consulta){
		return mysqli_fetch_array($consulta,MYSQLI_NUM);
	}
	/**
	*Devuelve el ultimo id insertado
	*/
	function insert_id(){
		return mysqli_insert_id($this->con);
	}
	/**
	 * Funcion que devuelve el numero de filas del query insertado
	 */
	function num_rows($consulta){
		return mysqli_num_rows($consulta);
	}
	function error(){
		return mysqli_error($this->con);
	}
	/**	Funciones SET y GET para las variables de servidor,usuario,contraseña */
	function setServidor($servidor){
		$this->servidor = $servidor;
	}
	
	function setUsuario($usuario){
		$this->usuario = $usuario;
	}
	
	function setContraseña($contraseña){
		$this->contraseña = $contraseña;
	}
	
	function setDatabase($database){
		$this->database = $database;
	}
	
	private function getServidor(){
		return $this->servidor;
	}
	
	private function getUsuario(){
		return $this->usuario;
	}
	
	private function getContraseña(){
		return $this->contraseña;
	}
	
	private function getDatabase(){
		return $this->database;
	}
	public function getCon(){
		return $this->con;
	}
}
//instancio la clase DataBase
$db = new DataBase("localhost", "root", "root", "easymath");


/*
$mysqli = new mysqli("localhost", "root", "root", "easymath");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$mysqli->real_query("SELECT * FROM usuarios ");
$resultado = $mysqli->use_result();

echo "Orden del conjunto de resultados...\n";
while ($fila = $resultado->fetch_assoc()) {
    echo " id = " . $fila['id'] . "\n"." usuario = " . $fila['nombre'] ."\n"." pass = " . $fila['pass'] ;

}
*/
?>